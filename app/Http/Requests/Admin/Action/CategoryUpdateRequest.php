<?php

namespace App\Http\Requests\Admin\Action;

use App\Http\Requests\Admin\ModelAttribute\CategoryRequest;
use App\Models\Department;

class CategoryUpdateRequest extends CategoryRequest
{
    public function rules(): array
    {
        return [
            "name"=> "string|min:3|max:60",
            "e_name"=> "string|min:3|max:60|only_english|without_spaces",
            "department_id"=> "bail|integer|exists:".Department::class.",id"
        ];
    }
}
