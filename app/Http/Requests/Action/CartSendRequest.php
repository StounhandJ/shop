<?php

namespace App\Http\Requests\Action;

use App\Http\Requests\Cart\Cart;
use Illuminate\Foundation\Http\FormRequest;

class CartSendRequest extends FormRequest
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
            "email"=>"required|email",
            "fio"=>"required|string|min:5|max:100",
            "description"=>"required|string|max:2000"
        ];
    }

    public function getEmail()
    {
        return $this->input("email");
    }

    public function getFio()
    {
        return $this->input("fio");
    }

    public function getDescription()
    {
        return $this->input("description");
    }
}
