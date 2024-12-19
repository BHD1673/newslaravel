<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class CategoryController extends Controller
{
    /**
     * Hàm khởi tạo để chia sẻ dữ liệu danh mục không phân loại cho tất cả các phương thức.
     */
    protected $unclassifiedCategory;

    public function __construct()
    {
        // Lấy danh mục "Chưa phân loại" một lần duy nhất để sử dụng trong toàn bộ controller
        $this->unclassifiedCategory = Category::where('name', 'Chưa phân loại')->first();

        // Nếu danh mục "Chưa phân loại" chưa tồn tại, tạo mới
        if (!$this->unclassifiedCategory) {
            $this->unclassifiedCategory = Category::create([
                'name' => 'Chưa phân loại',
                'slug' => 'chua-phan-loai',
                'user_id' => auth()->id() ?? 1, // Thay đổi user_id phù hợp
            ]);
        }
    }

    /**
     * Hiển thị danh sách các danh mục và các bài viết mới nhất theo các danh mục khác nhau.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Lấy 10 danh mục mới nhất, ngoại trừ "Chưa phân loại"
        $categories = Category::where('id', '!=', $this->unclassifiedCategory->id)
            ->orderBy('created_at', 'DESC')
            ->take(10)
            ->get();

        // Lấy tất cả các danh mục ngoại trừ "Chưa phân loại" với số lượng bài viết
        $category_all = Category::where('id', '!=', $this->unclassifiedCategory->id)
            ->orderBy('created_at', 'DESC')
            ->withCount('posts')
            ->paginate(100);

        // Lấy 4 bài viết mới nhất từ các danh mục khác nhau, ngoại trừ "Chưa phân loại"
        $posts_new = $this->getLatestPostsByDistinctCategories(4);

        return view('categories.index', compact('categories', 'category_all', 'posts_new'));
    }

    /**
     * Hiển thị chi tiết một danh mục cụ thể cùng với các bài viết liên quan.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function show(Category $category)
    {
        // Lấy 5 bài viết gần đây nhất
        $recent_posts = Post::latest()->approved()->take(5)->get();

        // Lấy 10 danh mục mới nhất, ngoại trừ "Chưa phân loại" với số lượng bài viết
        $categories = Category::where('id', '!=', $this->unclassifiedCategory->id)
            ->withCount('posts')
            ->orderBy('created_at', 'DESC')
            ->take(10)
            ->get();

        // Lấy 50 thẻ mới nhất
        $tags = Tag::latest()->take(50)->get();

        // Lấy 4 bài viết mới nhất từ các danh mục khác nhau, ngoại trừ "Chưa phân loại"
        $posts_new = $this->getLatestPostsByDistinctCategories(4);

        // Lấy 5 bài viết nổi bật, ngoại trừ "Chưa phân loại"
        $outstanding_posts = Post::approved()
            ->where('category_id', '!=', $this->unclassifiedCategory->id)
            ->take(5)
            ->get();

        // Lấy các bài viết thuộc danh mục hiện tại, đã được duyệt và phân trang
        $posts = $category->posts()
            ->approved()
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('categories.show', compact(
            'category',
            'posts',
            'recent_posts',
            'categories',
            'tags',
            'posts_new',
            'outstanding_posts'
        ));
    }

    /**
     * Hàm hỗ trợ để lấy các bài viết mới nhất từ các danh mục khác nhau.
     *
     * @param int $count Số lượng bài viết cần lấy
     * @return array
     */
    protected function getLatestPostsByDistinctCategories($count = 4)
    {
        $posts_new = [];
        $excludedCategoryIds = [$this->unclassifiedCategory->id];

        for ($i = 0; $i < $count; $i++) {
            $post = Post::latest()
                ->approved()
                ->whereNotIn('category_id', $excludedCategoryIds)
                ->first();

            if ($post) {
                $posts_new[] = $post;
                // Thêm category_id của bài viết vừa lấy vào danh sách loại trừ
                $excludedCategoryIds[] = $post->category_id;
            } else {
                // Nếu không còn bài viết nào phù hợp, dừng vòng lặp
                break;
            }
        }

        return $posts_new;
    }
}
