		
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
                        <li class="breadcrumb-item active" aria-current="page">Danh mục <?php echo e($tag->name); ?>c</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        
        <div class="card">
            <div class="card-body">
                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="position-relative">
                        <input type="text" class="form-control ps-5 radius-30" placeholder="Tìm kiếm từ khóa"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                    </div>
                    <div class="ms-auto"><a href="<?php echo e(route('admin.posts.create')); ?>" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Thêm bài viết mới</a></div>
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
                            <?php $__currentLoopData = $tag->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                    <div class="badge rounded-pill <?php if($post->status === 'published'): ?>  <?php echo e('text-success bg-light-success'); ?> <?php elseif($post->status === 'draft'): ?> <?php echo e('text-warning bg-light-warning'); ?> <?php else: ?> <?php echo e('text-danger bg-light-danger'); ?> <?php endif; ?> p-2 text-uppercase px-3">
                                        <i class='bx bxs-circle me-1'></i><?php echo e($post->status); ?>

                                    </div>
                                </td>
                                <td><?php echo e($post->views); ?></td>
                               
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="<?php echo e(route('admin.posts.edit', $post)); ?>" class=""><i class='bx bxs-edit'></i></a>
                                        <a href="#" onclick="event.preventDefault(); document.querySelector('#delete_form_<?php echo e($post->id); ?>').submit();" class="ms-3"><i class='bx bxs-trash'></i></a>

                                        <form method="post" action="<?php echo e(route('admin.posts.destroy', $post)); ?>" id="delete_form_<?php echo e($post->id); ?>">
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

<?php echo $__env->make("admin_dashboard.layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Project\newslaravel\resources\views/admin_dashboard/tags/show.blade.php ENDPATH**/ ?>