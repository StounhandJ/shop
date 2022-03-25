<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Action\CallbackFormRequest;
use App\Http\Requests\Action\CartAddProductRequest;
use App\Http\Requests\Action\CartCountProductRequest;
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

    public function addProduct(CartAddProductRequest $request): \Illuminate\Http\JsonResponse
    {
        $cart = $request->getCart();
        $productID = $request->getProductID();
        if (!CartActionController::existProduct($cart, $productID)) {
            $cart[] = ["i" => $productID, "c" => 1];
        } else {
            return response()->json(["message" => "already added"], 401);
        }

        $cookie = Cookie::forever('cart', json_encode($cart));
        return response()->json(["message" => "success", "cart" => $cart], 200)->cookie($cookie);
    }

    public function setCountProduct(CartCountProductRequest $request): \Illuminate\Http\JsonResponse
    {
        $cart = $request->getCart();
        $productID = $request->getProductID();
        if (!CartActionController::existProduct($cart, $productID)) {
            return response()->json(["message" => "product no added"], 401);
        }

        $key = CartActionController::findKeyProduct($cart, $productID);

        $cart[$key]["c"] = $request->getProductCount();

        $cookie = Cookie::forever('cart', json_encode($cart));
        return response()->json(["message" => "success", "cart" => $cart], 200)->cookie($cookie);
    }

    public function delProduct(CartDelProductRequest $request): \Illuminate\Http\JsonResponse
    {
        $cart = $request->getCart();
        $productID = $request->getProductID();
        if (($key = CartActionController::findKeyProduct($cart, $productID)) !== -1) {
            unset($cart[$key]);
            $cart = array_values($cart);
        } else {
            return response()->json(["message" => "The product is not in the cart"], 401);
        }

        $cookie = Cookie::forever('cart', json_encode($cart));
        return response()->json(["message" => "success", "cart" => $cart], 200)->cookie($cookie);
    }

    public function info(CartIndexRequest $request): \Illuminate\Http\JsonResponse
    {
        return response()->json(["message" => "success", "cart" => $request->getCart()], 200);
    }

    public function send(CartSendRequest $request): \Illuminate\Http\JsonResponse
    {
        if (count($request->getCart())==0)
            return response()->json(["message" => "cart empty"], 401);

        $order = Order::create(
            $request->getCart(),
            $request->getName(),
            $request->getEmail(),
            $request->getPhone(),
            $request->getComment(),
            $request->getPromoCode(),
            $request->getDelivery(),
        );

        Mail::to($request->getEmail())
            ->send(new OrderRegistrationMail($order));

        Mail::to(config("app.app_mail"))
            ->send(new OrderEmployerMail($order));

        return response()->json(["message" => "success"], 200)->withoutCookie('cart');
    }

    public function sendCustom(CartSendRequest $request): \Illuminate\Http\JsonResponse
    {
        $order = Order::create(
            [],
            $request->getName(),
            $request->getEmail(),
            $request->getPhone(),
            $request->getComment(),
            $request->getPromoCode(),
            ""
        );
        Mail::to(config("app.app_mail"))
            ->send(new OrderCustomEmployerMail($order));
        return response()->json(["message" => "success"], 200);
    }

    public function callbackForm(CallbackFormRequest $request): \Illuminate\Http\JsonResponse
    {
        Mail::to(config("app.app_mail"))
            ->send(new CallbackFormMail($request->getPhone()));
        return response()->json(["message" => "success"], 200);
    }

    private function existProduct(array $cart, $productID): bool
    {
        return CartActionController::findKeyProduct($cart, $productID) >= 0;
    }

    private function findKeyProduct(array $cart, $productID): int
    {
        for ($i = 0; $i < count($cart); $i++)
            if ($cart[$i]['i'] == $productID)
                return $i;

        return -1;
    }
}
