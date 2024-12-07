<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class AdminTagsController extends Controller
{
    // Hiển thị danh sách các Tag, kèm theo danh sách các bài viết liên quan.
    public function index()
    {
        // Sử dụng 'paginate' để phân trang dữ liệu.
        $tags = Tag::with('posts')->paginate(50);

        // Trả về view với dữ liệu.
        return view('admin_dashboard.tags.index', compact('tags'));
    }

    // Hiển thị thông tin chi tiết của một Tag
    public function show(Tag $tag)
    {
        // Trả về view với dữ liệu Tag.
        return view('admin_dashboard.tags.show', compact('tag'));
    }

    // Xóa một Tag và các mối quan hệ với bài viết
    public function destroy(Tag $tag)
    {
        // Tách (detach) tất cả bài viết khỏi Tag trước khi xóa.
        $tag->posts()->detach();

        // Xóa Tag khỏi cơ sở dữ liệu.
        $tag->delete();

        // Chuyển hướng về trang danh sách Tag với thông báo thành công.
        return redirect()->route('admin.tags.index')->with('success', 'Xóa Từ khóa thành công.');
    }
}
