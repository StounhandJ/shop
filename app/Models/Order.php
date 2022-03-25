<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function getId()
    {
        return $this->id;
    }

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

    public function getPromoCodeId()
    {
        return $this->promo_code_id;
    }

    public function getTotalPrice()
    {
        return $this->total_price;
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, "products_orders")->using(ProductsOrders::class);
    }

    public function products_orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductsOrders::class);
    }

    public function promoCode(): PromoCode
    {
        return $this->hasOne(PromoCode::class, "promo_code_id")->getResults();
    }
    //</editor-fold>

    //<editor-fold desc="Search">


    public static function getById($id): Builder|Order
    {
        return Order::query()->where("id", $id)->firstOrNew();
    }

    //</editor-fold>

    /**
     * @param array $products
     * @param $fio
     * @param $email
     * @param $phone
     * @param $comment
     * @param PromoCode $promoCode
     * @param $delivery
     * @return Order
     */
    public static function create(array $products, $fio, $email, $phone, $comment, PromoCode $promoCode, $delivery): Order
    {
        /** @var Order $order */
        $order = Order::factory([
            "fio" => $fio,
            "email" => $email,
            "phone" => $phone ?? "",
            "comment" => $comment ?? "",
            "promo_code_id" => $promoCode->getId(),
            "total_price" => 0,
            "delivery" => $delivery
        ])->create();

        $totalPrice = 0;
        foreach ($products as $product) {
            $order->products()->attach($product['i'], ["count" => $product['c']]);
            $totalPrice += Product::getById($product['i'])->getPrice() * $product['c'];
        }
        if ($promoCode->exists) {
            $totalPrice = $totalPrice * (1 - $promoCode->getPercent() / 100);
        }
        $order->total_price = $totalPrice;
        $order->save();
        return $order;
    }
}
