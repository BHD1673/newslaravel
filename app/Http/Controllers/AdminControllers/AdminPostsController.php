<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; // Import Rule class

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class AdminPostsController extends Controller
{
    // Quy tắc xác thực chung
    private $rules = [
        'title' => 'required|max:200',
        'slug' => 'required|string|max:255|unique:posts,slug',
        'excerpt' => 'required|max:300',
        'category_id' => 'required|numeric',
        'thumbnail' => 'nullable|mimes:jpg,png,webp,svg,jpeg|dimensions:max-width=800,max-height=300',
        'body' => 'required',
    ];

    /**
     * Hiển thị danh sách bài viết
     */
    public function index()
    {
        return view('admin_dashboard.posts.index', [
            'posts' => Post::with('category')->orderBy('id', 'DESC')->paginate(20),
        ]);
    }

    /**
     * Hiển thị form tạo bài viết mới
     */
    public function create()
    {
        return view('admin_dashboard.posts.create', [
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    /**
     * Lưu bài viết mới vào cơ sở dữ liệu
     */
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
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg|max:2048', // Xác thực ảnh
        ]);

        // Lưu ID người dùng (nếu cần)
        $validated['user_id'] = auth()->id();

        // Tạo bài viết mới
        $post = Post::create($validated);

        // Xử lý upload ảnh nếu có
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $filename = time() . '-' . $thumbnail->getClientOriginalName();
            // Lưu ảnh vào thư mục public/images
            $path = $thumbnail->move(public_path('images'), $filename);

            // Lưu thông tin ảnh vào bảng 'images' (nếu bạn có bảng này)
            $post->image()->create([
                'name' => $filename,
                'extension' => $thumbnail->getClientOriginalExtension(),
                'path' => 'images/' . $filename, // Lưu đường dẫn ảnh tương đối
            ]);
        }

        // Xử lý tags (nếu cần)
        if ($request->input('tags')) {
            $tags = explode(',', $request->input('tags'));
            $tags_ids = [];
            foreach ($tags as $tag) {
                $tag = trim($tag);
                if ($tag === '') continue;
                $tag_exists = Tag::where('name', $tag)->first();
                if (!$tag_exists) {
                    $tag_ob = Tag::create(['name' => $tag]);
                    $tags_ids[] = $tag_ob->id;
                } else {
                    $tags_ids[] = $tag_exists->id;
                }
            }
            if (count($tags_ids) > 0) {
                $post->tags()->sync($tags_ids);
            }
        }

        // Chuyển hướng về trang thêm bài viết với thông báo thành công
        return redirect()->route('admin.posts.create')->with('success', 'Thêm bài viết thành công.');
    }

    /**
     * Hiển thị form chỉnh sửa bài viết
     */
    public function edit(Post $post)
    {
        $tags = '';
        foreach ($post->tags as $key => $tag) {
            $tags .= $tag->name;
            if ($key !== count($post->tags) - 1)
                $tags .= ', ';
        }

        return view('admin_dashboard.posts.edit', [
            'post' => $post,
            'tags' => $tags,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    /**
     * Cập nhật bài viết vào cơ sở dữ liệu
     */
    public function update(Request $request, Post $post)
    {
        // Điều chỉnh quy tắc xác thực để loại trừ bài viết hiện tại
        $rules = $this->rules;
        $rules['slug'] = [
            'required',
            'string',
            'max:255',
            Rule::unique('posts')->ignore($post->id),
        ];

        // Xác thực dữ liệu nhập vào
        $validated = $request->validate($rules);
        $validated['approved'] = $request->input('approved') !== null;

        // Cập nhật bài viết
        $post->update($validated);

        // Xử lý upload ảnh nếu có
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $filename = time() . '-' . $thumbnail->getClientOriginalName();

            // Di chuyển ảnh vào thư mục public/images
            $path = $thumbnail->move(public_path('images'), $filename);

            // Kiểm tra xem bài viết đã có ảnh trước đó chưa
            if ($post->image) {
                // Xóa ảnh cũ nếu cần
                @unlink(public_path($post->image->path));
                // Cập nhật thông tin ảnh trong cơ sở dữ liệu
                $post->image()->update([
                    'name' => $filename,
                    'extension' => $thumbnail->getClientOriginalExtension(),
                    'path' => 'images/' . $filename, // Lưu đường dẫn ảnh tương đối
                ]);
            } else {
                // Tạo mới thông tin ảnh
                $post->image()->create([
                    'name' => $filename,
                    'extension' => $thumbnail->getClientOriginalExtension(),
                    'path' => 'images/' . $filename,
                ]);
            }
        }

        // Xử lý tags và các dữ liệu khác
        $tags = explode(',', $request->input('tags'));
        $tags_ids = [];
        foreach ($tags as $tag) {
            $tag = trim($tag);
            if ($tag === '') continue;
            $tag_exists = Tag::where('name', $tag)->first();
            if (!$tag_exists) {
                $tag_ob = Tag::create(['name' => $tag]);
                $tags_ids[] = $tag_ob->id;
            } else {
                $tags_ids[] = $tag_exists->id;
            }
        }

        if (count($tags_ids) > 0) {
            $post->tags()->sync($tags_ids);
        }

        return redirect()->route('admin.posts.edit', $post)->with('success', 'Sửa bài viết thành công.');
    }

    /**
     * Xóa bài viết khỏi cơ sở dữ liệu
     */
    public function destroy(Post $post)
    {
        // Xóa các tag liên kết nếu cần (tùy vào cấu trúc mối quan hệ)
        $post->tags()->detach();

        // Xóa các bình luận liên kết nếu có
        $post->comments()->delete();

        // Xóa ảnh liên kết nếu có
        if ($post->image) {
            @unlink(public_path($post->image->path));
            $post->image()->delete();
        }

        // Xóa bài viết
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Xóa bài viết thành công.');
    }

    /**
     * Hàm tạo slug tự động
     */
    public function to_slug(Request $request)
    {
        $str = $request->title;
        $data['success'] = 1;
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        $data['message'] =  $str;
        return response()->json($data);
    }
}
