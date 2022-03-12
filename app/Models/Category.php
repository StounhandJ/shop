<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Category extends Model implements Sitemapable
{
    use HasFactory, SoftDeletes;

    //<editor-fold desc="Setting">
    public $timestamps = false;

    protected $appends = ['department_name'];

    public static function getFirstCategoryOfDepartment(Department $department): \Illuminate\Database\Eloquent\Builder|Category
    {
        return Category::query()->where("department_id", $department->getId())->firstOrNew();
    }

    public static function getAllCategoriesOfDepartment(Department $department): \Illuminate\Database\Eloquent\Collection|array
    {
        return Category::query()->where("department_id", $department->getId())->get();
    }
    //</editor-fold>

    //<editor-fold desc="Get Attribute">

    public static function getById($id): Category
    {
        return Category::where("id", $id)->first() ?? new Category();
    }

    public static function getByEName($e_name): Category
    {
        return Category::where("e_name", $e_name)->first() ?? new Category();
    }

    public static function make($name, $e_name, Department $department)
    {
        return Category::factory(["name" => $name, "e_name" => $e_name, "department_id" => $department->getID()])->make(
        );
    }

    public function getDepartmentNameAttribute(): string
    {
        return $this->getDepartment()->getName();
    }

    public function getDepartment(): Department
    {
        $department = new Department();
        $department->setNameIfNotEmpty("Удалён");
        return $this->belongsTo(Department::class, "department_id")->getResults() ?? $department;
    }
    //</editor-fold>

    //<editor-fold desc="Set Attribute">

    public function toSitemapTag(): Url|string|array
    {
        return route(
            'catalog.index',
            ["department" => $this->getDepartment()->getEName(), "category" => $this->getEName()]
        );
    }

    public function getEName()
    {
        return $this->e_name;
    }

    public function getParentCategory(): Category
    {
        return $this->hasOne(Category::class)->getResults() ?? new Category();
    }
    //</editor-fold>

    //<editor-fold desc="Search Category">

    public function getName()
    {
        return $this->name;
    }

    public function setNameIfNotEmpty($name)
    {
        if ($name != "") {
            $this->name = $name;
        }
    }

    public function setENameIfNotEmpty($e_name)
    {
        if ($e_name != "") {
            $this->e_name = $e_name;
        }
    }

    public function setDepartmentIfNotEmpty(Department $department)
    {
        if ($department->exists) {
            $this->department_id = $department->getId();
        }
    }

    //</editor-fold>

    public function getProductCount()
    {
        return Product::where("category_id", $this->getId())->count();
    }

    public function getId()
    {
        return $this->id;
    }
}
