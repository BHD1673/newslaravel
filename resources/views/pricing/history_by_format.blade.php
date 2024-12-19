@extends('main_layouts.master')

@section('title',' TDQ - Liên hệ')

@section('content')
<div class="container">
    <h1 class="my-4">Lịch sử quảng cáo - Vị trí: {{ ucfirst($format) }}</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Số thứ tự</th>
                <th>Thời gian đã đặt</th>
                <th>Thời gian bắt đầu</th>
                <th>Thời gian kết thúc</th>
                <th>Vị trí</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ads as $index => $ad)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $ad->created_at }}</td>
                    <td>{{ $ad->start_time }}</td>
                    <td>{{ $ad->end_time }}</td>
                    <td>{{ $ad->position->position }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Không có quảng cáo nào được đặt cho vị trí này</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('pricing.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
</div>
@endsection
