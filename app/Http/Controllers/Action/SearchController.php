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
            $products = Product::where('title', 'ilike', '%' . $request->getProductTitle() . '%')
                ->limit(25)
                ->orderBy("price", $request->getPriceFilter() ? "desc" : "asc")
                ->get()
                ->merge($products);
        } else {
            $products = Product::orderBy("price", $request->getPriceFilter() ? "desc" : "asc")
                ->limit(25)
                ->get()
                ->merge($products);
        }
        return response()->json(["message" => "success", "products" => $products], 200);
    }
}
