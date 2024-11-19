@extends('main_layouts.master')

@section('content')
<div class="main--breadcrumb">
   <div class="container">
      <ul class="breadcrumb">
         <li><a href="{{ route('home') }}" class="btn-link"><i class="fa fm fa-home"></i>Home</a></li>
         <li><a href="{{ route('shop.index') }}" class="btn-link">Shop</a></li>
         <li class="active"><span>Cart</span></li>
      </ul>
   </div>
</div>

<div class="cart--section ptop--30 pbottom--30">
   <div class="container">
      <div class="cart--items pbottom--30">
         @if($cart && $cart->items->count() > 0)
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>Image</th>
                        <th>Product Name</th>
<<<<<<< HEAD
=======
                        <th>Category</th>
>>>>>>> master
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($cart->items as $item)
                        <tr>
                           <td data-label="Image">
                              <div class="img">
                                 <img class="img-fluid" style="width: 100px; height: 100px; object-fit: cover;" src="{{ asset('images/products/' . basename($item->product->image)) }}" alt="{{ $item->product->name }}">
                              </div>
                           </td>
                           <td data-label="Product Name">
                              <a href="" class="btn-link">{{ $item->product->name }}</a>
                           </td>
<<<<<<< HEAD
=======
                           <td data-label="Product Name">
                              <a href="" class="btn-link">{{ $item->product->productCategory->name ?? 'Chưa phân loại' }}</a>
                           </td>

>>>>>>> master
                           <td data-label="Price">{{ number_format($item->price, 2) }} VND</td>
                           <td data-label="Quantity">
                              <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex">
                                 @csrf
                                 @method('PATCH')
                                 <div style="display: flex; align-items: center;">
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" class="form-control" style="width: 100px; margin-right: 10px;">
                                    <button type="submit" class="btn btn-warning btn-sm">Update</button>
                                </div>

                              </form>
                           </td>
                           <td data-label="Total">{{ number_format($item->price * $item->quantity, 2) }} VND</td>
                           <td data-label="Actions">
                              <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="remove btn-link"><i class="fa fa-remove"></i></button>
                              </form>
                           </td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>

               <div class="footer clearfix">
                  <div class="coupon--code float--left">
                     <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code">
                        <div class="input-group-append">
                           <button type="submit" class="btn btn-primary">Apply Coupon</button>
                        </div>
                     </div>
                  </div>
                  <div class="row ptop--70 pbottom--30">
                  <div class="col-md-4 col-md-offset-8 col-sm-6 col-sm-offset-6">
                     <div class="cart--total">
                        <div class="post--items-title" data-ajax="tab">
                           <h2 class="h4">Cart Total</h2>
                           <i class="icon fa fa-dollar"></i>
                        </div>
                        <table class="table">
                           <tbody>
                              @php
                                 $totalPrice = 0;
                                 foreach($cart->items as $item) {
                                     $totalPrice += $item->price * $item->quantity;
                                 }
                              @endphp
                              <tr>
                                 <td>Sub Totals</td>
                                 <td>{{ number_format($totalPrice, 2) }} VND</td>
                              </tr>
                              <tr>
                                 <td>Shipping Charge</td>
                                 <td>0.00 VND</td>
                              </tr>
                              <tr>
                                 <td>VAT - 05.00%</td>
                                 <td>{{ number_format($totalPrice * 0.05, 2) }} VND</td>
                              </tr>
                              <tr>
                                 <td>Total</td>
                                 <td>{{ number_format($totalPrice * 1.05, 2) }} VND</td>
                              </tr>
                           </tbody>
                        </table>
                        <a href="{{ route('checkout.index') }}" class="btn btn-lg btn-block btn-primary">Proceed To Checkout</a> 
                     </div>
                  </div>
               </div>
               </div>


         @else
            <div class="alert alert-info">
               Your cart is empty. <a href="{{ route('shop.index') }}">Continue shopping</a>
            </div>
         @endif
      </div>
   </div>
</div>

@endsection
