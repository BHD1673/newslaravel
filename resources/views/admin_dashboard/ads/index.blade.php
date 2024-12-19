@extends("admin_dashboard.layouts.app")

@section("wrapper")
<style>
    .order-actions {
    display: flex; /* Đảm bảo các phần tử nằm trên cùng một hàng */
    align-items: center; /* Căn giữa theo chiều dọc */
    gap: 10px; /* Khoảng cách giữa các nút */
}

.order-actions .btn {
    min-width: 50px; /* Đảm bảo các nút có cùng kích thước tối thiểu */
    text-align: center; /* Canh giữa nội dung nút */
    padding: 0px 0px; /* Thêm khoảng cách nội dung bên trong nút */
}

.order-actions .btn i {
    margin-right: 0px; /* Khoảng cách giữa icon và text trong nút */
}

</style>
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Ads</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Ads</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="position-relative">
                        <input type="text" class="form-control ps-5 radius-30" placeholder="Search ads">
                        <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                    </div>
                    <div class="ms-auto">
                        <a href="{{ route('admin.ads.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0">
                            <i class="bx bxs-plus-square"></i> Add New Ad
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Người Đặt</th>
                                <th>Title</th>
                                <th>Position</th>
                                <th>Status</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ads as $ad)
                            <tr>
                                <td>#{{ $ad->id }}</td>
                                <td>{{ $ad->user->name ?? 'N/A' }}</td> 
                                <td>{{ $ad->title }}</td>
                                <td>{{ $ad->position->position }}</td>
                                <td>
                                    <span class="badge bg-{{ $ad->status === 'active' ? 'success' : ($ad->status === 'pending' ? 'warning' : 'secondary') }}">
                                        {{ ucfirst($ad->status) }}
                                    </span>
                                </td>
                                <td>{{ $ad->start_time }}</td>
                                <td>{{ $ad->end_time }}</td>
                                <td>
                                    <div class="d-flex order-actions align-items-center">
                                        <!-- Nút sửa -->
                                        @if ($ad->status !== 'completed')
                                            <a href="{{ route('admin.ads.edit', $ad->id) }}" class="btn btn-sm btn-primary me-2">
                                                <i class='bx bxs-edit'></i> 
                                            </a>
                                        @endif
                                    
                                        <!-- Nút xóa -->
                                        @if (!in_array($ad->status, ['active', 'Running']))
                                            <a href="#" 
                                               class="btn btn-sm btn-danger"
                                               onclick="event.preventDefault(); document.querySelector('#delete_form_{{ $ad->id }}').submit();">
                                               <i class='bx bxs-trash'></i> 
                                            </a>
                                            <form method="post" action="{{ route('admin.ads.destroy', $ad->id) }}" id="delete_form_{{ $ad->id }}" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endif
                                    </div>                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
