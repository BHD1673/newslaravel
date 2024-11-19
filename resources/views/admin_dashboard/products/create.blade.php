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
                        <li class="breadcrumb-item active" aria-current="page">Thêm mới sản phẩm</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Thêm sản phẩm mới</h5>
                <hr />
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border border-3 p-4 rounded">
                                    <!-- Tên sản phẩm -->
                                    <div class="mb-3">
                                        <label for="inputProductName" class="form-label">Tên sản phẩm</label>
                                        <input type="text" name="name" value="{{ old('name') }}" required class="form-control" id="inputProductName" placeholder="Nhập tên sản phẩm">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Mô tả -->
                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label">Mô tả</label>
                                        <textarea name="description" required class="form-control" id="inputProductDescription" rows="3">{{ old('description') }}</textarea>
                                        @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Giá -->
                                    <div class="mb-3">
                                        <label for="inputProductPrice" class="form-label">Giá</label>
                                        <input type="number" name="price" value="{{ old('price') }}" required class="form-control" id="inputProductPrice" placeholder="Nhập giá sản phẩm">
                                        @error('price')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Giá cũ -->
                                    <div class="mb-3">
                                        <label for="inputOldPrice" class="form-label">Giá cũ</label>
                                        <input type="number" name="old_price" value="{{ old('old_price') }}" class="form-control" id="inputOldPrice" placeholder="Nhập giá cũ (nếu có)">
                                    </div>

                                    <!-- Tồn kho -->
                                    <div class="mb-3">
                                        <label for="inputProductStock" class="form-label">Hàng tồn kho</label>
                                        <input type="number" name="stock" value="{{ old('stock', 0) }}" required class="form-control" id="inputProductStock" placeholder="Nhập số lượng hàng tồn kho">
                                        <small class="form-text text-muted">Nếu hàng tồn kho bằng 0, sản phẩm sẽ không được kích hoạt.</small>
                                        @error('stock')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Hình ảnh sản phẩm -->
                                    <div class="mb-3">
                                        <label for="inputProductImage" class="form-label">Hình ảnh sản phẩm</label>
                                        <input type="file" name="image" required class="form-control" id="inputProductImage">
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Trạng thái sản phẩm -->
                                    <div class="mb-3">
                                        <label for="inputProductStatus" class="form-label">Trạng thái sản phẩm</label>
                                        <select name="product_status_id" required class="form-select" id="inputProductStatus">
                                            <option value="">Chọn trạng thái</option>
                                            <option value="1" {{ old('product_status_id') == 1 ? 'selected' : '' }}>Kích hoạt</option>
                                            <option value="2" {{ old('product_status_id') == 2 ? 'selected' : '' }}>Ngừng kích hoạt</option>
                                        </select>
                                        @error('product_status_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Danh mục sản phẩm -->
                                    <div class="mb-3">
                                        <label for="inputProductCategory" class="form-label">Danh mục sản phẩm</label>
                                        <select name="category_id" required class="form-select" id="inputProductCategory">
                                            <option value="">Chọn danh mục</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")
<script src="{{ asset('admin_dashboard_assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('admin_dashboard_assets/plugins/input-tags/js/tagsinput.js') }}"></script>
@endsection
