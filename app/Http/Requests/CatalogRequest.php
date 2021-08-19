<?php

namespace App\Http\Requests;

use App\Http\Requests\Cart\Cart;
use Illuminate\Foundation\Http\FormRequest;

class CatalogRequest extends FormRequest
{
    use Cart;
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
            //
        ];
    }

    public function getPage(): string
    {
        $page = $this->query("p");
        if (is_numeric($page)) $page = (int) $page;
        else $page = 1;
        return $page;
    }
}
