<?php $__env->startSection("wrapper"); ?>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Bài viết</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tất cả bài viết</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="position-relative">
                        <input type="text" class="form-control ps-5 radius-30" placeholder="Tìm kiếm bài viết"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                    </div>
                    <div class="ms-auto"><a href="<?php echo e(route('admin.posts.create')); ?>" class="btn btn-primary radius-30 mt-2 mt-lg-0 <?php echo e($isEmployee ? 'd-none' : ''); ?>"><i class="bx bxs-plus-square"></i>Thêm bài viết mới</a></div>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Mã bài viết</th>
                                <th>Tên bài viết</th>
                                <th>Mô tả</th>
                                <th>Danh mục</th>
                                <th>Ngày tạo</th>
                                <th>Trạng thái</th>
                                <th>Lượt xem</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $posts;
                            $__env->addLoop($__currentLoopData);
                            foreach ($__currentLoopData as $post): $__env->incrementLoopIndices();
                                $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mb-0 font-14">#P-<?php echo e($post->id); ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo e($post->title); ?></td>


                                    <td><?php echo e($post->excerpt); ?></td>
                                    <td><?php echo e($post->category->name); ?></td>
                                    <td><?php echo e($post->created_at->format('d/m/Y')); ?></td>
                                    <td>
                                        <div class="p-2 px-3">
                                            <?php if ($post->approved === 1): ?>
                                                <span class="badge bg-warning text-dark">Chưa phê duyệt</span>
                                            <?php elseif ($post->approved === 2): ?>
                                                <span class="badge bg-danger">Từ chối</span>
                                            <?php elseif ($post->approved === 3): ?>
                                                <span class="badge bg-success">Bài viết đã được duyệt</span>
                                            <?php else: ?>
                                                <p>Trạng thái không xác định</p>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td><?php echo e($post->views); ?></td>

                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="<?php echo e(route('admin.posts.edit', $post)); ?>"><i class='bx bxs-edit'></i></a>
                                            <?php if ($post->approved === 1 || $post->approved === 3): ?>
                                                <a href="#" onclick="event.preventDefault(); document.querySelector('#delete_form_<?php echo e($post->id); ?>').submit();" class="ms-3 <?php echo e($isEmployee ? 'd-none' : ''); ?>"><i class='bx bxs-trash'></i></a>
                                            <?php else: ?>
                                                <a href="#" onclick="return confirmDelete(<?php echo e($post->approved); ?>, <?php echo e($post->id); ?>);" class="ms-3 <?php echo e($isEmployee ? 'd-none' : ''); ?>"><i class='bx bxs-trash'></i></a>
                                            <?php endif; ?>
                                            <?php if ($post->approved === 2): ?>
                                                <a href="#" class="mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo e($post->id); ?>"><i class='bx bxs-x-circle'></i></a>
                                            <?php endif; ?>
                                            <?php if ($isAdmin): ?>
                                                <form method="post" action="<?php echo e(route('admin.post.softDelete', $post)); ?>" id="delete_form_<?php echo e($post->id); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PUT'); ?>
                                                </form>
                                            <?php else: ?>
                                                <form method="post" action="<?php echo e(route('admin.posts.destroy', $post)); ?>" id="delete_form_<?php echo e($post->id); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal_<?php echo e($post->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">LÝ DO TỪ CHỐI</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <?php $__currentLoopData = $postLog;
                                                $__env->addLoop($__currentLoopData);
                                                foreach ($__currentLoopData as $item): $__env->incrementLoopIndices();
                                                    $loop = $__env->getLastLoop(); ?>
                                                    <?php if ($item->post_id === $post->id): ?>
                                                        <p><b class="text-uppercase"><?php echo e($item->role_log); ?></b> : <?php echo e($item->note); ?></p>
                                                        <p><b class="text-uppercase">Thời gian từ chối</b> : <?php echo e($item->date_log); ?></p>
                                                    <?php endif; ?>
                                                <?php endforeach;
                                                $__env->popLoop();
                                                $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;
                            $__env->popLoop();
                            $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>

                <div class="mt-4"><?php echo e($posts->links()); ?></div>

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

    function confirmDelete(status, postID) {
        return confirm(`Bài viết [ ${postID} ] đã  ${ status === 2 ? 'bị từ chối' : 'được phê duyệt'}. Bạn không thể chuyển bài vào thùng rác.`);
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin_dashboard.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\newslaravel-main\newslaravel-main\resources\views/admin_dashboard/posts/index.blade.php ENDPATH**/ ?>