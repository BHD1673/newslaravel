@extends('admin_dashboard.layouts.app')

@section('wrapper')
<div class="page-wrapper">
    <div class="page-content">
        <h1>Edit Payment</h1>
        <form action="{{ route('admin.ads_payment.update', $payment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="ad_id">Ad</label>
                <select name="ad_id" id="ad_id" class="form-control" disabled >
                    @foreach ($ads as $ad)
                        <option value="{{ $ad->id }}" {{ $payment->ad_id == $ad->id ? 'selected' : '' }}>
                            Ad #{{ $ad->id }} - {{ $ad->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="paid_amount">Paid Amount</label>
                <input type="number" name="paid_amount" id="paid_amount" class="form-control" value="{{ $payment->amount }}">
            </div>
            <div class="form-group">
                <label for="payment_status">Payment Status</label>
                <select name="payment_status" id="payment_status" class="form-control" >
                    <option value="pending" {{ $payment->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ $payment->payment_status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="failed" {{ $payment->payment_status == 'failed' ? 'selected' : '' }}>Failed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="payment_method">Payment Method</label>
                <select name="payment_method" id="payment_method" class="form-control" >
                    <option value="VNPay" {{ $payment->payment_method == 'VNPay' ? 'selected' : '' }}>VNPay</option>
                    <option value="bank_transfer" {{ $payment->payment_method == 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                    <option value="other" {{ $payment->payment_method == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="paid_at">Paid At</label>
                <input type="datetime-local" name="paid_at" id="paid_at" class="form-control"value="{{ $payment->paid_at ? \Carbon\Carbon::parse($payment->paid_at)->format('Y-m-d\TH:i') : '' }}"
                >
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top:20px;">Update</button>
        </form>
    </div>
</div>
@endsection
