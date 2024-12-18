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
            'slug' => 'required|max:200',
            'category_id' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được bỏ trống.',
            'title.max' => ' không vượt quá 200 kí tự',

            'slug.required' => ' slug không được bỏ trống.',
            'slug.max' => ' không vượt quá 200 kí tự.',
       
            'category_id.required' => ' không được bỏ trống.',
            'category_id.numeric' => ' phải là số',
        ];
    }
}
