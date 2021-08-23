<?php

namespace App\Http\Controllers\Admin\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Action\CategoryAdminCreateRequest;
use App\Http\Requests\Admin\Action\CategoryAdminUpdateRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryAdminActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(["message"=>"success", "response"=>Category::all()], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryAdminCreateRequest $request
     * @return JsonResponse
     */
    public function store(CategoryAdminCreateRequest $request)
    {
        $department = Category::create($request->getName(), $request->getEName(), $request->getDepartment());
        $department->save();
        return response()->json(["message"=>"success", "response"=>$department], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function show(Category $category)
    {
        return response()->json(["message"=>"success", "response"=>$category], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return JsonResponse
     */
    public function update(CategoryAdminUpdateRequest $request, Category $category)
    {
        $category->setNameIfNotEmpty($request->getName());
        $category->setENameIfNotEmpty($request->getEName());
        $category->setDepartmentIfNotEmpty($request->getDepartment());
        $category->upgrade();

        return response()->json(["message"=>"success", "response"=>$category], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function destroy(Category $category)
    {
        $result = $category->delete();
        return response()->json(["message"=>$result?"success":"error"], $result?200:500);
    }
}
