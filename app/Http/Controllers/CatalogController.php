<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatalogRequest;
use App\Models\Category;
use App\Models\Department;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(CatalogRequest $request, $departmentEName="", $categoryEName="")
    {
        $department = Department::getDepartmentOrFirstDepartment($departmentEName);

        if (is_null($department)) abort(404);

        $category = Category::getCategoryOrFirstCategory($categoryEName, $department);

        if (is_null($category)) abort(404);

        $page = $request->getPage();
        $totalPage = Product::getTotalPageOfCategory($category);
        $departments = Department::all();
        $categories = Category::getAllCategoriesOfDepartment($department);
        $products = Product::getPageCategoriesOfCategory($category, $page);

        if ($products->isEmpty()) abort(404);

        // dd($department, $category, $departments, $categories, $products, $page, $totalPage);
       return view("index", compact("department", "departments",
       "category", "categories", "products", "page", "totalPage"));
//        какую-то информация получать в самом шаблоне, как departments
    }
}
