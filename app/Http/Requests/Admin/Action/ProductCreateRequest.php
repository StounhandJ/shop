<?php

namespace App\Http\Requests\Admin\Action;

use App\Http\Requests\Admin\ModelAttribute\ProductRequest;
use App\Models\Category;
use App\Models\Maker;

class ProductCreateRequest extends ProductRequest
{
    public function rules(): array
    {
        return [
            "title" => "required|string|min:3|max:60",
            "description" => "required|string|min:3|max:3000",
            "category_id" => "bail|required|integer|exists:" . Category::class . ",id",
            "maker_id" => "bail|required|integer|exists:" . Maker::class . ",id",
            "photo" => "required|file|max:10000|mimes:jpeg,jpg,png,svg,bmp,webp",
            "price" => "required|integer|min:0"
        ];
    }
}
