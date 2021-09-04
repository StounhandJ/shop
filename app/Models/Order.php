<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $appends = ['products'];

    public function getProductsAttribute(): Collection
    {
        return $this->products()->get();
    }

    public static function getById($id) : Order
    {
        return Order::where("id", $id)->first() ?? new Order();
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, "products_orders")->using(ProductsOrders::class);
    }

    public function addProduct(Product $product)
    {

    }

    /**
     * @param Product[] $products
     * @return Collection|Model
     */
    public static function make(array $products)
    {
        $order =  Order::factory()->make();
    }
}
