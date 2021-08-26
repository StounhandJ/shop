<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductAdminController extends Controller
{
    public function index()
    {
        $paginate = Product::paginate(16, ['*'], "p")
            ->withPath(route('admin.products'));

        return view("admin.products", compact("paginate"));
    }
}