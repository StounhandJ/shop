<?php

namespace App\Http\Controllers\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Action\SearchRequest;
use App\Models\Product;

class SearchController extends Controller
{
    public function product(SearchRequest $request)
    {
        $products = [];
        if ($request->validateProductTitle()) {
            $products = Product::search($request->getProductTitle())->get();
        } else {
            $products = Product::orderBy("price", $request->getPriceFilter() ? "desc" : "asc")
                ->limit(25)
                ->get()
                ->merge($products);
        }
        return response()->json(["message" => "success", "products" => $products], 200);
    }
}
