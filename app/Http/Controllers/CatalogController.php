<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatalogRequest;
use App\Models\Category;
use App\Models\Department;
use App\Models\Product;

class CatalogController extends Controller
{
    public function index(CatalogRequest $request, $departmentEName="", $categoryEName="")
    {
        $current_department = Department::getDepartmentOrFirstDepartment($departmentEName);

        if (is_null($current_department)) abort(404);

        $current_category = Category::getCategoryOrFirstCategoryOfDepartment($categoryEName, $current_department);

        if (is_null($current_category)) abort(404);

        $departments = Department::all();
        $categories = Category::getAllCategoriesOfDepartment($current_department);
        $paginate = Product::getProductsOfCategoryBuilder($current_category)
            ->paginate(2, ['*'], "p")
            ->withPath(route('catalog.index', ['departmentEName' => $current_department->getEName(), 'categoryEName' => $current_category->getEName()]));
        $cart_products_in = $request->getCart();

        if ($paginate->isEmpty()) abort(404);

        return view("shop", compact("current_department", "departments",
       "current_category", "categories", "paginate", "cart_products_in"));
    }
}
