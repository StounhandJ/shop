<?php

namespace App\Http\Requests\Subdomain;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class SubdomainCreateRequest extends FormRequest
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
            "template"=>"string|required"
        ];
    }

    public function existsTemplate()
    {
        return Storage::disk("templates")->exists($this->query("template"));
    }
}
