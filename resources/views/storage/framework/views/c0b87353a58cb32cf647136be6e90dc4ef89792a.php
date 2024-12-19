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
					<div class="breadcrumb-title pe-3">Bình luận</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Thêm mới bình luận</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Thêm bình luận mới</h5>
					  <hr/>
					<form action="<?php echo e(route('admin.comments.store')); ?>" method="POST" >
						<?php echo csrf_field(); ?>

                       <div class="form-body mt-4">
							<div class="row">
								<div class="col-lg-12">
									<div class="border border-3 p-4 rounded">

										<div class="mb-3">
											<label for="inputProductTitle" class="form-label">Chi tiết bài viết</label>
												<div class="card">
													<div class="card-body">
														<div class="p-3 rounded">
															<div class="mb-3">
																<select name="post_id" required class="single-select">
																	<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<option value="<?php echo e($key); ?>"><?php echo e($post); ?></option>
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																</select>

																<?php $__errorArgs = ['post_id'];
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

										<div class="mb-3">
											<label for="inputProductDescription" class="form-label">Bình luận bài viết</label>
											<textarea name="the_comment" id="post_comment" class="form-control" id="inputProductDescription" rows="3"><?php echo e(old("the_comment" )); ?></textarea>
										
											<?php $__errorArgs = ['the_comment'];
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

										<button class="btn btn-primary" type="submit">Thêm bình luận</button>

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
<?php echo $__env->make("admin_dashboard.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Project\newslaravel\resources\views/admin_dashboard/comments/create.blade.php ENDPATH**/ ?>