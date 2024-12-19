<?php $__env->startSection("style"); ?>
	<style>
		.permission{
			background-color: while;
			padding: 5px 10px;
			display: inline-block;
			font-size: 15px;
			margin: 2px 10px;
			cursor: pointer;
			color: green;
		}
	</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("wrapper"); ?>
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Phân quyền</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Sửa quyền</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
				  <div class="card-body p-4">
					  <h5 class="card-title">Sửa quyền: <?php echo e($role->name); ?></h5>
					  <hr/>
					<form action="<?php echo e(route('admin.roles.update', $role)); ?>" method="POST">
						<?php echo csrf_field(); ?>
						<?php echo method_field('PATCH'); ?>

                       <div class="form-body mt-4">
							<div class="row">
								<div class="col-lg-12">
									<div class="border border-3 p-4 rounded">
										<div class="mb-3">
											<label for="inputProductTitle" class="form-label">Tên quyền</label>
											<input type="text" value=' <?php echo e(old("name", $role->name )); ?>' name="name" required  class="form-control" id="inputProductTitle" placeholder="Nhập tiêu đề bài viết">
										
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
											<label for="inputProductTitle" class="form-label">Chức năng cho phép</label>
											
											<div class="row">

												<?php 
													$the_count = count($permissions);
													$start = 0;
												?>
											
												<?php for($j = 1 ; $j <= 3; $j++): ?> 
													<?php 
														$end = round($the_count * ($j / 3) );
													?>

													<div class="col-md-4">
														<?php for($i = $start ; $i < $end ; $i++): ?>
															<label class="permission">
																<input <?php echo e($role->permissions->contains($permissions[$i]->id) ? 'checked' : ''); ?>  type="checkbox" name="permissions[]" value="<?php echo e($permissions[$i]->id); ?>"></input>
																<?php echo e($permissions[$i]->name); ?>

															</label>	
														<?php endfor; ?>
													</div>

													<?php 
														$start = $end;
													?>
												<?php endfor; ?>

											</div>

										
										</div>

										<button class="btn btn-primary" type="submit">Sửa quyền</button>
										
										<a class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete_role_<?php echo e($role->id); ?>').submit();" 
										href="#">Xóa quyền</a>


									</div>
								</div>
							</div>
						</div>

					</form>

					<form id="delete_role_<?php echo e($role->id); ?>" action="<?php echo e(route('admin.roles.destroy', $role)); ?>"  method="post">
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
<?php echo $__env->make("admin_dashboard.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Project\newslaravel\resources\views/admin_dashboard/roles/edit.blade.php ENDPATH**/ ?>