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
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tất cả bài viết</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="position-relative">
                        <input type="text" class="form-control ps-5 radius-30" placeholder="Tìm kiếm bài viết"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                    </div>
                    <div class="ms-auto"><a href="{{ route('admin.posts.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0 {{ $isEmployee ? 'd-none' : '' }}"><i class="bx bxs-plus-square"></i>Thêm bài viết mới</a></div>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Mã bài viết</th>
                                <th>Tên bài viết</th>
                                <th>Mô tả</th>
                                <th>Danh mục</th>
                                <th>Ngày tạo</th>
                                <th>Trạng thái</th>
                                <th>Lượt xem</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">#P-{{ $post->id }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $post->title }}</td>


                                <td>{{ $post->excerpt }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <div class="p-2 px-3">
                                        @if($post->approved === 1)
                                        <span class="badge bg-warning text-dark">Chưa phê duyệt</span>
                                        @elseif($post->approved === 2)
                                        <span class="badge bg-danger">Từ chối</span>
                                        @elseif($post->approved === 3)
                                        <span class="badge bg-success">Bài viết đã được duyệt</span>
                                        @else
                                        <p>Trạng thái không xác định</p>
                                        @endif
                                    </div>
                                </td>
                                <td>{{ $post->views }}</td>

                                <td>
                                    <div class="d-flex order-actions">
                                        <a  href="{{ route('admin.posts.edit', $post)}}" ><i class='bx bxs-edit'></i></a>
                                        @if($post->approved === 1)
                                        <a href="#"onclick="event.preventDefault(); document.querySelector('#delete_form_{{ $post->id }}').submit();" class="ms-3 {{ $isEmployee ? 'd-none' : '' }}"><i class='bx bxs-trash'></i></a>
                                        @else
                                        <a href="#" onclick="return confirmDelete({{ $post->approved }}, {{ $post->id }});" class="ms-3 {{ $isEmployee ? 'd-none' : '' }}"><i class='bx bxs-trash'></i></a>
                                        @endif
                                        @if($post->approved === 2 )
                                        <a href="#" class="mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$post->id}}"><i class='bx bxs-x-circle'></i></a>
                                        @endif
                                        @if($isAdmin)
                                        <form method="post" action="{{ route('admin.post.softDelete', $post) }}" id="delete_form_{{ $post->id }}">
                                            @csrf
                                            @method('PUT')
                                        </form>
                                        @else
                                        <form method="post" action="{{ route('admin.posts.destroy', $post) }}" id="delete_form_{{ $post->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal_{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">LÝ DO TỪ CHỐI</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        @foreach ($postLog as $item)
                                            @if($item->post_id === $post->id)
                                                <p><b class="text-uppercase">{{ $item->role_log }}</b> : {{ $item->note }}</p>
                                                <p><b class="text-uppercase">Thời gian từ chối</b> : {{ $item->date_log }}</p>
                                            @endif
                                        @endforeach
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="mt-4">{{ $posts->links() }}</div>

            </div>
        </div>


    </div>
</div>
<!--end page wrapper -->
@endsection

@section("script")
<script>
    $(document).ready(function() {
        setTimeout(() => {
            $(".general-message").fadeOut();
        }, 5000);

    });

    function confirmDelete(status, postID) {
        return confirm(`Bài viết [ ${postID} ] đã  ${ status === 2 ? 'bị từ chối' : 'được phê duyệt'}. Bạn không thể chuyển bài vào thùng rác.`);
    }
</script>

@endsection