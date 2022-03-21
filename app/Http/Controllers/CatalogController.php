<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatalogRequest;
use App\Models\Category;
use App\Models\Department;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class CatalogController extends Controller
{
    public function index(CatalogRequest $request, Department $department, Category $category)
    {
        $data = ["current_department" => $department];

        $paginate = new LengthAwarePaginator([], 0, 1);
        $departments = Department::all();
        $categories = Category::getAllCategoriesOfDepartment($department);

        if ($categories->count() == 0) {
            $data["title"] = $department->getName() . " - Белый Волк";
            $data["description"] = "Отдел " . $department->getName() . " пустой";
            $data["current_category"] = $department;
            return view(
                "shop",
                compact("departments", "categories", "paginate"),
                $data
            );
        }

        if (!$category->exists) {
            $category = $categories->first();
        }


        $paginate = Product::getProductsOfCategoryPagination(
            $category,
            $request->getMakers(),
            $request->getMinPrice(),
            $request->getMaxPrice(),
            $request->getPopular(),
            $request->getPrice(),
            $request->getAbc(),
        );

        $data["current_category"] = $category;
        $data["title"] = $category->getName() . " - Белый Волк";
        $data["description"] = " Купить или заказать с доставкой " . $category->getName();
        return view(
            "shop",
            compact("departments", "categories", "paginate"),
            $data
        );
    }
}
