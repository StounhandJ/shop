<?php

namespace App\Http\Requests\Admin\ModelAttribute;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
}
