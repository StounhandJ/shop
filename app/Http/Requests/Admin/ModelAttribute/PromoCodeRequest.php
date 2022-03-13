<?php

namespace App\Http\Requests\Admin\ModelAttribute;

use Illuminate\Foundation\Http\FormRequest;

class PromoCodeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function getPercent()
    {
        return $this->input("percent");
    }

    public function getName()
    {
        return $this->input("name");
    }
}
