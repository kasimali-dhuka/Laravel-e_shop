<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProducts extends FormRequest
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
            'category_id' => 'required',
            'name' => 'required|regex:/[a-zA-Z0-9\s]+/',
            'slug' => 'exclude_if:_method,PUT|required|unique:products,slug',
            'small_description' => 'required',
            'description' => 'required',
            'original_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'image' => 'mimes:png,jpg,jpeg,gif|max:5120',
            'qty' => 'numeric',
            'tax' => 'numeric',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required'
        ];
    }
}
