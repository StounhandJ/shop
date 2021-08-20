<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class ProductSearchRequest extends FormRequest
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
            //
        ];
    }

    public function getProductTitle()
    {
        return $this->input("p_title") ?? "";
    }

    public function getPriceFilter()
    {
        return $this->validatePriceFilter()? $this->input("price"): 0 ;
    }

    public function validateProductTitle()
    {
        return !Validator::make($this->all("p_title"),["p_title"=>"required|min:2"])->fails();
    }

    public function validatePriceFilter()
    {
        return !Validator::make($this->all("price"),["price"=>"integer|min:0|max:1"])->fails();
    }
}
