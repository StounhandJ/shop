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

        $current_category = $product->getCategory();

        $current_department = $current_category->getDepartment();

        $categories = $current_department->getCategories();

        return view("product-details", compact("product", "departments", 'categories', 'current_category', 'current_department'));
    }
}
