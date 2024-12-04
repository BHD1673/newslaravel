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
								<li class="breadcrumb-item active" aria-current="page">Sửa danh mục</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Sửa danh mục : <?php echo e($category->name); ?></h5>
					  <hr/>
					<form action="<?php echo e(route('admin.categories.update', $category)); ?>" method="POST">
						<?php echo csrf_field(); ?>
						<?php echo method_field('PATCH'); ?>
                       <div class="form-body mt-4">
							<div class="row">
								<div class="col-lg-12">
									<div class="border border-3 p-4 rounded">
										<div class="mb-3">
											<label for="inputProductTitle" class="form-label">Tên danh mục</label>
											<input type="text" value=' <?php echo e(old("name", $category->name)); ?>' name="name" required  class="form-control" id="inputProductTitle" placeholder="Nhập tiêu đề bài viết">
										
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
											<input type="text" value=' <?php echo e(old("slug", $category->slug)); ?>' name="slug" required  class="form-control" id="inputProductTitle" placeholder="Nhập slug">
										
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

										<button class="btn btn-primary" type="submit">Sửa danh mục</button>

										<a class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete_category_<?php echo e($category->id); ?>').submit();" 
										href="#">Xóa danh mục</a>

									</div>
								</div>
							</div>
						</div>

					</form>

					<form id="delete_category_<?php echo e($category->id); ?>" action="<?php echo e(route('admin.categories.destroy', $category)); ?>"  method="post">
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
	<script>
		$(document).ready(function () {

			setTimeout(()=>{
					$(".general-message").fadeOut();
			},5000);

		});


	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin_dashboard.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\newslaravel-main\newslaravel-main\resources\views/admin_dashboard/categories/edit.blade.php ENDPATH**/ ?>