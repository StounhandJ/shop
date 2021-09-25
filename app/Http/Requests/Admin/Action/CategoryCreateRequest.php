<?php

namespace App\Http\Requests\Admin\Action;

use App\Http\Requests\Admin\ModelAttribute\CategoryRequest;
use App\Models\Department;

class CategoryCreateRequest extends CategoryRequest
{
    public function rules(): array
    {
        return [
            "name" => "required|string|min:3|max:60",
            "e_name" => "required|string|min:3|max:60|only_english|without_spaces",
            "department_id" => "bail|required|integer|exists:" . Department::class . ",id"
        ];
    }
}
