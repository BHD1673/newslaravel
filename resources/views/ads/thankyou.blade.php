@extends('main_layouts.master')

@section('title', 'TDQ - Đăng ký quảng cáo')

@section('content')
<div class="container">
    <h1>Thank You!</h1>
    <p>Your payment was successful. Your advertisement is now active.</p>
    <a href="{{ route('ads.history') }}" class="btn btn-primary">Go to My Ads</a>
</div>
@endsection
