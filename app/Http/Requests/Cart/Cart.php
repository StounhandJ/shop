<?php

namespace App\Http\Requests\Cart;


trait Cart
{
    public function getCart()
    {
        $cartString = $this->cookie("cart");
        if (!is_null($cartString)) $cart = json_decode($cartString);
        else $cart = [];

        return $cart;
    }
}
