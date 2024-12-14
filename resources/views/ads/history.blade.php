@extends('main_layouts.master')

@section('title',' TDQ - Liên hệ')

@section('content')
<div class="container">
    <h1>Lịch sử quảng cáo</h1>
    
    <table class="table" style="margin-bottom: 30px; ">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Vị trí</th>
                <th>Trạng thái</th>
                <th>Thời gian bắt đầu</th>
                <th>Thời gian kết thúc</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ads as $ad)
                <tr>
                    <td>{{ $ad->title }}</td>
                    <td>{{ ucfirst($ad->position) }}</td>
                    <td>{{ ucfirst($ad->status) }}</td>
                    <td>{{ $ad->start_time }}</td>
                    <td>{{ $ad->end_time }}</td>
                    <td>
                    @if($ad->status === 'pending')
                        <!-- Chỉ cho phép hủy đơn nếu trạng thái là pending -->
                        <a href="{{ route('ads.cancel', $ad->id) }}" class="btn btn-danger">Hủy quảng cáo</a>
                    @elseif($ad->status === 'approved')
                        <!-- Cho phép thanh toán và hủy đơn nếu trạng thái là approved -->
                        <a href="{{ route('ads.payment', $ad->id) }}" class="btn btn-success">Thanh toán</a>
                        <a href="{{ route('ads.cancel', $ad->id) }}" class="btn btn-danger">Hủy quảng cáo</a>
                    @else
                        <!-- Không hiển thị thao tác gì nếu trạng thái không phải pending hoặc approved -->
                        <span class="text-muted">Không có thao tác</span>
                    @endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection