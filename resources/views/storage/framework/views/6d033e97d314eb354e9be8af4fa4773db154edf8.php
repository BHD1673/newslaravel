<?php 
use App\Models\Post;
use App\Models\Category;

    // Bài viết nổi bật
    $category_hot = Category::where('name','!=','Chưa phân loại')->first();
    $outstanding_posts_hots = Post::approved()
            ->where('category_id',  $category_hot->id )
            ->orderBy('created_at','DESC')
            ->take(5)->get();
    $outstanding_posts_views =  Post::approved()->orderBy('views','DESC')->take(5)->get();
    
 ?>

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['outstanding_posts'] ) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['outstanding_posts'] ); ?>
<?php foreach (array_filter((['outstanding_posts'] ), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
   <!-- Widget Start -->
<div class="widget">
    <div class="widget--title">
        <h2 class="h4">Tin tức nổi bật</h2>
        <i class="icon fa fa-newspaper-o"></i>
    </div>

    <!-- List Widgets Start -->
    <div class="list--widget list--widget-1">
        <div class="list--widget-nav" data-ajax="tab">
            <ul class="nav nav-justified">
                <li>
                    <a  class="outstandPosts" href="#" data-ajax-action="load_widget_hot_news">Tin nóng</a>
                </li>
                <li class="active">
                    <a class="outstandPosts" href="" data-ajax-action="load_widget_trendy_news">Xu hướng</a>
                </li>
                <li>
                    <a class="outstandPosts" href="" data-ajax-action="load_widget_most_watched">Xem nhiều nhất</a>
                </li>
            </ul>
        </div>

        <!-- Post Items Start -->
        <div class="post--items post--items-3" data-ajax-content="outer">
            <ul class="nav listPost" data-ajax-content="inner">
                <?php $__currentLoopData = $outstanding_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $outstanding_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <!-- Post Item Start -->
                        <div class="post--item post--layout-3">
                            <div class="post--img">
                                <a href="<?php echo e(route('posts.show', $outstanding_post)); ?>" class="thumb"><img
                                        src="<?php echo e(asset($outstanding_post->image ? 'storage/' .$outstanding_post->image->path : 'storage/placeholders/placeholder-image.png')); ?>"
                                        alt=""></a>
                                <div class="post--info">
                                    <ul class="nav meta">
                                        <li><a href="javascript:;"><?php echo e($outstanding_post->created_at->locale('vi')->diffForHumans()); ?></a></li>
                                        <li><a  href="javascript:;"><i class="fa fm fa-comments"></i><?php echo e(count($outstanding_post->comments)); ?></a></li>
                                        <li><span><i class="fa fm fa-eye"></i><?php echo e($outstanding_post->views); ?></span></li>
                                    </ul>

                                    <div class="title">
                                        <h3 class="h4"><a href="<?php echo e(route('posts.show', $outstanding_post)); ?>"
                                                class="btn-link"><?php echo e($outstanding_post->title); ?></a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Post Item End -->
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

            <!-- Preloader Start -->
            <!-- <div class="preloader bg--color-0--b" data-preloader="1">
                <div class="preloader--inner"></div>
            </div> -->
            <!-- Preloader End -->
        </div>
        <!-- Post Items End -->
    </div>
    <!-- List Widgets End -->
</div>
<!-- Widget End -->

<?php $__env->startSection('custom_js'); ?>

<script>
	setTimeout(() => {
		$(".global-message").fadeOut();
	}, 5000)
</script>

<script>
        const outstandPosts = document.querySelectorAll('.outstandPosts');
        outstandPosts.forEach((item, index)=>{
            $(item).click(function(e){

                const ListPost=  $('.listPost');
                const ListPost_item = $('.listPost li');
                ListPost_item.remove();
                if(index==0){
                    const htmls  = (() =>{
                    return `
                        <?php $__currentLoopData = $outstanding_posts_hots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $outstanding_posts_hot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="post--item post--layout-3">
                                    <div class="post--img">
                                        <a href="<?php echo e(route('posts.show', $outstanding_posts_hot)); ?>" class="thumb"><img
                                                src="<?php echo e(asset($outstanding_posts_hot->image ? 'storage/' .$outstanding_posts_hot->image->path : 'storage/placeholders/placeholder-image.png')); ?>"
                                                alt=""></a>
                                        <div class="post--info">
                                            <ul class="nav meta">
                                                <li><a href="javascript:;"><?php echo e($outstanding_posts_hot->created_at->locale('vi')->diffForHumans()); ?></a></li>
                                                <li><a  href="javascript:;"><i class="fa fm fa-comments"></i><?php echo e(count($outstanding_posts_hot->comments)); ?></a></li>
                                                <li><span><i class="fa fm fa-eye"></i><?php echo e($outstanding_posts_hot->views); ?></span></li>
                                            </ul>

                                            <div class="title">
                                                <h3 class="h4"><a href="<?php echo e(route('posts.show', $outstanding_posts_hot)); ?>"
                                                        class="btn-link"><?php echo e($outstanding_posts_hot->title); ?></a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    `
                        });
                    ListPost.append(htmls);
                }
                if(index==1){
                    const htmls  = (() =>{
                    return `
                        <?php $__currentLoopData = $outstanding_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $outstanding_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <!-- Post Item Start -->
                                <div class="post--item post--layout-3">
                                    <div class="post--img">
                                        <a href="<?php echo e(route('posts.show', $outstanding_post)); ?>" class="thumb"><img
                                                src="<?php echo e(asset($outstanding_post->image ? 'storage/' .$outstanding_post->image->path : 'storage/placeholders/placeholder-image.png')); ?>"
                                                alt=""></a>
                                        <div class="post--info">
                                            <ul class="nav meta">
                                                <li><a href="javascript:;"><?php echo e($outstanding_post->created_at->locale('vi')->diffForHumans()); ?></a></li>
                                                <li><a  href="javascript:;"><i class="fa fm fa-comments"></i><?php echo e(count($outstanding_post->comments)); ?></a></li>
                                                <li><span><i class="fa fm fa-eye"></i><?php echo e($outstanding_post->views); ?></span></li>
                                            </ul>

                                            <div class="title">
                                                <h3 class="h4"><a href="<?php echo e(route('posts.show', $outstanding_post)); ?>"
                                                        class="btn-link"><?php echo e($outstanding_post->title); ?></a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Post Item End -->
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    `
                        });
                    ListPost.append(htmls);
                }
                if(index==2){
                    const htmls  = (() =>{
                    return `
                         <?php $__currentLoopData = $outstanding_posts_views; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $outstanding_posts_view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="post--item post--layout-3">
                                    <div class="post--img">
                                        <a href="<?php echo e(route('posts.show', $outstanding_posts_view)); ?>" class="thumb"><img
                                                src="<?php echo e(asset($outstanding_posts_view->image ? 'storage/' .$outstanding_posts_view->image->path : 'storage/placeholders/placeholder-image.png')); ?>"
                                                alt=""></a>
                                        <div class="post--info">
                                            <ul class="nav meta">
                                                <li><a href="javascript:;"><?php echo e($outstanding_posts_view->created_at->locale('vi')->diffForHumans()); ?></a></li>
                                                <li><a  href="javascript:;"><i class="fa fm fa-comments"></i><?php echo e(count($outstanding_posts_view->comments)); ?></a></li>
                                                <li><span><i class="fa fm fa-eye"></i><?php echo e($outstanding_posts_view->views); ?></span></li>
                                            </ul>

                                            <div class="title">
                                                <h3 class="h4"><a href="<?php echo e(route('posts.show', $outstanding_posts_view)); ?>"
                                                        class="btn-link"><?php echo e($outstanding_posts_view->title); ?></a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    `
                        });
                    ListPost.append(htmls);
                }


            });
        });
</script>

<script>
	$(document).on('click', '.send-comment-btn', (e) => {
		e.preventDefault();
		let $this = e.target;

		let csrf_token = $($this).parents("form").find("input[name='_token']").val();
		let the_comment =  $($this).parents("form").find("textarea[name='the_comment']").val();
		let post_title =  $('.post_title').text() ; 

		let count_comment =  $('.post_count_comment').text() ; 
        let ListComment = $('.comment--items');

		let formData = new FormData();
		formData.append('_token', csrf_token);
		formData.append('the_comment', the_comment);
		formData.append('post_title', post_title);
	


		$.ajax({
			url: "<?php echo e(route('posts.addCommentUser')); ?>",
			data: formData,
			type: 'POST',
			dataType: 'JSON',
			processData: false,
			contentType: false,
			success: function (data) {
				if(data.success){

                    console.log(data.result);
                  
                    // Xử lý thêm comment vào bài viết tạm thời
                    count_comment = Number(count_comment) + 1;
                    $('.comment_error').text('');

                    $('.post_count_comment').text(count_comment);
                    const htmls  = (() =>{
                    return `
                            <?php if(auth()->guard()->check()): ?>
                                <li>
                                    <div class="comment--item clearfix">
                                        <div class="comment--img float--left">
                                            <img style="border-radius: 50%; margin: auto; background-size: cover ;  width: 68px; height: 68px;   background-image: url(<?php echo e(auth()->user()->image ?  asset('storage/' . auth()->user()->image->path) : asset('storage/placeholders/user_placeholder.jpg')); ?>)"  alt="">
                                        </div>
                                        <div class="comment--info">
                                            <div class="comment--header clearfix">
                                            <p class="name"><?php echo e(auth()->user()->name); ?></p> 
                                                <p class="date">vừa xong</p>
                                                <a href="javascript:;" class="reply"><i class="fa fa-flag"></i></a>
                                            </div>
                                            <div class="comment--content">
                                                <p>${data.result['the_comment']}</p>
                                                <p class="star">
                                                    <span class="text-left"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endif; ?>
                        `
                        });
                    ListComment.append(htmls);


					$('.global-message').addClass('alert alert-info');
					$('.global-message').fadeIn();
					$('.global-message').text(data.message);

					clearData( $($this).parents("form"), [
						'the_comment',
					]);

					setTimeout(() => {
						$(".global-message").fadeOut();
					}, 5000)

				}else{
                    $('.comment_error').text(data.errors);
				}
			}
		})
	})
</script>

<?php $__env->stopSection(); ?><?php /**PATH C:\laragon\www\Project\newslaravel\resources\views/components/blog/side-outstanding_posts.blade.php ENDPATH**/ ?>