@extends('main_layouts.master')

@section('title', 'Gói Premium')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Gói Premium</h1>
    
    @if($isPremium)
        <div class="alert alert-success text-center">
            <h4>Bạn đang là thành viên Premium!</h4>
            <p>Hạn sử dụng gói Premium: {{ \Carbon\Carbon::parse($premiumExpiresAt)->format('d/m/Y H:i') }}</p>
        </div>
    @else
        <div class="text-center">
            <h4>Nâng cấp lên Premium để tận hưởng các lợi ích:</h4>
            <ul class="list-unstyled mt-3">
                <li>- Tắt quảng cáo</li>
                <li>- Đọc tin tức bằng AI</li>
                <li>- Truy cập nội dung độc quyền</li>
            </ul>
            <a href="{{ route('vnpay.create') }}" class="btn btn-primary mt-3">Nâng cấp ngay</a>
        </div>
    @endif

    <h2 class="mt-5">Lịch sử đăng ký</h2>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Gói</th>
                <th>Giá</th>
                <th>Bắt đầu</th>
                <th>Kết thúc</th>
            </tr>
        </thead>
        <tbody>
            @forelse($subscriptions as $subscription)
                <tr>
                    <td>{{ $subscription->plan_name }}</td>
                    <td>{{ number_format($subscription->price, 2) }} VND</td>
                    <td>{{ \Carbon\Carbon::parse($subscription->starts_at)->format('d/m/Y H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($subscription->ends_at)->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Chưa có lịch sử đăng ký.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection