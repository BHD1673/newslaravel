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
            <form action="{{ route('vnpay-payment') }}" method="POST">
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
                                <input type="text" name="name" class="form-control">
                                <!-- Hiển thị thông báo lỗi nếu có -->
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Address <span>*</span></label>
                                <input type="text" name="address" class="form-control">
                                <!-- Hiển thị thông báo lỗi nếu có -->
                                @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Phone <span>*</span></label>
                                <input type="text" name="phone" class="form-control">
                                <!-- Hiển thị thông báo lỗi nếu có -->
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Additional Information <span>*</span></label>
                                <textarea type="text" name="more_Info" class="form-control"></textarea>
                                <!-- Hiển thị thông báo lỗi nếu có -->
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('more_Info') }}</span>
                                @endif
                            </div>
                           
                            <div class="form-group">
                                    <label>Total Amount</label>
                                    <input type="text" name="total_vnpay" class="form-control"value="{{ ($cart->items->sum(function ($item) {
                                            return ($item->price * $item->quantity) * 1.05; // tổng tiền bao gồm VAT
                                        })) }}"> readonly>
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
               

              
                
                <button type="submit" class="btn btn-primary">Proceed to VNPay Payment</button>
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