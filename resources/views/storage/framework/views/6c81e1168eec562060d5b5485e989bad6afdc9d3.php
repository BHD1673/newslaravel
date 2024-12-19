<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['recent_posts']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['recent_posts']); ?>
<?php foreach (array_filter((['recent_posts']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div class="side">
    <h3 class="sidebar-heading">Bài viết mới nhất</h3>
    <?php $__currentLoopData = $recent_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent_posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="f-blog">
            <a href="<?php echo e(route('posts.show', $recent_posts)); ?>" class="blog-img" style="background-image: url(<?php echo e(asset($recent_posts->image ? 'storage/' .$recent_posts->image->path : 'storage/placeholders/placeholder-image.png'  )); ?>);"></a>
            <div class="desc">
                <p class="admin"><span><?php echo e($recent_posts->created_at->diffForHumans()); ?></spann></p>
                <h2>
                    <a href="blog.html">
                        <?php echo e(\Str::limit($recent_posts->title, 20)); ?>

                    </a></h2>
                <p><?php echo e($recent_posts->excerpt); ?></p>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH C:\laragon\www\Project\newslaravel\resources\views/components/blog/side-recent_posts.blade.php ENDPATH**/ ?>