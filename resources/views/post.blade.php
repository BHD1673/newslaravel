@extends('main_layouts.master')

@section('title', $post->title . ' - TDQ ')

@section('custom_css')
    <style>
        .post--body.post--content {
            color: black;
            font-family: "Source Sans Pro", sans-serif;
            font-size: 18px;
        }

        .text.capitalize {
            text-transform: capitalize !important;
        }

        .author-info,
        .post-time {
            margin: 0;
            font-size: 14px !important;
            text-align: right;
        }

        /* Định dạng nút đọc */
        .read-btn {
            background-color: #4CAF50; /* Màu xanh lá */
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
                                @foreach($post->tags as $tag)
                                    <li><a class="text capitalize" href="{{ route('tags.show', $tag) }}">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="post--info">
                            <ul class="nav meta">
                                <li class="text capitalize">
                                    <a href="#">
                                        {{ $post->created_at->locale('vi')->translatedFormat('l') }}, 
                                        {{ $post->created_at->locale('vi')->format('d/m/Y') }}
                                    </a>
                                </li>
                                <li><a href="#">{{ $post->author->name }}</a></li>
                                <li><span><i class="fa fm fa-eye"></i>{{ $post->views }}</span></li>
                                <li><a href="#"><i class="fa fm fa-comments-o"></i>{{ count($post->comments) }}</a></li>
                            </ul>
                            <!-- Nút Đọc Tất Cả -->
                            <button id="read-all-btn" class="read-btn">🔊 Đọc Tất Cả</button>
                        </div>

                        <div class="title">
                            <h2 class="post_title h4" id="post-title">{{ $post->title }}</h2>
                            <!-- Nút Đọc Tiêu Đề -->
                            <button id="read-all-btn" class="read-btn">🔊 Đọc Tất Cả</button>

                        </div>

                        <div class="post--body post--content" id="post-body">
                            {!! $post->body !!}
                        </div>
                        <!-- Nút Đọc Nội Dung -->
                        <button class="read-btn" data-target="post-body">🔊 Đọc Nội Dung</button>
                    </div>
                    <!-- Post Item End -->

                    <!-- Advertisement Start -->
                    <div class="ad--space pd--20-0-40">
                        <p class="author-info">Người viết: {{ $post->author->name }}</p>
                        <p class="post-time">Thời gian: {{ $post->created_at->locale('vi')->diffForHumans() }}</p>
                    </div>
                    <!-- Advertisement End -->
                </div>
            </div>
            <!-- Main Content End -->

            <!-- Sidebar Start (nếu có) -->
            <!-- Bạn có thể thêm sidebar ở đây -->
        </div>
    </div>
</div>
<!-- Main Content Section End -->

@endsection

@section('custom_js')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Nhập API Key của bạn
        const API_KEY = 'AIzaSyAML2E3ccsu7dHtX761MCZAgGfexas-JkM';

        // Hàm gọi API Text-to-Speech
        async function textToSpeech(text) {
            const url = `https://texttospeech.googleapis.com/v1/text:synthesize?key=${API_KEY}`;
            const payload = {
                input: { text: text },
                voice: {
                    languageCode: "vi-VN", // Giọng tiếng Việt
                    name: "vi-VN-Standard-A" // Có thể đổi thành "vi-VN-Standard-B", "vi-VN-Wavenet-A", v.v.
                },
                audioConfig: { audioEncoding: "MP3" }
            };

            try {
                console.log("Gửi yêu cầu Text-to-Speech với văn bản:", text);
                const response = await fetch(url, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(payload)
                });

                const result = await response.json();
                console.log("Phản hồi từ API:", result);

                if (result.audioContent) {
                    const audio = new Audio("data:audio/mp3;base64," + result.audioContent);
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
        } else {
            console.error("Không tìm thấy nút 'read-all-btn'.");
        }
    });
</script>
@endsection
