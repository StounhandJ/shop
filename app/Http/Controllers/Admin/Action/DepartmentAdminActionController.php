<?php

namespace App\Http\Controllers\Admin\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Action\DepartmentCreateRequest;
use App\Http\Requests\Admin\Action\DepartmentUpdateRequest;
use App\Models\Department;
use Illuminate\Http\JsonResponse;

class DepartmentAdminActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(["message"=>"success", "response"=>Department::all()], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DepartmentCreateRequest $request
     * @return JsonResponse
     */
    public function store(DepartmentCreateRequest $request)
    {
        $department = Department::create($request->getName(), $request->getEName());
        $department->save();
        return response()->json(["message"=>"success", "response"=>$department], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Department $department
     * @return JsonResponse
     */
    public function show(Department $department)
    {
        return response()->json(["message"=>"success", "response"=>$department], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DepartmentUpdateRequest $request
     * @param Department $department
     * @return JsonResponse
     */
    public function update(DepartmentUpdateRequest $request, Department $department)
    {
        $department->setNameIfNotEmpty($request->getName());
        $department->setENameIfNotEmpty($request->getEName());
        $department->upgrade();

        return response()->json(["message"=>"success", "response"=>$department], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Department $department
     * @return JsonResponse
     */
    public function destroy(Department $department)
    {
        $result = $department->delete();
        return response()->json(["message"=>$result?"success":"error"], $result?200:500);
    }
}
