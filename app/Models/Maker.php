<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public static function getMakerById($id) : Maker
    {
        return Maker::where("id", $id)->first() ?? new Maker();
    }

    public function setNameIfNotEmpty($name)
    {
        if ($name!="") $this->name = $name;
    }

    public function upgrade()
    {
        $this->update(["name"=>$this->getName()]);
    }

    public static function create($name)
    {
        return Maker::factory(["name"=>$name] )->make();
    }
}
