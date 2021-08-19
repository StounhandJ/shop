<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;

class CartAddProductRequest extends FormRequest
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
            "p_id"=> "required|integer|c_exists:products,id"
        ];
    }

    public function getProductID(): int
    {
        return (int) $this->query("p_id");
    }
}
