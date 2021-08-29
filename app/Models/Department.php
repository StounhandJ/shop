<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    //<editor-fold desc="Setting">

    public $timestamps = false;

    //</editor-fold>

    //<editor-fold desc="Get Attribute">

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

    public function getCategories()
    {
        return $this->hasMany(Category::class)->getResults();
    }

    //</editor-fold>

    //<editor-fold desc="Set Attribute">
    public function setNameIfNotEmpty($name)
    {
        if ($name!="") $this->name = $name;
    }

    public function setENameIfNotEmpty($e_name)
    {
        if ($e_name!="") $this->e_name = $e_name;
    }
    //</editor-fold>

    //<editor-fold desc="Search Department">
    public static function getDepartmentById($id) : Department
    {
        return Department::where("id", $id)->first() ?? new Department();
    }

    public static function getFirstDepartment()
    {
        return Department::first();
    }
    //</editor-fold>

    public static function create($name, $e_name)
    {
        return Department::factory(["name"=>$name, "e_name"=>$e_name] )->make();
    }

    public static function categories()
    {
        return Category::all();
    }

    public function getCategoryCount()
    {
        return Category::where("department_id", $this->getId())->count();
    }
}
