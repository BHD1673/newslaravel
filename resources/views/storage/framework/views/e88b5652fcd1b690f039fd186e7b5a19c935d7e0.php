		
<?php $__env->startSection("style"); ?>
	<script src="https://cdn.tiny.cloud/1/5nk94xe9fcwk22fkp6gou9ymszwidnujnr2mu3n3xe2biap3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("wrapper"); ?>
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Giới thiệu</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Sửa trang giới thiệu</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Sửa trang giới thiệu</h5>
					  <hr/>
					<form action="<?php echo e(route('admin.setting.update')); ?>" method="POST"  enctype="multipart/form-data" >
						<?php echo csrf_field(); ?>

                       <div class="form-body mt-4">
							<div class="row">
								<div class="col-lg-12">
									<div class="border border-3 p-4 rounded">

										<div class="mb-3">
											<label for="about_first_text" class="form-label">Chúng tôi là ai ?</label>
											<textarea name="about_first_text" class="form-control" id="about_first_text" ><?php echo e($setting->about_first_text); ?></textarea>
										
											<?php $__errorArgs = ['about_first_text'];
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
											<label for="about_second_text" class="form-label">Trung tâm tin tức mới nhất </label>
											<textarea name="about_second_text" class="form-control" id="about_second_text" ><?php echo e($setting->about_second_text); ?></textarea>
											<?php $__errorArgs = ['about_second_text'];
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
													<label for="about_first_image" class="form-label">Ảnh giới thiệu thứ nhất</label>
													<input name="about_first_image" type="file" class="form-control" id="about_first_image" >
													<?php $__errorArgs = ['about_first_image'];
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
												<div class="user_image p-2">
													<img class="img-fluid img-thumbnail" src="<?php echo e(asset('storage/' . $setting->about_first_image )); ?>" alt="">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-8">
												<div class="mb-3">
													<label for="about_second_image" class="form-label">Ảnh giới thiệu thứ hait</label>
													<input name="about_second_image" type="file" class="form-control" id="about_second_image" >
													<?php $__errorArgs = ['about_second_image'];
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
												<div class="user_image p-2">
													<img class="img-fluid img-thumbnail" src="<?php echo e(asset('storage/' . $setting->about_second_image )); ?>" alt="">
												</div>
											</div>
										</div>

										

										<div class="mb-3">
											<label for="about_our_mission" class="form-label">Sứ mạng</label>
											<textarea name="about_our_mission"  class="form-control" id="about_our_mission" rows="3"><?php echo e(old("about_our_mission", $setting->about_our_mission )); ?></textarea>
											<?php $__errorArgs = ['about_our_mission'];
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
											<label for="about_our_vision" class="form-label">Tầm nhìn</label>
											<textarea name="about_our_vision" class="form-control" id="about_our_vision" rows="3"><?php echo e(old("about_our_vision", $setting->about_our_vision )); ?></textarea>
											<?php $__errorArgs = ['about_our_vision'];
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
											<label for="about_services" class="form-label">Dịch vụ</label>
											<textarea name="about_services"  class="form-control" id="about_services" rows="3"><?php echo e(old("about_services", $setting->about_services )); ?></textarea>
											<?php $__errorArgs = ['about_services'];
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

										<button class="btn btn-primary" type="submit">Cập nhật</button>

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
<?php $__env->stopSection(); ?>
	
<?php $__env->startSection("script"); ?>
	<script>
		$(document).ready(function () {
					
			setTimeout(()=>{
					$(".general-message").fadeOut();
			},5000);

			let initTinyMCE = (id) => {
				tinymce.init({
					selector: '#'+id,
					plugins: 'advlist autolink lists link charmap preview anchor pagebreak',
					toolbar_mode: 'floating',
					height: '300',

					toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code | rtl ltr',
					toolbar_mode: 'floating',
				});
			};
			
			
			initTinyMCE('about_our_mission');
			initTinyMCE('about_our_vision');
			initTinyMCE('about_services');
	
		});


	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin_dashboard.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\newslaravel-main\resources\views/admin_dashboard/abouts/edit.blade.php ENDPATH**/ ?>