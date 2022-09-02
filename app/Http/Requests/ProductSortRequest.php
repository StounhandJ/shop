<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\Maker;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

class ProductSortRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "category_id" => "integer|exists:" . Category::class . ",id",
            "p" => "integer|min:1",
            "popular" => "integer|min:0|max:1",
            "price" => "integer|min:0|max:1",
            "abc" => "integer|min:0|max:1",
            "mip" => "integer|min:0",
            "map" => "integer|min:0",
        ];
    }

    public function getPage(): int
    {
        $page = $this->query("p");

        if (is_numeric($page) && (int)$page >= 1) {
            return (int)$page;
        }

        return 1;
    }

    public function getCategory(): Category
    {
        return Category::getById($this->input("category_id"));
    }

    public function getPopular(): bool
    {
        return !($this->query("popular") == "0");
    }

    public function getPrice()
    {
        if (is_null($this->query("price"))) {
            return null;
        }

        if ($this->query("price") == "1") {
            return true;
        }

        if ($this->query("price") == "0") {
            return false;
        }

        return null;
    }

    public function getAbc()
    {
        if (is_null($this->query("abc"))) {
            return null;
        }

        if ($this->query("abc") == "1") {
            return true;
        }

        if ($this->query("abc") == "0") {
            return false;
        }

        return null;
    }

    public function getMinPrice()
    {
        return $this->query("mip");
    }

    public function getMaxPrice()
    {
        return $this->query("map");
    }

    public function getMakers(): Collection
    {
        $collection = new Collection();
        $makers = $this->query("makers");
        if (is_null($makers)) {
            return $collection;
        }
        foreach (explode(',', $makers) as $maker) {
            $collection->add(Maker::getById($maker));
        }
        return $collection;
    }
}
