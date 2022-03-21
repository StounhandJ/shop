<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maker extends Model
{
    use HasFactory, SoftDeletes;

    //<editor-fold desc="Setting">
    public $timestamps = false;
    //</editor-fold>

    //<editor-fold desc="Get Attribute">

    public static function getById($id): \Illuminate\Database\Eloquent\Builder|Maker
    {
        return Maker::query()->where("id", $id)->firstOrNew();
    }

    public static function getByName($name): \Illuminate\Database\Eloquent\Builder|Maker
    {
        return Maker::query()->where("name", $name)->firstOrNew();
    }
    //</editor-fold>

    //<editor-fold desc="Set Attribute">

    public static function make($name)
    {
        return Maker::factory(["name" => $name])->make();
    }
    //</editor-fold>

    //<editor-fold desc="Search Maker">

    public function getName()
    {
        return $this->name;
    }

    public function setNameIfNotEmpty($name)
    {
        if ($name != "") {
            $this->name = $name;
        }
    }

    //</editor-fold>

    public function getProductCount(): int
    {
        return Product::query()->where("maker_id", $this->getId())->count();
    }

    public static function getByAbc()
    {
        return Maker::orderBy("name")->get();
    }

    public function getId()
    {
        return $this->id;
    }
}
