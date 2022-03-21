<?php

namespace App\Http\Controllers\Admin\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Action\ProductCreateRequest;
use App\Http\Requests\Admin\Action\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductAdminActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(["message" => "success", "response" => Product::all()->sortBy("name")], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductCreateRequest $request
     * @return JsonResponse
     */
    public function store(ProductCreateRequest $request)
    {
        $img_src = Product::saveImg($request->getImg());
        $product = Product::make(
            $request->getTitle(),
            $request->getDescription(),
            $request->getEName(),
            $request->getPrice(),
            $img_src,
            $request->getCategory(),
            $request->getMaker()
        );
        $product->save();
        return response()->json(["message" => "success", "response" => $product], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return JsonResponse
     */
    public function show(Product $product)
    {
        return response()->json(["message" => "success", "response" => $product], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductUpdateRequest $request
     * @param Product $product
     * @return JsonResponse
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->setTitleIfNotEmpty($request->getTitle());
        $product->setDescriptionIfNotEmpty($request->getDescription());
        $product->setENameIfNotEmpty($request->getEName());
        $product->setCategoryIfNotEmpty($request->getCategory());
        $product->setMakerIfNotEmpty($request->getMaker());
        $product->setImgSrcIfNotEmpty($request->getImg());
        $product->setPriceIfNotEmpty($request->getPrice());
        $product->save();

        return response()->json(["message" => "success", "response" => $product], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return JsonResponse
     */
    public function destroy(Product $product)
    {
        $result = $product->delete();
        return response()->json(["message" => $result ? "success" : "error"], $result ? 200 : 500);
    }
}
