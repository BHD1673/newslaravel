@extends("admin_dashboard.layouts.app")

@section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Bài viết</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm mới bài viết</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Thêm bài viết mới</h5>
                    <hr/>

                    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <!-- Tiêu đề bài viết -->
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Tiêu đề bài viết</label>
                                            <input type="text" name="title" value="{{ old('title') }}" required class="form-control" id="title" placeholder="Nhập tiêu đề bài viết">
                                            @error('title')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Slug -->
                                        <div class="mb-3">
                                            <label for="slug" class="form-label">Slug</label>
                                            <input type="text" name="slug" value="{{ old('slug') }}" required class="form-control" id="slug" placeholder="Nhập slug">
                                            @error('slug')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Mô tả ngắn -->
                                        <div class="mb-3">
                                            <label for="excerpt" class="form-label">Mô tả ngắn</label>
                                            <textarea name="excerpt" required class="form-control" id="excerpt" placeholder="Nhập mô tả ngắn">{{ old('excerpt') }}</textarea>
                                            @error('excerpt')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Danh mục -->
                                        <div class="mb-3">
                                            <label for="category_id" class="form-label">Danh mục</label>
                                            <select name="category_id" required class="form-control" id="category_id">
                                                <option value="">Chọn danh mục</option>
                                                @foreach($categories as $id => $name)
                                                    <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Ảnh Thumbnail -->
                                        <div class="mb-3">
                                            <label for="thumbnail" class="form-label">Ảnh thumbnail</label>
                                            <input type="file" name="thumbnail" class="form-control-file" id="thumbnail" accept="image/*">
                                            @error('thumbnail')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Nội dung bài viết -->
                                        <div class="mb-3">
                                            <label for="body" class="form-label">Nội dung bài viết</label>
                                            <textarea name="body" required class="form-control" id="body" rows="10" placeholder="Nhập nội dung bài viết">{{ old('body') }}</textarea>
                                            @error('body')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Tags -->
                                        <div class="mb-3">
                                            <label for="tags" class="form-label">Tags (các tag cách nhau bằng dấu phẩy)</label>
                                            <input type="text" name="tags" class="form-control" id="tags" value="{{ old('tags') }}">
                                            @error('tags')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Duyệt bài viết -->
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" name="approved" class="form-check-input" id="approved" value="1" {{ old('approved') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="approved">Duyệt bài viết</label>
                                            </div>
                                        </div>

                                        <!-- Nút thêm bài viết -->
                                        <div class="text-end">
                                            <button class="btn btn-primary" type="submit">Lưu bài viết</button>
                                            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Hủy bỏ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section("script")
    <script>
        $(document).ready(function () {
            // Ẩn thông báo sau 5 giây
            setTimeout(() => {
                $(".alert").fadeOut(300);
            }, 5000);
        });

        // Tự động tạo slug khi nhập tiêu đề
        document.getElementById('title').addEventListener('input', function() {
            var title = this.value;
            fetch("{{ route('admin.posts.to_slug') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ title: title })
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('slug').value = data.message;
            });
        });
    </script>
@endsection
