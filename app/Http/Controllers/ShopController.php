<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        // Lấy danh mục "Chưa phân loại"
        $category_unclassified = Category::where('name', 'Chưa phân loại')->first();

        // Lấy tối đa 10 danh mục, trừ danh mục "Chưa phân loại"
        $categories = Category::where('name', '!=', 'Chưa phân loại')
            ->orderBy('created_at', 'DESC')
            ->take(10)
            ->get();

        // Lấy các bài viết mới nhất trong các danh mục khác nhau, trừ danh mục "Chưa phân loại"
        $posts_new = [];
        $exclude_categories = [$category_unclassified->id];

        for ($i = 0; $i < 4; $i++) {
            $posts_new[$i] = Post::latest()->approved()
                ->whereNotIn('category_id', $exclude_categories)
                ->take(1)->get();

            if ($posts_new[$i]->isNotEmpty()) {
                $exclude_categories[] = $posts_new[$i][0]->category->id; // Thêm ID danh mục vào danh sách loại trừ
            }
        }

        // Lấy tất cả sản phẩm
        $products = Product::all();

        // Trả về view 'shop.index' với các dữ liệu cần thiết
        return view('shop.index', [
            'categories' => $categories,
            'posts_new' => $posts_new,
            'products' => $products,
        ]);
    }
    public function show($id)
    {
        // Lấy sản phẩm theo ID
        $product = Product::findOrFail($id);

        // Lấy danh mục (nếu cần sử dụng trong master layout)
        $categories = Category::where('name', '!=', 'Chưa phân loại')
            ->orderBy('created_at', 'DESC')
            ->take(10)
            ->get();

        // Lấy bài viết mới (nếu cần thiết cho view này)
        $posts_new = [];
        $exclude_categories = []; // hoặc bạn có thể giữ danh sách ID để loại trừ

        for ($i = 0; $i < 4; $i++) {
            $posts_new[$i] = Post::latest()->approved()
                ->whereNotIn('category_id', $exclude_categories)
                ->take(1)->get();

            if ($posts_new[$i]->isNotEmpty()) {
                $exclude_categories[] = $posts_new[$i][0]->category->id; // Thêm ID danh mục vào danh sách loại trừ
            }
        }

        return view('shop.show', [
            'product' => $product,
            'categories' => $categories, // Truyền biến categories
            'posts_new' => $posts_new, // Truyền biến posts_new
        ]);
    }
}
