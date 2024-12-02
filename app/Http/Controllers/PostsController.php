<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    // Hiển thị bài viết chi tiết
    public function show(Post $post)
    {
        // Lấy ra 5 bài viết mới nhất
        $recent_posts = Post::latest()->take(5)->get();
        
        // Lấy danh sách các danh mục có bài viết
        $categories  = Category::where('name', '!=', 'Chưa phân loại')->withCount('posts')->orderBy('created_at','DESC')->take(10)->get();

        // Lấy tất cả các tags
        $tags = Tag::latest()->take(50)->get();

        // Lấy 4 bài viết mới nhất theo các danh mục khác nhau
        $category_unclassified = Category::where('name', 'Chưa phân loại')->first();
        
        $posts_new = [];
        $excluded_category_ids = [$category_unclassified->id];
        
        for ($i = 0; $i < 4; $i++) {
            $posts_new[$i] = Post::latest()->approved()
                ->whereNotIn('category_id', $excluded_category_ids)
                ->take(1)
                ->get();
            
            // Lấy danh mục của bài viết vừa lấy và loại bỏ khỏi danh sách loại trừ
            $excluded_category_ids[] = $posts_new[$i][0]->category->id;
        }
        
        // Lấy bài viết tương tự
        $postTheSame = Post::latest()->approved()
            ->where('category_id', $post->category->id)
            ->where('id', '!=', $post->id)
            ->take(5)
            ->get();

        // Bài viết nổi bật
        $outstanding_posts = Post::approved()
            ->where('category_id', '!=', $category_unclassified->id)
            ->take(5)
            ->get();

        // Tăng lượt xem khi người dùng xem bài viết
        $post->increment('views');

        return view('post', [
            'post' => $post,
            'recent_posts' => $recent_posts,
            'categories' => $categories,
            'tags' => $tags,
            'posts_new' => $posts_new,
            'postTheSame' => $postTheSame, // Bài viết tương tự
            'outstanding_posts' => $outstanding_posts, // Bài viết nổi bật
        ]);
    }

    // Thêm bình luận
    public function addComment(Post $post)
    {
        // Xác thực bình luận
        $attributes = request()->validate([
            'the_comment' => 'required|min:5|max:300'
        ]);

        // Danh sách từ ngữ không phù hợp
        $badWords = ['từ1', 'từ2', 'từ3']; // Thêm từ ngữ xấu vào đây

        // Kiểm tra từ ngữ không phù hợp trong bình luận
        foreach ($badWords as $word) {
            if (stripos($attributes['the_comment'], $word) !== false) {
                return redirect()->back()
                    ->withErrors(['the_comment' => 'Bình luận không được chứa từ ngữ không phù hợp.'])
                    ->withInput();
            }
        }

        // Lưu thông tin bình luận
        $attributes['user_id'] = auth()->id();
        $comment = $post->comments()->create($attributes);

        return redirect('/posts/' . $post->slug . '#comment_' . $comment->id)
            ->with('success', 'Bạn vừa bình luận thành công.');
    }

    // Thêm bình luận qua Ajax
    public function addCommentUser()
    {
        $data = ['success' => 0, 'errors' => [], 'message' => ''];

        // Xác thực dữ liệu
        $validated = Validator::make(request()->all(), [
            'the_comment' => 'required|min:5|max:300',
            'post_title' => 'required',
        ]);

        if ($validated->fails()) {
            $data['errors'] = $validated->errors()->first('the_comment');
            $data['message'] = "Không thể bình luận.";
        } else {
            $attributes = $validated->validated();
            $post = Post::where('title', $attributes['post_title'])->first();

            // Kiểm tra nếu không tìm thấy bài viết
            if (!$post) {
                $data['message'] = "Không tìm thấy bài viết.";
                return response()->json($data);
            }

            // Danh sách từ ngữ xấu
            $badWords = ['ditmemay', 'dittomay', 'từ3'];

            // Kiểm tra bình luận có từ ngữ không phù hợp
            foreach ($badWords as $word) {
                if (stripos($attributes['the_comment'], $word) !== false) {
                    $data['errors'] = "Bình luận không được chứa từ ngữ không phù hợp.";
                    $data['message'] = "Không thể bình luận.";
                    return response()->json($data);
                }
            }

            // Lưu bình luận
            $comment = $post->comments()->create([
                'the_comment' => $attributes['the_comment'],
                'post_id' => $post->id,
                'user_id' => auth()->id(),
            ]);

            $data['success'] = 1;
            $data['message'] = "Bạn đã bình luận thành công!";
            $data['result'] = $comment;
        }

        return response()->json($data);
    }
}
