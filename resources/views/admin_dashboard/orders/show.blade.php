@extends("admin_dashboard.layouts.app")

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Chi tiết Đơn hàng</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Tất cả đơn hàng</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng #O-{{ $order->id }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="mb-4">Thông tin đơn hàng</h5>
                <p><strong>Mã Đơn hàng:</strong> #O-{{ $order->id }}</p>
                <p><strong>Tên Khách hàng:</strong> {{ $order->user->name }}</p>
                <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
                <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
<<<<<<< HEAD
=======
                <p><strong>Phương Thức Thanh toán:</strong> {{ $order->payment_method }}</p>
>>>>>>> master
                <p><strong>Tổng giá:</strong> {{ number_format($order->total_price, 0, ',', '.') }} VNĐ</p>
                <p><strong>Ngày tạo:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                
                <h5 class="mt-4">Sản phẩm trong đơn hàng</h5>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('images/products/' . basename($item->product->image)) }}" alt="{{ $item->product->name }}" style="width: 50px; height: auto;" class="me-2">
                                        {{ $item->product->name }}
                                    </div>
                                </td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price, 0, ',', '.') }} VNĐ</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Trở về danh sách đơn hàng</a>
                    <button onclick="window.print();" class="btn btn-primary ms-2">In thông tin đơn hàng</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @media print {
        .page-wrapper {
            display: block;
        }

        .page-breadcrumb,
        .btn {
            display: none; /* Ẩn breadcrumb và nút */
        }

        .card {
            margin: 0; /* Loại bỏ khoảng cách */
            box-shadow: none; /* Loại bỏ bóng */
        }

        body {
            margin: 0;
            padding: 20px; /* Thêm padding cho nội dung khi in */
            font-size: 12pt; /* Đặt kích thước chữ cho dễ đọc khi in */
        }
    }
</style>
@endsection
