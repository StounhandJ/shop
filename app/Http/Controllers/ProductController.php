<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($productID)
    {
        $products = Product::getProduct($productID);

        if (is_null($products)) abort(404);

        $departments = Department::all();
        dd($departments, $products);
//        return view("welcome", compact("products", "departments"));
    }
}
