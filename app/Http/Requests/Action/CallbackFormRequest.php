<?php

namespace App\Http\Requests\Action;

use Illuminate\Foundation\Http\FormRequest;

class CallbackFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "phone" => "string|min:10|max:30",
        ];
    }

    public function getPhone()
    {
        return $this->input("phone");
    }

}
