@extends("admin_dashboard.layouts.app")

@section("wrapper")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Danh mục bài viết</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tất cả danh mục</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="position-relative">
                        <input type="text" class="form-control ps-5 radius-30" placeholder="Tìm kiếm danh mục">
                        <span class="position-absolute top-50 start-0 translate-middle-y ms-3"><i class="bx bx-search"></i></span>
                    </div>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary radius-30"><i class="bx bxs-plus-square"></i> Thêm danh mục mới</a>
                </div>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Tên danh mục</th>
                                <th>Người tạo</th>
                                <th>Xem chi tiết</th>
                                <th>Ngày tạo</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>#C-{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->user->name ?? 'Admin' }}</td>
                                    <td>
                                        <a href="{{ route('admin.categories.show', $category) }}" class="btn btn-sm btn-outline-info">Chi tiết</a>
                                    </td>
                                    <td>{{ $category->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-outline-primary me-2">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Không có danh mục nào được tìm thấy.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $categories->links() }}
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
        // Tự động ẩn thông báo sau 5 giây
        setTimeout(() => {
            $(".alert").fadeOut(300);
        }, 5000);
    });
</script>
@endsection
