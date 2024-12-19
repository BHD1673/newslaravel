<?php 
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

$now = Carbon::now('Asia/Ho_Chi_Minh')->locale('vi');
$categoryFooter  = Category::where('name','!=','Chưa phân loại')->withCount('posts')->orderBy('created_at','DESC')->take(12)->get();
$categories = Category::where('name','!=','Chưa phân loại')->orderBy('created_at','DESC')->take(10)->get();

/*----- Lấy ra 4 bài viết mới nhất theo các danh mục khác nhau -----*/
$category_unclassified = Category::where('name','Chưa phân loại')->first();
$posts_new = [];

for ($i = 0; $i < 4; $i++) {
    $query = Post::latest()->where('approved',3)->where('category_id','!=', $category_unclassified->id );
    for ($j = 0; $j < $i; $j++) {
        $query->where('category_id','!=', $posts_new[$j][0]->category->id );
    }
    $posts_new[$i] = $query->take(1)->get();
}
?>
@extends('main_layouts.master')

@section('title','TDQ - Thông tin tài khoản')
@section('content')

@auth
<?php $user = User::find(auth()->user()->id); ?>
<div class="main--breadcrumb bg-light py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none"><i class="fa fa-home"></i> Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tài khoản</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Main Content Section Start -->
<div class="main-content--section pbottom--30">
    <div class="container">
        <h3 class="page-header mb-4">Thông tin cá nhân</h3>
        
        @if(auth()->check() && auth()->user()->is_premium)
            <div class="mb-4">
                <img src="{{ asset('images/premiumUs.png') }}" width="50" height="50" alt="Premium User" class="img-fluid">
                <span class="badge bg-warning text-dark ms-2">Premium Member</span>
            </div>
        @endif
        
        <div class="row">
            <!-- Hình ảnh đại diện -->
            <div class="col-lg-4 col-md-5 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="mb-3">
                            <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image->path) : asset('storage/placeholders/user_placeholder.jpg') }}" alt="Avatar" class="rounded-circle img-thumbnail" style="width: 180px; height: 180px; object-fit: cover;">
                        </div>
                        <form action="{{ route('update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="input_image" class="form-label">Ảnh đại diện</label>
                                <input name="image" type="file" class="form-control" id="input_image">
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Cập nhật ảnh</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Thông tin cá nhân -->
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="input_name" class="form-label">Họ Tên</label>
                                    <input name="name" type="text" class="form-control" id="input_name" value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="input_email" class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control" id="input_email" value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-success">Cập nhật</button>
                                <a href="{{ route('home') }}" class="btn btn-secondary">Quay lại</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endauth

@guest
<div class="main-content--section pbottom--30">
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 60vh;">
            <div class="col-md-8 text-center">
                <h1 class="display-1 text-success">404</h1>
                <h2 class="mb-4">Trang không tồn tại</h2>
                <p class="mb-4">Chúng tôi xin lỗi, trang bạn yêu cầu không được tìm thấy. Vui lòng quay lại <a href="{{ route('home') }}" class="text-primary text-decoration-none">trang chủ</a>.</p>
                <a href="{{ route('home') }}" class="btn btn-primary">Quay lại trang chủ</a>
            </div>
        </div>
    </div>
</div>
@endguest

@endsection
