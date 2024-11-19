@extends('main_layouts.master')

@section('content')
         <div class="main--breadcrumb">
            <div class="container">
               <ul class="breadcrumb">
                  <li><a href="home-1-boxed.html" class="btn-link"><i class="fa fm fa-home"></i>Home</a></li>
                  <li class="active"><span>Shop</span></li>
               </ul>
            </div>
         </div>
         <div class="main-content--section pbottom--30">
            <div class="container">
               <div class="row">
                  <div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
                     <div class="sticky-content-inner">
                        <div class="page--title pd--30-0">
                           <h2 class="h2">Welcome To Our <span>Shop</span></h2>
                           <div class="content">
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                           </div>
                        </div>
                        <div class="product--items ptop--30">
<<<<<<< HEAD
  <div class="row AdjustRow">
    @foreach($products as $product) <!-- Lặp qua các sản phẩm -->
      @if($product->status->status !== 'deactivate') <!-- Kiểm tra trạng thái sản phẩm -->
        <div class="col-md-4 col-xs-6 col-xxs-12 pbottom--30">
          <div class="product--item">
            <div class="img">
              <img src="{{ asset('images/products/' . basename($product->image)) }}" alt="{{ $product->name }}">
              <div class="actions">
                <div class="vc--parent">
                  <div class="vc--child">
                    <a href="{{ route('shop.show', $product->id) }}" class="btn btn-primary"><i class="fa fa-shopping-basket"></i> Buy Now</a>
                    <ul class="nav">
                      <li><a href="{{ route('shop.show', $product->id) }}"><i class="fa fa-search"></i></a></li>
                      <li><a href="#"><i class="fa fa-exchange"></i></a></li>
                      <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                      <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="title">
              <h3 class="h5"><a href="{{ route('shop.show', $product->id) }}" class="btn-link">{{ $product->name }}</a></h3>
            </div>
            <div class="price text--color-1">
              <p>
                @if($product->old_price)
                  <span class="del">${{ number_format($product->old_price, 2) }}</span>
                @endif
                <span>${{ number_format($product->price, 2) }}</span>
              </p>
            </div>
            <div class="rating">
              <ul class="nav">
                @for($i = 0; $i < 5; $i++)
                  @if($i < $product->rating) <!-- Giả sử $product->rating là số sao -->
                    <li><i class="fa fa-star"></i></li>
                  @else
                    <li><i class="fa fa-star-o"></i></li>
                  @endif
                @endfor
              </ul>
            </div>
          </div>
        </div>
      @endif
    @endforeach
  </div>
</div>
=======
                              <div class="row AdjustRow">
                                 @foreach($products as $product) <!-- Lặp qua các sản phẩm -->
                                    @if($product->status->status !== 'deactivate') <!-- Kiểm tra trạng thái sản phẩm -->
                                    <div class="col-md-4 col-xs-6 col-xxs-12 pbottom--30">
                                       <div class="product--item">
                                       <div class="img" >
                                          <img src="{{ asset('images/products/' . basename($product->image)) }}" alt="{{ $product->name }}" style="max-height: 150px; width: auto; object-fit: cover;">
                                    

                                          <div class="actions">
                                             <div class="vc--parent">
                                                <div class="vc--child">
                                                <a href="{{ route('shop.show', $product->id) }}" class="btn btn-primary"><i class="fa fa-shopping-basket"></i> Buy Now</a>
                                                <ul class="nav">
                                                   <li><a href="{{ route('shop.show', $product->id) }}"><i class="fa fa-search"></i></a></li>
                                                   <li><a href="#"><i class="fa fa-exchange"></i></a></li>
                                                   <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                                   <form action="{{ route('wishlist.add', $product->id) }}" method="POST">
                                                      @csrf
                                                      <button type="submit" class="btn btn-link">
                                                            <i class="fa fa-heart-o"></i> Add to Wishlist
                                                      </button>
                                                   </form>
                                                </ul>
                                                </div>
                                             </div>
                                          </div>
                                          </div>
                                          <div class="title">
                                          <h3 class="h5"><a href="{{ route('shop.show', $product->id) }}" class="btn-link">{{ $product->name }}</a></h3>
                                          </div>
                                          <div class="price text--color-1">
                                          <p>
                                             @if($product->old_price)
                                                <span class="del">${{ number_format($product->old_price, 2) }}</span>
                                             @endif
                                             <span>${{ number_format($product->price, 2) }}</span>
                                          </p>
                                          </div>
                                          <div class="rating">
                                          <ul class="nav">
                                             @for($i = 0; $i < 5; $i++)
                                                @if($i < $product->rating) <!-- Giả sử $product->rating là số sao -->
                                                <li><i class="fa fa-star"></i></li>
                                                @else
                                                <li><i class="fa fa-star-o"></i></li>
                                                @endif
                                             @endfor
                                          </ul>
                                          </div>
                                       </div>
                                    </div>
                                    @endif
                                 @endforeach
                              </div>
                              </div>
