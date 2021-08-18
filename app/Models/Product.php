<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public static $productsOnPage = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'category_id',
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

    public static function getPageCategoriesOfCategory(Category $category, int $page)
    {
        return Product::where("category_id", $category->getId())
            ->limit(Product::$productsOnPage)
            ->offset(($page-1)*Product::$productsOnPage)
            ->get();
    }

    public static function getTotalPageOfCategory(Category $category) : int
    {
        $productCount = Product::where("category_id", $category->getId())->count();
        if ($productCount==0) $totalPage = 0;
        else $totalPage = ceil($productCount/Product::$productsOnPage);
        return $totalPage;
    }

    public static function getListProduct(array $ids): array
    {
        $products = [];
        foreach ($ids as $id){
            $product = Product::where("id", $id)->first();
            if (!is_null($product)) $products[] = $product;
        }
        return $products;
    }
}
