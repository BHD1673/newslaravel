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
                <!-- Hiển thị thông báo -->
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="position-relative">
                        <input type="text" class="form-control ps-5 radius-30" placeholder="Tìm kiếm sản phẩm">
                        <span class="position-absolute top-50 start-0 translate-middle-y ms-3"><i class="bx bx-search"></i></span>
                    </div>
                    <div>
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary radius-30"><i class="bx bxs-plus-square"></i> Thêm sản phẩm mới</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Mô tả</th>
                                <th>Giá cũ</th>
                                <th>Giá</th>
                                <th>Ngày tạo</th>
                                <th>Danh mục</th>
                                <th>Trạng thái</th>
                                <th>Tồn kho</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>#P-{{ $product->id }}</td>
                                    <td>
                                        <img src="{{ asset('images/products/' . basename($product->image)) }}" alt="{{ $product->name }}" style="width: 70px; height: auto;">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        @if($product->old_price)
                                            <del>{{ number_format($product->old_price, 0, ',', '.') }} VND</del>
                                        @else
                                            Không có
                                        @endif
                                    </td>
                                    <td>{{ number_format($product->price, 0, ',', '.') }} VND</td>
                                    <td>{{ $product->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $product->productCategory->name ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge {{ $product->status === 'activate' ? 'bg-success' : 'bg-danger' }}">
                                            {{ $product->status === 'activate' ? 'Kích hoạt' : 'Ngừng kích hoạt' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge {{ $product->stock > 0 ? 'bg-success' : 'bg-danger' }}">
                                            {{ $product->stock > 0 ? 'Còn hàng' : 'Hết hàng' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-primary me-2"><i class="bx bx-edit"></i></a>
                                            <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bx bx-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" class="text-center">Không có sản phẩm nào.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $products->links() }}
                </div>

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
            $(".alert").fadeOut(300);
        }, 5000);
    });
</script>
@endsection
