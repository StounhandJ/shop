<?php

namespace App\Http\Requests\Admin\Action;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentAdminUpdateRequest extends FormRequest
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
            "id"=> "required|integer|exists:departments",
            "name"=> "string|min:3|max:60",
            "e_name"=> "string|min:3|max:60|only_english|without_spaces"
        ];
    }

    public function getId()
    {
        return $this->input("id");
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
