<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; // Import Rule class

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Role;

use App\Http\Services\PostService;
use App\Http\Services\PostHistorieService;
use App\Models\Image;
use App\Models\PostLog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{

    protected $postService;
    protected $postHistorieService;
    public function __construct()
    {
        $this->postService = new PostService();
        $this->postHistorieService = new PostHistorieService();
    }

    private $rules = [
        'title' => 'required|max:200',
        'slug' => 'required|string|max:255|unique:posts,slug',
        'excerpt' => 'required|max:300',
        'category_id' => 'required|numeric',
        // 'files' => 'required|mimes:jpg,png,webp,svg,jpeg|dimensions:max-width:300,max-height:227',
        'body' => 'required',
    ];

    /**
     * Hiển thị danh sách bài viết
     */
    public function index()
    {
        $posts = $this->postService->index();
        $isEmployee = $this->postService->isEmployee();
        $isAdmin = $this->postService->isAdmin();
        $postLog = PostLog::all();
        return view('admin_dashboard.posts.index', compact('posts', 'isEmployee', 'isAdmin', 'postLog'));
    }

    public function postSoftDelete()
    {
        $posts = $this->postService->getPoStsoftDelete();
        return view('admin_dashboard.posts.post-soft-delete', compact('posts'));
    }
    /**
     * Hiển thị form tạo bài viết mới
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $isReporter = $this->postService->isReporter();
        return view('admin_dashboard.posts.create',compact('categories', 'isReporter'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $this->postService->store($validated, $request->all());
        return redirect()->route('admin.posts.create')->with('success', 'Thêm bài viết thành công.');
    }

    public function show($id)
    {
        //
    }


    public function edit(Post $post){
        $tags = '';
        foreach($post->tags as $key => $tag){
            $tags .= $tag->name;
            if($key !== count($post->tags) - 1)
                $tags .= ', ';
        }

        $isEmployee = $this->postService->isEmployee();
        $isAdmin = $this->postService->isAdmin();
        $isReporter = $this->postService->isReporter();
        $postImages = Image::query()->where("imageable_id", $post->id)->get();
        $postLog = PostLog::query()->where("post_id", $post->id)->first();
        
        return view('admin_dashboard.posts.edit',[
            'post' => $post,
            'tags' => $tags,
            'isEmployee' => $isEmployee,
            'isReporter' => $isReporter,
            'categories' => Category::pluck('name', 'id'),
            'postImages' => $postImages,
            'postLog' => $postLog,
            'isAdmin' => $isAdmin
        ]);
    }

    /**
     * Cập nhật bài viết vào cơ sở dữ liệu
     */
    public function update(Request $request, Post $post)
    {
        $this->rules['thumbnail'] = 'nullable|file|mimes:jpg,png,webp,svg,jpeg|dimensions:max-width:800,max-height:300';
        $validated = $request->validate($this->rules);
        $validated['approved'] = $request->input('approved') !== null;
        $post->update($validated);
        // dd($request->all());

        // Xử lý upload ảnh nếu có
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $filename = time() . '-' . $thumbnail->getClientOriginalName();

            // Di chuyển ảnh vào thư mục public/images
            $path = $thumbnail->move(public_path('images'), $filename);

            // Cập nhật thông tin ảnh trong cơ sở dữ liệu
            $post->image()->update([
                'name' => $filename,
                'extension' => $thumbnail->getClientOriginalExtension(),
                'path' => 'images/' . $filename, // Lưu đường dẫn ảnh tương đối
            ]);
        }

        // Xử lý tags và các dữ liệu khác
        $tags = explode(',', $request->input('tags'));
        $tags_ids = [];
        foreach ($tags as $tag) {
            $tag_exits = $post->tags()->where('name', trim($tag))->count();
            if ($tag_exits == 0) {
                $tag_ob = Tag::create(['name' => $tag]);
                $tags_ids[]  = $tag_ob->id;
            }
        }

        if (count($tags_ids) > 0)
            $post->tags()->syncWithoutDetaching($tags_ids);

        return redirect()->route('admin.posts.index', $post)->with('success', 'Sửa bài viết thành công.');
    }

    public function softDelete(Post $post)
    {
        $this->postService->softDeleteService($post);
        return redirect()->route('admin.posts.index')->with('success', 'Chuyển bài viết vào thùng rác thành công.');
    }

    public function undoSoftDelete(Post $post)
    {
        $this->postService->undoSoftDeleteService($post);
        return redirect()->route('admin.post-soft-delete')->with('success', 'xóa khỏi thùng rác thành công.');
    }

   
    public function destroy(Post $post)
    {
        $post->tags()->delete();
        // remove images
        $postImg = Image::query()->where("imageable_id", $post->id)->get();
        $postLog = PostLog::query()->where("post_id", $post->id)->first();

        // admin xóa post log user phản hồi
        if (Auth::user()->role->name === Role::ROLE_ADMIN) {
            if($postLog)
            {
                $postLog->delete();
            }
        }

        if($postImg)
        {
            foreach($postImg as $item)
            {   
                Storage::disk('public')->delete($item->path);
                $item->delete();
            }
        }

        $post->comments()->delete();
        $post->delete();
        $this->postHistorieService->handleDeletePostHistory($post);
        if($post->is_delete_post){
            return redirect()->route('admin.post-soft-delete')->with('success', 'Xóa bài viết thành công.');
        }else{
            return redirect()->route('admin.posts.index')->with('success','Xóa bài viết thành công.');
        }
    }

    // Hàm tạo slug tự động
    public function to_slug(Request $request) {
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