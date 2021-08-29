<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Product $product)
    {
        $departments = Department::all();

        $categories = Category::all();

        $current_category = $categories[0];

        $current_department = $departments[0];

        return view("product-details", compact("product", "departments", 'categories', 'current_category', 'current_department'));
    }
}
