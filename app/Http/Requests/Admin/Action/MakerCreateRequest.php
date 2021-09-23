<?php

namespace App\Http\Requests\Admin\Action;


use App\Http\Requests\Admin\ModelAttribute\MakerRequest;

class MakerCreateRequest extends MakerRequest
{
    public function rules(): array
    {
        return [
            "name" => "required|string|min:2|max:60"
        ];
    }
}
