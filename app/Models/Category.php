<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    //<editor-fold desc="Setting">
    public $timestamps = false;

    protected $appends = ['department_name'];

    public function getDepartmentNameAttribute(): string
    {
        return $this->getDepartment()->getName();
    }
    //</editor-fold>

    //<editor-fold desc="Get Attribute">
    public function getId()
    {
        return $this->id;
    }

    public function getParentCategory(): Category
    {
        return $this->hasOne(Category::class)->getResults() ?? new Category();
    }

    public function getDepartment(): Department
    {
        return $this->belongsTo(Department::class, "department_id")->getResults();
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEName()
    {
        return $this->e_name;
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

    public function setDepartmentIfNotEmpty(Department $department)
    {
        if ($department->exists) $this->department_id = $department->getId();
    }
    //</editor-fold>

    //<editor-fold desc="Search Category">
    public static function getFirstCategoryOfDepartment(Department $department): Category
    {
        return Category::where("department_id", $department->getId())->first() ?? new Category();
    }

    public static function getAllCategoriesOfDepartment(Department $department)
    {
        return Category::where("department_id", $department->getId())->get();
    }

    public static function getCategoryById($id) : Category
    {
        return Category::where("id", $id)->first() ?? new Category();
    }

    public static function getCategoryByEName($e_name) : Category
    {
        return Category::where("e_name", $e_name)->first() ?? new Category();
    }
    //</editor-fold>

    public static function make($name, $e_name, Department $department)
    {
        return Category::factory(["name"=>$name, "e_name"=>$e_name, "department_id"=>$department->getID()] )->make();
    }

    public function getProductCount()
    {
        return Product::where("category_id", $this->getId())->count();
    }
}
