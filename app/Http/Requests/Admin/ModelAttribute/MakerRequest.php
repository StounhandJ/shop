<?php

namespace App\Http\Requests\Admin\ModelAttribute;

use Illuminate\Foundation\Http\FormRequest;

class MakerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function getName()
    {
        return $this->input("name");
    }
}
