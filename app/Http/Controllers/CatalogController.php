<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatalogRequest;
use App\Models\Category;
use App\Models\Department;
use App\Models\Product;

class CatalogController extends Controller
{
    public function index(CatalogRequest $request, Department $department, Category $category)
    {
        if (!$category->exists) {
            $category = Category::getFirstCategoryOfDepartment($department);
        }

        $departments = Department::all();
        $categories = Category::getAllCategoriesOfDepartment($department);

        $paginate = Product::getProductsOfCategoryPagination(
            $category,
            $request->getMakers(),
            $request->getMinPrice(),
            $request->getMaxPrice(),
            $request->getPopular(),
            $request->getPrice(),
            $request->getAbc(),
        );

        $cart_products_in = $request->getCart();

        return view(
            "shop",
            compact("departments", "categories", "paginate", "cart_products_in"),
            [
                "current_department" => $department,
                "current_category" => $category,
                "title" => $category->getName() . " - Фиилдом",
                "description" => " Купить или заказать с доставкой " . $category->getName(
                    ),
            ]
        );
    }
}
