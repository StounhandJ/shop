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
        return Null;
    }

    public function getDepartment()
    {
        return $this->hasOne(Department::class)->getResults();
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEName()
    {
        return $this->e_name;
    }



    public static function getFirstCategoryOfDepartment(Department $department)
    {
        return Category::where("department_id", $department->getId())->first() ?? new Category();
    }

    public static function getAllCategoriesOfDepartment(Department $department)
    {
        return Category::where("department_id", $department->getId())->get();
    }

}
