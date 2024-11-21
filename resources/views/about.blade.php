@extends('main_layouts.master')

@section('title','Giới thiệu về chúng tôi - TDQ')

@section('content')

<div class="colorlib-counters colorlib-about bg-gray-100 py-8">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="about-desc">
                    <div class="about-img-1 animate-box rounded-lg shadow-lg" style="background-image: url( {{ asset('storage/' . $setting->about_first_image ) }} );"></div>
                    <div class="about-img-2 animate-box rounded-lg shadow-lg" style="background-image: url( {{ asset('storage/' . $setting->about_second_image ) }} );"></div>
                </div>
            </div>
            <div class="col-md-5 bg-white p-6 rounded-lg shadow">
                <h1 class="text-blue-500 font-bold text-2xl mb-4">Chúng tôi là ai</h1>
                <p class="text-gray-600">{{ $setting->about_first_text }}</p>
                <div class="row mt-4">
                    <div class="col-md-6 text-center">
                        <h2 class="text-xl font-bold text-blue-600">1539</h2>
                        <p class="text-gray-500">Danh mục</p>
                    </div>
                    <div class="col-md-6 text-center">
                        <h2 class="text-xl font-bold text-blue-600">3653</h2>
                        <p class="text-gray-500">Bài viết</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="colorlib-about py-8">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="text-xl font-bold text-blue-600 mb-4">Là một trung tâm tin tức mới nhất</h3>
                <p class="text-gray-700">{{ $setting->about_second_text }}</p>
            </div>
            <div class="col-md-6">
                <div class="accordion" id="accordionExample">
                    <!-- Accordion items -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Sứ mạng
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                {!! $setting->about_our_mission !!}
                            </div>
                        </div>
                    </div>
                    <!-- Add other accordion items here -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
