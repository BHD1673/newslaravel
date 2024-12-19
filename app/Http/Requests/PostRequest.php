<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:200',
            'slug' => 'required|max:200|unique:posts,slug',
            'category_id' => 'required|numeric',
            'body' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được bỏ trống.',
            'title.max' => ' không vượt quá 200 kí tự',

            'slug.required' => ' slug không được bỏ trống.',
            'slug.max' => ' không vượt quá 200 kí tự.',
            'slug.unique' => 'Slug không được trùng',

            'category_id.required' => ' không được bỏ trống.',
            'category_id.numeric' => ' phải là số',

            'body.required' => ' content không được bỏ trống.',
        ];
    }
}
