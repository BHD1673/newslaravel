@extends("admin_dashboard.layouts.app")

@section("wrapper")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Sản phẩm</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tất cả sản phẩm</li>
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
                        <input type="text" class="form-control ps-5 radius-30" placeholder="Tìm kiếm sản phẩm"> 
                        <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                    </div>
                    <div class="ms-auto">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Thêm sản phẩm mới</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Mô tả</th>
                                <th>Giá cũ</th>
                                <th>Giá</th>
                                <th>Ngày tạo</th>
<<<<<<< HEAD
=======
                                <th>Danh mục</th> <!-- Thêm cột "Danh mục" -->
>>>>>>> damquangthanh
                                <th>Trạng thái</th>
                                <th>Tồn kho</th> <!-- Đổi tên cột -->
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">#P-{{ $product->id }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <img src="{{ asset('images/products/' . basename($product->image)) }}" alt="{{ $product->name }}" style="width: 100px; height: auto;">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>
                                    @if($product->old_price)
                                        <span style="text-decoration: line-through;">{{ number_format($product->old_price, 0, ',', '.') }} VND</span>
                                    @else
                                        Không có
                                    @endif
                                </td>
                                <td>{{ number_format($product->price, 0, ',', '.') }} VND</td>
<<<<<<< HEAD
                                <td>{{ $product->created_at->format('d/m/Y') }}</td>
=======
                                <td>
                                    {{ $product->created_at ? $product->created_at->format('d/m/Y') : 'N/A' }}
                                </td>
                                <td>{{ $product->productCategory->name ?? 'N/A' }}</td> <!-- Hiển thị tên danh mục -->
>>>>>>> damquangthanh
                                <td>
                                    @if($product->status)
                                        <div class="badge rounded-pill @if($product->status->status === 'activate') {{ 'text-success bg-light-success' }} @else {{ 'text-danger bg-light-danger' }} @endif p-2 text-uppercase px-3">
                                            <i class='bx bxs-circle me-1'></i>{{ $product->status->status === 'activate' ? 'Kích hoạt' : 'Ngừng kích hoạt' }}
                                        </div>
                                    @else
                                        <div class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3">
                                            <i class='bx bxs-circle me-1'></i>Không xác định
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="badge rounded-pill @if($product->stock > 0) {{ 'text-success bg-light-success' }} @else {{ 'text-danger bg-light-danger' }} @endif p-2 text-uppercase px-3">
                                        <i class='bx bxs-circle me-1'></i>{{ $product->stock > 0 ? 'Còn hàng' : 'Hết hàng' }}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="{{ route('admin.products.edit', $product) }}" class="text-primary"><i class='bx bxs-edit'></i></a>
                                        <a href="#" onclick="event.preventDefault(); document.querySelector('#delete_form_{{ $product->id }}').submit();" class="ms-3 text-danger"><i class='bx bxs-trash'></i></a>

                                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}" id="delete_form_{{ $product->id }}" style="display:none;">
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

                <div class="mt-4">{{ $products->links() }}</div>

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
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> damquangthanh
