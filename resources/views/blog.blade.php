@extends('main_layouts.blog')

@section('title', 'TDQ - Blog tâm sự')

@section('content')

    <div class="main-content--section pbottom--30">
        <div class="container">
            <div class="main--content">
                <div class="post--items post--items-1 pd--30-0" data-ajax-content="outer">
                    <ul class="nav row gutter--15" data-ajax-content="inner">
                        <li class="col-md-12">
                            <div class="post--item post--layout-1 post--title-large">
                                {{-- <div class="post--img"> <a href="news-single-v1.html" class="thumb"><img
                                            src="https://themelooks.us/demo/usnews/html/img/home-img/photo-gallery-01.jpg" alt="" data-rjs="2"
                                            data-rjs-processed="true"></a> <a href="#" class="cat">Serfer</a> <a
                                        href="#" class="icon"><i class="fa fa-eye"></i></a>
                                    <div class="post--info">
                                        <ul class="nav meta">
                                            <li><a href="#">Astaroth</a></li>
                                            <li><a href="#">Today 05:52 pm</a></li>
                                        </ul>
                                        <div class="title text-xxs-ellipsis">
                                            <h2 class="h4"><a href="news-single-v1.html" class="btn-link">Standard chunk
                                                    of Lorem Ipsum used since the 1500s is reproduced below for those
                                                    interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum</a>
                                            </h2>
                                        </div>
                                    </div>
                                </div> --}}
								@if(isset($posts_new[0]))
								<div class="post--img">
									<a href="{{ url('bai-vet/' . $posts_new[0]->id) }}" class="thumb">
										<img src="https://via.placeholder.com/800x400?text=No+Image+Available" alt="{{ $posts_new[0]->title }}" data-rjs="2">
									</a>
									<a href="#" class="cat">{{ $posts_new[0]->category->name ?? 'Uncategorized' }}</a>
									<a href="#" class="icon"><i class="fa fa-eye"></i></a>
									<div class="post--info">
										<ul class="nav meta">
											<li><a href="#">{{ $posts_new[0]->author->name ?? 'Unknown' }}</a></li>
											<li><a href="#">{{ $posts_new[0]->created_at->format('F j, Y h:i A') }}</a></li>
										</ul>
										<div class="title text-xxs-ellipsis">
											<h2 class="h4">
												<a href="{{ url('bai-vet/' . $posts_new[0]->id) }}" class="btn-link">{{ $posts_new[0]->title }}</a>
											</h2>
										</div>
									</div>
								</div>
							@else
								<p>No posts available</p>
							@endif
							
								
								
                            </div>
                        </li>
						@for ($i = 0; $i < 3; $i++)
						@if (isset($posts_new[$i])) <!-- Check if post exists in the array -->
							<li class="col-md-4 col-xs-6 col-xxs-12">
								<div class="post--item post--layout-1">
									<div class="post--img">
										<a href="{{ url('bai-vet/' . $posts_new[$i]->id) }}" class="thumb">
											<img src="https://via.placeholder.com/800x400?text=No+Image+Available" alt="{{ $posts_new[$i]->title }}" data-rjs="2">
										</a>
										<div class="post--info">
											<ul class="nav meta">
												<li><a href="#">{{ $posts_new[$i]->author->name ?? 'Unknown' }}</a></li>
												<li><a href="#">{{ $posts_new[$i]->created_at->format('F j, Y h:i A') }}</a></li>
											</ul>
											<div class="title">
												<h2 class="h4">
													<a href="{{ url('bai-vet/' . $posts_new[$i]->id) }}" class="btn-link">{{ $posts_new[$i]->title }}</a>
												</h2>
											</div>
										</div>
									</div>
								</div>
							</li>
						@endif
					@endfor
					
                    </ul>
                    <div class="preloader bg--color-0--b" data-preloader="1">
                        <div class="preloader--inner"></div>
                    </div>
                </div>
            </div>

            <div class="ad--space pd--30-0"> <a href="#"> <img src="img/ads-img/ad-970x90.jpg" alt=""
                        class="center-block" data-rjs="2" data-rjs-processed="true"> </a> </div>
            <div class="row" style="transform: none;">
                <div class="main--content col-md-8 col-sm-7" data-sticky-content="true"
                    style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                    <div class="sticky-content-inner"
                        style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 274px;">
                        <div class="row">
                            <div class="col-md-6 ptop--30 pbottom--30">
                                <div class="post--items-title" data-ajax="tab">
                                    <h2 class="h4">Health &amp; fitness</h2>
                                    <div class="nav"> <a href="#" class="prev btn-link"
                                            data-ajax-action="load_prev_health_fitness_posts"> <i
                                                class="fa fa-long-arrow-left"></i> </a> <span class="divider">/</span> <a
                                            href="#" class="next btn-link"
                                            data-ajax-action="load_next_health_fitness_posts"> <i
                                                class="fa fa-long-arrow-right"></i> </a> </div>
                                </div>
                                <div class="post--items post--items-3" data-ajax-content="outer">
                                    <ul class="nav" data-ajax-content="inner">
                                        <li>
                                            <div class="post--item post--layout-1">
                                                <div class="post--img"> <a href="news-single-v1.html"
                                                        class="thumb"><img src="img/home-img/health-and-fitness-01.jpg"
                                                            alt="" data-rjs="2"
                                                            data-rjs-processed="true"></a> <a href="#"
                                                        class="cat">Business</a> <a href="#"
                                                        class="icon"><i class="fa fa-star-o"></i></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">Bathin</a></li>
                                                            <li><a href="#">Yeasterday 03:52 pm</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4"><a href="news-single-v1.html"
                                                                    class="btn-link">It is a long established fact that a
                                                                    reader will be distracted by</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="post--item post--layout-3">
                                                <div class="post--img"> <a href="news-single-v1.html"
                                                        class="thumb"><img src="img/home-img/health-and-fitness-02.jpg"
                                                            alt="" data-rjs="2"
                                                            data-rjs-processed="true"></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">Maclaan John</a></li>
                                                            <li><a href="#">16 April 2017</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4"><a href="news-single-v1.html"
                                                                    class="btn-link">Established fact that a reader will
                                                                    be distracted by the readable content</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="post--item post--layout-3">
                                                <div class="post--img"> <a href="news-single-v1.html"
                                                        class="thumb"><img src="img/home-img/health-and-fitness-03.jpg"
                                                            alt="" data-rjs="2"
                                                            data-rjs-processed="true"></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">Ziminiar</a></li>
                                                            <li><a href="#">16 April 2017</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4"><a href="news-single-v1.html"
                                                                    class="btn-link">Long established fact that a reader
                                                                    will be distracted by the readable</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="post--item post--layout-3">
                                                <div class="post--img"> <a href="news-single-v1.html"
                                                        class="thumb"><img src="img/home-img/health-and-fitness-04.jpg"
                                                            alt="" data-rjs="2"
                                                            data-rjs-processed="true"></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">Vanth</a></li>
                                                            <li><a href="#">16 April 2017</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4"><a href="news-single-v1.html"
                                                                    class="btn-link">Long established fact that a reader
                                                                    will be distracted by the readable</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="post--item post--layout-3">
                                                <div class="post--img"> <a href="news-single-v1.html"
                                                        class="thumb"><img src="img/home-img/health-and-fitness-05.jpg"
                                                            alt="" data-rjs="2"
                                                            data-rjs-processed="true"></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">Vanth</a></li>
                                                            <li><a href="#">16 April 2017</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4"><a href="news-single-v1.html"
                                                                    class="btn-link">Long established fact that a reader
                                                                    will be distracted by the readable</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="preloader bg--color-0--b" data-preloader="1">
                                        <div class="preloader--inner"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ptop--30 pbottom--30">
                                <div class="post--items-title" data-ajax="tab">
                                    <h2 class="h4">Lifestyle</h2>
                                    <div class="nav"> <a href="#" class="prev btn-link"
                                            data-ajax-action="load_prev_lifestyle_posts"> <i
                                                class="fa fa-long-arrow-left"></i> </a> <span class="divider">/</span>
                                        <a href="#" class="next btn-link"
                                            data-ajax-action="load_next_lifestyle_posts"> <i
                                                class="fa fa-long-arrow-right"></i> </a> </div>
                                </div>
                                <div class="post--items post--items-2" data-ajax-content="outer">
                                    <ul class="nav row gutter--15" data-ajax-content="inner">
                                        <li class="col-xs-12">
                                            <div class="post--item post--layout-1">
                                                <div class="post--img"> <a href="news-single-v1.html"
                                                        class="thumb"><img src="img/home-img/lifestyle-01.jpg"
                                                            alt="" data-rjs="2"
                                                            data-rjs-processed="true"></a> <a href="#"
                                                        class="cat">Fashion</a> <a href="#" class="icon"><i
                                                            class="fa fa-heart-o"></i></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">Astaroth</a></li>
                                                            <li><a href="#">Yeasterday 03:52 pm</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4"><a href="news-single-v1.html"
                                                                    class="btn-link">Siriya attaced by a long established
                                                                    fact that a reader will be distracted by</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-12">
                                            <hr class="divider">
                                        </li>
                                        <li class="col-xs-6">
                                            <div class="post--item post--layout-2">
                                                <div class="post--img"> <a href="news-single-v1.html"
                                                        class="thumb"><img src="img/home-img/lifestyle-02.jpg"
                                                            alt="" data-rjs="2"
                                                            data-rjs-processed="true"></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">Astaroth</a></li>
                                                            <li><a href="#">17 April 2017</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4"><a href="news-single-v1.html"
                                                                    class="btn-link">It is a long established fact that a
                                                                    reader will done</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-6">
                                            <div class="post--item post--layout-2">
                                                <div class="post--img"> <a href="news-single-v1.html"
                                                        class="thumb"><img src="img/home-img/lifestyle-03.jpg"
                                                            alt="" data-rjs="2"
                                                            data-rjs-processed="true"></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">Astaroth</a></li>
                                                            <li><a href="#">17 April 2017</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4"><a href="news-single-v1.html"
                                                                    class="btn-link">It is a long established fact that a
                                                                    reader will done</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-12">
                                            <hr class="divider">
                                        </li>
                                        <li class="col-xs-6">
                                            <div class="post--item post--layout-2">
                                                <div class="post--img"> <a href="news-single-v1.html"
                                                        class="thumb"><img src="img/home-img/lifestyle-04.jpg"
                                                            alt="" data-rjs="2"
                                                            data-rjs-processed="true"></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">Astaroth</a></li>
                                                            <li><a href="#">17 April 2017</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4"><a href="news-single-v1.html"
                                                                    class="btn-link">It is a long established fact that a
                                                                    reader will done</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-6">
                                            <div class="post--item post--layout-2">
                                                <div class="post--img"> <a href="news-single-v1.html"
                                                        class="thumb"><img src="img/home-img/lifestyle-05.jpg"
                                                            alt="" data-rjs="2"
                                                            data-rjs-processed="true"></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">Astaroth</a></li>
                                                            <li><a href="#">17 April 2017</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4"><a href="news-single-v1.html"
                                                                    class="btn-link">It is a long established fact that a
                                                                    reader will done</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="preloader bg--color-0--b" data-preloader="1">
                                        <div class="preloader--inner"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 ptop--30 pbottom--30">
                                <div class="post--items-title" data-ajax="tab">
                                    <h2 class="h4">Foods &amp; Recipes</h2>
                                    <div class="nav"> <a href="#" class="prev btn-link"
                                            data-ajax-action="load_prev_food_resturent_posts"> <i
                                                class="fa fa-long-arrow-left"></i> </a> <span class="divider">/</span>
                                        <a href="#" class="next btn-link"
                                            data-ajax-action="load_next_food_resturent_posts"> <i
                                                class="fa fa-long-arrow-right"></i> </a> </div>
                                </div>
                                <div class="post--items" data-ajax-content="outer">
                                    <ul class="nav row gutter--15" data-ajax-content="inner">
                                        <li class="col-md-4 col-xs-6 col-xxs-12">
                                            <div class="post--item post--layout-1">
                                                <div class="post--img"> <a href="news-single-v1.html"
                                                        class="thumb"><img src="img/home-img/food-and-resturent-01.jpg"
                                                            alt="" data-rjs="2"
                                                            data-rjs-processed="true"></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">Astaroth</a></li>
                                                            <li><a href="#">Yeasterday 03:52 pm</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4"><a href="news-single-v1.html"
                                                                    class="btn-link">It is a long established fact that a
                                                                    reader will be distracted by</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-12 hidden shown-xxs">
                                            <hr class="divider">
                                        </li>
                                        <li class="col-md-4 col-xs-6 col-xxs-12">
                                            <div class="post--item post--layout-1">
                                                <div class="post--img"> <a href="news-single-v1.html"
                                                        class="thumb"><img src="img/home-img/food-and-resturent-02.jpg"
                                                            alt="" data-rjs="2"
                                                            data-rjs-processed="true"></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">Astaroth</a></li>
                                                            <li><a href="#">Yeasterday 03:52 pm</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4"><a href="news-single-v1.html"
                                                                    class="btn-link">It is a long established fact that a
                                                                    reader will be distracted by</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-md-4 hidden-sm hidden-xs">
                                            <div class="post--item post--layout-1">
                                                <div class="post--img"> <a href="news-single-v1.html"
                                                        class="thumb"><img src="img/home-img/food-and-resturent-03.jpg"
                                                            alt="" data-rjs="2"
                                                            data-rjs-processed="true"></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">Astaroth</a></li>
                                                            <li><a href="#">Yeasterday 03:52 pm</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4"><a href="news-single-v1.html"
                                                                    class="btn-link">It is a long established fact that a
                                                                    reader will be distracted by</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="preloader bg--color-0--b" data-preloader="1">
                                        <div class="preloader--inner"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="resize-sensor"
                            style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;">
                            <div class="resize-sensor-expand"
                                style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                <div
                                    style="position: absolute; left: 0px; top: 0px; transition: all; width: 790px; height: 1012px;">
                                </div>
                            </div>
                            <div class="resize-sensor-shrink"
                                style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                <div
                                    style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main--sidebar col-md-4 col-sm-5 ptop--30 pbottom--30" data-sticky-content="true"
                    style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                    <div class="sticky-content-inner"
                        style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
                        <div class="widget">
                            <div class="widget--title" data-ajax="tab">
                                <h2 class="h4">Voting Poll (Checkbox)</h2>
                                <div class="nav"> <a href="#" class="prev btn-link"
                                        data-ajax-action="load_prev_poll_widget"> <i class="fa fa-long-arrow-left"></i>
                                    </a> <span class="divider">/</span> <a href="#" class="next btn-link"
                                        data-ajax-action="load_next_poll_widget"> <i class="fa fa-long-arrow-right"></i>
                                    </a> </div>
                            </div>
                            <div class="poll--widget" data-ajax-content="outer">
                                <ul class="nav" data-ajax-content="inner">
                                    <li class="title">
                                        <h3 class="h4">Which was the best Football World Cup ever in your opinion?
                                        </h3>
                                    </li>
                                    <li class="options">
                                        <form action="#">
                                            <div class="checkbox"> <label> <input type="checkbox" name="option-1">
                                                    <span>Brazil 2014</span> </label>
                                                <p>65%<span style="width: 65%;"></span></p>
                                            </div>
                                            <div class="checkbox"> <label> <input type="checkbox" name="option-2">
                                                    <span>South Africa 2010</span> </label>
                                                <p>28%<span style="width: 28%;"></span></p>
                                            </div>
                                            <div class="checkbox"> <label> <input type="checkbox" name="option-2">
                                                    <span>Germany 2006</span> </label>
                                                <p>07%<span style="width: 07%;"></span></p>
                                            </div><button type="submit" class="btn btn-primary">Vote Now</button>
                                        </form>
                                    </li>
                                </ul>
                                <div class="preloader bg--color-0--b" data-preloader="1">
                                    <div class="preloader--inner"></div>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget--title" data-ajax="tab">
                                <h2 class="h4">Voting Poll (Radio)</h2>
                                <div class="nav"> <a href="#" class="prev btn-link"
                                        data-ajax-action="load_prev_poll_widget"> <i class="fa fa-long-arrow-left"></i>
                                    </a> <span class="divider">/</span> <a href="#" class="next btn-link"
                                        data-ajax-action="load_next_poll_widget"> <i class="fa fa-long-arrow-right"></i>
                                    </a> </div>
                            </div>
                            <div class="poll--widget" data-ajax-content="outer">
                                <ul class="nav" data-ajax-content="inner">
                                    <li class="title">
                                        <h3 class="h4">Do you think the cost of sending money to mobile phone should
                                            be reduced?</h3>
                                    </li>
                                    <li class="options">
                                        <form action="#">
                                            <div class="radio"> <label> <input type="radio" name="option-1">
                                                    <span>Yes</span> </label>
                                                <p>65%<span style="width: 65%;"></span></p>
                                            </div>
                                            <div class="radio"> <label> <input type="radio" name="option-1">
                                                    <span>No</span> </label>
                                                <p>28%<span style="width: 28%;"></span></p>
                                            </div>
                                            <div class="radio"> <label> <input type="radio" name="option-1">
                                                    <span>Average</span> </label>
                                                <p>07%<span style="width: 07%;"></span></p>
                                            </div><button type="submit" class="btn btn-primary">Vote Now</button>
                                        </form>
                                    </li>
                                </ul>
                                <div class="preloader bg--color-0--b" data-preloader="1">
                                    <div class="preloader--inner"></div>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="ad--widget">
                                <div class="row">
                                    <div class="col-sm-6"> <a href="#"> <img src="img/ads-img/ad-150x150-1.jpg"
                                                alt="" data-rjs="2" data-rjs-processed="true"> </a> </div>
                                    <div class="col-sm-6"> <a href="#"> <img src="img/ads-img/ad-150x150-2.jpg"
                                                alt="" data-rjs="2" data-rjs-processed="true"> </a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget--title" data-ajax="tab">
                                <h2 class="h4">Readers Opinion</h2>
                                <div class="nav"> <a href="#" class="prev btn-link"
                                        data-ajax-action="load_prev_readers_opinion_widget"> <i
                                            class="fa fa-long-arrow-left"></i> </a> <span class="divider">/</span> <a
                                        href="#" class="next btn-link"
                                        data-ajax-action="load_next_readers_opinion_widget"> <i
                                            class="fa fa-long-arrow-right"></i> </a> </div>
                            </div>
                            <div class="list--widget list--widget-2" data-ajax-content="outer">
                                <div class="post--items post--items-3">
                                    <ul class="nav" data-ajax-content="inner">
                                        <li>
                                            <div class="post--item post--layout-3">
                                                <div class="post--img"> <span class="thumb"><img
                                                            src="img/widgets-img/readers-opinion-01.png" alt=""
                                                            data-rjs="2" data-rjs-processed="true"></span>
                                                    <div class="post--info">
                                                        <div class="title">
                                                            <h3 class="h4">Long established fact that a reader will be
                                                                distracted</h3>
                                                        </div>
                                                        <ul class="nav meta">
                                                            <li><span>by Ninurta</span></li>
                                                            <li><span>16 April 2017</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="post--item post--layout-3">
                                                <div class="post--img"> <span class="thumb"><img
                                                            src="img/widgets-img/readers-opinion-02.png" alt=""
                                                            data-rjs="2" data-rjs-processed="true"></span>
                                                    <div class="post--info">
                                                        <div class="title">
                                                            <h3 class="h4">Long established fact that a reader will be
                                                                distracted</h3>
                                                        </div>
                                                        <ul class="nav meta">
                                                            <li><span>by Ninurta</span></li>
                                                            <li><span>16 April 2017</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="post--item post--layout-3">
                                                <div class="post--img"> <span class="thumb"><img
                                                            src="img/widgets-img/readers-opinion-03.png" alt=""
                                                            data-rjs="2" data-rjs-processed="true"></span>
                                                    <div class="post--info">
                                                        <div class="title">
                                                            <h3 class="h4">Long established fact that a reader will be
                                                                distracted</h3>
                                                        </div>
                                                        <ul class="nav meta">
                                                            <li><span>by Ninurta</span></li>
                                                            <li><span>16 April 2017</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="preloader bg--color-0--b" data-preloader="1">
                                        <div class="preloader--inner"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget--title" data-ajax="tab">
                                <h2 class="h4">Editors Choice</h2>
                                <div class="nav"> <a href="#" class="prev btn-link"
                                        data-ajax-action="load_prev_editors_choice_widget"> <i
                                            class="fa fa-long-arrow-left"></i> </a> <span class="divider">/</span> <a
                                        href="#" class="next btn-link"
                                        data-ajax-action="load_next_editors_choice_widget"> <i
                                            class="fa fa-long-arrow-right"></i> </a> </div>
                            </div>
                            <div class="list--widget list--widget-1" data-ajax-content="outer">
                                <div class="post--items post--items-3">
                                    <ul class="nav" data-ajax-content="inner">
                                        <li>
                                            <div class="post--item post--layout-3">
                                                <div class="post--img"> <a href="news-single-v1.html"
                                                        class="thumb"><img src="img/widgets-img/editors-choice-01.jpg"
                                                            alt="" data-rjs="2"
                                                            data-rjs-processed="true"></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">Ninurta</a></li>
                                                            <li><a href="#">16 April 2017</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4"><a href="news-single-v1.html"
                                                                    class="btn-link">Long established fact that a reader
                                                                    will be distracted</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="post--item post--layout-3">
                                                <div class="post--img"> <a href="news-single-v1.html"
                                                        class="thumb"><img src="img/widgets-img/editors-choice-02.jpg"
                                                            alt="" data-rjs="2"
                                                            data-rjs-processed="true"></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">Orcus</a></li>
                                                            <li><a href="#">16 April 2017</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4"><a href="news-single-v1.html"
                                                                    class="btn-link">Long established fact that a reader
                                                                    will be distracted</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="post--item post--layout-3">
                                                <div class="post--img"> <a href="news-single-v1.html"
                                                        class="thumb"><img src="img/widgets-img/editors-choice-03.jpg"
                                                            alt="" data-rjs="2"
                                                            data-rjs-processed="true"></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">Rahab</a></li>
                                                            <li><a href="#">16 April 2017</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4"><a href="news-single-v1.html"
                                                                    class="btn-link">Long established fact that a reader
                                                                    will be distracted</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="post--item post--layout-3">
                                                <div class="post--img"> <a href="news-single-v1.html"
                                                        class="thumb"><img src="img/widgets-img/editors-choice-04.jpg"
                                                            alt="" data-rjs="2"
                                                            data-rjs-processed="true"></a>
                                                    <div class="post--info">
                                                        <ul class="nav meta">
                                                            <li><a href="#">Tannin</a></li>
                                                            <li><a href="#">16 April 2017</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <h3 class="h4"><a href="news-single-v1.html"
                                                                    class="btn-link">Long established fact that a reader
                                                                    will be distracted</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="preloader bg--color-0--b" data-preloader="1">
                                        <div class="preloader--inner"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="resize-sensor"
                            style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;">
                            <div class="resize-sensor-expand"
                                style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                <div
                                    style="position: absolute; left: 0px; top: 0px; transition: all; width: 400px; height: 1760px;">
                                </div>
                            </div>
                            <div class="resize-sensor-shrink"
                                style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                <div
                                    style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
