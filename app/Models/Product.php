<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\Contracts\Sitemapable;

class Product extends Model implements Sitemapable
{
    use HasFactory, SoftDeletes, Searchable;

    //<editor-fold desc="Setting">
    private static int $cacheSecond = 20;
    public $timestamps = false;
    protected $perPage = 18;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'img_src'
    ];

    protected $appends = ['url', 'img_url'];

    public function toSearchableArray()
    {
        return [
            "title" => $this->title
        ];
    }

    public static function getProductsOfCategoryPagination(
        Category   $category,
        Collection $makers,
                   $page,
                   $minPrice = null,
                   $maxPrice = null,
        bool       $popular = true,
                   $price = null,
                   $abc = null
    ): LengthAwarePaginator
    {
        $makersString = "";
        foreach ($makers as $maker) {
            $makersString .= sprintf("%s=", $maker->getId());
        }

        $builder = Product::sortProductBuilder($category, $makers, $minPrice, $maxPrice, $popular, $price, $abc);

        $paginate = Product::builderToPaginate($builder, $category, $minPrice, $maxPrice, $popular, $price, $abc);
        return $paginate;
    }

    private static function sortProductBuilder(
        Category   $category,
        Collection $makers,
                   $minPrice = null,
                   $maxPrice = null,
        bool       $popular = true,
                   $price = null,
                   $abc = null
    ): Builder
    {
        $builder = Product::query()->where("category_id", $category->getId());

        $builder->where(function ($query) use ($makers) {
            /** @var Maker $maker */
            foreach ($makers as $maker) {
                $query->orWhere("maker_id", "=", $maker->getId());
            }
        });
        if (!is_null($minPrice)) {
            $builder->where("price", ">=", $minPrice);
        }
        if (!is_null($maxPrice)) {
            $builder->where("price", "<=", $maxPrice);
        }

        if (!is_null($price)) {
            $builder->orderBy("price", $price ? 'desc' : 'asc');
        } elseif (!is_null($abc)) {
            $builder->orderBy("title", $abc ? 'desc' : 'asc');
        } else {
            $builder->orderBy("rating", $popular ? 'desc' : 'asc');
        }

        return $builder;
    }

    private static function builderToPaginate(
        Builder  $builder,
        Category $category,
                 $minPrice = null,
                 $maxPrice = null,
        bool     $popular = true,
                 $price = null,
                 $abc = null
    ): LengthAwarePaginator
    {
        $data = ['department' => $category->getDepartment()->getEName(), 'category' => $category->getEName()];

        if (!is_null($minPrice)) {
            $data["mip"] = $minPrice;
        }
        if (!is_null($maxPrice)) {
            $data["map"] = $maxPrice;
        }
        if (!is_null($price)) {
            $data["price"] = $price;
        }
        if (!is_null($abc)) {
            $data["abc"] = $abc;
        }
        $data["popular"] = $popular;
        return $builder->paginate(null, ['*'], "p")
            ->withPath(
                route(
                    'catalog.index',
                    $data
                )
            );
    }
    //</editor-fold>

    //<editor-fold desc="Get Attribute">


    public static function getListProduct(array $ids): array
    {
        $products = [];
        foreach ($ids as $id) {
            $product = Product::where("id", $id)->first();
            if (!is_null($product)) {
                $products[] = $product;
            }
        }
        return $products;
    }

    public static function getById(int $id): Builder|Product
    {
        return Product::query()->where("id", $id)->firstOrNew();
    }

    public static function getByTitle(string $title): Builder|Product
    {
        return Product::query()->where("title", $title)->firstOrNew();
    }

    public static function getByImgSrcBuilder(string $img_src): Builder
    {
        return Product::query()->where("img_src", $img_src);
    }

    public static function getPopular(int $count): array|\Illuminate\Database\Eloquent\Collection
    {
        return Product::query()->orderBy("rating")->limit($count)->get();
    }

    public static function make(
        $title,
        $description,
        $e_name,
        int $price,
        string $img_src,
        Category $category,
        Maker $maker
    )
    {
        return Product::factory([
            "title" => $title,
            "description" => $description,
            "e_name" => $e_name,
            "price" => $price,
            "img_src" => $img_src,
            "category_id" => $category->getID(),
            "maker_id" => $maker->getID()
        ])->make();
    }

    public function getUrlAttribute(): string
    {
        return route('product.details', ['product' => $this->getId()]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getImgUrlAttribute(): string
    {
        return Request::root() . $this->getImgSrc();
    }
    //</editor-fold>

    //<editor-fold desc="Set Attribute">

    public function getImgSrc()
    {
        return Storage::disk("prod_img")->url($this->img_src);
    }

    public function toSitemapTag(): Url|string|array
    {
        return route('product.details', ["product" => $this->getId()]);
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

    public function getImgPath()
    {
        $src_app = Storage::disk("prod_img")->readStream($this->img_src);
        if ($src_app == null)
            return $src_app;
        return stream_get_meta_data($src_app)["uri"];
    }

    public function getEName()
    {
        return $this->e_name;
    }
    //</editor-fold>

    //<editor-fold desc="Search Product">

    public function getPrice()
    {
        return $this->price;
    }

    public function setTitleIfNotEmpty($title)
    {
        if ($title != "") {
            $this->title = $title;
        }
    }

    public function setDescriptionIfNotEmpty($description)
    {
        if ($description != "") {
            $this->description = $description;
        }
    }

    public function setENameIfNotEmpty($e_name)
    {
        if ($e_name != "") {
            $this->e_name = $e_name;
        }
    }

    /**
     * Sets the new image src.
     *
     * @param UploadedFile|string|null $img
     */
    public function setImgSrcIfNotEmpty(UploadedFile|string|null $img)
    {
        if (!is_null($img) and ((is_string($img) and $img != "") or !is_string($img))) {
            $this->img_src = Product::saveImg($img);
        }
    }

    /**
     * The photo is saved on the disk. Return src.
     *
     * @param UploadedFile|string $img
     * @return string
     */
    public static function saveImg(UploadedFile|string $img): string
    {
        return Storage::disk("prod_img")->putFile("/", $img);
    }

    //</editor-fold>

    public function setCategoryIfNotEmpty(Category $category)
    {
        if ($category->exists) {
            $this->category_id = $category->getId();
        }
    }

    public function setMakerIfNotEmpty(Maker $maker)
    {
        if ($maker->exists) {
            $this->maker_id = $maker->getId();
        }
    }

    public function setPriceIfNotEmpty($price)
    {
        if ($price != "") {
            $this->price = $price;
        }
    }

    public function addRating($rating = 1)
    {
        $this->increment("rating", $rating);
    }
}
