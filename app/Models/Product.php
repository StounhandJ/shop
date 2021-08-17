<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'category_id',
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

    public function getCategory()
    {
        return $this->hasOne(Category::class)->getResults();
    }

    public function getMaker()
    {
        return $this->hasOne(Category::class)->getResults();
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImgSrc()
    {
        return $this->img_src;
    }

    public function getEName()
    {
        return $this->e_name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public static function getAllCategoriesOfCategory(Category $category)
    {
        return Product::where("category_id", $category->getId())->get();
    }
}
