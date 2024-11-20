<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\ProductCategory;

class ShopController extends Controller
{
    public function index()
    {
        // Lấy danh mục "Chưa phân loại"
        $category_unclassified = Category::where('name', 'Chưa phân loại')->first();
        $productCategories = ProductCategory::withCount('products')->get();
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
        $tags = Tag::all();
        // Lấy tất cả sản phẩm
        $products = Product::all();
        if (Auth::check()) {
            // Lấy các sản phẩm yêu thích của người dùng
            $wishlists = Wishlist::where('user_id', Auth::id())
                ->with('product') // Tải sản phẩm liên quan
                ->get();
        } else {
            $wishlists = collect(); // Nếu người dùng chưa đăng nhập, trả về collection trống
        }


        // Trả về view 'shop.index' với các dữ liệu cần thiết
        return view('shop.index', [
            'categories' => $categories,
            'posts_new' => $posts_new,
            'products' => $products,
            'wishlists' => $wishlists,
            'tags' => $tags,
            'productCategories' => $productCategories

        ]);
    }
    public function show($id)
    {
        // Lấy sản phẩm theo ID
        $product = Product::findOrFail($id);
        $productCategories = ProductCategory::withCount('products')->get();
        // Lấy danh mục của sản phẩm từ bảng product_category
        $categoryName = $product->productCategory ? $product->productCategory->name : 'Chưa phân loại';
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id) // Loại bỏ sản phẩm hiện tại
            ->limit(6) // Giới hạn số lượng sản phẩm liên quan
            ->get();

        // Truyền sản phẩm và danh mục vào view
        return view('shop.show', [
            'product' => $product,
            'categoryName' => $categoryName,  // Truyền tên danh mục
            'relatedProducts' => $relatedProducts,
            'productCategories' => $productCategories
        ]);
    }
}