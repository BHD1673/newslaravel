<?php
namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // Thêm sản phẩm vào wishlist
    public function index()
    {
        // Kiểm tra nếu người dùng đã đăng nhập
        if (Auth::check()) {
            // Lấy các sản phẩm yêu thích của người dùng
            $wishlists = Wishlist::where('user_id', Auth::id())
                ->with('product') // Tải sản phẩm liên quan
                ->get();
        } else {
            $wishlists = collect(); // Nếu người dùng chưa đăng nhập, trả về collection trống
        }

        // Trả về view shop.index với dữ liệu wishlists
        return view('shop.list', compact('wishlists'));
    }

    public function addToWishlist($productId)
    {
        // Kiểm tra xem sản phẩm đã có trong danh sách yêu thích chưa
        $existingWishlistItem = Wishlist::where('user_id', Auth::id())
                                        ->where('product_id', $productId)
                                        ->first();

        if ($existingWishlistItem) {
            return redirect()->back()->with('error', 'Sản phẩm đã có trong danh sách yêu thích.');
        }

        // Thêm sản phẩm vào wishlist
        Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $productId
        ]);

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào danh sách yêu thích.');
    }

    // Xóa sản phẩm khỏi wishlist
    public function removeFromWishlist($productId)
    {
        $wishlistItem = Wishlist::where('user_id', Auth::id())
                                ->where('product_id', $productId)
                                ->first();

        if ($wishlistItem) {
            $wishlistItem->delete();
            return redirect()->back()->with('success', 'Sản phẩm đã bị xóa khỏi danh sách yêu thích.');
        }

        return redirect()->back()->with('error', 'Sản phẩm không có trong danh sách yêu thích.');
    }

    // Xem danh sách sản phẩm yêu thích của người dùng
}
