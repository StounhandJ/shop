<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryAdminController extends Controller
{
    public function index()
    {
        $paginate = Category::paginate(16, ['*'], "p")
            ->withPath(route('admin.categories'));

        return view("admin.categories", compact("paginate"));
    }
}