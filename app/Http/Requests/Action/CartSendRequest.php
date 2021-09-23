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
            "name" => "required|string|min:1|max:60",
            "email" => "required|string|min:3|max:60",
            "phone" => "string|min:3|max:60",
            "comment" => "string|max:800",
        ];
    }

    public function getName()
    {
        return $this->input("name");
    }

    public function getEmail()
    {
        return $this->input("email");
    }

    public function getPhone()
    {
        return $this->input("phone");
    }

    public function getComment()
    {
        return $this->input("comment");
    }
}
