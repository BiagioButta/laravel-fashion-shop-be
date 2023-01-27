<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTextureRequest extends FormRequest
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
            'name' => 'required|unique:textures|min:3|max:50'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name is required',
            'name.unique' => 'This name already exists',
            'name.min' => 'The name is too short',
            'name.max' => 'The name is too long, max :max characters'
        ];
    }
}
