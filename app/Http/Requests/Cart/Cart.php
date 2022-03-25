<?php

namespace App\Http\Requests\Cart;


trait Cart
{
    public function messages()
    {
        return [
            'p_id.c_exists' => 'Product not found',
            'p_id.integer' => 'No integer'
        ];
    }

    public function getCart()
    {
        $cartString = $this->cookie("cart");
        if (!is_null($cartString)) {
            $cart = json_decode($cartString, true);
        } else {
            $cart = [];
        }

        return $cart;
    }
}
