@extends('admin_dashboard.layouts.app')

@section('wrapper')
<div class="page-wrapper">
    <div class="page-content">
        <h1>Create Payment</h1>
        <form action="{{ route('admin.ads_payment.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="ad_id">Ad</label>
                <select name="ad_id" id="ad_id" class="form-control" required>
                    @foreach ($ads as $ad)
                    <option value="{{ $ad->id }}">Ad #{{ $ad->id }} - {{ $ad->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" name="amount" id="amount" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="payment_status">Payment Status</label>
                <select name="payment_status" id="payment_status" class="form-control" required>
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                    <option value="failed">Failed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="payment_method">Payment Method</label>
                <select name="payment_method" id="payment_method" class="form-control" required>
                    <option value="VNPay">VNPay</option>
                    <option value="bank_transfer">Bank Transfer</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="paid_at">Paid At</label>
                <input type="datetime-local" name="paid_at" id="paid_at" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
