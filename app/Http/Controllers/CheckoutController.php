<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // Hiển thị trang checkout
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())->with('items.product')->first();
        return view('checkout.index', compact('cart'));
    }

    // Xử lý thanh toán
    public function processCheckout(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $cart = Cart::where('user_id', Auth::id())->with('items.product')->first();

        // Tính tổng tiền
        $totalAmount = $cart->items->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        // Kiểm tra trạng thái còn hàng của các sản phẩm trong giỏ và số lượng
        foreach ($cart->items as $item) {
            if ($item->product->stock < $item->quantity) {
                return redirect()->back()->with('error', "Product {$item->product->name} does not have enough stock.");
            }
        }

        // Tạo đơn hàng
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $totalAmount,
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
        ]);

        // Thêm các sản phẩm vào bảng order_items và cập nhật stock
        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);

            // Giảm số lượng stock của sản phẩm
            $product = $item->product;
            $product->stock -= $item->quantity;
            $product->save();
        }

        // Xóa giỏ hàng sau khi thanh toán thành công
        $cart->items()->delete();

        return redirect()->route('orders.index')->with('success', 'Payment successful! Your order has been placed.');
    }
}
