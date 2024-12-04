<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['status']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['status']); ?>
<?php foreach (array_filter((['status']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if(session()->has($status)): ?>
    <div class="alert alert-<?php echo e($status == 'success' ? 'info' : 'danger'); ?> global-message <?php echo e($status == 'success' ? 'info' : 'error'); ?> ">
        <?php echo e(session($status)); ?>

    </div>
<?php endif; ?><?php /**PATH D:\laragon\www\newslaravel-main\resources\views/components/blog/message.blade.php ENDPATH**/ ?>