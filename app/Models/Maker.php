<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    use HasFactory;

    //<editor-fold desc="Setting">
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
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
    public static function getMakerById($id) : Maker
    {
        return Maker::where("id", $id)->first() ?? new Maker();
    }
    //</editor-fold>

    public function upgrade()
    {
        $this->update(["name"=>$this->getName()]);
    }

    public static function create($name)
    {
        return Maker::factory(["name"=>$name] )->make();
    }

    public function getProductCount()
    {
        return Product::where("maker_id", $this->getId())->count();
    }
}
