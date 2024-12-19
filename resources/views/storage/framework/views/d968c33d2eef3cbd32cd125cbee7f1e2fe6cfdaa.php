

<?php $__env->startSection("wrapper"); ?>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Lịch sử bài viết</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tất cả lịch sử</li>
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
                    <div class="ms-auto">
                        <form method="post" action="<?php echo e(route('admin.post-history.removeAll')); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-danger radius-30 mt-2 mt-lg-0" typr="submit">
                                <i class='bx bxs-trash'></i>
                                Xóa tất cả lịch sử bài viết
                            </button>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Tên bài viết</th>
                                <th>Người dùng</th>
                                <th>Hoạt động</th>
                                <th>Thời gian</th>
                                <th>Ghi chú</th>
                                <th>Trang thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $postHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postHistorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <!-- <input class="form-check-input me-3" type="checkbox" name="item_delet_ids" value="<?php echo e($postHistorie->id); ?>" aria-label="..."> -->
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">#P-<?php echo e($postHistorie->id); ?></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>

                                    <a href="<?php echo e($postHistorie->is_delete_post ? '#' : route('admin.posts.edit', $postHistorie->post_id)); ?>"
                                        class="<?php echo e($postHistorie->is_delete_post ? 'text-muted text-decoration-line-through' : ''); ?>">
                                        <?php echo e($postHistorie->title); ?>

                                    </a>
                                </td>
                                <td>
                                    <b> [<?php echo e($postHistorie->user_action); ?>] </b>
                                    <a href="<?php echo e(route('admin.users.edit', $postHistorie->user_id)); ?>"><?php echo e($postHistorie->user->name); ?></a>
                                </td>
                                <td>
                                    <b> [<?php echo e($postHistorie->user_action); ?>] </b>
                                    <?php if($postHistorie->action === "edit"): ?>
                                        <?php if($postHistorie->status === 1): ?>
                                            <p>
                                            <span class="badge bg-warning text-dark">Chưa phê duyệt</span>
                                            </p>
                                        <?php elseif($postHistorie->status === 2): ?>
                                        <p>
                                            <span class="badge bg-danger">Từ chối</span>
                                        </p>
                                        <?php else: ?>
                                        <p>
                                            <span class="badge bg-success">Bài viết đã được duyệt</span>
                                        </p>
                                    <?php endif; ?>
                                    <?php elseif($postHistorie->action === "create" ): ?>
                                        <p>
                                            <span class="badge bg-primary">Bài viết đã được tạo</span>
                                        </p>
                                    
                                    <?php elseif($postHistorie->action === "delete" && $postHistorie->is_delete_post === 1): ?>
                                        <p>
                                            <span class="badge bg-danger">Bài viết đã được xóa vĩnh viễn</span>
                                        </p>
                                    <?php else: ?>
                                        <p>
                                            <span class="badge bg-danger">Bài viết đã được chuyển vào thùng rác</span>
                                        </p>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="border p-2">
                                        <?php echo e($postHistorie->date_action); ?> <?php echo e($postHistorie->time_action); ?>

                                    </div>
                                </td>
                                <td><?php echo e($postHistorie->note); ?></td>
                                <td>
                                    <div class="">
                                        <?php if($postHistorie->status === 1): ?>
                                        <span class="badge bg-warning text-dark">Chưa phê duyệt</span>
                                        <?php elseif($postHistorie->status === 2): ?>
                                        <span class="badge bg-danger">Từ chối</span>
                                        <?php elseif($postHistorie->status === 3): ?>
                                        <span class="badge bg-success">Bài viết đã được duyệt</span>
                                        <?php else: ?>
                                        <p>Trạng thái không xác định</p>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex order-actions">

                                        <a href="#" onclick="event.preventDefault(); document.querySelector('#delete_form_<?php echo e($postHistorie->id); ?>').submit();" class="ms-3"><i class='bx bxs-trash'></i></a>

                                        <form method="post" action="<?php echo e(route('admin.post-history.destroy', $postHistorie->id)); ?>" id="delete_form_<?php echo e($postHistorie->id); ?>">
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

            </div>
        </div>


    </div>
</div>
<!--end page wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>
<script>
    $(document).ready(function() {
        setTimeout(() => {
            $(".general-message").fadeOut();
        }, 5000);

    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin_dashboard.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Project\newslaravel\resources\views/admin_dashboard/post-history/index.blade.php ENDPATH**/ ?>