<?php

namespace App\Http\Requests;

use App\Http\Requests\Cart\Cart;
use App\Models\Maker;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

class CatalogRequest extends FormRequest
{
    use Cart;

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
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function getPage(): int
    {
        $page = $this->query("p");
        if (is_numeric($page)) {
            $page = (int)$page;
        } else {
            $page = 1;
        }
        return $page;
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
        foreach (explode(',', $makers)as $maker)
        {
            $collection->add(Maker::getById($maker));
        }
        return $collection;
    }
}
