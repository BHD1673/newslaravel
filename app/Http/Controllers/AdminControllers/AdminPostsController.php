<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Image; // Nếu bạn đang sử dụng một bảng images để lưu thông tin ảnh

class AdminPostsController extends Controller
{
    private $rules = [
        'title' => 'required|max:200',
        'slug' => 'required|max:200',
        'excerpt' => 'required|max:300',
        'category_id' => 'required|numeric',
        'thumbnail' => 'nullable|mimes:jpg,png,webp,svg,jpeg|dimensions:max-width:800,max-height:300',
        'body' => 'required',
    ];

    // Hàm hiển thị danh sách bài viết
    public function index()
    {
        return view('admin_dashboard.posts.index', [
            'posts' => Post::with('category')->orderBy('id', 'ASC')->paginate(20),
        ]);
    }

    // Hàm tạo bài viết mới
    public function create()
    {
        return view('admin_dashboard.posts.create', [
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    // Hàm lưu bài viết mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        // Xác thực dữ liệu nhập vào
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug',
            'excerpt' => 'required|string|max:500',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Lưu ID người dùng (nếu cần)
        $validated['user_id'] = auth()->id();

        // Tạo bài viết mới
        $post = Post::create($validated);

        // Xử lý upload ảnh nếu có
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $filename = time() . '-' . $thumbnail->getClientOriginalName();
            $path = $thumbnail->storeAs('images', $filename, 'public');

            // Lưu thông tin ảnh vào bảng images (hoặc bảng liên quan)
            $post->image()->create([
                'name' => $filename,
                'extension' => $thumbnail->getClientOriginalExtension(),
                'path' => $path,
            ]);
        }

        // Xử lý tags
        $this->syncTags($post, $request);

        // Chuyển hướng về trang tạo bài viết với thông báo thành công
        return redirect()->route('admin.posts.create')->with('success', 'Thêm bài viết thành công.');
    }

    // Hàm hiển thị trang chỉnh sửa bài viết
    public function edit(Post $post)
    {
        // Chuyển tags thành chuỗi để dễ dàng chỉnh sửa
        $tags = $post->tags->pluck('name')->implode(', ');

        return view('admin_dashboard.posts.edit', [
            'post' => $post,
            'tags' => $tags,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    // Hàm cập nhật bài viết
    public function update(Request $request, Post $post)
    {
        // Xác thực lại dữ liệu
        $validated = $request->validate($this->rules);

        // Cập nhật thông tin bài viết
        $validated['approved'] = $request->has('approved');
        $post->update($validated);

        // Xử lý ảnh nếu có
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $filename = time() . '-' . $thumbnail->getClientOriginalName();
            $path = $thumbnail->storeAs('images', $filename, 'public');

            // Cập nhật thông tin ảnh
            $post->image()->update([
                'name' => $filename,
                'extension' => $thumbnail->getClientOriginalExtension(),
                'path' => $path,
            ]);
        }

        // Xử lý tags
        $this->syncTags($post, $request);

        return redirect()->route('admin.posts.edit', $post)->with('success', 'Cập nhật bài viết thành công.');
    }

    // Hàm xóa bài viết
    public function destroy(Post $post)
    {
        // Xóa liên kết tags, comments và bài viết
        $post->tags()->delete();
        $post->comments()->delete();
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Xóa bài viết thành công.');
    }

    // Hàm đồng bộ tags với bài viết
    private function syncTags(Post $post, Request $request)
    {
        $tags = explode(',', $request->input('tags'));
        $tags_ids = [];

        foreach ($tags as $tag) {
            $tag = trim($tag);
            $tag_ob = Tag::firstOrCreate(['name' => $tag]);
            $tags_ids[] = $tag_ob->id;
        }

        // Liên kết tags mới vào bài viết
        $post->tags()->syncWithoutDetaching($tags_ids);
    }

    // Hàm tạo slug tự động từ tiêu đề
    public function to_slug(Request $request)
    {
        $str = $request->title;
        $str = mb_strtolower(trim($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);

        return response()->json([
            'success' => 1,
            'message' => $str,
        ]);
    }

    // Hàm xử lý upload ảnh cho TinyMCE (nếu có)
    public function uploadTinymceImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $image = $request->file('file');
        $filename = time() . '-' . $image->getClientOriginalName();
        $path = $image->storeAs('images', $filename, 'public');

        return response()->json(['location' => asset('storage/images/' . $filename)]);
    }
}
