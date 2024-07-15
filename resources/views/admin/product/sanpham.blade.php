@extends('admin.master')
@section('title', 'Danh sách sản phẩm')
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
                    <div class="det">
                        <table style="font-size: 20px">

                            <tr>

                                <td style="width:150px;font-weight: 600">
                                    Giá nhập:
                                </td>
                                <td style="padding-left: 0px;">
                                    {{ number_format($product->sale_price) }}đ
                                </td>
                            </tr>
                            <tr>

                                <td style="width:150px;font-weight: 600">
                                    Giá sỉ:
                                </td>
                                <td style="padding-left: 0px;">
                                    {{ number_format($product->price) }}đ
                                </td>
                            </tr>
                            <tr>

                                <td style="width:150px;font-weight: 600">
                                    Giá lẻ:
                                </td>
                                <td style="padding-left: 0px;">
                                    {{ number_format($product->le_price) }}đ
                                </td>
                            </tr>
                            <tr>

                                <td style="width:150px;font-weight: 600">
                                    Danh mục
                                </td>
                                <td style="padding-left: 0px;">
                                    {{-- {{ route('product.sanpham', $product->category->id) }} --}}
                                    <a href="#"
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

                                    @if ($product->quantity == 0)
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


                    </td>
                    </form>
                </div>








            </div>

        </div>

        </div>




        </div>
    </body>

@endsection
