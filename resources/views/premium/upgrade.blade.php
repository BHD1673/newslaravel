@extends('main_layouts.master')

@section('title', 'Gói Premium')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Gói Premium</h1>
    
    @if(session('message'))
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif

    @if($isPremium)
        <div class="alert alert-success text-center">
            <h4>Bạn đang là thành viên Premium!</h4>
            <p>Hạn sử dụng gói Premium: {{ $premiumExpiresAt->format('d/m/Y H:i') }}</p>
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
</div>
@endsection
