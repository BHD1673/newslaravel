@extends("admin_dashboard.layouts.app")

@section("wrapper")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Ads Positions</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Positions</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        
        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="position-relative">
                        <input type="text" class="form-control ps-5 radius-30" placeholder="Search positions"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                    </div>
                    <div class="ms-auto"><a href="{{ route('admin.ads_position.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New Position</a></div>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Position</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($positions as $position)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">#P-{{ $position->id }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $position->position }}</td>
                                <td>{{ $position->price }}</td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="{{ route('admin.ads_position.edit', $position->id) }}" class=""><i class='bx bxs-edit'></i></a>
                                        <a href="#" onclick="event.preventDefault(); document.querySelector('#delete_form_{{ $position->id }}').submit();" class="ms-3"><i class='bx bxs-trash'></i></a>

                                        <form method="post" action="{{ route('admin.ads_position.destroy', $position->id) }}" id="delete_form_{{ $position->id }}">
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
