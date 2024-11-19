<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderStatus;

class AdminOrdersController extends Controller
{
    /**
     * Display a listing of orders.
     */
    public function index()
    {
        $orders = Order::with('user', 'orderItems.product', 'orderStatus')->paginate(10);
        return view('admin_dashboard.orders.index', compact('orders'));
    }

    /**
     * Display the specified order details.
     */
    public function show(string $id)
    {
        $order = Order::with('user', 'orderItems.product')->findOrFail($id);
        return view('admin_dashboard.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified order.
     */
    public function edit(string $id)
    {
        $order = Order::with('orderStatus')->findOrFail($id);
        $statuses = OrderStatus::all(); // Lấy tất cả trạng thái đơn hàng
        return view('admin_dashboard.orders.edit', compact('order', 'statuses')); // Đảm bảo biến được truyền vào view
    }

    /**
     * Update the specified order in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::findOrFail($id);
        $order->orderStatus()->associate($request->input('status')); // Cập nhật trạng thái
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Trạng thái đơn hàng đã được cập nhật.');
    }


    /**
     * Remove the specified order from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Đơn hàng đã được xóa thành công.');
    }
}
