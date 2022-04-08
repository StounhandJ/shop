<?php

namespace App\Http\Requests\Cart;


trait Cart
{
    public function messages()
    {
        return [
            'p_id.c_exists' => 'Товар не найден',
            'p_id.integer' => 'No integer',
            'promo_code.exists' => 'Промокод не действителен'
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
