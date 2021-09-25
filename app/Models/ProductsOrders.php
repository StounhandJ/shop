<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductsOrders extends Pivot
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;
    protected $table = "products_orders";

    protected static function booted()
    {
        static::created(function (ProductsOrders $productsOrders) {
            $productsOrders->getProduct()->addRating();
        });
    }

    public function getProduct(): Product
    {
        return Product::getById($this->product_id);
    }
}
