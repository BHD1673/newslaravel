@extends('main_layouts.master')

@section('title',' TDQ - Liên hệ')

@section('content')
<div class="container" style="margin-bottom: 50px;">
    <h1 class="my-4">Bảng báo giá quảng cáo</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Số thứ tự</th>
                <th>Tên vị trí</th>
                <th>Giá vị trí (1 giờ)</th>
                <th>Giá (1 ngày)</th>
                <th>Giá (1 tuần)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($positions as $index => $position)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $position->position }}</td>
                    <td>{{ number_format($position->price, 0, ',', '.') }} VND</td>
                    <td>{{ number_format($position->price * 24, 0, ',', '.') }} VND</td>
                    <td>{{ number_format($position->price * 24 * 7, 0, ',', '.') }} VND</td>
                    <td>
                        <a href="{{ route('ads.demo', $position->id) }}" class="btn btn-primary">Xem demo</a>
                        <a href="{{ route('ads.history.format', $position->position) }}" class="btn btn-secondary">Xem lịch sử</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
