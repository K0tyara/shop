<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                Rule::unique('products', 'title')->ignore($this->product->id),
            ],
            'description' => 'required|string',
            'category_id' => 'required|numeric|exists:categories,id',
            'subcategory_id' => 'required|numeric|exists:subcategories,id',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
            'colors' => 'required|array|exists:colors,id',
        ];
    }
}
