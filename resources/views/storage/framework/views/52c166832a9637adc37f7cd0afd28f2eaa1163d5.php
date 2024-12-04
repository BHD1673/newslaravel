<?php $__env->startSection('title', $post->title. ' - TDQ '); ?>

<?php $__env->startSection('custom_css'); ?>
	<style>
		.post--body.post--content{
			color: black;
			font-family: "Source Sans Pro", sans-serif;
			font-size: 18px;
		}

		.text.capitalize{
			text-transform: capitalize !important;
		}

		.author-info,
		.post-time{
			margin: 0;
			font-size: 14px !important;
			text-align: right;
		}

	</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="global-message info d-none"></div>

<!-- Main Breadcrumb Start -->
<div class="main--breadcrumb">
	<div class="container">
			<ul class="breadcrumb">
				<li><a href="<?php echo e(route('home')); ?>" class="btn-link"><i class="fa fm fa-home"></i>Trang Chủ</a></li>
				<li><a href="<?php echo e(route('categories.show', $post->category )); ?>" class="btn-link"><?php echo e($post->category->name); ?></a></li>
				<li class="active"><span><?php echo e($post->title); ?></span></li>
			</ul>
	</div>
</div>
	<!-- Main Breadcrumb End -->

<!-- Main Content Section Start -->
<div class="main-content--section pbottom--30">
        <div class="container">
            <div class="row">
                <!-- Main Content Start -->
                <div class="main--content col-md-8" data-sticky-content="true">
                    <div class="sticky-content-inner">
                        <!-- Post Item Start -->
                        <div class="post--item post--single post--title-largest pd--30-0">
                            <div class="post--cats">
                                <ul class="nav">
                                    <li><span><i class="fa fa-folder-open-o"></i></span></li>
									<?php for($i = 0; $i <  count($post->tags) ; $i++): ?>
                                    <li><a class="text capitalize" href="<?php echo e(route('tags.show',  $post->tags[$i])); ?>"><?php echo e($post->tags[$i]->name); ?></a></li>
									<?php endfor; ?>
                                </ul>
                            </div>

                            <div class="post--info">
                                <ul class="nav meta">
									<li class="text capitalize"><a href="#"><?php echo e($post->created_at->locale('vi')->translatedFormat('l'),); ?> <?php echo e($post->created_at->locale('vi')->format('d/m/Y')); ?><a></li>
                                    <li><a href="#"><?php echo e($post->author->name); ?></a></li>
                                    <li><span><i class="fa fm fa-eye"></i><?php echo e($post->views); ?></span></li>
                                    <li><a href="#"><i class="fa fm fa-comments-o"></i><?php echo e(count($post->comments)); ?></a></li>
                                </ul>

                                <div class="title">
                                    <h2 class="post_title h4"><?php echo e($post->title); ?></h2>
                                </div>
                            </div>
                            <div class="post--body post--content">
								<?php echo $post->body; ?>

                            </div>
                        </div>
                        <!-- Post Item End -->

                        <!-- Advertisement Start -->
                        <div class="ad--space pd--20-0-40">
							<p class="author-info">Người viết: <?php echo e($post->author->name); ?></p>
							<p class="post-time">Thời gian: <?php echo e($post->created_at->locale('vi')->diffForHumans()); ?></p>
                        </div>
                        <!-- Advertisement End -->

                        <!-- Post Tags Start -->
                        <div class="post--tags">
                            <ul class="nav">
                                <li><span><i class="fa fa-tags"></i> Từ khóa </span></li>
								<?php for($i = 0; $i <  count($post->tags) ; $i++): ?>
                                    <li><a class="text capitalize" href="<?php echo e(route('tags.show',  $post->tags[$i])); ?>"><?php echo e($post->tags[$i]->name); ?></a></li>
								<?php endfor; ?>
                            </ul>
                        </div>
                        <!-- Post Tags End -->

                        <!-- Post Social Start -->
                        <div class="post--social pbottom--30">
                            <span class="title"><i class="fa fa-share-alt"></i> Chia sẻ </span>
                             
                            <!-- Social Widget Start -->
                            <div class="social--widget style--4">
                                <ul class="nav">
                                    <li><a href="javascript:"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="javascript:"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="javascript:"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="javascript:"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="javascript:"><i class="fa fa-rss"></i></a></li>
                                    <li><a href="javascript:"><i class="fa fa-youtube-play"></i></a></li>
                                </ul>
                            </div>
                            <!-- Social Widget End -->
                        </div>
                        <!-- Post Social End -->

                    
                        <!-- Comment List Start -->
                        <div class="comment--list pd--30-0">
                            <!-- Post Items Title Start -->
                            <div class="post--items-title">
                                <h2 class="h4"><span class="post_count_comment h4" ><?php echo e(count($post->comments)); ?> </span> bình luận</h2>
                                <i class="icon fa fa-comments-o"></i>
                            </div>
                            <!-- Post Items Title End -->

                            <ul class="comment--items nav">
							<?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <!-- Comment Item Start -->
                                   <div class="comment--item clearfix">
										<div class="comment--img float--left">
                                            <img style="border-radius: 50%; margin: auto; background-size: cover ;  width: 68px; height: 68px;   background-image: url(<?php echo e($comment->user->image ?  asset('storage/' . $comment->user->image->path) : asset('storage/placeholders/user_placeholder.jpg')); ?>)"  alt="">
										</div>
										<div class="comment--info">
											<div class="comment--header clearfix">
												<p class="name"><?php echo e($comment->user->name); ?></p>
												<p class="date"><?php echo e($comment->created_at->locale('vi')->diffForHumans()); ?></p>
												<a href="javascript:;" class="reply"><i class="fa fa-flag"></i></a>
											</div>
											<div class="comment--content">
												<p><?php echo e($comment->the_comment); ?></p>
												<p class="star">
													<span class="text-left"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
												</p>
											</div>
										</div>
                                    </div>
                                    <!-- Comment Item End -->
                                </li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <!-- Comment List End -->

                        <!-- Comment Form Start -->
                        <div class="comment--form pd--30-0">
                            <!-- Post Items Title Start -->
                            <div class="post--items-title">
								<h2 class="h4">Viết bình luận</h2>
                                <i class="icon fa fa-pencil-square-o"></i>
                            </div>
                            <!-- Post Items Title End -->
							
                            <div class="comment-respond">
								<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.blog.message','data' => ['status' => 'success']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('blog.message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('success')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
								<?php if(auth()->guard()->check()): ?>	
								<!-- <form method="POST" action="<?php echo e(route('posts.add_comment', $post )); ?>"> -->
                                <form onsubmit="return false;" autocomplete="off" method="POST" >
									<?php echo csrf_field(); ?>

									<div class="row form-group">
										<div class="col-md-12">
											<textarea name="the_comment" id="message" cols="30" rows="5" class="form-control" placeholder="Đánh giá bài viết này"></textarea>
										</div>
									</div>
                                    <small style="color: red; font-size: 14px;" class="comment_error"> </small>
									<div class="form-group">
										<input id="input_comment" type="submit" value="Bình luận" class="send-comment-btn btn btn-primary">
									</div>
                                </form>
								<?php endif; ?>

								<?php if(auth()->guard()->guest()): ?>
								<p class="h4">
									<a href="<?php echo e(route('login')); ?>">Đăng nhập</a> hoặc 
									<a href="<?php echo e(route('register')); ?>">Đăng ký</a> để bình luận bài viết
								</p>
								<?php endif; ?>
                            </div>

                        </div>
                        <!-- Comment Form End -->

						    <!-- Post Related Start -->
						<div class="post--related ptop--30">
                            <!-- Post Items Title Start -->
                            <div class="post--items-title" data-ajax="tab">
                                <h2 class="h4">Có thể bạn cũng thích</h2>
                            </div>
                            <!-- Post Items Title End -->
                           
							<!-- Post Items Start -->
                            <div class="post--items post--items-2" data-ajax-content="outer">
                                <ul class="nav row" data-ajax-content="inner">
                                    <?php $__currentLoopData = $postTheSame; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postTheSame): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="col-sm-12 pbottom--30">
											<!-- Post Item Start -->
											<div class="post--item post--layout-3">
												<div class="post--img">
													<a href="<?php echo e(route('posts.show', $postTheSame)); ?>"
														class="thumb">
                                                        <img src="<?php echo e(asset($postTheSame->image ? 'storage/' .$postTheSame->image->path : 'storage/placeholders/placeholder-image.png')); ?>"
															alt="">
                                                    </a>

													<div class="post--info">
													
														<div class="title">
															<h3  class="h4">
																<a href="<?php echo e(route('posts.show', $postTheSame)); ?>" class="btn-link"><?php echo e($postTheSame->title); ?></a>
															</h3>
                                                            <p style="font-size:16px" >
																<span ><?php echo e($postTheSame->excerpt); ?></span>
                                                            </p>
														</div>

                                                        <ul style="padding-top:10px" class="nav meta ">
															<li><a href="javascript:;"><?php echo e($postTheSame->author->name); ?></a>
															</li>
															<li><a href="javascript:;"><?php echo e($postTheSame->created_at->locale('vi')->diffForHumans()); ?></a></li>
                                                            <li><a  href="javascript:;"><i class="fa fm fa-comments"></i><?php echo e(count($postTheSame->comments)); ?></a></li>
														</ul>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>

                                <!-- Preloader Start -->
                                <div class="preloader bg--color-0--b" data-preloader="1">
                                    <div class="preloader--inner"></div>
                                </div>
                                <!-- Preloader End -->
                            </div>
                            <!-- Post Items End -->
                        </div>
                        <!-- Post Related End -->

                    </div>
                </div>
                <!-- Main Content End -->

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
    <!-- Main Content Section End -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_js'); ?>

<script>
	setTimeout(() => {
		$(".global-message").fadeOut();
	}, 5000)
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('main_layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\newslaravel-main\resources\views/post.blade.php ENDPATH**/ ?>