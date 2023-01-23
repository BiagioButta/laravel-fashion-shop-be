<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
            'name' => ['required', Rule::unique('products')->ignore($this->product)],
            'image' => ['nullable'],
            'description' => ['nullable'],
            'price' => ['required'],
            'brand_id' => 'nullable|exists:brand,id',
            'type_id' => 'nullable|exists:type,id',
            'tag_id' => 'nullable|exists:tag,id'    
        ];
    }
}
