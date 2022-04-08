<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategories extends FormRequest
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
            'name' => 'required|regex:/[a-zA-Z0-9\s]+/',
            'slug' => 'exclude_if:_method,PUT|required|unique:categories,slug',
            'description' => 'required',
            'image' => 'mimes:png,jpg,jpeg,gif|max:5120',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required'
        ];
    }
}