>>>>>>> master

                        <div class="pagination--wrapper clearfix pd--30-0">
                           <p class="pagination-hint float--left">Page 02 of 03</p>
                           <ul class="pagination float--right">
                              <li><a href="#"><i class="fa fa-long-arrow-left"></i></a></li>
                              <li><a href="#">01</a></li>
                              <li class="active"><span>02</span></li>
                              <li><a href="#">03</a></li>
                              <li><a href="#"><i class="fa fa-long-arrow-right"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="main--sidebar col-md-4 col-sm-5 ptop--30 pbottom--30" data-sticky-content="true">
                     <div class="sticky-content-inner">
                        <div class="widget">
                           <div class="search--widget">
                              <form action="#" data-form="validate">
                                 <div class="input-group">
                                    <input type="search" name="search" placeholder="Search..." class="form-control" required> 
                                    <div class="input-group-btn"> <button type="submit" class="btn-link"><i class="fa fa-search"></i></button> </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                        <div class="widget">
<<<<<<< HEAD
                           <div class="widget--title">
                              <h2 class="h4">My Cart</h2>
                              <i class="icon fa fa-shopping-cart"></i> 
                           </div>
                           <div class="cart--widget">
                              <ul class="nav">
                                 <li class="clearfix">
                                    <div class="img"> <a href="#" class="btn-link"><img src="img/shop-img/cart-item-01.jpg" alt=""></a> </div>
                                    <div class="info">
                                       <h3 class="h4"><a href="#" class="btn-link">Lorem ipsum dolor sit amet quam ipsum</a></h3>
                                       <p class="text--color-1">$69.99 * 2</p>
                                    </div>
                                    <a href="#" class="remove"><i class="fa fa-remove"></i></a> 
                                 </li>
                                 <li class="clearfix">
                                    <div class="img"> <a href="#" class="btn-link"><img src="img/shop-img/cart-item-02.jpg" alt=""></a> </div>
                                    <div class="info">
                                       <h3 class="h4"><a href="#" class="btn-link">Lorem ipsum dolor sit amet quam ipsum</a></h3>
                                       <p class="text--color-1">$69.99 * 2</p>
                                    </div>
                                    <a href="#" class="remove"><i class="fa fa-remove"></i></a> 
                                 </li>
                                 <li class="clearfix">
                                    <div class="img"> <a href="#" class="btn-link"><img src="img/shop-img/cart-item-03.jpg" alt=""></a> </div>
                                    <div class="info">
                                       <h3 class="h4"><a href="#" class="btn-link">Lorem ipsum dolor sit amet quam ipsum</a></h3>
                                       <p class="text--color-1">$69.99 * 2</p>
                                    </div>
                                    <a href="#" class="remove"><i class="fa fa-remove"></i></a> 
                                 </li>
                              </ul>
                           </div>
                        </div>
=======
                        <div class="widget">
                        <div class="widget--title">
                           <h2 class="h4">My Wishlist</h2>
                           <i class="icon fa fa-heart"></i> 
                        </div>
                        <div class="cart--widget">
                           <ul class="nav">
                                 @foreach ($wishlists as $wishlist)
                                    <li class="clearfix">
                                       <div class="img"> 
                                             <a href="{{ route('shop.show', $wishlist->product->id) }}" class="btn-link">
                                             <img src="{{ asset('images/products/' . basename($wishlist->product->image)) }}" alt="{{ $wishlist->product->name }}">
                                             </a> 
                                       </div>
                                       <div class="info">
                                             <h3 class="h4">
                                                <a href="{{ route('shop.show', $wishlist->product->id) }}" class="btn-link">
                                                   {{ $wishlist->product->name }}
                                                </a>
                                             </h3>
                                             <p class="text--color-1">${{ number_format($wishlist->product->price, 2) }}</p>
                                       </div>
                                       <!-- Form to delete wishlist item -->
                                       <form action="{{ route('wishlist.remove', $wishlist->product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this item from your wishlist?')">Remove</button>
                            </form>
                                    </li>
                                 @endforeach
                                 @if ($wishlists->isEmpty())
                                    <li>No products in your wishlist.</li>
                                 @endif
                           </ul>
                        </div>
                     </div>


