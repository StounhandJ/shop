<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatalogRequest;
use App\Models\Category;
use App\Models\Department;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;

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
            $request->getPage(),
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
//        Cache::store("memcached")->set("/" . Request::path(), $html, 10);
    }
}
