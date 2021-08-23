<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'parent_category_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    public $timestamps = false;

    public function getId()
    {
        return $this->id;
    }

    public function getParentCategoryId()
    {
        return $this->parent_category_id;
    }

    public function getParentCategory()
    {
        if ($this->getParentCategoryId()!=$this->getId())
            return $this->hasOne(Category::class)->getResults();
        return new Category();
    }

    public function getDepartment() : Department
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

    public function upgrade()
    {
        $this->update(["name"=>$this->getName(), "e_name"=>$this->getEName(), "department_id"=>$this->getDepartment()->getId()]);
    }

    public static function create($name, $e_name, Department $department)
    {
        return Category::factory(["name"=>$name, "e_name"=>$e_name, "department_id"=>$department->getID()] )->make();
    }

    public static function getFirstCategoryOfDepartment(Department $department)
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

}
