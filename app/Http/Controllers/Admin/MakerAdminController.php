<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Maker;

class MakerAdminController extends Controller
{
    public function index()
    {
        $paginate = Maker::paginate(16, ['*'], "p")
            ->withPath(route('admin.makers'));

        return view("admin.makers", compact("paginate"));
    }
}