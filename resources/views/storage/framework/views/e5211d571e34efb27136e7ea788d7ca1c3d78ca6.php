<?php
use Carbon\Carbon;
use App\Models\Category;
$now = Carbon::now('Asia/Ho_Chi_Minh')->locale('vi');
$categoryFooter  = Category::where('name','!=','Chưa phân loại')->withCount('posts')->orderBy('created_at','DESC')->take(12)->get();

?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $__env->yieldContent('title'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="_token" content="<?php echo e(csrf_token()); ?>" />


  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link rel="icon" type="image/png" href="<?php echo e(asset('kcnew/frontend/img/image_iconLogo.png')); ?>"  sizes="160x160">

	<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo e(asset('blog_template/css/animate.css')); ?>">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php echo e(asset('blog_template/css/icomoon.css')); ?>">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo e(asset('blog_template/css/bootstrap.css')); ?>">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="<?php echo e(asset('blog_template/css/magnific-popup.css')); ?>">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="<?php echo e(asset('blog_template/css/flexslider.css')); ?>">

	<!-- Owl Carousel -->
	<!-- <link rel="stylesheet" href="<?php echo e(asset('blog_template/css/owl.carousel.min.')); ?>"> -->
	<link rel="stylesheet" href="<?php echo e(asset('blog_template/css/owl.theme.default.min.css')); ?>">
	
	<!-- Flaticons  -->
	<link rel="stylesheet" href="<?php echo e(asset('blog_template/fonts/flaticon/font/flaticon.css')); ?>">

	<!-- Theme style  -->
	<link rel="stylesheet" href="<?php echo e(asset('blog_template/css/style.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/mystyle.css')); ?>">

	<!-- Modernizr JS -->
	<script src="<?php echo e(asset('blog_template/js/modernizr-2.6.2.min.js')); ?>"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->


	<!-- =====  CSS - Teamplate KCNEWS =========== -->


    <!-- ==== Google Font ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700">

    <!-- ==== Font Awesome ==== -->
    <link rel="stylesheet" href="<?php echo e(asset('kcnew/frontend/css/font-awesome.min.css')); ?>">

    <!-- ==== Bootstrap Framework ==== -->
    <link rel="stylesheet" href="<?php echo e(asset('kcnew/frontend/css/bootstrap.min.css')); ?>">

    <!-- ==== Bar Rating Plugin ==== -->
    <link rel="stylesheet" href="<?php echo e(asset('kcnew/frontend/css/fontawesome-stars-o.min.css')); ?>">

    <!-- ==== Main Stylesheet ==== -->
    <link rel="stylesheet" href="<?php echo e(asset('kcnew/frontend/style.css')); ?>">

    <!-- ==== Responsive Stylesheet ==== -->
    <link rel="stylesheet" href="<?php echo e(asset('kcnew/frontend/css/responsive-style.css')); ?>">

    <!-- ==== Theme Color Stylesheet ==== -->
    <link rel="stylesheet" href="<?php echo e(asset('kcnew/frontend/css/colors/theme-color-9.css')); ?>" id="changeColorScheme">

    <!-- ==== Custom Stylesheet ==== -->
    <link rel="stylesheet" href="<?php echo e(asset('kcnew/frontend/css/custom.css')); ?>">

    <?php echo $__env->yieldContent('custom_css'); ?>

</head>
<body class="boxed" data-bg-img="<?php echo e(asset('kcnew/frontend/img/bg_website.png')); ?>">
		
	<header class="header--section header--style-3">
		<!-- Header Topbar Start -->
		<div class="header--topbar  bg--color-1">

			<div class="container">
				<div class="float--left float--xs-none text-xs-center">
					<!-- Header Topbar Info Start -->
					<ul class="header--topbar-info nav">
						<li>
							<a href="<?php echo e(route('home')); ?>">
								<img style="border-radius: 12px; height: 40px;" src="<?php echo e(asset('kcnew/frontend/img/image_logo.png')); ?>" alt="logo">
							</a>
						</li>
						<li><i class="fa fm fa-map-marker"></i>Hồ Chí Minh</li>
						<li><i class="fa fm fa-mixcloud"></i>28<sup>0</sup> C</li>
						<li style="text-transform: capitalize" ><i class="fa fm fa-calendar"></i>Hôm nay ( <?php echo e($now->translatedFormat('l')); ?>, Ngày <?php echo e($now->translatedFormat('jS F')); ?> Năm <?php echo e($now->translatedFormat('Y')); ?> )</li>
					</ul>
					<!-- Header Topbar Info End -->
				</div>
	
				<div class="float--right float--xs-none text-xs-center">
					<!-- Header Topbar Action Start -->
					<ul class="header--topbar-action nav">
							<?php if(auth()->guard()->guest()): ?>
							<li class="btn-cta">
								<a href="<?php echo e(route('login')); ?>">
									<i class="fa fm fa-user-o"></i>
									<span>Đăng Nhập</span>
								</a>
							</li>
							<?php endif; ?>

							<?php if(auth()->guard()->check()): ?>
								<li class="has-dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#">
										<i class="fa fm fa-user-o"></i>
										<?php echo e(auth()->user()->name); ?> 
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu">
										<?php if(auth()->user()->role->name !== 'user'): ?>
										<li>
											<a href="<?php echo e(route('admin.index')); ?>">Admin - Dashbroad</a>
										</li>
										<?php endif; ?>
										<li>
											<a href="<?php echo e(route('profile')); ?>">Tài khoản của tôi</a>
										</li>
										<li>
											<a onclick="event.preventDefault(); document.getElementById('nav-logout-form').submit();"
											href="">Đăng xuất
											<i class="fa fm fa-arrow-circle-right"></i>
											</a>

											<form id="nav-logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
												<?php echo csrf_field(); ?>
											</form>
										</li>
									</ul>
								</li>
							<?php endif; ?>

					</ul>
					<!-- Header Topbar Action End -->
	
	
					<!-- Header Topbar Social Start -->
					<ul class="header--topbar-social nav hidden-sm hidden-xxs">
						<li><a href="https://www.facebook.com/people/Anh-Tuan/100007007238964"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://www.youtube.com/c/H%E1%BB%93AnhTu%E1%BA%A5nYoutube"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://www.youtube.com/c/H%E1%BB%93AnhTu%E1%BA%A5nYoutube"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="https://www.youtube.com/c/H%E1%BB%93AnhTu%E1%BA%A5nYoutube"><i class="fa fa-rss"></i></a></li>
						<li><a href="https://www.youtube.com/c/H%E1%BB%93AnhTu%E1%BA%A5nYoutube"><i class="fa fa-youtube-play"></i></a></li>
					</ul>
					<!-- Header Topbar Social End -->
				</div>
			</div>
		</div>
		<!-- Header Topbar End -->
	
		<!-- Header Navbar Start -->
		<div class="header--navbar navbar bd--color-1 bg--color-0" data-trigger="sticky">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#headerNav"
						aria-expanded="false" aria-controls="headerNav">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
	
				<div id="headerNav" class="navbar-collapse collapse float--left">
					<!-- Header Menu Links Start -->
					<ul class="header--menu-links nav navbar-nav" data-trigger="hoverIntent">
						<li>
							<a href="<?php echo e(route('home')); ?>">
								<i class="icon_home fa fa-home"></i>
							</a>
						</li>
						<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><a href="<?php echo e(route('categories.show', $category)); ?>"><?php echo e($category->name); ?></a></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Trang<i
									class="fa flm fa-angle-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo e(route('about')); ?>">Giới thiệu</a></li>
								<li><a href="<?php echo e(route('contact.create')); ?>">Liên hệ</a></li>
								<li><a href="<?php echo e(route('erorrs.404')); ?>">404</a></li>
							</ul>
						</li>
						<li>
							<a href="<?php echo e(route('categories.index')); ?>">
								<span style="color: #ccc; margin-right: 10px;">Tất cả</span>
								<img  width="17" class="icon-menu" src="https://static.vnncdn.net/v1/icon/menu-center.svg">
							</a>
						</li>
					</ul>
					<!-- Header Menu Links End -->
				</div>
	
				<!-- Header Search Form Start -->
				<form method="POST" action="<?php echo e(route('search')); ?>" class="header--search-form float--right" data-form="validate">
					<?php echo csrf_field(); ?>	
					<input type="search" name="search" placeholder="Search..." class="header--search-control form-control"
                    required>
	
					<button type="submit" class="header--search-btn btn"><i
							class="header--search-icon fa fa-search"></i></button>
				</form>
				<!-- Header Search Form End -->
			</div>
		</div>
		<!-- Header Navbar End -->
	</header>

	<!-- Header Section End -->
	<div id="page" class="wrapper">
	
		<!-- Posts Filter Bar Start -->
		<div class="posts--filter-bar style--3 hidden-xs">
			<div class="container">
				<ul class="nav">
					<li>
						<a href="<?php echo e(route('newPost')); ?>">
							<i class="fa fa-star-o"></i>
							<span>Tin tức mới nhất</span>
						</a>
					</li>
				
					<li>
						<a href="<?php echo e(route('hotPost')); ?>">
							<i class="fa fa-fire"></i>
							<span>Tin nóng</span>
						</a>
					</li>
					<li>
						<a href="<?php echo e(route('viewPost')); ?>">
							<i class="fa fa-eye"></i>
							<span>Xem nhiều nhất</span>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<!-- News Ticker Start -->
		<div class="news--ticker">
			<div class="container">
				<div class="title">
					<h2>Tin mới cập nhật</h2>
				</div>

				<div class="news-updates--list" data-marquee="true">
					<ul class="nav">
						<?php $__currentLoopData = $posts_new; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts_new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li>
								<h3 class="h3"><a href="<?php echo e(route('posts.show', $posts_new[0])); ?>"><?php echo e($posts_new[0]->title); ?></a></h3>
							</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				</div>
			</div>
		</div>

		<?php echo $__env->yieldContent('content'); ?>

	</div>
	

	<footer id="colorlib-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-2   colorlib-widget">
					<ul class="colorlib-footer-links">
						<li><a href="<?php echo e(route('home')); ?>"></i>Trang chủ</a></li>
						<li><a href="<?php echo e(route('about')); ?>"></i>Giới thiệu</a></li>
						<li><a href="<?php echo e(route('contact.create')); ?>"></i>Liên hệ</a></li>
						<li><a href="<?php echo e(route('contact.create')); ?>"></i>Mới nhất</a></li>
					</ul>
				</div>
				<div class="col-md-2  colorlib-widget">
						<ul class="colorlib-footer-links">
							<?php for($i = 0; $i < 4; $i++): ?>
							<li><a href="<?php echo e(route('categories.show', $categoryFooter[$i] )); ?>"><?php echo e($categoryFooter[$i]->name); ?></a></li>
							<?php endfor; ?>
							
						</ul>
				</div>
				<div class="col-md-2  colorlib-widget">
						<ul class="colorlib-footer-links">
							<?php for($i = 4; $i < 8; $i++): ?>
							<li><a href="<?php echo e(route('categories.show', $categoryFooter[$i] )); ?>"><?php echo e($categoryFooter[$i]->name); ?></a></li>
							<?php endfor; ?>
							
						</ul>
				</div>

				<div class="col-md-2  colorlib-widget">
						<ul class="colorlib-footer-links">
							<?php for($i = 8; $i < 12; $i++): ?>
							<li><a href="<?php echo e(route('categories.show', $categoryFooter[$i] )); ?>"><?php echo e($categoryFooter[$i]->name); ?></a></li>
							<?php endfor; ?>
						</ul>
				</div>

				<div class="col-md-4 ">
					<h4>Theo dõi chúng tôi</h4>
					<div class="row">
						<div class="col-md-12">
							<form  class="form-inline qbstp-header-subscribe">
									<div class="form-group">
										<input name='subscribe-email' type="email" required class="form-control" id="email" placeholder="Nhập email của bạn">
									</div>
									<div class="form-group ">
										<button id='subscibe-btn'   type="submit" class="btn btn-primary">Đăng ký ngay</button>
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		
		</div>


	
		<div class="container">
			<div style=" padding: 15px 0; display: flex;" class=" row">
				<div class="col-md-4">
					<p>
						<a href="<?php echo e(route('home')); ?>">
							<img style="border-radius: 12px; width: 120px;" src="<?php echo e(asset('kcnew/frontend/img/image_logo.png')); ?>" alt="logo">
						</a>
					</p>
					<p>
						<span style="font-size: 14px" class="block">Báo tiếng Việt nhiều người xem nhất</span>
					</p>
					<p>
						<span style="font-size: 14px" class="block">Thuộc Bộ Khoa học Công nghệ</span>
					</p>
					<p>
						<span style="font-size: 14px" class="block">Số giấy phép: 548/GP-BTTTT ngày 27/06/2022</span>
					</p>
				</div>
				<div class="col-md-4">
					<p>
						<span style="font-size: 14px" class="block">Tổng biên tập: Nhóm TDQ Hutech</span>
					</p>
					<p>
						<span style="font-size: 14px" class="block">Địa chỉ: E1, Khu Công Nghệ cao, Phường Hiệp Phú, TP.HCM</span>
					</p>
					<p>
						<span style="font-size: 14px" class="block">Điện thoại: 0392766630</span>
					</p>
				</div>
				<div class="col-md-4">
					<p>
						<small style="font-size: 14px" class="block">&copy; 2022. Toàn bộ bản quyền thuộc DTQ</small>
					</p>
					<p>
						<ul style="display: flex;" class="header--topbar-social nav hidden-sm hidden-xxs">
							<li><a href="https://www.facebook.com/people/Anh-Tuan/100007007238964"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://www.youtube.com/c/H%E1%BB%93AnhTu%E1%BA%A5nYoutube"><i class="fa fa-twitter"></i></a></li>
							<li><a href="https://www.youtube.com/c/H%E1%BB%93AnhTu%E1%BA%A5nYoutube"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="https://www.youtube.com/c/H%E1%BB%93AnhTu%E1%BA%A5nYoutube"><i class="fa fa-rss"></i></a></li>
							<li><a href="https://www.youtube.com/c/H%E1%BB%93AnhTu%E1%BA%A5nYoutube"><i class="fa fa-youtube-play"></i></a></li>
						</ul>
					</p>
				</div>
			</div>
		</div>
	</footer>


	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	
		<!-- jQuery -->
	<script src="<?php echo e(asset('blog_template/js/jquery.min.js')); ?>"></script>
	<!-- jQuery Easing -->
	<script src="<?php echo e(asset('blog_template/js/jquery.easing.1.3.js')); ?>"></script>
	<!-- Bootstrap -->
	<script src="<?php echo e(asset('blog_template/js/bootstrap.min.js')); ?>"></script>
	<!-- Waypoints -->
	<script src="<?php echo e(asset('blog_template/js/jquery.waypoints.min.js')); ?>"></script>
	<!-- Stellar Parallax -->
	<script src="<?php echo e(asset('blog_template/js/jquery.stellar.min.js')); ?>"></script>
	<!-- Flexslider -->
	<script src="<?php echo e(asset('blog_template/js/jquery.flexslider-min.js')); ?>"></script>
	<!-- Owl carousel -->
	<script src="<?php echo e(asset('blog_template/js/owl.carousel.min.js')); ?>"></script>
	<!-- Magnific Popup -->
	<script src="<?php echo e(asset('blog_template/js/jquery.magnific-popup.min.js')); ?>"></script>
	<script src="<?php echo e(asset('blog_template/js/magnific-popup-options.js')); ?>"></script>
	<!-- Counters -->
	<script src="<?php echo e(asset('blog_template/js/jquery.countTo.js')); ?>"></script>
	<!-- Main -->
	<script src="<?php echo e(asset('blog_template/js/main.js')); ?>"></script>

	<script src="<?php echo e(asset('js/function.js')); ?>"></script>


	<!-- ==== JS TEAMPLATED KCNEWS jQuery Library ==== -->
	<!-- <script src="<?php echo e(asset('kcnew/frontend/js/jquery-3.2.1.min.js')); ?>"></script> -->

	<!-- ==== Bootstrap Framework ==== -->
	<!-- <script src="<?php echo e(asset('kcnew/frontend/js/bootstrap.min.js')); ?>"></script> -->

	<!-- ==== StickyJS Plugin ==== -->
	<script src="<?php echo e(asset('kcnew/frontend/js/jquery.sticky.min.js')); ?>"></script>

	<!-- ==== HoverIntent Plugin ==== -->
	<script src="<?php echo e(asset('kcnew/frontend/js/jquery.hoverIntent.min.js')); ?>"></script>

	<!-- ==== Marquee Plugin ==== -->
	<script src="<?php echo e(asset('kcnew/frontend/js/jquery.marquee.min.js')); ?>"></script>

	<!-- ==== Validation Plugin ==== -->
	<script src="<?php echo e(asset('kcnew/frontend/js/jquery.validate.min.js')); ?>"></script>

	<!-- ==== Isotope Plugin ==== -->
	<script src="<?php echo e(asset('kcnew/frontend/js/isotope.min.js')); ?>"></script>

	<!-- ==== Resize Sensor Plugin ==== -->
	<script src="<?php echo e(asset('kcnew/frontend/js/resizesensor.min.js')); ?>"></script>

	<!-- ==== Sticky Sidebar Plugin ==== -->
	<script src="<?php echo e(asset('kcnew/frontend/js/theia-sticky-sidebar.min.js')); ?>"></script>

	<!-- ==== Zoom Plugin ==== -->
	<script src="<?php echo e(asset('kcnew/frontend/js/jquery.zoom.min.js')); ?>"></script>

	<!-- ==== Bar Rating Plugin ==== -->
	<script src="<?php echo e(asset('kcnew/frontend/js/jquery.barrating.min.js')); ?>"></script>

	<!-- ==== Countdown Plugin ==== -->
	<script src="<?php echo e(asset('kcnew/frontend/js/jquery.countdown.min.js')); ?>"></script>

	<!-- ==== RetinaJS Plugin ==== -->
	<script src="<?php echo e(asset('kcnew/frontend/js/retina.min.js')); ?>"></script>

	<!-- ==== Main JavaScript ==== -->
	<script src="<?php echo e(asset('kcnew/frontend/js/main.js')); ?>"></script>
	

	<script >
		$(function(){

			function isEmail(email) {
				var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				return regex.test(email);
			}
			$(document).on("click", "#subscibe-btn", (e) => {
				e.preventDefault();
				let _this = $(e.target);
		
				let email = _this.parents("form").find("input[name='subscribe-email']").val();
				if( ! isEmail( email))
				{
					$("body").append("<div class='global-message alert alert-danger subscribe-error'>Không đúng định dạng email.</div>");
				}
				else
				{
					//send email
					//1 using ajax
					let formData = new FormData();
					let _token = $("meta[name='_token']").attr("content");
					 
					formData.append('_token', _token);
					formData.append('email', email);

					$.ajax({
						url: "<?php echo e(route('newsletter_store')); ?>",
						type: "POST",
						dataType: "JSON",
						processData: false,
						contentType: false,
						data: formData,
						success: (respond) => {
							let message = respond.message;
							$("body").append("<div class='global-message alert alert-danger subscribe-success'>"+ message +"</div>");
						
							_this.parents("form").find("input[name='subscribe-email']").val('');
						},
						statusCode: {
							500: () => {								 
								$("body").append("<div class='global-message alert alert-danger subscribe-error'>Email này đã subscribe website chúng tôi</div>");

							}
						} 
					});
					 
				}
				setTimeout( () => {
	 
					$(".global-message.subscribe-error, .global-message.subscribe-success").remove();

				}, 5000 );
			});
		});
	</script>

	<?php echo $__env->yieldContent('custom_js'); ?>

</body>
</html>

<?php /**PATH D:\laragon\www\newslaravel-main\resources\views/main_layouts/master.blade.php ENDPATH**/ ?>