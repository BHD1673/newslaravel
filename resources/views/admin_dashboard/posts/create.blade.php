@extends("admin_dashboard.layouts.app")
@section("style")
    <link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_dashboard_assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
    
    <!-- Bạn có thể thêm hoặc thay đổi các thẻ CSS khác nếu cần -->
@endsection

@section("wrapper")
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
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Tiêu đề bài viết</label>
                                            <input type="text" value="{{ old('title') }}" name="title" required class="form-control inputPostTitle" id="inputProductTitle" placeholder="Nhập tiêu đề bài viết">
                                            @error('title')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputSlug" class="form-label">Slug - liên kết</label>
                                            <input type="text" value="{{ old('slug') }}" name="slug" required class="slugPost form-control" id="inputSlug" placeholder="Nhập slug">
                                            @error('slug')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Mô tả</label>
                                            <textarea required name="excerpt" class="form-control" id="inputProductDescription" rows="3">{{ old('excerpt') }}</textarea>
                                            @error('excerpt')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputCategory" class="form-label">Danh mục bài viết</label>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="p-3 rounded">
                                                        <div class="mb-3">
                                                            <select name="category_id" required class="single-select">
                                                                @foreach($categories as $key => $category)
                                                                    <option value="{{ $key }}">{{ $category }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('category_id')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Từ khóa</label>
                                            <input type="text" class="form-control" name="tags" data-role="tagsinput">
                                        </div>

                                        <div class="mb-3">
                                            <label for="thumbnail" class="form-label">Hình ảnh bài viết</label>
                                            <input id="thumbnail" name="thumbnail" type="file" required class="form-control">
                                            @error('thumbnail')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Nội dung bài viết</label>
                                            <textarea name="body" id="post_content" class="form-control" rows="3">{{ old('body') }}</textarea>
                                            @error('body')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <button class="btn btn-primary" type="submit">Thêm bài viết</button>
                                    </div>
                                </div>
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
    <script src="https://cdn.tiny.cloud/1/5nk94xe9fcwk22fkp6gou9ymszwidnujnr2mu3n3xe2biap3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        $(document).ready(function () {
            $('.single-select').select2({
                theme: 'bootstrap4',
                width: '100%',
                placeholder: 'Chọn danh mục',
                allowClear: true
            });

            tinymce.init({
                selector: '#post_content',
                plugins: 'advlist autolink lists link image media charmap preview anchor pagebreak',
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code | rtl ltr',
                height: 500,
                image_title: true,
                automatic_uploads: true,
                images_upload_handler: function(blobinfo, success, failure) {
                    let formData = new FormData();
                    formData.append('_token', $("input[name='_token']").val());
                    formData.append('file', blobinfo.blob(), blobinfo.filename());

                    $.ajax({
                        url: "{{ route('admin.upload_tinymce_image') }}",
                        data: formData,
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if(response.location) {
                                success(response.location);
                            } else {
                                failure("Không thể tải ảnh lên.");
                            }
                        },
                        error: function() {
                            failure("Lỗi server khi tải ảnh.");
                        }
                    });
                }
            });

            // Tự động tạo Slug khi nhập tiêu đề
            $(document).on('change', '.inputPostTitle', function (e) {
                e.preventDefault();

                let title = $(this).val();
                let csrf_token = $("input[name='_token']").val();
                let formData = new FormData();
                formData.append('_token', csrf_token);
                formData.append('title', title);

                $.ajax({
                    url: "{{ route('admin.posts.to_slug') }}",
                    data: formData,
                    type: 'POST',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data.success) {
                            $('.slugPost').val(data.message);
                        } else {
                            alert("Bị lỗi khi nhập title!");
                        }
                    }
                });
            });
        });
    </script>
@endsection
