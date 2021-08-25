<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    //<editor-fold desc="Setting">
    public $timestamps = false;

    protected $appends = ['url'];

    public function getUrlAttribute(): string
    {
        return route('product.index', ['product' => $this->getId()]);
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

    public function setENameIfNotEmpty($e_Name)
    {
        if ($e_Name!="") $this->e_Name = $e_Name;
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
        if ($category->exists) $this->category = $category;
    }

    public function setMakerIfNotEmpty(Maker $maker)
    {
        if ($maker->exists) $this->maker = $maker;
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

    public static function create($title, $description, $e_name, int $price, string $img_src, Category $category, Maker $maker)
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

    public function upgrade()
    {
        $this->update([
            "title"=>$this->getTitle(),
            "description"=>$this->getDescription(),
            "e_name"=>$this->getEName(),
            "price"=>$this->getPrice(),
            "img_src"=>$this->getImgSrc(),
            "category_id"=>$this->getCategory()->getID(),
            "maker_id"=>$this->getMaker()->getID()
        ]);
    }
}
