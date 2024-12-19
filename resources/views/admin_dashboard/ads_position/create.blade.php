@extends("admin_dashboard.layouts.app")

@section("wrapper")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Create Ads Position</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create Position</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create New Position</h5>
                <form action="{{ route('admin.ads_position.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" name="position" id="position" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" id="price" class="form-control" step="0.01" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
@endsection