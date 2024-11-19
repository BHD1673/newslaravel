<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Hiển thị giỏ hàng
    public function index()
<<<<<<< HEAD
    {
        $cart = Cart::where('user_id', Auth::id())->with('items.product')->first();
        return view('cart.index', compact('cart'));
    }
=======
{
    // Lấy giỏ hàng của người dùng hiện tại, kèm theo thông tin sản phẩm và danh mục
    $cart = Cart::where('user_id', Auth::id())
                ->with(['items.product.productCategory']) // Lấy danh mục từ bảng product_category
                ->first();

    return view('cart.index', compact('cart'));
}

>>>>>>> master

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId); // Tìm sản phẩm
        $user = Auth::user(); // Lấy người dùng hiện tại

        // Lấy giỏ hàng của người dùng hoặc tạo mới nếu chưa có
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        // Lấy số lượng từ request, nếu không có thì mặc định là 1
        $quantity = $request->input('quantity', 1);

        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
        $cartItem = $cart->items()->where('product_id', $product->id)->first();

        if ($cartItem) {
            // Nếu sản phẩm đã tồn tại, tăng số lượng thêm theo số lượng yêu cầu
            $cartItem->quantity += $quantity;
            $cartItem->save(); // Lưu lại số lượng mới
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới với số lượng yêu cầu
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->price
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function updateCart(Request $request, $itemId)
    {
        $cartItem = CartItem::findOrFail($itemId);
        $newQuantity = $request->input('quantity');

        // Kiểm tra nếu số lượng lớn hơn 0, thì cập nhật. Ngược lại, xóa sản phẩm khỏi giỏ hàng.
        if ($newQuantity > 0) {
            $cartItem->quantity = $newQuantity;
            $cartItem->save();
        } else {
            $cartItem->delete();
        }

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }


    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart($itemId)
    {
        $cartItem = CartItem::findOrFail($itemId);
        $cartItem->delete();

        return redirect()->back()->with('success', 'Product removed from cart!');
    }
    public function updateAllCart(Request $request)
{
    // Lấy giỏ hàng của người dùng hiện tại
    $cart = Cart::where('user_id', Auth::id())->first();

    // Kiểm tra xem có giỏ hàng không
    if ($cart) {
        // Lặp qua tất cả các sản phẩm trong giỏ hàng
        foreach ($request->input('quantities', []) as $itemId => $quantity) {
            $cartItem = CartItem::find($itemId);
            if ($cartItem) {
                // Kiểm tra nếu số lượng lớn hơn 0, thì cập nhật. Ngược lại, xóa sản phẩm khỏi giỏ hàng.
                if ($quantity > 0) {
                    $cartItem->quantity = $quantity;
                    $cartItem->save();
                } else {
                    $cartItem->delete();
                }
            }
        }
    }

    return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
}

}