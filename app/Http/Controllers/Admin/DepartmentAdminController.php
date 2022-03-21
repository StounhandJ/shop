<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;

class DepartmentAdminController extends Controller
{
    public function index()
    {
        $paginate = Department::query()->orderBy("name")->paginate(16, ['*'], "p")
            ->withPath(route('admin.departments'));

        return view("admin.departments", compact("paginate"));
    }
}
