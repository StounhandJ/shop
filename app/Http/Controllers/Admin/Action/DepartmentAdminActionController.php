<?php

namespace App\Http\Controllers\Admin\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Action\DepartmentAdminCreateRequest;
use App\Http\Requests\Admin\Action\DepartmentAdminDeleteRequest;
use App\Http\Requests\Admin\Action\DepartmentAdminUpdateRequest;
use App\Models\Department;

class DepartmentAdminActionController extends Controller
{
    public function list()
    {
        return response()->json(["message"=>"success", "departments"=>Department::all()], 200);
    }

    public function create(DepartmentAdminCreateRequest $request)
    {
        $department = Department::create($request->getName(), $request->getEName());
        $department->save();
        return response()->json(["message"=>"success", "department"=>$department], 200);
    }

    public function change(DepartmentAdminUpdateRequest $request)
    {
        $department = Department::getDepartmentById($request->getId());

        $department->setNameIfNotEmpty($request->getName());
        $department->setENameIfNotEmpty($request->getEName());
        $department->upgrade();

        return response()->json(["message"=>"success", "department"=>$department], 200);
    }

    public function delete(DepartmentAdminDeleteRequest $request)
    {
        $department = Department::getDepartmentById($request->getId());
        $result = $department->delete();
        return response()->json(["message"=>$result?"success":"error"], $result?200:500);
    }
}
