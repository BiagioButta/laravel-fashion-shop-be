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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            
            'name' => 'required|max:150|min:3',
            'image' => 'nullable',
            'description' => 'nullable',
            'price' => 'required',
            'brand_id' => 'nullable|exists:brands,id',
            'texture_id' => 'nullable|exists:textures,id',
            'category_id' => 'nullable|exists:categories,id'
        ];
    }

    public function message()
    {
        return [
            'name.required' => 'Il nome è obbligatorio.',
            'name.min' => 'Il name deve essere lungo almeno :min caratteri.',
            'name.max' => 'Il name non può superare i :max caratteri.'
        ];
    }
}
