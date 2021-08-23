<?php

namespace App\Http\Requests\Admin\Action;

use App\Models\Department;
use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            "name"=> "string|min:3|max:60",
            "e_name"=> "string|min:3|max:60|only_english|without_spaces",
            "department_id"=> "bail|integer|exists:".Department::class.",id"
        ];
    }

    public function getName()
    {
        return $this->input("name");
    }

    public function getEName()
    {
        return $this->input("e_name");
    }

    public function getDepartment(): Department
    {
        return Department::getDepartmentById($this->input("department_id"));
    }
}
