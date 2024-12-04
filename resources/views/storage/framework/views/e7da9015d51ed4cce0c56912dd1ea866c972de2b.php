<?php $__env->startSection("style"); ?>
	
	<link href="<?php echo e(asset('admin_dashboard_assets/plugins/select2/css/select2.min.css')); ?>" rel="stylesheet" />
	<link href="<?php echo e(asset('admin_dashboard_assets/plugins/select2/css/select2-bootstrap4.css')); ?>" rel="stylesheet" />

<?php $__env->stopSection(); ?>
		
<?php $__env->startSection("wrapper"); ?>
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Tài khoản</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Sửa tài khoản</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Sửa tài khoản: <?php echo e($user->name); ?></h5>
					  <hr/>
					<form action="<?php echo e(route('admin.users.update', $user)); ?>" method="POST"  enctype="multipart/form-data" >
						<?php echo csrf_field(); ?>
						<?php echo method_field('PATCH'); ?>

                       <div class="form-body mt-4">
							<div class="row">
								<div class="col-lg-12">
									<div class="border border-3 p-4 rounded">

										<div class="mb-3">
											<label for="input_name" class="form-label">Họ Tên</label>
											<input name="name" type="text"  class="form-control" id="input_name" value='<?php echo e(old("name", $user->name )); ?>'>
										
											<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<p class="text-danger"><?php echo e($message); ?></p>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div>

										<div class="mb-3">
											<label for="input_email" class="form-label">Email</label>
											<input name="email" type="email" class="form-control" id="input_email" value='<?php echo e(old("email", $user->email)); ?>'>
										
											<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<p class="text-danger"><?php echo e($message); ?></p>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div>

										<div class="mb-3">
													<label for="input_password" class="form-label">Mật khẩu</label>
													<input <?php echo e($is_no_admin ? 'disabled' : ''); ?> name="password" type="password"  class="form-control" id="input_password">
												
													<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
														<p class="text-danger"><?php echo e($message); ?></p>
													<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>

										<div class="row">
											<div class="col-md-8">
												<div class="mb-3">
													<label for="input_image" class="form-label">Ảnh đai diện</label>
													<input name="image" type="file" class="form-control" id="input_image" >
												
													<?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
														<p class="text-danger"><?php echo e($message); ?></p>
													<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
											</div>
											<div class="col-md-4">
												<div class="user_image">
													<img class="img_admn--user img-avatar" width="220px" height="220px" style="border-radius: 50%; margin: auto; background-size: cover ;  background-image: url(<?php echo e($user->image ?  asset('storage/' . $user->image->path) : asset('storage/placeholders/user_placeholder.jpg')); ?>)" alt="">
												</div>
											</div>
										</div>

										<div class="mb-3">
											<label for="inputProductTitle" class="form-label">Quyền tài khoản</label>
												<div class="card">
													<div class="card-body">
														<div class="p-3 rounded">
															<div class="mb-3">
																<select <?php echo e($is_no_admin ? 'disabled' : ''); ?> name="role_id" required class="single-select">
																	<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<option <?php echo e($user->role_id === $key ? "selected" : ''); ?> value="<?php echo e($key); ?>"><?php echo e($role); ?></option>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																</select>

																<?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
																	<p class="text-danger"><?php echo e($message); ?></p>
																<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

															</div>
														</div>
													</div>
												</div>
										</div>

										<button class="btn btn-primary" type="submit">Sửa tài khoản</button>

										<a class="btn btn-danger <?php echo e($is_no_admin ? 'd-none' : ''); ?>" onclick="event.preventDefault(); document.getElementById('delete_user_<?php echo e($user->id); ?>').submit();" 
										href="#">Xóa tài khoản</a>

									</div>
								</div>
							</div>
						</div>
					</form>

					<form id="delete_user_<?php echo e($user->id); ?>" action="<?php echo e(route('admin.users.destroy', $user)); ?>"  method="post">
						<?php echo csrf_field(); ?>
						<?php echo method_field('DELETE'); ?>
					</form>

				  </div>
			  </div>


			</div>
		</div>
		<!--end page wrapper -->
<?php $__env->stopSection(); ?>
	
<?php $__env->startSection("script"); ?>
	<script src="<?php echo e(asset('admin_dashboard_assets/plugins/select2/js/select2.min.js')); ?>"></script>
	<script>
		$(document).ready(function () {
			// $('#image-uploadify').imageuploadify();

			$('.single-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
			});

		setTimeout(()=>{
				$(".general-message").fadeOut();
		},5000);

		});


	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin_dashboard.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\newslaravel-main\resources\views/admin_dashboard/users/edit.blade.php ENDPATH**/ ?>