@extends('main_layouts.master')

@section('title', $post->title. ' - TDQ ')

@section('custom_css')

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Nhập API Key của bạn
        const API_KEY = 'AIzaSyAML2E3ccsu7dHtX761MCZAgGfexas-JkM';
    
        let audio = null; // Biến toàn cục để lưu trữ đối tượng Audio

        // Hàm gọi API Text-to-Speech
        async function textToSpeech(text) {
            const url = `https://texttospeech.googleapis.com/v1/text:synthesize?key=${API_KEY}`;
            const payload = {
                input: { text: text },
                voice: { languageCode: "vi-VN", name: "vi-VN-Standard-A" },
                audioConfig: { audioEncoding: "MP3" }
            };

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(payload)
                });

                const result = await response.json();
    
                if (result.audioContent) {
                    // Nếu có âm thanh, tạo đối tượng Audio mới và phát
                    if (audio) {
                        audio.pause(); // Dừng âm thanh hiện tại nếu có
                    }
                    audio = new Audio("data:audio/mp3;base64," + result.audioContent);
                    audio.play();
                } else {
                    console.error("Lỗi từ API:", result);
                }
            } catch (error) {
                console.error("Lỗi khi gọi API Text-to-Speech:", error);
            }
        }

        // Gắn sự kiện cho các nút đọc riêng biệt
        document.querySelectorAll('.read-btn[data-target]').forEach(button => {
            button.addEventListener('click', () => {
                const targetId = button.getAttribute('data-target');
                const element = document.getElementById(targetId);
                if (element) {
                    const text = element.innerText.trim();
                    if (text) {
                        textToSpeech(text);
                    } else {
                        console.warn(`Không có văn bản để đọc trong phần tử có ID: ${targetId}`);
                    }
                } else {
                    console.error(`Không tìm thấy phần tử với ID: ${targetId}`);
                }
            });
        });

        // Gắn sự kiện cho nút đọc tất cả
        const readAllBtn = document.getElementById('read-all-btn');
        if (readAllBtn) {
            readAllBtn.addEventListener('click', () => {
                const titleElement = document.getElementById('post-title');
                const bodyElement = document.getElementById('post-body');
                if (titleElement && bodyElement) {
                    const titleText = titleElement.innerText.trim();
                    const bodyText = bodyElement.innerText.trim();
                    if (titleText || bodyText) {
                        const combinedText = `${titleText}. ${bodyText}`;
                        textToSpeech(combinedText);
                    } else {
                        console.warn("Không có văn bản nào để đọc.");
                    }
                } else {
                    console.error("Không tìm thấy phần tử tiêu đề hoặc nội dung bài viết.");
                }
            });
        }

        // Gắn sự kiện cho nút dừng
        const stopBtn = document.getElementById('stop-btn');
        if (stopBtn) {
            stopBtn.addEventListener('click', () => {
                if (audio) {
                    audio.pause(); // Dừng âm thanh
                    audio.currentTime = 0; // Đặt lại vị trí phát về đầu
                    console.log("Đã dừng âm thanh.");
                }
            });
        }

    });
</script>

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
        .read-btn {
  background-color: #4CAF50;
  /* Màu xanh lá */
  border: none;
  color: white;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px 2px;
  cursor: pointer;
  border-radius: 4px;
}
.read-btn:hover {
  background-color: #45a049;
}
	</style>
@endsection

@section('content')

<div class="global-message info d-none"></div>

