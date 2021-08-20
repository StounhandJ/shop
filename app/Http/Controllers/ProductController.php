<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductSearchRequest;
use App\Models\Department;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($productID)
    {
        $products = Product::getProduct($productID);

        if (is_null($products)) abort(404);

        $departments = Department::all();
        dd($departments, $products);
//        return view("welcome", compact("products", "departments"));
    }

    public function search(ProductSearchRequest $request)
    {
        $products = [];
        if ($request->validateProductTitle())
        {
            $products = Product::where('title', 'ilike', '%' . $request->getProductTitle() . '%')
                ->orderBy("price", $request->getPriceFilter()? "desc":"asc")
                ->get()
                ->merge($products);
        }
        else
        {
            $products = Product::orderBy("price", $request->getPriceFilter()? "desc":"asc")
                ->limit(25)
                ->get()
                ->merge($products);
        }
        return response()->json(["message"=>"success", "products"=>$products], 200);
    }
}
