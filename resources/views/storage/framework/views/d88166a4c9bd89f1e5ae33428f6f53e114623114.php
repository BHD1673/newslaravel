		
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
                        <li class="breadcrumb-item active" aria-current="page">Tất cả danh mục</li>
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
                                <th>Danh mục</th>
                                <th>Tên danh mục</th>
                                <th>Người tạo</th>
                                <th>Xem chi tiết</th>
                                <th>Ngày tạo</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">#P-<?php echo e($category->id); ?></h6>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo e($category->name); ?></td>
                                <td><?php echo e($category->user->name); ?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="<?php echo e(route('admin.categories.show', $category)); ?>">Chi tiết bài viết</a>
                                </td>
                                <td><?php echo e($category->created_at->format('d/m/Y')); ?></td>
                   
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="<?php echo e(route('admin.categories.edit', $category)); ?>" class=""><i class='bx bxs-edit'></i></a>
                                        <a href="#" onclick="event.preventDefault(); document.querySelector('#delete_form_<?php echo e($category->id); ?>').submit();" class="ms-3"><i class='bx bxs-trash'></i></a>

                                        <form method="post" action="<?php echo e(route('admin.categories.destroy', $category)); ?>" id="delete_form_<?php echo e($category->id); ?>">
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

                <div class="mt-4"><?php echo e($categories->links()); ?></div>

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

<?php echo $__env->make("admin_dashboard.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\newslaravel-main\resources\views/admin_dashboard/categories/index.blade.php ENDPATH**/ ?>