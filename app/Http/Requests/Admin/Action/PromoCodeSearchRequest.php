<?php

namespace App\Http\Requests\Admin\Action;

use App\Http\Requests\Admin\ModelAttribute\PromoCodeRequest;

class PromoCodeSearchRequest extends PromoCodeRequest
{
    public function rules(): array
    {
        return [
            "name" => "string|min:3|max:60"
        ];
    }
}
