<?php

namespace App\Http\Requests\Admin\Action;

use App\Http\Requests\Admin\ModelAttribute\ProductRequest;
use App\Models\Category;
use App\Models\Maker;

class ProductUpdateRequest extends ProductRequest
{
    public function rules(): array
    {
        return [
            "title" => "string|min:3|max:60",
            "description" => "string|min:3|max:3000",
            "category_id" => "bail|integer|exists:" . Category::class . ",id",
            "maker_id" => "bail|integer|exists:" . Maker::class . ",id",
            "photo" => "file|max:10000|mimes:jpeg,jpg,png,svg,bmp,webp",
            "price" => "integer|min:0",
        ];
    }
}
