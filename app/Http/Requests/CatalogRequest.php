<?php

namespace App\Http\Requests;

use App\Http\Requests\Cart\Cart;
use Illuminate\Foundation\Http\FormRequest;

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
        if (is_numeric($page)) $page = (int) $page;
        else $page = 1;
        return $page;
    }

    public function getPopular(): bool
    {
        return !($this->query("popular") == "0");
    }

    public function getMinPrice()
    {
        return $this->query("mip");
    }

    public function getMaxPrice()
    {
        return $this->query("map");
    }
}
