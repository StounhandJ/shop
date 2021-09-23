<?php

namespace App\Http\Requests\Action;

use App\Http\Requests\Cart\Cart;
use Illuminate\Foundation\Http\FormRequest;

class CartDelProductRequest extends FormRequest
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
            "p_id" => "required|integer|exists:products,id"
        ];
    }

    public function getProductID(): int
    {
        return (int)$this->input("p_id");
    }
}
