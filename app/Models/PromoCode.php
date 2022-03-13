<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class PromoCode extends Model
{
    use HasFactory, SoftDeletes;

    public static function getById(int $id): Builder|PromoCode
    {
        return PromoCode::query()->where("id", $id)->firstOrNew();
    }

    public static function getByName(string $name): Builder|PromoCode
    {
        return PromoCode::query()->where("name", $name)->firstOrNew();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPercent()
    {
        return $this->percent;
    }

    public static function make(
        $name,
        $percent
    )
    {
        return Product::factory([
            "name" => $name,
            "percent" => $percent,
        ])->make();
    }

    public function setNameIfNotEmpty($name)
    {
        if ($name != "") {
            $this->name = $name;
        }
    }

    public function setPercentIfNotEmpty($percent)
    {
        if ($percent != "") {
            $this->percent = $percent;
        }
    }
}
