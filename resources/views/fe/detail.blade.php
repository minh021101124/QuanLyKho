@extends('fe.index')
@section('main')

<main class="main">
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Chi tiết sản phẩm</a></li>
            </ol>
        </nav>

        <div class="product-single-container product-single-default">
            <div class="cart-message d-none">
                <strong class="single-cart-notice">“Sản phẩm”</strong>
                <span>Đã thêm vào giỏ hàng.</span>
            </div>

            <div class="row">
                <div class="col-lg-5 col-md-6 product-single-gallery">
                    <div class="product-slider-container">
                        <div class="label-group">
                         
                        </div>

                        <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                            <div class="product-item">
                                <img class="product-single-image" src="{{asset('hinh_anh')}}/{{$product->image}}" data-zoom-image="{{asset('hinh_anh')}}/{{$product->image}}" width="468" height="468" alt="product" />
                            </div>
                           @foreach($product->images as $item)

                            <div class="product-item">
                                <img class="product-single-image" src="{{asset('hinh_anh_mo_ta')}}/{{$item->image}}" data-zoom-image="{{asset('hinh_anh_mo_ta')}}/{{$item->image}}" width="468" height="468" alt="product" />
                            </div>
                            @endforeach
                        </div>
                    
                        <span class="prod-full-screen">
                            <i class="icon-plus"></i>
                        </span>
                    </div>

                    <div class="prod-thumbnail owl-dots">
                        <div class="owl-dot">
                            <img src="{{asset('hinh_anh')}}/{{$product->image}}" width="110" height="110" alt="product-thumbnail" />
                        </div>
                        @foreach($product->images as $item)
                        <div class="owl-dot">
                            <img src="{{asset('hinh_anh_mo_ta')}}/{{$item->image}}" width="110" height="110" alt="product-thumbnail" />
                        </div>
                        @endforeach
                    </div>
                </div>
   

                <div class="col-lg-7 col-md-6 product-single-details">
                    <h1 class="product-title">{{$product->name}} </h1>

                    <div class="product-nav">
                        <div class="product-prev">
                            <a href="#">
                                <span class="product-link"></span>

                                <span class="product-popup">
                                    <span class="box-content">
                                        <img alt="product" width="150" height="150"
                                            src="{{asset('fe-asset/assets')}}/images/products/product-3.jpg"
                                            style="padding-top: 0px;">

                                        <span>Circled Ultimate 3D Speaker</span>
                                </span>
                                </span>
                            </a>
                        </div>

                        <div class="product-next">
                            <a href="#">
                                <span class="product-link"></span>

                                <span class="product-popup">
                                    <span class="box-content">
                                        <img alt="product" width="150" height="150"
                                            src="{{asset('fe-asset/assets')}}/images/products/product-4.jpg"
                                            style="padding-top: 0px;">

                                        <span>Blue Backpack for the Young</span>
                                </span>
                                </span>
                            </a>
                        </div>
                    </div>

                   

                    <hr class="short-divider">

                    <div class="price-box">
                        @if($product->sale_price > 0)
                            <del class="old-price">{{ number_format($product->price) }}VND</del>
                            <span class="new-price">{{ number_format($product->sale_price) }}VND</span>
                        @else
                            <span class="product-price">{{ number_format($product->price) }}VND</span>
                        @endif
                    </div>
                    
                    

                  
                      

                    <div class="product-action">
                        <form action="{{route('cart.add')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id}}">
                        <div class="product-single-qty">
                            <input class="horizontal-quantity form-control" name= "quantity" type="text" value="1">
                        </div>
                      

                                <button type="submit" class="btn btn-dark  mr-2" title="Add to Cart">Thêm vào giỏ hàng</a></button>
                        </form>
                        <a href="cart.html" class="btn btn-gray view-cart d-none">Chi tiết giỏ hàng </a>
                    </div>
                

                    <hr class="divider mb-0 mt-0">

                    <div class="product-single-share mb-3">
                        <label class="sr-only">Share:</label>

                        <div class="social-icons mr-2">
                            <a href="https://www.facebook.com/profile.php?id=100078936511659&mibextid=ZbWKwL" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                            <a href="http://www.discardless.eu/twitter.com/logine034.html?lang=vi" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                        
                            <a href="https://accounts.google.com/v3/signin/identifier?checkedDomains=youtube&ddm=0&dsh=S-368270971%3A1716657405203145&flowEntry=AccountChooser&flowName=GlifWebSignIn&ifkv=AaSxoQzNXfDaxhl1rgoGwrHED4UmsMk9_fJ7rZ8sQq4132k8ImAXyV1fJ4tzihV66ThtajEkNmVgtg&pstMsg=1&service=mail&continue=https%3A%2F%2Fmail.google.com%2Fmail" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
                        </div>
                        <!-- End .social-icons -->

                        <a href="wishlist.html" class="btn-icon-wish add-wishlist" title="Add to Wishlist"><i
                                class="icon-wishlist-2"></i><span>Add to
                                Wishlist</span></a>
                    </div>
                   
                </div>
              
            </div>
            
        </div>
       

        <div class="product-single-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Mô tả </a>
                </li>

                
                
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                    <div class="product-desc-content">
                        {!!$product->description!!}
                    </div>
                   
                </div>
             

                <div class="tab-pane fade" id="product-size-content" role="tabpanel" aria-labelledby="product-tab-size">
                    <div class="product-size-content">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{asset('fe-asset/assets')}}/images/products/single/body-shape.png" alt="body shape" width="217" height="398">
                            </div>
                            <!-- End .col-md-4 -->

                           
                        </div>
                        <!-- End .row -->
                    </div>
                    <!-- End .product-size-content -->
                </div>
                <!-- End .tab-pane -->

                <div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
                    <table class="table table-striped mt-2">
                        <tbody>
                            <tr>
                                <th>Weight</th>
                                <td>23 kg</td>
                            </tr>

                            <tr>
                                <th>Dimensions</th>
                                <td>12 × 24 × 35 cm</td>
                            </tr>

                            <tr>
                                <th>Color</th>
                                <td>Black, Green, Indigo</td>
                            </tr>

                            <tr>
                                <th>Size</th>
                                <td>Large, Medium, Small</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- End .tab-pane -->

                <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                    <div class="product-reviews-content">
                        <h3 class="reviews-title">1 review for Men Black Sports Shoes</h3>

                        <div class="comment-list">
                            <div class="comments">
                                <figure class="img-thumbnail">
                                    <img src="{{asset('fe-asset/assets')}}/images/blog/author.jpg" alt="author" width="80" height="80">
                                </figure>

                                <div class="comment-block">
                                    <div class="comment-header">
                                        <div class="comment-arrow"></div>

                                        <div class="ratings-container float-sm-right">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:60%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>

                                        <span class="comment-by">
                                            <strong>Joe Doe</strong> – April 12, 2018
                                        </span>
                                    </div>

                                    <div class="comment-content">
                                        <p>Excellent.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="divider"></div>

                        <div class="add-product-review">
                            <h3 class="review-title">Add a review</h3>

                            <form action="#" class="comment-form m-0">
                                <div class="rating-form">
                                    <label for="rating">Your rating <span class="required">*</span></label>
                                    <span class="rating-stars">
                                        <a class="star-1" href="#">1</a>
                                        <a class="star-2" href="#">2</a>
                                        <a class="star-3" href="#">3</a>
                                        <a class="star-4" href="#">4</a>
                                        <a class="star-5" href="#">5</a>
                                    </span>

                                    <select name="rating" id="rating" required="" style="display: none;">
                                        <option value="">Rate…</option>
                                        <option value="5">Perfect</option>
                                        <option value="4">Good</option>
                                        <option value="3">Average</option>
                                        <option value="2">Not that bad</option>
                                        <option value="1">Very poor</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Your review <span class="required">*</span></label>
                                    <textarea cols="5" rows="6" class="form-control form-control-sm"></textarea>
                                </div>
                                <!-- End .form-group -->


                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="form-group">
                                            <label>Name <span class="required">*</span></label>
                                            <input type="text" class="form-control form-control-sm" required>
                                        </div>
                                        <!-- End .form-group -->
                                    </div>

                                    <div class="col-md-6 col-xl-12">
                                        <div class="form-group">
                                            <label>Email <span class="required">*</span></label>
                                            <input type="text" class="form-control form-control-sm" required>
                                        </div>
                                        <!-- End .form-group -->
                                    </div>

                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="save-name" />
                                            <label class="custom-control-label mb-0" for="save-name">Save my
                                                name, email, and website in this browser for the next time I
                                                comment.</label>
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Submit">
                            </form>
                        </div>
                        <!-- End .add-product-review -->
                    </div>
                    <!-- End .product-reviews-content -->
                </div>
                <!-- End .tab-pane -->
            </div>
            <!-- End .tab-content -->
        </div>
        <!-- End .product-single-tabs -->

        <div class="products-section pt-0">
            <h2 class="section-title">Sản phẩm liên quan</h2>

            <div class="products-slider owl-carousel owl-theme dots-top dots-small">

                @foreach($related as $item)
                <div class="product-default">
                    <figure>
                        <a href="{{route('detail', $item->slug)}}">
                            <img src="{{asset('hinh_anh')}}/{{$item->image}}" width="280" height="280" alt="product">
                            
                        </a>
                       
                    </figure>
                    <div class="product-details">
                        <div class="category-list">
                            <a href="category.html" class="product-category">{{$item->category->name}}</a>
                        </div>
                        <h3 class="product-title">
                            <a href="{{route(
                                'detail', $item->slug)}}">{{$item->name}}</a>
                        </h3>
                        
                        <div class="price-box">
                            @if($item->sale_price >0)
                            <del class="old-price">{{number_format($item->price)}}VND</del>
                            <span class="product-price">{{number_format($item->sale_price)}}VND</span>
                            @else
                            <span class="product-price">{{number_format($item->price)}}VND</span>
                            @endif
                        </div>
                        <!-- End .price-box -->
                        <div class="product-action">
                            <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                    class="icon-heart"></i></a>
                            <a href="{{route('detail',$item->slug)}}" class="btn-icon btn-add-cart"><i
                                    class="fa fa-arrow-right"></i><span>Chọn
                                    </span></a>

                                    {{-- <a href="{{route('detail',$item->slug)}}" class="btn-icon btn-add-cart"><i
                                        class="fa fa-arrow-right"></i>
                                </a> --}}


                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                    class="fas fa-external-link-alt"></i></a>
                        </div>
                    </div>
                    <!-- End .product-details -->
                </div>

               @endforeach
            </div>
            <!-- End .products-slider -->
        </div>
       
    </div>
    <!-- End .container -->
</main>
@endsection