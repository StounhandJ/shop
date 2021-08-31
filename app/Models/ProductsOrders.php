<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductsOrders extends Pivot
{
    use HasFactory;

    protected $table = "products_orders";

    public $incrementing = false;

     public $timestamps = false;
}
