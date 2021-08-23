<?php

namespace App\Http\Requests\Admin\Action;

use App\Models\Category;
use App\Models\Maker;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title"=> "string|min:3|max:60",
            "description"=> "string|min:3|max:3000",
            "e_name"=> "string|min:3|max:60|only_english|without_spaces",
            "category_id"=> "bail|integer|exists:".Category::class.",id",
            "maker_id"=> "bail|integer|exists:".Maker::class.",id",
            "photo"=> "file|max:10000|mimes:jpeg,jpg,png,svg,bmp,webp",
            "price"=> "integer|min:0",
        ];
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
