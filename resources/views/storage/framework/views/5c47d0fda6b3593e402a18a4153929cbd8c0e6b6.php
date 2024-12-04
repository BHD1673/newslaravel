<?php $__env->startSection('title',' TDQ - Danh mục tin tức'); ?>

<?php $__env->startSection('content'); ?>

<div class="colorlib-blog">
			<div class="container">
				<div class="row">
					<div class="col-md-12 categories_col">
                        <div class="row">
                            <?php if(! count($category_all)): ?>
                                <p class="lead">Không có danh mục tin tức nào.</p>
                            <?php else: ?>

                            <?php $__empty_1 = true; $__currentLoopData = $category_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-md-3">
                                <div class="block-21 d-flex animate-box post">
                                    <div class="text">
                                    <h3 class="heading"><a href="<?php echo e(route('categories.show', $category)); ?>"><?php echo e($category->name); ?></a></h3>
                                    <div class="meta">
                                        <div><a class="date" href="#"><span class="icon-calendar"></span><?php echo e($category->created_at->locale('vi')->diffForHumans()); ?></a></div>
                                        <div><a href="#"><span class="icon-user2"></span><?php echo e($category->user->name); ?> </a></div>
                                        <div class="posts-count"><a href="<?php echo e(route('categories.show', $category)); ?>"><span class="icon-tag"></span> <?php echo e($category->posts_count); ?></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <?php echo e($category_all->links()); ?>

					</div>
				</div>
			</div>
		</div>
	
<?php $__env->stopSection(); ?>

	
<?php echo $__env->make('main_layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\newslaravel-main\resources\views/categories/index.blade.php ENDPATH**/ ?>