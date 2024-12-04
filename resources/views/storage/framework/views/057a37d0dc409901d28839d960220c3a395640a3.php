<?php $__env->startSection('title', $category->name . ' - TDQ'); ?>

<?php $__env->startSection('content'); ?>

<!-- Main Breadcrumb Start -->
<div class="main--breadcrumb">
	<div class="container">
			<ul class="breadcrumb">
				<li><a href="<?php echo e(route('home')); ?>" class="btn-link"><i class="fa fm fa-home"></i>Trang Chủ</a></li>
				<li class="active"><span><?php echo e($category->name); ?></span></li>
			</ul>
	</div>
</div>
	<!-- Main Breadcrumb End -->

<div class="main-content--section pbottom--30">
	<div class="container">
		<div class="row">
				<div class="main--content col-md-8" data-sticky-content="true">
					<div class="sticky-content-inner">
						<div class="post--item post--single post--title-largest pd--30-0">
							<?php if(! count($posts)): ?>
								<p class="lead">Không có danh mục nào cả !</p>
							<?php else: ?>

							<?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

							<div class="block-21 d-flex animate-box post">
								<a href="<?php echo e(route('posts.show', $post)); ?>" class="blog-img" style="background-image: url(<?php echo e(asset($post->image ? 'storage/' . $post->image->path : 'storage/placeholders/placeholder-image.png'  )); ?>);"></a>
								<div class="text">
								<h3 class="heading"><a href="<?php echo e(route('posts.show', $post)); ?>"><?php echo e($post->title); ?></a></h3>
								<p class="excerpt"><?php echo e($post->excerpt); ?></p></p>
								<div class="meta">
									<div><a class="date" href="#"><span class="icon-calendar"></span><?php echo e($post->created_at->locale('vi')->diffForHumans()); ?></a></div>
									<div><a href="#"><span class="icon-user2"></span><?php echo e($post->author->name); ?> </a></div>
									<div class="comments-count"><a href="<?php echo e(route('posts.show', $post)); ?>#post-comments"><span class="icon-chat"></span> <?php echo e($post->comments_count); ?></a></div>
								</div>
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
							<!-- phân trang -->
							<?php echo e($posts->links()); ?> 
						</div>
					</div>
				</div>
					<!-- SIDEBAR: start -->
					<!-- Main Sidebar Start -->
				<div class="main--sidebar col-md-4 ptop--30 pbottom--30" data-sticky-content="true">
					<div class="sticky-content-inner">
					
						<!-- Widget Start -->
						<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.blog.side-outstanding_posts','data' => ['outstandingPosts' => $outstanding_posts]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('blog.side-outstanding_posts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['outstanding_posts' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($outstanding_posts)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
						<!-- Widget End -->

						<!-- Widget Start -->
						<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.blog.side-vote','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('blog.side-vote'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
						<!-- Widget End -->

						<!-- Widget Start -->
						<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.blog.side-ad_banner','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('blog.side-ad_banner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
						<!-- Widget End -->

					</div>
				</div>
				<!-- Main Sidebar End -->

		</div>
	</div>
</div>
	
<?php $__env->stopSection(); ?>

	
<?php echo $__env->make('main_layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Project\newslaravel\resources\views/categories/show.blade.php ENDPATH**/ ?>