<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($productID)
    {
        $product = Product::getProduct($productID);

        if (is_null($product)) abort(404);

        $departments = Department::all();
        return view("product-details", compact("product", "departments"));
    }
}
