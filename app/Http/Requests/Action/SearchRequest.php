<?php

namespace App\Http\Requests\Action;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class SearchRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "p_title" => "min:1|max:50",
            "price" => "integer|min:0|max:1"
        ];
    }

    public function getProductTitle()
    {
        return $this->input("p_title") ?? "";
    }

    public function getPriceFilter()
    {
        return $this->validatePriceFilter() ? $this->input("price") : 0;
    }

    public function validatePriceFilter()
    {
        return !Validator::make($this->all("price"), ["price" => "integer|min:0|max:1"])->fails();
    }

    public function validateProductTitle()
    {
        return !Validator::make($this->all("p_title"), ["p_title" => "required|min:1"])->fails();
    }
}
