<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
  public function authorize()
  {
    // Đảm bảo rằng người dùng có quyền cập nhật bài viết
    return true;
  }

  public function rules()
  {
    $postId = $this->route('post')->id;

    return [
      'title' => 'required|string|max:255',
      'slug' => 'required|string|max:255|unique:posts,slug,' . $postId,
      'excerpt' => 'required|string|max:500',
      'body' => 'required|string',
      'category_id' => 'required|exists:categories,id',
      'tags' => 'nullable|string',
      'thumbnail' => 'nullable|file|mimes:jpeg,jpg,png,webp,svg|dimensions:max_width=800,max_height=300',
      'approved' => 'sometimes|boolean',
    ];
  }
}