>>>>>>> master
                        <div class="widget">
                           <div class="widget--title">
                              <h2 class="h4">Catagory</h2>
                              <i class="icon fa fa-folder-open-o"></i> 
                           </div>
                           <div class="nav--widget">
                              <ul class="nav">
<<<<<<< HEAD
                                 <li><a href="#"><span>Fashion</span><span>(22)</span></a></li>
                                 <li><a href="#"><span>Winter</span><span>(16)</span></a></li>
                                 <li><a href="#"><span>Exclusive</span><span>(84)</span></a></li>
                                 <li><a href="#"><span>Summer</span><span>(11)</span></a></li>
                                 <li><a href="#"><span>Heavy Style</span><span>(19)</span></a></li>
=======
                              @foreach($productCategories as $category)
                                 <li><a href="#"><span>{{ $category->name }}</span><span>({{ $category->products_count }})</span></a></li>
                                 @endforeach
>>>>>>> master
                              </ul>
                           </div>
                        </div>
                        <div class="widget">
<<<<<<< HEAD
                           <div class="widget--title">
                              <h2 class="h4">Tags</h2>
                              <i class="icon fa fa-tags"></i> 
                           </div>
                           <div class="tags--widget style--1">
                              <ul class="nav">
                                 <li><a href="#">News</a></li>
                                 <li><a href="#">Image</a></li>
                                 <li><a href="#">Music</a></li>
                                 <li><a href="#">Video</a></li>
                                 <li><a href="#">Audio</a></li>
                                 <li><a href="#">Fashion</a></li>
                                 <li><a href="#">Latest</a></li>
                                 <li><a href="#">Trendy</a></li>
                                 <li><a href="#">Special</a></li>
                                 <li><a href="#">Recipe</a></li>
                                 <li><a href="#">Sports</a></li>
                              </ul>
                           </div>
                        </div>
=======
                        <div class="widget--title  " data-ajax="tab">
                           <h2 class="h4">Từ khóa</h2>
                        </div>
                        <div class="list--widget list--widget-1" data-ajax-content="outer">
                           <!-- Post Items Start -->
                           <div class="post--items post--items-3">
                              <ul style="padding:20px" class="nav sidebar" data-ajax-content="inner">
                                 <x-blog.side-tags :tags="$tags"/>
                              </ul>
                           </div>
                        </div>
                     </div>
>>>>>>> master
                        <div class="widget">
                           <div class="widget--title">
                              <h2 class="h4">Advertisement</h2>
                              <i class="icon fa fa-bullhorn"></i> 
                           </div>
                           <div class="ad--widget"> <a href="#"> <img src="img/ads-img/ad-300x250-2.jpg" alt=""> </a> </div>
                        </div>
                        <div class="widget">
                           <div class="widget--title">
                              <h2 class="h4">Get Newsletter</h2>
                              <i class="icon fa fa-envelope-open-o"></i> 
                           </div>
                           <div class="subscribe--widget">
                              <div class="content">
                                 <p>Subscribe to our newsletter to get latest news, popular news and exclusive updates.</p>
                              </div>
                              <form action="https://themelooks.us13.list-manage.com/subscribe/post?u=79f0b132ec25ee223bb41835f&amp;id=f4e0e93d1d" method="post" name="mc-embedded-subscribe-form" target="_blank" data-form="mailchimpAjax">
                                 <div class="input-group">
                                    <input type="email" name="EMAIL" placeholder="E-mail address" class="form-control" autocomplete="off" required> 
                                    <div class="input-group-btn"> <button type="submit" class="btn btn-lg btn-default active"><i class="fa fa-paper-plane-o"></i></button> </div>
                                 </div>
                                 <div class="status"></div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>        
      @endsection
