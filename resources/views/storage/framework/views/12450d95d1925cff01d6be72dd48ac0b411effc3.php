<?php $__env->startSection("wrapper"); ?>
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Danh mục bài viết</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Thêm mới danh mục</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Thêm danh mục mới</h5>
					  <hr/>
					<form action="<?php echo e(route('admin.categories.store')); ?>" method="POST">
						<?php echo csrf_field(); ?>

                       <div class="form-body mt-4">
							<div class="row">
								<div class="col-lg-12">
									<div class="border border-3 p-4 rounded">
										<div class="mb-3">
											<label for="inputProductTitle" class="form-label">Tên danh mục</label>
											<input type="text" value=' <?php echo e(old("name" )); ?>' name="name" required  class="form-control" id="inputProductTitle" placeholder="Nhập tiêu đề bài viết">
										
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
											<label for="inputProductTitle" class="form-label">Slug - danh mục</label>
											<input type="text" value=' <?php echo e(old("slug" )); ?>' name="slug" required  class="form-control" id="inputProductTitle" placeholder="Nhập slug">
										
											<?php $__errorArgs = ['slug'];
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

										<button class="btn btn-primary" type="submit">Thêm danh mục</button>

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

		});


	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin_dashboard.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\newslaravel-main\resources\views/admin_dashboard/categories/create.blade.php ENDPATH**/ ?>