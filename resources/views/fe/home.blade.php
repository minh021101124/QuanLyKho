@extends('fe.index')
@section('main')
@section('title-page','Thêm mới danh mục')
<main class="main home">
    <div class="container mb-2">
        
        <div class="row">
            <div class="col-lg-9">
            
                    <h2>SẢN PHẨM</h>

                <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">

                    @foreach( $featureProducts as $item)
                    <div class="product-default inner-quickview inner-icon">
                        <figure class="img-effect">
                            <a href="{{route('detail',$item->slug)}}">
                                <img src="{{asset('hinh_anh')}}/{{$item->image}}" width="205" height="205" alt="product">
                                
                            </a>
                            
                            <div class="btn-icon-group">
                                <a href="{{route('detail',$item->slug)}}" class="btn-icon btn-add-cart"><i
                                        class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                          
                           <div class="product-countdown-container">
                                
                                <div class="product-countdown countdown-compact" data-until="2021, 10, 5" data-compact="true">
                                </div>
                             
                            </div>
                           
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
                            
                            <div class="price-box">
                                @if($item->sale_price >0)
                                <del class="old-price">{{number_format($item->price)}}VND</del>
                                <span class="product-price">{{number_format($item->sale_price)}}VND</span>
                                @else
                                <span class="product-price">{{number_format($item->price)}}VND</span>
                                @endif
                            </div>
                     
                        </div>
                     
                    </div>
                    @endforeach
                </div>
  
                <hr class="mt-1 mb-3 pb-2">
                <h2>SẢN PHẨM THEO DANH MỤC</h>
                @foreach ($categories as $category)
                @php
                    $hasProducts = false;
                @endphp
                <div class="product-container" style="background: rgb(255, 255, 255);">
                    @foreach ($category->children as $childCategory)
                        @if ($childCategory->products->isNotEmpty())
                            @php
                                $hasProducts = true;
                            @endphp
                            <div class="child-category">
                                <div class="titl" style="border:solid 1px #eeeeee;padding-left:20px;background:#ffffff">
                                    <h4 style="color: rgb(0, 0, 0);text-align:center">{{ $childCategory->name }}</h4>
                                </div>
                                <div class="child-category-products" style="background: #eeeeee;">
                                    <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
                                        @foreach ($childCategory->products as $item)
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure class="img-effect">
                                                    <a href="{{ route('detail', $item->slug) }}">
                                                        <img src="{{ asset('hinh_anh/' . $item->image) }}" width="205" height="205" alt="product">
                                                    </a>
                                                    <div class="btn-icon-group">
                                                        <a href="{{ route('detail', $item->slug) }}" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                    <div class="product-countdown-container">
                                                        <div class="product-countdown countdown-compact" data-until="2021, 10, 5" data-compact="true"></div>
                                                    </div>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="demo1-shop.html" class="product-category">{{ $item->category->name }}</a>
                                                        </div>
                                                        <a href="wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                                    </div>
                                                    <h3 class="product-title"><a href="{{ route('detail', $item->slug) }}">{{ $item->name }}</a></h3>
                                                    <div class="price-box">
                                                        @if ($item->sale_price > 0)
                                                            <del class="old-price">{{ number_format($item->price) }}VND</del>
                                                            <span class="product-price">{{ number_format($item->sale_price) }}VND</span>
                                                        @else
                                                            <span class="product-price">{{ number_format($item->price) }}VND</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
            
            </div>
       
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
                        </ul>
                    </nav>
                </div>
               
                    </div>
                   
                </div>
              

   
            </aside>
          
        </div>
      
    </div>
   
</main>
@endsection