@extends('main_layouts.master')

@section('title', 'TDQ - Liên hệ')

@section('content')
<!-- Hiển thị thông báo Toast khi có lỗi -->
@if (session('error'))
    <script>
        toastr.error("{{ session('error') }}");
    </script>
@endif

<!-- Form đăng ký quảng cáo -->
<div class="container">
    <h1>Đăng ký quảng cáo</h1>
    
    <form action="{{ route('ads.store') }}" method="POST">
        @csrf

        <!-- Tiêu đề quảng cáo -->
        <div class="form-group">
            <label for="title">Tiêu đề quảng cáo</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" >
            
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Link hình ảnh -->
        <div class="form-group">
            <label for="img">Link hình ảnh</label>
            <input type="text" name="img" id="img" class="form-control" value="{{ old('img') }}" >
            
            @error('img')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Link quảng cáo -->
        <div class="form-group">
            <label for="link">Link quảng cáo</label>
            <input type="text" name="link" id="link" class="form-control" value="{{ old('link') }}" >
            
            @error('link')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email liên hệ -->
        <div class="form-group">
            <label for="email">Email liên hệ</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" >
            
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Số điện thoại liên hệ -->
        <div class="form-group">
            <label for="phone">Số điện thoại liên hệ</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" >
            
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Thời gian bắt đầu -->
        <div class="form-group">
            <label for="start_time">Thời gian bắt đầu</label>
            <input type="datetime-local" name="start_time" id="start_time" class="form-control" value="{{ old('start_time') }}" >
            
            @error('start_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Thời gian kết thúc -->
        <div class="form-group">
            <label for="end_time">Thời gian kết thúc</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control" value="{{ old('end_time') }}" >
            
            @error('end_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Vị trí quảng cáo -->
        <div class="form-group">
            <label for="position">Vị trí quảng cáo</label>
            <select name="position" id="position" class="form-control" >
                <option value="">Chọn Vị Trí</option>
                @foreach ($positions as $position)
                    <option value="{{ $position->position }}" {{ old('position') == $position->position ? 'selected' : '' }}>{{ ucfirst($position->position) }}</option>
                @endforeach
            </select>
            @error('position')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary" style="margin-bottom: 30px">Đăng ký quảng cáo</button>
    </form>
</div>

<script>
    console.log('Toastr loaded:', typeof toastr !== 'undefined');
</script>

@endsection
