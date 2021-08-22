<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'e_name',
    ];

    public $timestamps = false;

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

    public function setNameIfNotEmpty($name)
    {
        if ($name!="") $this->name = $name;
    }

    public function setENameIfNotEmpty($e_name)
    {
        if ($e_name!="") $this->e_name = $e_name;
    }

    public function upgrade()
    {
        $this->update(["name"=>$this->getName(), "e_name"=>$this->getEName()]);
    }

    public static function getDepartmentById(string $id)
    {
        return Department::where("id", $id)->first();
    }

    public static function getFirstDepartment()
    {
        return Department::first();
    }

    public static function create($name, $e_name)
    {
        return Department::factory(["name"=>$name, "e_name"=>$e_name] )->make();
    }

    public static function categories()
    {
        return Category::all();
    }
}
