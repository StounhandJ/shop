<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEName()
    {
        return $this->e_name;
    }


    public static function getDepartmentOrFirstDepartment(string $departmentEName)
    {
        if ($departmentEName=="") return Department::first();
        return Department::where("e_name", $departmentEName)->first();
    }
}
