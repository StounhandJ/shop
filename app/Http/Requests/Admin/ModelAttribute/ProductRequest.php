<?php

namespace App\Http\Requests\Admin\ModelAttribute;

use App\Models\Category;
use App\Models\Maker;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function getTitle()
    {
        return $this->input("title");
    }

    public function getEName()
    {
        return $this->input("e_name");
    }

    public function getDescription()
    {
        return $this->input("description");
    }

    public function getImg()
    {
        return $this->file("photo");
    }

    public function getPrice(): int
    {
        return (int) $this->input("price");
    }

    public function getCategory(): Category
    {
        return Category::getCategoryById($this->input("category_id"));
    }

    public function getMaker(): Maker
    {
        return Maker::getMakerById($this->input("maker_id"));
    }
}
