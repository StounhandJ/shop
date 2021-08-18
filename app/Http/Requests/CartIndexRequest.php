<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartIndexRequest extends FormRequest
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

    public function getCart(): array
    {
        $cartString = $this->cookie("cart");
        if (!is_null($cartString)) $cart = json_decode($cartString);
        else $cart = [];
        return $cart;
    }
}
