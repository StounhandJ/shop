<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Action\CallbackFormRequest;
use App\Http\Requests\Action\CartAddProductRequest;
use App\Http\Requests\Action\CartDelProductRequest;
use App\Http\Requests\CartIndexRequest;
use App\Http\Requests\Action\CartSendRequest;
use App\Mail\CallbackFormMail;
use App\Mail\OrderCustomEmployerMail;
use App\Mail\OrderEmployerMail;
use App\Mail\OrderRegistrationMail;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;

class CartActionController extends Controller
{

    public function addProduct(CartAddProductRequest $request)
    {
        $cart = $request->getCart();
        $productID = $request->getProductID();
        if (!in_array($productID, $cart)) {
            $cart[] = $productID;
        } else {
            return response()->json(["message" => "already added"], 401);
        }

        $cookie = Cookie::forever('cart', json_encode($cart));
        return response()->json(["message" => "success", "cart" => $cart], 200)->cookie($cookie);
    }

    public function delProduct(CartDelProductRequest $request)
    {
        $cart = $request->getCart();
        $productID = $request->getProductID();
        if (($key = array_search($productID, $cart)) !== false) {
            unset($cart[$key]);
            $cart = array_values($cart);
        } else {
            return response()->json(["message" => "The product is not in the cart"], 401);
        }

        $cookie = Cookie::forever('cart', json_encode($cart));
        return response()->json(["message" => "success", "cart" => $cart], 200)->cookie($cookie);
    }

    public function info(CartIndexRequest $request)
    {
        return response()->json(["message" => "success", "cart" => $request->getCart()], 200);
    }

    public function send(CartSendRequest $request)
    {
        $order = Order::create(
            Collection::make(Product::getListProduct($request->getCart())),
            $request->getName(),
            $request->getEmail(),
            $request->getPhone(),
            $request->getComment(),
            $request->getPromoCode()
        );

        Mail::to($request->getEmail())
            ->send(new OrderRegistrationMail($order));

        Mail::to(config("app.app_mail"))
            ->send(new OrderEmployerMail($order));

        return response()->json(["message" => "success"], 200)->withoutCookie('cart');
    }

    public function sendCustom(CartSendRequest $request)
    {
        $order = Order::create(
            Collection::make(),
            $request->getName(),
            $request->getEmail(),
            $request->getPhone(),
            $request->getComment(),
            $request->getPromoCode()
        );
        Mail::to(config("app.app_mail"))
            ->send(new OrderCustomEmployerMail($order));
        return response()->json(["message" => "success"], 200);
    }

    public function callbackForm(CallbackFormRequest $request)
    {
        Mail::to(config("app.app_mail"))
            ->send(new CallbackFormMail($request->getPhone()));
        return response()->json(["message" => "success"], 200);
    }
}
