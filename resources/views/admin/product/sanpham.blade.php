@extends('admin.master')
@section('title','Danh sách sản phẩm')
@section('main-content')
@section('content-header')

<link rel="stylesheet" href="{{ asset('assets') }}/cssDetail.css">

    <head>

        {{-- <link rel="stylesheet" href="{{asset('assets')}}/min1.css" type="text/css"> --}}
        <link rel="stylesheet" href="{{ asset('assets') }}/fe.css" type="text/css">
        <style>
        
        </style>

    </head>

    <body style="background: #ffffff">
        <div class="all">
            <div class="deprod">

                <span> {{ session('success') }}</span>


                <div class="left">

                    <div class="imaged">


                        <img src="{{ asset('images') }}/{{ $product->image }}">

                    </div>

                    {{-- <div class="imgdet">
                        <div class="product-thumbnail">
                            <img src="{{asset('images')}}/{{$product->image}}" alt="">
                        </div>
                        @foreach ($product->images as $item)
                        <div class="product-thumbnail">
                            <img src="{{asset('images_many')}}/{{$item->image}}" alt="">
                        </div>
                        @endforeach
                    </div> --}}
                    <!-- Thumbnails -->
                    <div class="imgdet">
                        @foreach ($product->images as $item)
                            <div class="product-thumbnail"
                                onclick="openModal('{{ asset('images_many') }}/{{ $item->image }}')">
                                <img src="{{ asset('images_many') }}/{{ $item->image }}" alt="">
                            </div>
                        @endforeach
                    </div>

                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                        <span class="close" onclick="closeModal()">&times;</span>
                        <img class="modal-content" id="modalImg">
                    </div>

                </div>
                <div class="right">

                    <h3 class="product-title">{{ $product->name }}</h3>
                    @if ($product->sale_price)
                        <div>
                            <span class="product-price-detail-number">{{ number_format($product->sale_price) }}đ</span>
                        </div>
                        <small>
                            <div>
                                <span class="product-discount-detail-number">{{ number_format($product->price) }}đ</span>
                            </div>
                        </small>
                    @else
                        <div>
                            <span class="product-price-detail-number">{{ number_format($product->price) }}đ</span>
                        </div>
                    @endif

                    <div class="det">
                        <table style="font-size: 20px">
                            <tr>
                                <td style="width:150px;font-weight: 600">
                                    Danh mục
                                </td>
                                <td style="padding-left: 0px;">
                                    <a href="{{ route('fe.catdetail', $product->category->id) }}"
                                        style="text-decoration: none; color:rgb(22, 136, 98)">{{ $product->category->name }}</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: 600">
                                    Mô tả ngắn
                                </td>
                                <td style="padding-left: 0px;">
                                    {{ $product->short_description }}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: 600">
                                    Số lượng
                                </td>
                                <td>
                                   
                                    @if($product->quantity == 0)
                                        Đã hết
                                    @elseif($product->quantity < 3)
                                        Sắp hết hàng ({{ $product->quantity }})
                                    @else
                                        {{ $product->quantity }}
                                    @endif
                                   

                                </td>  
                            </tr>
                        </table>
                    </div>

                    <form action="{{ route('cart.add') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">

                        <td colspan="2">
                            {{-- <div class="quantity">
                                <td>
                                    Số lượng
                                </td>
                                <td>
                                   
                                    @if($product->quantity == 0)
                                        Đã hết
                                    @elseif($product->quantity < 3)
                                        Sắp hết hàng ({{ $demtongsp->product->quantity }})
                                    @else
                                        {{ $product->quantity }}
                                    @endif
                                   

                                </td>  
                            </div> --}}
                        </td>

                        {{-- <td colspan="2"><button type="submit" class="add-to-cart btn btn-default">Thêm vào giỏ
                                hàng</button></td> --}}

                    </form>
                </div>








            </div>

        </div>
        {{-- <div class="dett">
           
            
            <div class="de1">
                <div class="col">
                    {!! $product->description !!}
                </div>
                <div class="col">
                <div class="description-title"> </div>
                
            
            </div></div>
       
        
        </div> --}}
        </div>

        


        </div>
    </body>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const quantityInput = document.querySelector('.quantity-input');
        const quantityPlusBtn = document.querySelector('.quantity-plus');
        const quantityMinusBtn = document.querySelector('.quantity-minus');

        quantityPlusBtn.addEventListener('click', function() {
            quantityInput.value = parseInt(quantityInput.value) + 1;
        });

        quantityMinusBtn.addEventListener('click', function() {
            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            } else {
                quantityInput.value = 1;
            }
        });

        quantityInput.addEventListener('change', function() {
            if (parseInt(quantityInput.value) < 1 || isNaN(parseInt(quantityInput.value))) {
                quantityInput.value = 1;
            }
        });
    });
    // Open the modal
    function openModal(imgSrc) {
        var modal = document.getElementById("myModal");
        var modalImg = document.getElementById("modalImg");
        modal.style.display = "block";
        modalImg.src = imgSrc;
    }

    // Close the modal
    function closeModal() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    }
</script>


@endsection


    