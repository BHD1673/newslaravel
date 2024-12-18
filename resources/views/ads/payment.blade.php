@extends('main_layouts.master')

@section('title',' TDQ - Liên hệ')

@section('content')
    <div class="container" style="margin-bottom: 30px">
        <h1>Thanh toán quảng cáo</h1>

        <form action="{{ route('ads.processPayment', $ad->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="amount">Tổng tiền</label>
                <input type="text" name="amount" id="amount" class="form-control" value="{{ $deposit + $paid_amount }}" readonly>
            </div>

            <div class="form-group">
                <label for="deposit">Tiền cọc (20%)</label>
                <input type="text" name="deposit" id="deposit" class="form-control" value="{{ $deposit }}" readonly>
            </div>

            <div class="form-group">
                <label for="paid_amount">Tiền gốc (80%)</label>
                <input type="text" name="paid_amount" id="paid_amount" class="form-control" value="{{ $paid_amount }}" readonly>
            </div>

            <div class="form-group">
                <label for="payment_method">Phương thức thanh toán</label>
                <select name="payment_method" id="payment_method" class="form-control" required>
                    <option value="VNPay">VNPay</option>
                    <option value="bank_transfer">Chuyển khoản ngân hàng</option>
                    <option value="other">Phương thức khác</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Thanh toán</button>
        </form>
    </div>
@endsection
