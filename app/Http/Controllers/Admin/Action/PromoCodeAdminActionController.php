<?php

namespace App\Http\Controllers\Admin\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Action\PromoCodeCreateRequest;
use App\Http\Requests\Admin\Action\PromoCodeSearchRequest;
use App\Http\Requests\Admin\Action\PromoCodeUpdateRequest;
use App\Models\PromoCode;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PromoCodeAdminActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(["message" => "success", "response" => PromoCode::all()->sortBy("name")], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PromoCodeCreateRequest $request
     * @return JsonResponse
     */
    public function store(PromoCodeCreateRequest $request)
    {
        $promoCode = PromoCode::make(
            $request->getName(),
            $request->getPercent()
        );
        $promoCode->save();
        return response()->json(["message" => "success", "response" => $promoCode], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param PromoCode $promoCode
     * @return JsonResponse
     */
    public function show(PromoCode $promoCode)
    {
        return response()->json(["message" => "success", "response" => $promoCode], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param PromoCodeSearchRequest $request
     * @return JsonResponse
     */
    public function search(PromoCodeSearchRequest $request)
    {
        $promoCode = PromoCode::getByName($request->getName());
        return response()->json($promoCode->getPercent(), $promoCode->exists ? 200 : 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PromoCodeUpdateRequest $request
     * @param PromoCode $promoCode
     * @return JsonResponse
     */
    public function update(PromoCodeUpdateRequest $request, PromoCode $promoCode)
    {
        $promoCode->setNameIfNotEmpty($request->getName());
        $promoCode->setPercentIfNotEmpty($request->getPercent());
        $promoCode->save();

        return response()->json(["message" => "success", "response" => $promoCode], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PromoCode $promoCode
     * @return JsonResponse
     */
    public function destroy(PromoCode $promoCode)
    {
        $result = $promoCode->delete();
        return response()->json(["message" => $result ? "success" : "error"], $result ? 200 : 500);
    }
}
