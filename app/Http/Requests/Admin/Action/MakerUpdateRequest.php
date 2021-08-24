<?php

namespace App\Http\Requests\Admin\Action;

use App\Http\Requests\Admin\ModelAttribute\MakerRequest;

class MakerUpdateRequest extends MakerRequest
{
    public function rules(): array
    {
        return [
            "name"=>"string|min:2|max:60"
        ];
    }
}
