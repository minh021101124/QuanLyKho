@extends('fe.index')
@section('main')
@section('title-page','Thêm mới danh mục')
<main class="main home">
    <div class="container mb-2">
        
        <div class="row">
            <div class="col-lg-9">
                <div class="home-slider slide-animate owl-carousel owl-theme mb-2" data-owl-options="{
                    'loop': false,
                    'dots': true,
                    'nav': false
                }">
                  
                </div>
                <!-- End .home-slider -->

                <div class="banners-container m-b-2 owl-carousel owl-theme" data-owl-options="{
                    'dots': false,
                    'margin': 20,
                    'loop': false,
                    'responsive': {
                        '480': {
                            'items': 2
                        },
                        '768': {
                            'items': 3
                        }
                    }
                }">
                   
                </div>

                {{-- <h1 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                    Sản Phẩm</h1> --}}
                    <h2>DANH MỤC SẢN PHẨM</h2>

                    <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">

                        @foreach( $products as $item)
                        <div class="product-default inner-quickview inner-icon">
                            <figure class="img-effect">
                                <a href="{{route('detail',$item->slug)}}">
                                    <img src="{{asset('hinh_anh')}}/{{$item->image}}" width="205" height="205" alt="product">
                                    
                                </a>
                                {{-- <div class="label-group">
                                    <div class="product-label label-hot">Bán chạy</div>
                                    <div class="product-label label-sale">-20%</div>
                                </div> --}}
                                <div class="btn-icon-group">
                                    <a href="{{route('detail',$item->slug)}}" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                {{--<a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>--}}
                               <div class="product-countdown-container">
                                    {{--<span class="product-countdown-title">offer ends in:</span>--}}
                                    <div class="product-countdown countdown-compact" data-until="2021, 10, 5" data-compact="true">
                                    </div>
                                    <!-- End .product-countdown -->
                                </div>
                                <!-- End .product-countdown-container -->
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="demo1-shop.html" class="product-category">{{$item->category->name}}</a>
                                    </div>
                                    <a href="wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="{{route('detail',$item->slug)}}">{{$item->name}}</a> </h3>
                                {{-- <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div> --}}
                                <!-- End .product-container -->
                                <div class="price-box">
                                    @if($item->sale_price >0)
                                    <del class="old-price">{{number_format($item->price)}}VND</del>
                                    <span class="product-price">{{number_format($item->sale_price)}}VND</span>
                                    @else
                                    <span class="product-price">{{number_format($item->price)}}VND</span>
                                    @endif
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        @endforeach
                    </div>
               
                

                <hr class="mt-1 mb-3 pb-2">

               
            </div>
            <!-- End .col-lg-9 -->

            <div class="sidebar-overlay"></div>
            <div class="sidebar-toggle custom-sidebar-toggle"><i class="fas fa-sliders-h"></i></div>
            <aside class="sidebar-home col-lg-3 order-lg-first mobile-sidebar">
                <div class="side-menu-wrapper text-uppercase mb-2 d-none d-lg-block">
                    <h2 class="side-menu-title bg-gray ls-n-25">Danh mục</h2>

                    <nav class="side-nav">
                        <ul class="menu menu-vertical sf-arrows">
                            <li class="active"><a href="{{route('index')}}"><i class="icon-home"></i>Home</a></li>

                          @foreach($categories as $category)

                          <li>
                         <a href="{{ route('fe.category_product', $category->id) }}" class="sf-with-ul"><i
                                 class="sicon-badge"></i>  {{ $category->name }}
                                 @if($category->children->isNotEmpty())
                                    
                                 @endif</a> @if($category->children->isNotEmpty())
                       
                                     <ul class="submenu">
                                        
                                             
                                                
                                                     @include('partials.category', ['categories' => $category->children])
                                                
                                            
                                        
                                     </ul>
                                     @endif
                                 </li>
                      @endforeach





                                        {{-- <div class="col-lg-4">
                                            <a href="#" class="nolink pl-0">VARIATION 2</a>
                                            <ul class="submenu">
                                                <li><a href="category-list.html">List Types</a></li>
                                                <li><a href="category-infinite-scroll.html">Ajax Infinite
                                                        Scroll</a>
                                                </li>
                                                <li><a href="category.html">3 Columns Products</a></li>
                                                <li><a href="category-4col.html">4 Columns Products</a></li>
                                                <li><a href="category-5col.html">5 Columns Products</a></li>
                                                <li><a href="category-6col.html">6 Columns Products</a></li>
                                                <li><a href="category-7col.html">7 Columns Products</a></li>
                                                <li><a href="category-8col.html">8 Columns Products</a></li>
                                            </ul>
                                        </div> --}}
                                       
                        </ul>
                    </nav>
                </div>
               
                    </div>
                    <!-- End .banner-slider -->
                </div>
                <!-- End .widget -->

                {{-- <div class="widget widget-newsletters bg-gray text-center">
                    <h3 class="widget-title text-uppercase m-b-3">Subscribe Newsletter</h3>
                    <p class="mb-2">Get all the latest information on Events, Sales and Offers. </p>
                    <form action="#">
                        <div class="form-group position-relative sicon-envolope-letter">
                            <input type="email" class="form-control" name="newsletter-email" placeholder="Email address">
                        </div>
                        <!-- Endd .form-group -->
                        <input type="submit" class="btn btn-primary btn-md" value="Subscribe">
                    </form>
                </div>
                <!-- End .widget -->

                <div class="widget widget-testimonials">
                    <div class="owl-carousel owl-theme dots-left dots-small">
                        <div class="testimonial">
                            <div class="testimonial-owner">
                                <figure>
                                    <img src="{{asset('fe-asset')}}/assets/images/clients/client-1.jpg" alt="client">
                                </figure>

                                <div>
                                    <h4 class="testimonial-title">john Smith</h4>
                                    <span>CEO &amp; Founder</span>
                                </div>
                            </div>
                            <!-- End .testimonial-owner -->

                            <blockquote class="ml-4 pr-0">
                                <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.
                                </p>
                            </blockquote>
                        </div>
                        <!-- End .testimonial -->

                        <div class="testimonial">
                            <div class="testimonial-owner">
                                <figure>
                                    <img src="{{asset('fe-asset')}}/assets/images/clients/client-2.jpg" alt="client">
                                </figure>

                                <div>
                                    <h4 class="testimonial-title">Dae Smith</h4>
                                    <span>CEO &amp; Founder</span>
                                </div>
                            </div>
                            <!-- End .testimonial-owner -->

                            <blockquote class="ml-4 pr-0">
                                <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.
                                </p>
                            </blockquote>
                        </div>
                        <!-- End .testimonial -->

                        <div class="testimonial">
                            <div class="testimonial-owner">
                                <figure>
                                    <img src="{{asset('fe-asset')}}/assets/images/clients/client-3.jpg" alt="client">
                                </figure>

                                <div>
                                    <h4 class="testimonial-title">John Doe</h4>
                                    <span>CEO &amp; Founder</span>
                                </div>
                            </div>
                            <!-- End .testimonial-owner -->

                            <blockquote class="ml-4 pr-0">
                                <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.
                                </p>
                            </blockquote>
                        </div>
                        <!-- End .testimonial -->
                    </div>
                    <!-- End .testimonials-slider -->
                </div> --}}
                <!-- End .widget -->

                {{-- <div class="widget widget-posts post-date-in-media media-with-zoom mb-0 mb-lg-2 pb-lg-2">
                    <div class="owl-carousel owl-theme dots-left dots-m-0 dots-small" data-owl-options="
                        { 'margin' : 20,
                          'loop': false }">
                        <article class="post">
                            <div class="post-media">
                                <a href="single.html">
                                    <img src="{{asset('fe-asset')}}/assets/images/blog/home/post-1.jpg" data-zoom-image="{{asset('fe-asset')}}/assets/images/blog/home/post-1.jpg" width="280" height="209" alt="Post">
                                </a>
                                <div class="post-date">
                                    <span class="day">29</span>
                                    <span class="month">Jun</span>
                                </div>
                                <!-- End .post-date -->

                                <span class="prod-full-screen">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                            <!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="single.html">Post Format Standard</a>
                                </h2>

                                <div class="post-content">
                                    <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with... </p>

                                    <a href="single.html" class="read-more">read more <i
                                            class="icon-right-open"></i></a>
                                </div>
                                <!-- End .post-content -->
                            </div>
                            <!-- End .post-body -->
                        </article>

                        <article class="post">
                            <div class="post-media">
                                <a href="single.html">
                                    <img src="{{asset('fe-asset')}}/assets/images/blog/home/post-2.jpg" data-zoom-image="{{asset('fe-asset')}}/assets/images/blog/home/post-2.jpg" width="280" height="209" alt="Post">
                                </a>
                                <div class="post-date">
                                    <span class="day">29</span>
                                    <span class="month">Jun</span>
                                </div>
                                <!-- End .post-date -->
                                <span class="prod-full-screen">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                            <!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="single.html">Fashion Trends</a>
                                </h2>

                                <div class="post-content">
                                    <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with... </p>

                                    <a href="single.html" class="read-more">read more <i
                                            class="icon-right-open"></i></a>
                                </div>
                                <!-- End .post-content -->
                            </div>
                            <!-- End .post-body -->
                        </article>

                        <article class="post">
                            <div class="post-media">
                                <a href="single.html">
                                    <img src="{{asset('fe-asset')}}/assets/images/blog/home/post-3.jpg" data-zoom-image="{{asset('fe-asset')}}/assets/images/blog/home/post-3.jpg" width="280" height="209" alt="Post">
                                </a>
                                <div class="post-date">
                                    <span class="day">29</span>
                                    <span class="month">Jun</span>
                                </div>
                                <!-- End .post-date -->
                                <span class="prod-full-screen">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                            <!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="single.html">
                                        Post Format Video</a>
                                </h2>

                                <div class="post-content">
                                    <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with... </p>

                                    <a href="single.html" class="read-more">read more <i
                                            class="icon-right-open"></i></a>
                                </div>
                                <!-- End .post-content -->
                            </div>
                            <!-- End .post-body -->
                        </article>
                    </div>
                    <!-- End .posts-slider -->
                </div> --}}
                <!-- End .widget -->
            </aside>
            <!-- End .col-lg-3 -->
        </div>
        <!-- End .row -->
    </div>
    <!-- End .container -->
</main>
@endsection