<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            
            'name' => 'required|unique:products|min:3|max:100',
            'image' => 'nullable',
            'description' => 'nullable',
            'product_link' => 'nullable',
            'price' => 'required|min:0.01',
            'available' => 'required',
            'brand_id' => 'nullable|exists:brands,id',
            'texture_id' => 'nullable|exists:textures,id',
            'category_id' => 'nullable|exists:categories,id'
        ];
    }

    public function message()
    {
        return [
            'name.required' => 'The name is required',
            'name.unique' => 'This name already exists',
            'name.min' => 'The name is too short',
            'name.max' => 'The name is too long, max :max characters',
            'price.required' => 'The price is required',
            'price.min' => 'The price must be at least :min',
            'available.required' => 'Available is required',
            'brand_id' => 'The brand is required',
            'texture_id' => 'The texture is required',
            'category_id' => 'The category is required'
        ];
    }
}