<!-- Main Breadcrumb Start -->
<div class="main--breadcrumb">
	<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{ route('home') }}" class="btn-link"><i class="fa fm fa-home"></i>Trang Chủ</a></li>
				<li><a href="{{ route('categories.show', $post->category ) }}" class="btn-link">{{ $post->category->name }}</a></li>
				<li class="active"><span>{{ $post->title }}</span></li>
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
									@for($i = 0; $i <  count($post->tags) ; $i++)
                                    <li><a class="text capitalize" href="{{ route('tags.show',  $post->tags[$i]) }}">{{ $post->tags[$i]->name }}</a></li>
									@endfor
                                </ul>
                            </div>

                            <div class="post--info">
                                <ul class="nav meta">
									<li class="text capitalize"><a href="#">{{ $post->created_at->locale('vi')->translatedFormat('l'), }} {{  $post->created_at->locale('vi')->format('d/m/Y') }}<a></li>
                                    <li><a href="#">{{ $post->author->name }}</a></li>
                                    <li><span><i class="fa fm fa-eye"></i>{{ $post->views }}</span></li>
                                    <li><a href="#"><i class="fa fm fa-comments-o"></i>{{ count($post->comments) }}</a></li>
                                </ul>
                                @if(!auth()->check() || auth()->user()->is_premium)
                                <button id="read-all-btn" class="read-btn">🔊 Đọc Tất Cả</button>
                                <!-- Nút dừng âm thanh -->
                                <button id="stop-btn" class="read-btn">❌ Dừng</button>
                                @endif
                                <div class="title">
                                    <h2 class="post_title h4"id="post-title">{{ $post->title }}</h2>
                                </div>
                            </div>
                            <div class="post--body post--content" id="post-body">
								{!! $post->body !!}
                            </div>
                        </div>
                        <!-- Post Item End -->

                        <!-- Advertisement Start -->
                        <div class="ad--space pd--20-0-40">
							<p class="author-info">Người viết: {{ $post->author->name }}</p>
							<p class="post-time">Thời gian: {{ $post->created_at->locale('vi')->diffForHumans() }}</p>
                        </div>
                        <!-- Advertisement End -->

                        <!-- Post Tags Start -->
                        <div class="post--tags">
                            <ul class="nav">
                                <li><span><i class="fa fa-tags"></i> Từ khóa </span></li>
								@for($i = 0; $i <  count($post->tags) ; $i++)
                                    <li><a class="text capitalize" href="{{ route('tags.show',  $post->tags[$i]) }}">{{ $post->tags[$i]->name }}</a></li>
								@endfor
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
                                <h2 class="h4"><span class="post_count_comment h4" >{{ count($post->comments) }} </span> bình luận</h2>
                                <i class="icon fa fa-comments-o"></i>
                            </div>
                            <!-- Post Items Title End -->

                            <ul class="comment--items nav">
							@foreach($post->comments as $comment)
                                <li>
                                    <!-- Comment Item Start -->
                                   <div class="comment--item clearfix">
										<div class="comment--img float--left">
                                            <img style="border-radius: 50%; margin: auto; background-size: cover ;  width: 68px; height: 68px;   background-image: url({{ $comment->user->image ?  asset('storage/' . $comment->user->image->path) : asset('storage/placeholders/user_placeholder.jpg') }})"  alt="">
										</div>
										<div class="comment--info">
											<div class="comment--header clearfix">
												<p class="name">{{ $comment->user->name }}</p>
												<p class="date">{{ $comment->created_at->locale('vi')->diffForHumans() }}</p>
												<a href="javascript:;" class="reply"><i class="fa fa-flag"></i></a>
											</div>
											<div class="comment--content">
												<p>{{ $comment->the_comment }}</p>
												<p class="star">
													<span class="text-left"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
												</p>
											</div>
										</div>
                                    </div>
                                    <!-- Comment Item End -->
                                </li>
								@endforeach
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
								<x-blog.message :status="'success'"/>
								@auth	
								<!-- <form method="POST" action="{{ route('posts.add_comment', $post )}}"> -->
                                <form onsubmit="return false;" autocomplete="off" method="POST" >
									@csrf

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
								@endauth

								@guest
								<p class="h4">
									<a href="{{ route('login') }}">Đăng nhập</a> hoặc 
									<a href="{{ route('register') }}">Đăng ký</a> để bình luận bài viết
								</p>
								@endguest
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
                                    @foreach($postTheSame as $postTheSame)
                                        <li class="col-sm-12 pbottom--30">
											<!-- Post Item Start -->
											<div class="post--item post--layout-3">
												<div class="post--img">
													<a href="{{ route('posts.show', $postTheSame) }}"
														class="thumb">
                                                        <img src="{{ asset($postTheSame->image ?  $postTheSame->image->path : 'images/placeholders/placeholder-image.png') }}" alt="">

                                                    </a>

													<div class="post--info">
													
														<div class="title">
															<h3  class="h4">
																<a href="{{ route('posts.show', $postTheSame) }}" class="btn-link">{{ $postTheSame->title }}</a>
															</h3>
                                                            <p style="font-size:16px" >
																<span >{{ $postTheSame->excerpt }}</span>
                                                            </p>
														</div>

                                                        <ul style="padding-top:10px" class="nav meta ">
															<li><a href="javascript:;">{{ $postTheSame->author->name }}</a>
															</li>
															<li><a href="javascript:;">{{ $postTheSame->created_at->locale('vi')->diffForHumans() }}</a></li>
                                                            <li><a  href="javascript:;"><i class="fa fm fa-comments"></i>{{ count($postTheSame->comments) }}</a></li>
														</ul>
													</div>
												</div>
											</div>
											<!-- Post Item End -->
										</li>
                                        @endforeach

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
                        <x-blog.side-outstanding_posts :outstanding_posts="$outstanding_posts"/>
                        <!-- Widget End -->

                        <!-- Widget Start -->
                        <x-blog.side-vote />
	                    <!-- Widget End -->

                      <!-- Widget Start -->
                      <x-blog.side-ad_banner />
                      <!-- Widget End -->

                    </div>
                </div>
                <!-- Main Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Main Content Section End -->

@endsection

@section('custom_js')

<script>
	setTimeout(() => {
		$(".global-message").fadeOut();
	}, 5000)
    
	$.ajax({
    url: "http://127.0.0.1:8000/binh-luan",
    data: formData,
    type: 'POST',
    dataType: 'JSON',
    processData: false,
    contentType: false,
    success: function (data) {
        if (data.success) {
            console.log(data.result);

            // Xử lý thêm comment vào danh sách
            count_comment = Number(count_comment) + 1;
            $('.comment_error').text('');
            $('.post_count_comment').text(count_comment);

            const htmls = (() => {
                return `
                    <li>
                        <div class="comment--item clearfix">
                            <div class="comment--img float--left">
                                <img style="border-radius: 50%; margin: auto; background-size: cover; width: 68px; height: 68px;" src="http://127.0.0.1:8000/storage/images/ecsuHY29fdhHh2Qeh9SrFvbQVbEtPFkMSKj7fX2V.jpg" alt="">
                            </div>
                            <div class="comment--info">
                                <div class="comment--header clearfix">
                                    <p class="name">nguyen Dam</p> 
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
                `;
            });
            ListComment.append(htmls);

            // Hiển thị thông báo thành công
            $('.global-message').addClass('alert alert-info');
            $('.global-message').fadeIn();
            $('.global-message').text(data.message);

            clearData($($this).parents("form"), ['the_comment']);

            setTimeout(() => {
                $(".global-message").fadeOut();
            }, 5000);
        } else {
            // Kiểm tra nếu lỗi là từ cấm
            if (data.message && data.message.includes("Bình luận không được chứa từ ngữ không phù hợp")) {
                $('.comment_error').text(data.message);
            } else {
                $('.comment_error').text(data.errors);
            }
        }
    },
    error: function (xhr, status, error) {
        $('.comment_error').text("Đã xảy ra lỗi, vui lòng thử lại.");
    }
});


</script>


@endsection