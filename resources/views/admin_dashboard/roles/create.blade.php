@extends("admin_dashboard.layouts.app")
<<<<<<< HEAD
@section("style")
	<style>
		.permission{
			background-color: while;
			padding: 5px 10px;
			display: inline-block;
			font-size: 15px;
			margin: 2px 10px;
			cursor: pointer;
			color: green;
=======

@section("style")
	<style>
		.permission-table th,
		.permission-table td {
			text-align: center;
			vertical-align: middle;
>>>>>>> damquangthanh
		}
	</style>
@endsection

@section("wrapper")
<<<<<<< HEAD
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Phân quyền</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Thêm mới quyền</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Thêm quyền mới</h5>
					  <hr/>
					<form action="{{ route('admin.roles.store') }}" method="POST">
						@csrf

                       <div class="form-body mt-4">
							<div class="row">
								<div class="col-lg-12">
									<div class="border border-3 p-4 rounded">
										<div class="mb-3">
											<label for="inputProductTitle" class="form-label">Tên quyền</label>
											<input type="text" value=' {{ old("name" ) }}' name="name" required  class="form-control" id="inputProductTitle" placeholder="Nhập tiêu đề bài viết">
										
											@error('name')
												<p class="text-danger">{{ $message }}</p>
											@enderror
										</div>

										<div class="mb-3">
											<label for="inputProductTitle" class="form-label">Chức năng cho phép</label>
											
											<div class="row">

												@php 
													$the_count = count($permissions);
													$start = 0;
												@endphp
											
												@for($j = 1 ; $j <= 3; $j++) 
													@php 
														$end = round($the_count * ($j / 3) );
													@endphp

													<div class="col-md-4">
														@for($i = $start ; $i < $end ; $i++)
															<label class="permission">
																<input type="checkbox" name="permissions[]" value="{{ $permissions[$i]->id }}"></input>
																{{ $permissions[$i]->name}}
															</label>	
														@endfor
													</div>

													@php 
														$start = $end;
													@endphp
												@endfor

											</div>

										
										</div>

										<button class="btn btn-primary" type="submit">Thêm quyền mới</button>

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

			setTimeout(()=>{
					$(".general-message").fadeOut();
			},5000);

		});


	</script>

@endsection
=======
<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Phân quyền</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">Thêm mới quyền</li>
					</ol>
				</nav>
			</div>
		</div>
		<!--end breadcrumb-->

		<div class="card">
			<div class="card-body p-4">
				<h5 class="card-title">Thêm quyền mới</h5>
				<hr/>
				<form action="{{ route('admin.roles.store') }}" method="POST">
					@csrf

					<div class="form-body mt-4">
						<div class="row">
							<div class="col-lg-12">
								<div class="border border-3 p-4 rounded">
									<div class="mb-3">
										<label for="inputRoleName" class="form-label">Tên quyền</label>
										<input type="text" value="{{ old('name') }}" name="name" required class="form-control" id="inputRoleName" placeholder="Nhập tên quyền">
										@error('name')
											<p class="text-danger">{{ $message }}</p>
										@enderror
									</div>

									<div class="mb-3">
										<label for="permissions" class="form-label">Chức năng cho phép</label>
										<div class="table-responsive">
											<table class="table table-bordered permission-table">
												<thead>
													<tr>
														<th>Chọn</th>
														<th>Mã quyền</th>
														<th>Tên quyền</th>
														<th>Mô tả</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($permissions as $permission)
													<tr>
														<td>
															<input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
														</td>
														<td>#{{ $permission->id }}</td>
														<td>{{ $permission->name }}</td>
														<td>{{ $permission->description ?? 'Không có mô tả' }}</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>

									<button class="btn btn-primary" type="submit">Thêm quyền mới</button>
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
		setTimeout(() => {
			$(".general-message").fadeOut();
		}, 5000);
	});
</script>
@endsection
>>>>>>> damquangthanh
