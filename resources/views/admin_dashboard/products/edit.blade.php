@extends("admin_dashboard.layouts.app")

@section("style")
<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_dashboard_assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
@endsection

@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <!-- Breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Sản phẩm</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa sản phẩm</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Chỉnh sửa sản phẩm</h5>
                <hr />
                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">
                                    <!-- Tên sản phẩm -->
                                    <div class="mb-3">
                                        <label for="inputProductName" class="form-label">Tên sản phẩm</label>
                                        <input type="text" name="name" value="{{ old('name', $product->name) }}" required class="form-control" id="inputProductName" placeholder="Nhập tên sản phẩm">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Mô tả -->
                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label">Mô tả</label>
                                        <textarea name="description" required class="form-control" id="inputProductDescription" rows="3">{{ old('description', $product->description) }}</textarea>
                                        @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Giá -->
                                    <div class="mb-3">
                                        <label for="inputProductPrice" class="form-label">Giá</label>
                                        <input type="number" name="price" value="{{ old('price', $product->price) }}" required class="form-control" id="inputProductPrice" placeholder="Nhập giá sản phẩm">
                                        @error('price')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Giá cũ -->
                                    <div class="mb-3">
                                        <label for="inputOldPrice" class="form-label">Giá cũ</label>
                                        <input type="number" name="old_price" value="{{ old('old_price', $product->old_price) }}" class="form-control" id="inputOldPrice" placeholder="Nhập giá cũ (nếu có)">
                                    </div>

                                    <!-- Tồn kho -->
                                    <div class="mb-3">
                                        <label for="inputProductStock" class="form-label">Hàng tồn kho</label>
                                        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" required class="form-control" id="inputProductStock" placeholder="Nhập số lượng hàng tồn kho">
                                        @error('stock')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Trạng thái sản phẩm -->
                                    <div class="mb-3">
                                        <label for="product_status_id" class="form-label">Trạng thái sản phẩm</label>
                                        <select name="product_status_id" id="product_status_id" required class="form-control">
                                            <option value="">Chọn trạng thái</option>
                                            <option value="1" {{ old('product_status_id', $product->product_status_id) == 1 ? 'selected' : '' }}>Kích hoạt</option>
                                            <option value="2" {{ old('product_status_id', $product->product_status_id) == 2 ? 'selected' : '' }}>Không kích hoạt</option>
                                        </select>
                                        @error('product_status_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Hình ảnh sản phẩm -->
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Hình ảnh sản phẩm</label>
                                        <input id="image" name="image" type="file" class="form-control">
                                        <img src="{{ asset($product->image) }}" alt="Product Image" class="mt-2" style="max-width: 200px;">
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Danh mục sản phẩm -->
                                    <div class="mb-3">
                                        <label for="product_category_id" class="form-label">Danh mục sản phẩm</label>
                                        <select name="product_category_id" id="product_category_id" required class="form-control">
                                            <option value="">Chọn danh mục</option>
                                            @foreach ($productCategories as $category)
                                                <option value="{{ $category->id }}" {{ old('product_category_id', $product->product_category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('product_category_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <button class="btn btn-primary" type="submit">Cập nhật sản phẩm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- End Page Wrapper -->
@endsection

@section("script")
<script src="{{ asset('admin_dashboard_assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('admin_dashboard_assets/plugins/input-tags/js/tagsinput.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.single-select').select2({
            theme: 'bootstrap4',
            width: '100%',
            placeholder: 'Chọn danh mục',
            allowClear: true,
        });
    });
</script>
@endsection