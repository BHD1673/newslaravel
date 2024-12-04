<?php $__env->startSection("style"); ?>

<style>
    .img_admn--user.img-avatar{
        border-radius: 50%;
    }
</style>

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
                        <li class="breadcrumb-item active" aria-current="page">Tất cả tài khoản</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        
        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="position-relative">
                        <input type="text" class="form-control ps-5 radius-30" placeholder="Tìm kiếm danh mục"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                    </div>
                    <div class="ms-auto"><a href="<?php echo e(route('admin.categories.create')); ?>" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Thêm danh mục mới</a></div>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Mã Tài khoản</th>
                                <th>Ảnh dại diện</th>
                                <th>Họ Tên</th>
                                <th>Email</th>
                                <th>Quyền</th>
                                <th>Thông tin</th>
                                <th>Ngày tạo</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">#U-<?php echo e($user->id); ?></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <img class="img_admn--user img-avatar" width="60" height="60" style="margin: auto; background-size: cover ;  background-image: url(<?php echo e($user->image ?  asset('storage/' . $user->image->path) : asset('storage/placeholders/user_placeholder.jpg')); ?>)" alt="">
                                </td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->role->name); ?></td>
                                <?php if($user->role->name != 'user'): ?>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="<?php echo e(route('admin.users.show', $user)); ?>">Bài viết</a>
                                </td>
                                <?php else: ?>
                                <td>
                                </td>
                                <?php endif; ?>
                             
                                <td><?php echo e($user->created_at->format('d/m/Y')); ?></td>
                   
                                <td>
                                    <div class="d-flex order-actions ">
                                        <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class=""><i class='bx bxs-edit'></i></a>
                                        <a href="#" onclick="event.preventDefault(); document.querySelector('#delete_form_<?php echo e($user->id); ?>').submit();" class="ms-3 <?php echo e($isNoAdmin ? 'd-none' : ''); ?>"><i class='bx bxs-trash'></i></a>

                                        <form method="post" action="<?php echo e(route('admin.users.destroy', $user)); ?>" id="delete_form_<?php echo e($user->id); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                        </form>
                                    
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                        </tbody>
                    </table>
                </div>

                <div class="mt-4"><?php echo e($users->links()); ?></div>

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

<?php echo $__env->make("admin_dashboard.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\newslaravel-main\newslaravel-main\resources\views/admin_dashboard/users/index.blade.php ENDPATH**/ ?>