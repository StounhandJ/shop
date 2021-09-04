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
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
    //</editor-fold>

    //<editor-fold desc="Set Attribute">
    public function setNameIfNotEmpty($name)
    {
        if ($name!="") $this->name = $name;
    }
    //</editor-fold>

    //<editor-fold desc="Search Maker">
    public static function getById($id) : Maker
    {
        return Maker::where("id", $id)->first() ?? new Maker();
    }

    public static function getByName($name) : Maker
    {
        return Maker::where("name", $name)->first() ?? new Maker();
    }
    //</editor-fold>

    public static function make($name)
    {
        return Maker::factory(["name"=>$name] )->make();
    }

    public function getProductCount()
    {
        return Product::where("maker_id", $this->getId())->count();
    }
}
