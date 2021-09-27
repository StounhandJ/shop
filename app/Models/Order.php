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

    //<editor-fold desc="Setting">
    protected $appends = ['products'];

    public function getProductsAttribute(): Collection
    {
        return $this->products()->get();
    }

    //</editor-fold>

    //<editor-fold desc="Get">

    public function getPhone()
    {
        return $this->phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, "products_orders")->using(ProductsOrders::class);
    }
    //</editor-fold>

    //<editor-fold desc="Search">


    public static function getById($id): Order
    {
        return Order::where("id", $id)->first() ?? new Order();
    }

    //</editor-fold>

    /**
     * @param Collection $products
     * @param $fio
     * @param $email
     * @param $phone
     * @param $comment
     * @return Order
     */
    public static function create(Collection $products, $fio, $email, $phone, $comment): Order
    {
        /** @var Order $order */
        $order = Order::factory([
            "fio" => $fio,
            "email" => $email,
            "phone" => $phone ?? "",
            "comment" => $comment ?? ""
        ])->create();
        $order->products()->attach($products);
        return $order;
    }
}
