@extends('main_layouts.master')

@section('title',' TDQ - Liên hệ')

@section('content')
    <div class="container" style="margin-bottom: 30px">
        <h1>Thanh toán quảng cáo</h1>

        <form action="{{ route('ads.processPayment', $ad->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user_name">Tên người dùng</label>
                <input type="text" name="user_name" id="user_name" class="form-control" value="{{ $user_name }}" readonly>
            </div>

            <div class="form-group">
                <label for="position_name">Tên vị trí</label>
                <input type="text" name="position_name" id="position_name" class="form-control" value="{{ $position_name }}" readonly>
            </div>

            <div class="form-group">
                <label for="price_per_hour">Giá tiền mỗi giờ</label>
                <input type="text" name="price_per_hour" id="price_per_hour" class="form-control" value="{{ $price_per_hour }}" readonly>
            </div>

            <div class="form-group">
                <label for="duration_in_hours">Số giờ đã đặt</label>
                <input type="text" name="duration_in_hours" id="duration_in_hours" class="form-control" value="{{ $duration_in_hours }}" readonly>
            </div>

            <div class="form-group">
                <label for="total_price">Tổng tiền</label>
                <input type="text" name="total_price" id="total_price" class="form-control" value="{{ $total_price }}" readonly>
            </div>
            <div class="form-group">
                <label for="amount">Tổng tiền</label>
                <input type="text" name="amount" id="amount" class="form-control" value="{{ $deposit + $paid_amount }}" readonly>
            </div>

            <!-- <div class="form-group">
                <label for="deposit">Tiền cọc (20%)</label>
                <input type="text" name="deposit" id="deposit" class="form-control" value="{{ $deposit }}" readonly>
            </div>

            <div class="form-group">
                <label for="paid_amount">Tiền gốc (80%)</label>
                <input type="text" name="paid_amount" id="paid_amount" class="form-control" value="{{ $paid_amount }}" readonly>
            </div> -->

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
