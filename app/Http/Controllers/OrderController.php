<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the user's orders.
     */
    public function index()
    {
        $orders = Order::with('orderItems.product')->where('user_id', auth()->id())->paginate(10);
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 63227c6da74f74aaded2bbfc04e4e2d1299f3afb
        $orders = Order::with('orderItems.product.category')  // Eager load category của product
        ->where('user_id', auth()->id())
        ->paginate(10);

<<<<<<< HEAD
>>>>>>> damquangthanh
=======
>>>>>>> 63227c6da74f74aaded2bbfc04e4e2d1299f3afb
        return view('orders.index', compact('orders'));
    }
    public function cancel($id)
    {
        // Tìm đơn hàng theo ID
        $order = Order::findOrFail($id);

        // Kiểm tra xem đơn hàng có thuộc về người dùng đang đăng nhập không
        if ($order->user_id !== auth()->id()) {
            abort(403); // Không có quyền truy cập
        }

        // Thực hiện hủy đơn hàng
        $order->delete(); // Hoặc cập nhật trạng thái đơn hàng nếu cần

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được hủy thành công.');
    }
    /**
     * Display the specified order details.
     */
    public function show(Order $order) {}
}
