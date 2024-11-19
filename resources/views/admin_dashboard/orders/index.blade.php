@extends("admin_dashboard.layouts.app")

@section("wrapper")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Đơn hàng</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tất cả đơn hàng</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <!-- Hiển thị thông báo thành công -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Hiển thị thông báo lỗi -->
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="position-relative">
                        <input type="text" class="form-control ps-5 radius-30" placeholder="Tìm kiếm đơn hàng"> 
                        <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Mã Đơn hàng</th>
                                <th>Sản phẩm</th> 
                                <th>Tên Khách hàng</th>
                                <th>Địa chỉ</th>
<<<<<<< HEAD
=======
                                <th>Phương thức thanh toán</th>
>>>>>>> master
                                <th>Số điện thoại</th>
                                <th>Số lượng</th>
                                <th>Tổng giá</th>
                                <th>Ngày tạo</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                              <td>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                    </div>
                                    #O-{{ $order->id }}
                                </div>
                            </td>
                               
                                <td>
                                  @foreach ($order->orderItems as $item) <!-- Lặp qua các sản phẩm -->
                                      <div class="d-flex align-items-center">
                                        <img src="{{ asset('images/products/' . basename($item->product->image)) }}" alt="{{ $item->product->name }}" style="width: 100px; height: auto;">
                                      </div>
                                  @endforeach
                              </td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->address }}</td>
<<<<<<< HEAD
                                <td>{{ $order->phone }}</td>
                                <td>    <span>{{ $item->product->name }} (x{{ $item->quantity }})</span> <!-- Hiển thị tên sản phẩm và số lượng -->
=======
                                <td>{{ $order->payment_method }}</td>
                                <td>{{ $order->phone }}</td>
                               
                                <td>   @foreach ($order->orderItems as $item)
                                      <span>{{ $item->product->name }} (x{{ $item->quantity }})</span> <!-- Hiển thị tên sản phẩm và số lượng -->
                                      @endforeach
>>>>>>> master
                                </td>
                                <td>{{ number_format($order->total_price, 0, ',', '.') }} VNĐ</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                  @if($order->orderStatus)
                                      <div class="badge rounded-pill 
                                          @if($order->orderStatus->status === 'Hoàn thành') 
                                              {{ 'text-success bg-light-success' }} 
                                          @elseif($order->orderStatus->status === 'Đang vận chuyển') 
                                              {{ 'text-warning bg-light-warning' }} 
                                          @elseif($order->orderStatus->status === 'Đang xử lý') 
                                              {{ 'text-danger bg-light-danger' }} 
                                          @endif 
                                          p-2 text-uppercase px-3">
                                          <i class='bx bxs-circle me-1'></i>{{ ucfirst($order->orderStatus->status) }}
                                      </div>
                                  @else
                                      <div class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3">
                                          <i class='bx bxs-circle me-1'></i>Không xác định
                                      </div>
                                  @endif
                              </td>
                              
                              
                              
                               
                                <td>
                                    <div class="d-flex order-actions">
                                      <a href="{{ route('admin.orders.show', $order) }}" class="text-info"><i class='bx bxs-detail'></i></a>
                                        <a href="{{ route('admin.orders.edit', $order) }}" class="ms-3 text-warning"><i class='bx bxs-edit'></i></a>
                                        <a href="#" onclick="event.preventDefault(); document.querySelector('#delete_form_{{ $order->id }}').submit();" class="ms-3 text-danger"><i class='bx bxs-trash'></i></a>

                                        <form method="POST" action="{{ route('admin.orders.destroy', $order) }}" id="delete_form_{{ $order->id }}" style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">{{ $orders->links() }}</div>

            </div>
        </div>

    </div>
</div>
<!--end page wrapper -->
@endsection

@section("script")
<script>
    $(document).ready(function () {
        setTimeout(() => {
            $(".alert").fadeOut();
        }, 5000);
    });
</script>
@endsection
