@extends('main_layouts.master')

@section('title',' TDQ - Liên hệ')

@section('content')
@if (session('error'))
    <script>
        toastr.error("{{ session('error') }}");
    </script>
@endif

<div class="container">
    <h1>Đăng ký quảng cáo</h1>
    
    <form action="{{ route('ads.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Tiêu đề quảng cáo</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="img">Link hình ảnh</label>
            <input type="text" name="img" id="img" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="link">Link quảng cáo</label>
            <input type="text" name="link" id="link" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email liên hệ</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone">Số điện thoại liên hệ</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="start_time">Thời gian bắt đầu</label>
            <input type="datetime-local" name="start_time" id="start_time" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="end_time">Thời gian kết thúc</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="position">Vị trí quảng cáo</label>
            <select name="position" id="position" class="form-control" required>
                @foreach ($positions as $position)
                    <option value="{{ $position->position }}">{{ ucfirst($position->position) }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-bottom: 30px">Đăng ký quảng cáo</button>
    </form>
</div>

<script>
      console.log('Toastr loaded:', typeof toastr !== 'undefined');
</script>

@endsection