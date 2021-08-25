<?php

namespace App\Http\Requests\Admin\Action;

use App\Http\Requests\Admin\ModelAttribute\DepartmentRequest;

class DepartmentUpdateRequest extends DepartmentRequest
{
    public function rules(): array
    {
        return [
            "name"=> "string|min:3|max:60",
            "e_name"=> "string|min:3|max:60|only_english|without_spaces"
        ];
    }
}
