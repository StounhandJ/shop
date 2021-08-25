<?php

namespace App\Http\Requests\Admin\ModelAttribute;

use App\Models\Department;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
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
