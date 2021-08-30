<?php

namespace App\Http\Controllers\Admin\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Action\MakerCreateRequest;
use App\Http\Requests\Admin\Action\MakerUpdateRequest;
use App\Models\Maker;
use Illuminate\Http\JsonResponse;

class MakerAdminActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(["message"=>"success", "response"=>Maker::all()], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MakerCreateRequest $request
     * @return JsonResponse
     */
    public function store(MakerCreateRequest $request)
    {
        $maker = Maker::make($request->getName());
        $maker->save();
        return response()->json(["message"=>"success", "response"=>$maker], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Maker $maker
     * @return JsonResponse
     */
    public function show(Maker $maker)
    {
        return response()->json(["message"=>"success", "response"=>$maker], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MakerUpdateRequest $request
     * @param Maker $maker
     * @return JsonResponse
     */
    public function update(MakerUpdateRequest $request, Maker $maker)
    {
        $maker->setNameIfNotEmpty($request->getName());
        $maker->save();

        return response()->json(["message"=>"success", "response"=>$maker], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Maker $maker
     * @return JsonResponse
     */
    public function destroy(Maker $maker)
    {
        $result = $maker->delete();
        return response()->json(["message"=>$result?"success":"error"], $result?200:500);
    }
}
