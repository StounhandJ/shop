<?php

namespace App\Http\Requests\Admin\Action;

use App\Http\Requests\Admin\ModelAttribute\PromoCodeRequest;

class PromoCodeCreateRequest extends PromoCodeRequest
{
    public function rules(): array
    {
        return [
            "name" => "required|string|min:3|max:60",
            "percent" => "required|integer|min:0"
        ];
    }
}
