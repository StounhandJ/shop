<?php

namespace App\Http\Requests\Action;

use App\Http\Requests\Cart\Cart;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class CartCountProductRequest extends FormRequest
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
            "p_id" => "required|integer|exists:" . Product::class . ",id",
            "count" => "required|integer|min:1|max:100"
        ];
    }

    public function getProductID(): int
    {
        return (int)$this->input("p_id");
    }

    public function getProductCount(): int
    {
        return (int)$this->input("count");
    }
}

