<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\CartAddProductRequest;
use App\Http\Requests\Cart\CartDelProductRequest;
use App\Http\Requests\Cart\CartIndexRequest;
use App\Models\Department;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function index(CartIndexRequest $request)
    {
        $cart_products_in = Product::getListProduct($request->getCart());
        $departments = Department::all();
        // dd($departments, $products);
       return view("cart", compact("cart_products_in", "departments"));
    }

    public function addProduct(CartAddProductRequest $request)
    {
        $cart = $request->getCart();
        $productID = $request->getProductID();
        if (!Product::where("id", $productID)->exists()) return response()->json(["message"=>"error"], 404);
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
        $cookie = Cookie::forever('cart', json_encode($cart));
        return Redirect::back()->cookie($cookie);
    }
}
