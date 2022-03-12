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

    public static function getById($id): Department
    {
        return Department::where("id", $id)->first() ?? new Department();
    }

    public static function getByEName($e_name): Department
    {
        return Department::where("e_name", $e_name)->first() ?? new Department();
    }

    public static function getFirst()
    {
        return Department::first();
    }

    public static function make($name, $e_name)
    {
        return Department::factory(["name" => $name, "e_name" => $e_name])->make();
    }

    //</editor-fold>

    //<editor-fold desc="Set Attribute">

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function getName()
    {
        return $this->name;
    }
    //</editor-fold>

    //<editor-fold desc="Search Department">

    public function getEName()
    {
        return $this->e_name;
    }

    public function getCategories()
    {
        return $this->hasMany(Category::class)->getResults();
    }

    public function setNameIfNotEmpty($name)
    {
        if ($name != "") {
            $this->name = $name;
        }
    }

    //</editor-fold>

    public function setENameIfNotEmpty($e_name)
    {
        if ($e_name != "") {
            $this->e_name = $e_name;
        }
    }

    public function getCategoryCount()
    {
        return Category::where("department_id", $this->getId())->count();
    }

    public function getId()
    {
        return $this->id;
    }

    public static function all($columns = ['*'])
    {
        $data = parent::all($columns);
        return $data->sortBy("id");
    }
}
