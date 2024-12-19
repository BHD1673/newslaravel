<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    // Danh sách các danh mục lựa chọn
    $choiceCategories = [
        ['name' => 'Thời Trang', 'description' => 'Gợi ý xu hướng thời trang và phong cách cá nhân.'],
        ['name' => 'Làm Đẹp', 'description' => 'Bí quyết chăm sóc da, trang điểm và làm đẹp.'],
        ['name' => 'Sức Khỏe & Dinh Dưỡng', 'description' => 'Chia sẻ về tập luyện, chế độ ăn lành mạnh.'],
        ['name' => 'Tình Yêu & Gia Đình', 'description' => 'Xây dựng gia đình hạnh phúc và nuôi dạy con cái.'],
        ['name' => 'Phong Cách Sống', 'description' => 'Mẹo cân bằng cuộc sống và phát triển bản thân.'],
        ['name' => 'Công Việc & Sự Nghiệp', 'description' => 'Lời khuyên phát triển sự nghiệp và khởi nghiệp.'],
        ['name' => 'Ẩm Thực', 'description' => 'Công thức nấu ăn, món ăn đặc biệt.'],
        ['name' => 'Du Lịch', 'description' => 'Gợi ý điểm đến và mẹo du lịch an toàn.'],
        ['name' => 'Tài Chính Cá Nhân', 'description' => 'Hướng dẫn tiết kiệm và quản lý tài chính.'],
        ['name' => 'Tâm Lý & Cảm Hứng Sống', 'description' => 'Cải thiện tinh thần và tìm động lực sống.'],
    ];
    $selected_categories = array_column($choiceCategories, 'name');

    // Lấy ra danh sách các danh mục từ database
    $categories = Category::whereIn('name', $selected_categories)
        ->orderBy('created_at', 'DESC')
        ->take(value: 6)
        ->get();

    $posts_new = [];
    
    // Lấy bài viết mới nhất của từng danh mục
    foreach ($categories as $category) {
        $latest_post = Post::latest()
            ->approved()
            ->where('category_id', $category->id)
            ->take(1)
            ->get();

        if ($latest_post->isNotEmpty()) {
            $posts_new[] = $latest_post[0]; // Lấy bài viết đầu tiên
        }
    }

    return view('blog', [
        'categories' => $categories,
        'posts_new' => $posts_new,
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
