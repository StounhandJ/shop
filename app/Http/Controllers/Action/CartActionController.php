<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Action\CartAddProductRequest;
use App\Http\Requests\Action\CartDelProductRequest;
use App\Http\Requests\CartIndexRequest;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class CartActionController extends Controller
{

    public function addProduct(CartAddProductRequest $request)
    {
        $cart = $request->getCart();
        $productID = $request->getProductID();
        if (!in_array($productID, $cart))$cart[] = $productID;
        else return response()->json(["message"=>"already added"], 401);

        $cookie = Cookie::forever('cart', json_encode($cart));
        return response()->json(["message"=>"success", "cart"=>$cart], 200)->cookie($cookie);
    }

    public function delProduct(CartDelProductRequest $request)
    {
        $cart = $request->getCart();
        $productID = $request->getProductID();
        if (($key = array_search($productID, $cart)) !== false) {
            unset($cart[$key]);
            $cart = array_values($cart);
        }
        else return response()->json(["message"=>"The product is not in the cart"], 401);

        $cookie = Cookie::forever('cart', json_encode($cart));
        return response()->json(["message"=>"success", "cart"=>$cart], 200)->cookie($cookie);
    }

    public function info(CartIndexRequest $request)
    {
        return response()->json(["message"=>"success", "cart"=>$request->getCart()], 200);
    }
}
