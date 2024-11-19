@extends('main_layouts.master')

@section('content')
<div class="main--breadcrumb">
            <div class="container">
               <ul class="breadcrumb">
                  <li><a href="home-1.html" class="btn-link"><i class="fa fm fa-home"></i>Home</a></li>
                  <li><a href="shop.html" class="btn-link">Shop</a></li>
                  <li class="active"><span>Shop Details</span></li>
               </ul>
            </div>
         </div>
         <div class="main-content--section pbottom--30">
            <div class="container">
               <div class="row">
                  <div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
                     <div class="sticky-content-inner">
                        <div class="product--single ptop--30">
                           <div class="row">
                              <div class="col-md-6 pbottom--30">
                              <div class="product--img-gallery">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="productSingleImg01"> 
                                        <span data-zoom="img">
                                            <img src="{{ asset('images/products/' . basename($product->image)) }}" alt="{{ $product->name }}">
                                        </span>
                                    </div>
                                    <div class="tab-pane fade" id="productSingleImg02"> 
                                        <span data-zoom="img">
                                            <img src="{{ asset('images/products/' . basename($product->image)) }}" alt="{{ $product->name }}">
                                        </span>
                                    </div>
                                    <div class="tab-pane fade" id="productSingleImg03"> 
                                        <span data-zoom="img">
                                            <img src="{{ asset('images/products/' . basename($product->image)) }}" alt="{{ $product->name }}">
                                        </span>
                                    </div>
                                </div>
                                <ul class="nav row gutter--15">
                                    <li class="col-xs-4 active"> 
                                        <a href="#productSingleImg01" data-toggle="tab"> 
                                            <img src="{{ asset('images/products/' . basename($product->image)) }}" alt="{{ $product->name }}">
                                        </a>
                                    </li>
                                    <li class="col-xs-4"> 
                                        <a href="#productSingleImg02" data-toggle="tab"> 
                                            <img src="{{ asset('images/products/' . basename($product->image)) }}" alt="{{ $product->name }}">
                                        </a>
                                    </li>
                                    <li class="col-xs-4"> 
                                        <a href="#productSingleImg03" data-toggle="tab"> 
                                            <img src="{{ asset('images/products/' . basename($product->image)) }}" alt="{{ $product->name }}">
                                        </a>
                                    </li>
                                </ul>
                                </div>

                              </div>
                              <div class="col-md-6 pbottom--30">
                                 <div class="product--summery">
                                    <div class="title">
                                       <h2 class="h4">I{{ $product->name }}</h2>
                                    </div>
                                    <div class="rating">
                                       <ul class="nav">
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star"></i></li>
                                          <li><i class="fa fa-star-o"></i></li>
                                          <li><i class="fa fa-star-o"></i></li>
                                       </ul>
                                       <a href="#" class="btn-link">(02 Reviews)</a> 
                                    </div>
                                    <div class="price text--color-1">
                                       <p><span>{{ number_format($product->price, 2) }} VND</span></p>
                                    </div>
                                    <p class="note"><strong>SKU:</strong> {{ $categoryName }}</p>
                                    <p class="note"><strong>Availabele:</strong>{{ $product->stock }} units</p>
                                    <div class="description">
                                    <p>{{ $product->description }}</p>
                                    </div>
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="cart">
                                    @csrf
                                       <div class="quantity bg--color-1"> <input type="number" name="quantity" value="1" class="form-control bg--color-1" step="1" min="1" size="4"> </div>
                                       <button type="submit" class="btn btn-primary"><i class="fa fm fa-shopping-cart"></i>Add To Cart</button> <a href="#" class="btn btn-primary"><i class="fa fa-exchange"></i></a> <a href="#" class="btn btn-primary"><i class="fa fa-heart-o"></i></a> 
                                    </form>
                                    <ul class="meta nav cat">
                                       <li><span>Catagories:</span></li>
                                       <li><a href="#">Fashion</a>,</li>
                                       <li><a href="#">Travels</a>,</li>
                                       <li><a href="#">Fitness</a>,</li>
                                       <li><a href="#">Music</a>,</li>
                                       <li><a href="#">Cloths</a>,</li>
                                       <li><a href="#">Lather</a></li>
                                    </ul>
                                    <ul class="meta nav tag">
                                       <li><span>Tags:</span></li>
                                       <li><a href="#">News</a></li>
                                       <li><a href="#">Image</a></li>
                                       <li><a href="#">Music</a></li>
                                       <li><a href="#">Video</a></li>
                                       <li><a href="#">Trendy</a></li>
                                       <li><a href="#">Special</a></li>
                                    </ul>
                                    <ul class="meta nav social">
                                       <li><span>Share This Product:</span></li>
                                       <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                       <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                       <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                       <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                       <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="col-md-12 ptop--30 pbottom--30">
                                 <ul class="nav tab-nav">
                                    <li class="active"><a href="#productDetails01" data-toggle="tab">Description</a></li>
                                    <li><a href="#productDetails02" data-toggle="tab">Additional Information</a></li>
                                    <li><a href="#productDetails03" data-toggle="tab">02 Reviews</a></li>
                                 </ul>
                                 <div class="product--details tab-content ptop--30">
                                    <div class="tab-pane fade in active" id="productDetails01">
                                       <div class="content clearfix">
                                          <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
                                          <table>
                                             <tbody>
                                                <tr>
                                                   <td>There are many variations of passages of Lorem Ipsum look even slightly believable.</td>
                                                   <td>There are many variations of passages of Lorem Ipsum look even slightly believable.</td>
                                                </tr>
                                                <tr>
                                                   <td>There are many variations of passages of Lorem Ipsum look even slightly believable.</td>
                                                   <td>There are many variations of passages of Lorem Ipsum look even slightly believable.</td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                    <div class="tab-pane fade" id="productDetails02">
                                       <div class="content clearfix">
                                          <table>
                                             <tbody>
                                                <tr>
                                                   <td>There are many variations of passages of Lorem Ipsum look even slightly believable.</td>
                                                   <td>There are many variations of passages of Lorem Ipsum look even slightly believable.</td>
                                                </tr>
                                                <tr>
                                                   <td>There are many variations of passages of Lorem Ipsum look even slightly believable.</td>
                                                   <td>There are many variations of passages of Lorem Ipsum look even slightly believable.</td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                    <div class="tab-pane fade" id="productDetails03">
                                       <div class="comment--list pbottom--30">
                                          <ul class="comment--items nav">
                                             <li>
                                                <div class="comment--item clearfix">
                                                   <div class="comment--img float--left"> <img src="img/news-single-img/comment-avatar-01.jpg" alt=""> </div>
                                                   <div class="comment--info">
                                                      <div class="comment--header clearfix">
                                                         <p class="name">Karla Gleichauf</p>
                                                         <p class="date">12 May 2017 at 05:28 pm</p>
                                                         <div class="rating">
                                                            <ul class="nav">
                                                               <li><i class="fa fa-star"></i></li>
                                                               <li><i class="fa fa-star"></i></li>
                                                               <li><i class="fa fa-star"></i></li>
                                                               <li><i class="fa fa-star-o"></i></li>
                                                               <li><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                         </div>
                                                      </div>
                                                      <div class="comment--content">
                                                         <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment</p>
                                                      </div>
                                                   </div>
                                                </div>
                                             </li>
                                             <li>
                                                <div class="comment--item clearfix">
                                                   <div class="comment--img float--left"> <img src="img/news-single-img/comment-avatar-02.jpg" alt=""> </div>
                                                   <div class="comment--info">
                                                      <div class="comment--header clearfix">
                                                         <p class="name">M Shyamalan</p>
                                                         <p class="date">12 May 2017 at 05:28 pm</p>
                                                         <div class="rating">
                                                            <ul class="nav">
                                                               <li><i class="fa fa-star"></i></li>
                                                               <li><i class="fa fa-star"></i></li>
                                                               <li><i class="fa fa-star"></i></li>
                                                               <li><i class="fa fa-star-o"></i></li>
                                                               <li><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                         </div>
                                                      </div>
                                                      <div class="comment--content">
                                                         <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment</p>
                                                      </div>
                                                   </div>
                                                </div>
                                                <ul class="comment--items nav">
                                                   <li>
                                                      <div class="comment--item clearfix">
                                                         <div class="comment--img float--left"> <img src="img/news-single-img/comment-avatar-03.jpg" alt=""> </div>
                                                         <div class="comment--info">
                                                            <div class="comment--header clearfix">
                                                               <p class="name">Liz Montano</p>
                                                               <p class="date">12 May 2017 at 05:28 pm</p>
                                                               <div class="rating">
                                                                  <ul class="nav">
                                                                     <li><i class="fa fa-star"></i></li>
                                                                     <li><i class="fa fa-star"></i></li>
                                                                     <li><i class="fa fa-star"></i></li>
                                                                     <li><i class="fa fa-star-o"></i></li>
                                                                     <li><i class="fa fa-star-o"></i></li>
                                                                  </ul>
                                                               </div>
                                                            </div>
                                                            <div class="comment--content">
                                                               <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment</p>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </li>
                                                </ul>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="comment--form ptop--30">
                                          <div class="post--items-title">
                                             <h2 class="h4">Add Review</h2>
                                             <i class="icon fa fa-pencil-square-o"></i> 
                                          </div>
                                          <div class="comment-respond">
                                             <form action="#" data-form="validate">
                                                <div class="rating">
                                                   <label for="productRatingSelect">Drop Your Rating :</label> 
                                                   <select name="rating" id="productRatingSelect">
                                                      <option value="0">0</option>
                                                      <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                      <option value="4">4</option>
                                                      <option value="5">5</option>
                                                   </select>
                                                </div>
                                                <p>Don’t worry ! Your email address will not be published. Required fields are marked (*).</p>
                                                <div class="row">
                                                   <div class="col-xs-6 col-xxs-12"> <label> <span>Write Your Reviews *</span> <textarea name="comment" class="form-control" required></textarea> </label> </div>
                                                   <div class="col-xs-6 col-xxs-12"> <label> <span>Name *</span> <input type="text" name="name" class="form-control" required> </label> <label> <span>Email Address *</span> <input type="email" name="email" class="form-control" required> </label> <label> <span>Website</span> <input type="text" name="website" class="form-control"> </label> </div>
                                                   <div class="col-xs-6 col-xxs-12"> <button type="submit" class="btn btn-primary">Submit Review</button> </div>
                                                </div>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12 ptop--30">
    <div class="related--products">
        <div class="post--items-title" data-ajax="tab">
            <h2 class="h4">You Might Also Like</h2>
            <div class="nav">
                <a href="#" class="prev btn-link" data-ajax-action="load_prev_related_products">
                    <i class="fa fa-long-arrow-left"></i>
                </a>
                <span class="divider">/</span>
                <a href="#" class="next btn-link" data-ajax-action="load_next_related_products">
                    <i class="fa fa-long-arrow-right"></i>
                </a>
            </div>
        </div>
        <div class="product--items" data-ajax-content="outer">
            <div class="row AdjustRow" data-ajax-content="inner">
                @foreach($relatedProducts as $relatedProduct)
                    <div class="col-md-4 hidden-sm hidden-xs pbottom--30">
                        <div class="product--item">
                            <div class="img">
                                <img src="{{ asset('images/products/' . basename($relatedProduct->image)) }}" alt="{{ $relatedProduct->name }}">
                                <div class="actions">
                                    <div class="vc--parent">
                                        <div class="vc--child">
                                            <a href="{{ route('shop.show', $relatedProduct->id) }}" class="btn btn-primary">
                                                <i class="fa fa-eye-slash"></i>Quick View
                                            </a>
                                            <ul class="nav">
                                                <li><a href="#"><i class="fa fa-search"></i></a></li>
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
                                <h3 class="h5">
                                    <a href="{{ route('shop.show', $relatedProduct->id) }}" class="btn-link">{{ $relatedProduct->name }}</a>
                                </h3>
                            </div>
                            <div class="price text--color-1">
                                <p>
                                    <span class="del">{{ number_format($relatedProduct->old_price, 0, ',', '.') }} VNĐ</span>
                                    <span>{{ number_format($relatedProduct->price, 0, ',', '.') }} VNĐ</span>
                                </p>
                            </div>
                            <div class="rating">
                                <ul class="nav">
                                    @for($i = 0; $i < 5; $i++)
                                        <li><i class="fa fa-star{{ $i < $relatedProduct->rating ? '' : '-o' }}"></i></li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

                           </div>
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
                           <div class="widget--title">
                              <h2 class="h4">Product Categories</h2>
                              <i class="icon fa fa-folder-open-o"></i>
                           </div>
                           <div class="nav--widget">
                              <ul class="nav">
                                    @foreach($productCategories as $category)
                                       <li>
                                          
                                                <span>{{ $category->name }}</span>
                                                <span>({{ $category->products_count }})</span>
                                          
                                       </li>
                                    @endforeach
                              </ul>
                           </div>
                        </div>

                        <div class="widget">
                        <div class="widget--title  " data-ajax="tab">
                           <h2 class="h4">Từ khóa</h2>
                        </div>
                        <div class="list--widget list--widget-1" data-ajax-content="outer">
                           <!-- Post Items Start -->
                           <!-- <div class="post--items post--items-3">
                              <ul style="padding:20px" class="nav sidebar" data-ajax-content="inner">
                                
                              </ul>
                           </div> -->
                        </div>
                     </div>
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

</div>
@endsection