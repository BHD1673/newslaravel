@extends("admin_dashboard.layouts.app")
		
@section("wrapper")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Bài viết đã xóa</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tất cả bài viết đã xóa</li>
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
                                        <a href="{{ route('admin.posts.edit', $post)}}" class=""><i class='bx bxs-edit'></i></a>
                                        <a href="#" 
                                            onclick="event.preventDefault();
                                            if(confirm('Bạn có chắc chắn muốn xóa bài viết này ra thùng rác không?')) { 
                                                document.querySelector('#id_arrow_back_{{ $post->id }}').submit(); 
                                            }" 
                                            class="ms-3 ">
                                            <i class='bx bx-arrow-back'></i>
                                        </a>
                                        <a href="#" 
                                            onclick="event.preventDefault();
                                            if(confirm('Bạn có chắc chắn muốn xóa bài viết này vĩnh viễn không?')) { 
                                                document.querySelector('#delete_form_{{ $post->id }}').submit();
                                            }"
                                             class="ms-3 "><i class='bx bxs-trash'></i></a>
                                       
                                        <form method="post" action="{{ route('admin.posts.destroy', $post) }}" id="delete_form_{{ $post->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                        <form method="post" action="{{ route('admin.post.undoSoftDelete', $post) }}" id="id_arrow_back_{{ $post->id }}">
                                            @csrf
                                            @method('PUT')
                                        </form>
                                       
                                    </div>
                                </td>
                            </tr>
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
		$(document).ready(function () {
		setTimeout(()=>{
				$(".general-message").fadeOut();
		},5000);

		});
	</script>

@endsection
