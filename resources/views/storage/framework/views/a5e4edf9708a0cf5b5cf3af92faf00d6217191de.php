		
<?php $__env->startSection("wrapper"); ?>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Từ khóa</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tất cả từ khóa</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        
        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="position-relative">
                        <input type="text" class="form-control ps-5 radius-30" placeholder="Tìm kiếm tù khóa"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Mã từ khóa</th>
                                <th>Tên từ khóa</th>
                                <th>Xem chi tiết</th>
                                <th>Ngày tạo</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">#P-<?php echo e($tag->id); ?></h6>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo e($tag->name); ?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="<?php echo e(route('admin.tags.show', $tag)); ?>">Chi tiết bài viết</a>
                                </td>
                                <td><?php echo e($tag->created_at->format('d/m/Y')); ?></td>
                   
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="#" onclick="event.preventDefault(); document.querySelector('#delete_form_<?php echo e($tag->id); ?>').submit();" class="ms-3"><i class='bx bxs-trash'></i></a>

                                        <form method="post" action="<?php echo e(route('admin.tags.destroy', $tag)); ?>" id="delete_form_<?php echo e($tag->id); ?>">
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

                <div class="mt-4"><?php echo e($tags->links()); ?></div>

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

<?php echo $__env->make("admin_dashboard.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Project\newslaravel\resources\views/admin_dashboard/tags/index.blade.php ENDPATH**/ ?>