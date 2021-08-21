<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartIndexRequest;
use App\Models\Department;
use App\Models\Product;

class CartController extends Controller
{
    public function index(CartIndexRequest $request)
    {
        $cart_products_in = Product::getListProduct($request->getCart());
        $departments = Department::all();
       return view("cart", compact("cart_products_in", "departments"));
    }
}
