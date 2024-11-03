@extends('main_layouts.master')

@section('content')
<div class="main--breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('home') }}" class="btn-link"><i class="fa fm fa-home"></i>Home</a></li>
            <li><a href="{{ route('shop.index') }}" class="btn-link">Shop</a></li>
            <li class="active"><span>Checkout</span></li>
        </ul>
    </div>
</div>

<div class="checkout--section ptop--30">
    <div class="container">
        <div class="checkout--info pbottom--30">
            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf

                <div class="checkout--billing-info ptop--30 pbottom--30">
                    <div class="row">
                        <div class="col-md-6 pbottom--30">
                            <div class="post--items-title" data-ajax="tab">
                                <h2 class="h4">Billing Details</h2>
                                <i class="icon fa fa-edit"></i>
                            </div>
                            <div class="form-group">
                                <label>Name <span>*</span></label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Address <span>*</span></label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Phone <span>*</span></label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6 pbottom--30">
                            <div class="post--items-title" data-ajax="tab">
                                <h2 class="h4">Your Order</h2>
                                <i class="icon fa fa-edit"></i>
                            </div>
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart->items as $item)
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ number_format($item->price, 2) }} VND</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ number_format($item->price * $item->quantity, 2) }} VND</td>
                                    </tr>
                                @endforeach

                                <!-- Dòng tổng tiền -->
                                <tr>
                                    <td colspan="3" style="text-align: right;"><strong>Total Amount:</strong></td>
                                    <td><strong>{{ number_format($cart->items->sum(function ($item) {
                                        return $item->price * $item->quantity;
                                    }), 2) }} VND</strong></td>
                                </tr>

                                <!-- Dòng VAT -->
                                <tr>
                                    <td colspan="3" style="text-align: right;"><strong>VAT (5%):</strong></td>
                                    <td><strong>{{ number_format($cart->items->sum(function ($item) {
                                        return ($item->price * $item->quantity) * 0.05; // giả định VAT là 5%
                                    }), 2) }} VND</strong></td>
                                </tr>

                                <!-- Dòng tổng tiền bao gồm VAT -->
                                <tr>
                                    <td colspan="3" style="text-align: right;"><strong>Total Amount Including VAT:</strong></td>
                                    <td><strong>
                                        {{ number_format($cart->items->sum(function ($item) {
                                            return ($item->price * $item->quantity) * 1.05; // tổng tiền bao gồm VAT
                                        }), 2) }} VND
                                    </strong></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <div class="checkout--payment-info ptop--30">
                <div class="post--items-title" data-ajax="tab">
                    <h2 class="h4">Payment Methods</h2>
                    <i class="icon fa fa-dollar"></i>
                </div>
                <div class="panel-group" id="checkoutA">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <label data-toggle="collapse" data-target="#checkoutPayment01" data-parent="#checkoutA" class="payment-label">
                                    <input type="radio" name="checkoutPayment" value="check-cashout" checked>
                                    <span>Check / Cashout</span>
                                </label>
                            </h3>
                        </div>
                        <div id="checkoutPayment01" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>Pay with cash upon delivery</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <label class="collapsed payment-label" data-toggle="collapse" data-target="#checkoutPaymentMoMo" data-parent="#checkoutA">
                                    <input type="radio" name="checkoutPayment" value="momo">
                                    <span>MoMo</span>
                                </label>
                            </h3>
                        </div>
                        <div id="checkoutPaymentMoMo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Pay using your MoMo wallet.</p>
                                <p><a href="link_to_momo_payment_page" class="btn btn-primary">Proceed to MoMo Payment</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <label class="collapsed payment-label" data-toggle="collapse" data-target="#checkoutPaymentVNPay" data-parent="#checkoutA">
                                    <input type="radio" name="checkoutPayment" value="vnpay">
                                    <span>VNPay</span>
                                </label>
                            </h3>
                        </div>
                        <div id="checkoutPaymentVNPay" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>Pay using your VNPay account.</p>
                                <p><a href="link_to_vnpay_payment_page" class="btn btn-primary">Proceed to VNPay Payment</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <div class="checkout--additional-info ptop--30">
                    <div class="post--items-title" data-ajax="tab">
                        <h2 class="h4">Additional Information</h2>
                        <i class="icon fa fa-info-circle"></i>
                    </div>
                    <div class="form-group">
                        <label>Order Notes</label>
                        <textarea name="additionalInfo" class="form-control"></textarea>
                    </div>
                </div>

                <div class="submit-btn ptop--30">
                    <button type="submit" class="btn btn-lg btn-primary">Place Order</button>
                </div>
            </form>
        </div>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(!$cart || $cart->items->count() == 0)
            <div class="alert alert-info">
                Your cart is empty. <a href="{{ route('shop.index') }}">Continue shopping</a>
            </div>
        @endif
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.payment-label input').on('change', function() {
            // Đóng tất cả các phần tử đã mở
            $('.panel-collapse.in').collapse('hide');
            // Mở phần tử được chọn
            $(this).closest('.panel-heading').next('.panel-collapse').collapse('show');
        });
    });
</script>
@endsection
