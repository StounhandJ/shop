<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    //<editor-fold desc="Setting">
    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'img_src'
    ];

    protected $appends = ['url', 'img_url'];

    public function getUrlAttribute(): string
    {
        return route('product.index', ['product' => $this->getId()]);
    }

    public function getImgUrlAttribute(): string
    {
        return URL::to("/").Storage::disk("prod_img")->url($this->getImgSrc());
    }
    //</editor-fold>

    //<editor-fold desc="Get Attribute">
    public function getId()
    {
        return $this->id;
    }

    public function getCategory(): Category
    {
        return $this->belongsTo(Category::class, "category_id")->getResults() ?? new Category();
    }

    public function getMaker(): Maker
    {
        return $this->belongsTo(Maker::class, "maker_id")->getResults() ?? new Maker();
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
    //</editor-fold>

    //<editor-fold desc="Set Attribute">
    public function setTitleIfNotEmpty($title)
    {
        if ($title!="") $this->title = $title;
    }

    public function setDescriptionIfNotEmpty($description)
    {
        if ($description!="") $this->description = $description;
    }

    public function setENameIfNotEmpty($e_name)
    {
        if ($e_name!="") $this->e_name = $e_name;
    }

    /**
     * Sets the new image src.
     *
     * @param UploadedFile|null $img
     */
    public function setImgSrcIfNotEmpty(?UploadedFile $img)
    {
        if (!is_null($img)){
            $this->img_src = Product::saveImg($img);
        }
    }

    public function setCategoryIfNotEmpty(Category $category)
    {
        if ($category->exists) $this->category_id = $category->getId();
    }

    public function setMakerIfNotEmpty(Maker $maker)
    {
        if ($maker->exists) $this->maker_id = $maker->getId();
    }

    public function setPriceIfNotEmpty($price)
    {
        if ($price!="") $this->price = $price;
    }
    //</editor-fold>

    //<editor-fold desc="Search Product">
    public static function getProductsOfCategoryBuilder(Category $category): Builder
    {
        return Product::where("category_id", $category->getId());
    }

    public static function getListProduct(array $ids): array
    {
        $products = [];
        foreach ($ids as $id) {
            $product = Product::where("id", $id)->first();
            if (!is_null($product)) $products[] = $product;
        }
        return $products;
    }

    public static function getProduct(int $id): Product
    {
        return Product::where("id", $id)->first() ?? new Product();
    }

    public static function getByTitle(string $title): Product
    {
        return Product::where("title", $title)->first() ?? new Product();
    }
    //</editor-fold>

    /**
     * The photo is saved on the disk. Return src.
     *
     * @param UploadedFile $img
     * @return string
     */
    public static function saveImg(UploadedFile $img): string
    {
        return Storage::disk("prod_img")->putFile("/", $img);
    }

    public static function make($title, $description, $e_name, int $price, string $img_src, Category $category, Maker $maker)
    {
        return Product::factory([
            "title"=>$title,
            "description"=>$description,
            "e_name"=>$e_name,
            "price"=>$price,
            "img_src"=>$img_src,
            "category_id"=>$category->getID(),
            "maker_id"=>$maker->getID()
        ])->make();
    }
}
