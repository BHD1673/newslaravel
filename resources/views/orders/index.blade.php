@extends('main_layouts.master')

@section('title', 'Đơn hàng của tôi')

@section('content')
<div class="container">
    <h1>Đơn hàng của tôi</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($orders->isEmpty())
        <p>Bạn chưa có đơn hàng nào.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Mã Đơn hàng</th>
                    <th>Ảnh</th>
                    <th>Tổng giá</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>#O-{{ $order->id }}</td>
                        <td>
                            @if($order->orderItems->isNotEmpty())
                                <img width="100" height="150" src="{{ asset('images/products/' . basename($order->orderItems->first()->product->image)) }}" alt="{{ $order->orderItems->first()->product->image }}">
                            @else
                                <span>Không có ảnh</span>
                            @endif
                        </td>
                        <td>{{ number_format($order->total_price, 0, ',', '.') }} VNĐ</td>
                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                        <td>{{ $order->orderStatus ? $order->orderStatus->status : 'Không xác định' }}</td>
                        <td>
                            @if($order->orderStatus && $order->orderStatus->status === 'Đang xử lý') <!-- Trạng thái đang xử lý -->
                                <form action="{{ route('orders.cancel', $order->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?');">Hủy đơn hàng</button>
                                </form>
                            @elseif($order->orderStatus && $order->orderStatus->status === 'Hoàn thành')
                                <span>Đơn hàng đã hoàn thành</span>
                            @elseif($order->orderStatus && $order->orderStatus->status === 'Đang vận chuyển')
                                <span>Đơn hàng đang giao</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">{{ $orders->links() }}</div>
    @endif
</div>
@endsection
