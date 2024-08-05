@extends('admin.master')
@section('main-content')
@section('title', 'Trang chủ')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}

<style>
    .notification {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #f8d7da;
        color: #721c24;
        padding: 20px;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
        z-index: 1000;
        display: none;
    }
</style>
<style>
    .container2 {
        display: flex;
        /* max-width: 1030px; */
        width: 100%;
        /* margin: 13px 28px;
       
        padding: 15px; */
        /* border: solid 3px rgb(217, 217, 217); */
       
    }
    .container4 {
    max-width: 1200px;
    margin: 10px 10px;
    height: auto;
    background-color: #ffffff;
    padding: 10px 15px ;
    border:solid 3px rgb(217, 217, 217);
       
    }
    .container6 {
    max-width: 1200px;
    margin: 10px 10px;
    height: auto;
    background-color: #ffffff;
    padding: 10px 15px ;
    border:solid 3px rgb(217, 217, 217);
       
    }

    .box1 {
        width: 40%;
        border: 3px solid rgb(220, 220, 220);
        height: 100px;
        padding: 10px;
        margin:0 10px;
    }

    .box2 {
        border: 3px solid rgb(220, 220, 220);
        margin-left: 0px;
        width: 40%;
        height: 100px;
        padding: 10px;
        margin:0 10px;
    }
    .container3 {
    display: flex;
    width: 100%;
    height: 320px;
    /* margin-bottom: 20px; */
}

.box3, .box4 {
    width: 50%;
    height: 300px;
}


    
</style>
<style>
    .product-image {
        width: 60px;
        height: 60px;

        display: block;
        margin:  5px;
        box-sizing: border-box;
    }




    .titlen a:hover {
        text-decoration: none;
        color: #c62929;
    }

    .product-container {
        display: flex;
        flex-wrap: wrap;
        /* background: #fcf3e8; */
        justify-content: flex-start;
        padding: 20px;
        align-items: center;
    }

   
    .container1 {
        max-width: 1000px;
        margin: 13px 28px;
        background-color: #ffffff;
        padding: 15px;
        border: solid 3px rgb(217, 217, 217);
        /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
    }

    

    /* ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        } */
    .total {
        font-size: 15px;
        color: #007bff;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .table th {
        background-color: #ffffff;
        text-align: left;
        color: #ffffff;
        position: -webkit-sticky;
        /* For Safari */
        position: sticky;
        top: 0;
        /* Stick to the top of the container */
        z-index: 2;
        /* Ensures header stays above the body content */
    }

    .warning {
        color: red;
        font-weight: bold;
    }

    .ok {
        color: rgb(5, 235, 63);
        font-weight: bold;
    }
</style>
<style>
    .warning-row {
        background-color: #ffdddd;
    }

    .warning-icon {
        color: red;
        font-weight: bold;
    }
</style>
@if (session()->has('message'))
    <div class="notification" id="notification">
        {{ session('message') }}
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var notification = document.getElementById('notification');
        if (notification) {
            notification.style.display = 'block';
            setTimeout(function() {
                notification.style.display = 'none';
            }, 5000); // Ẩn thông báo sau 5 giây
        }
    });
</script>
<section class="content">


.
    {{-- <div class="row"> --}}
        <div class="container2">
           
            <div class="box1" style="background: #ffffff">
                <h5 style="font-weight:600 ;" >Tổng số đơn nhập</h5>
                <p>
                {{$count_don_nhap}}
                </p>
            </div>
            <div class="box2" style="background: #ffffff">
                <h5 style="font-weight:600 ;">Tổng số đơn xuất</h5>
                <p>
                    {{$count_don_xuat}}
                </p>
            </div>
            <div class="box1" style="background: #ffffff">
                <h5 style="font-weight:600 ;">Tổng số sản phẩm</h5>
                <p>
                    {{ $count }}
                </p>
            </div>
            
            <i class="fas fa-bell notification-icon">
                {{-- <span class="badge">3</span> <!-- Số lượng thông báo --> --}}
            </i>
            <style>
                .notification-icon {
                    font-size: 24px; /* Kích thước biểu tượng */
                    color: red; /* Màu sắc biểu tượng */
                    position: relative;
                }
                /* .notification-icon .badge {
                    position: absolute;
                    top: -10px;
                    right: -10px;
                    background-color: red;
                    color: white;
                    border-radius: 50%;
                    padding: 5px 10px;
                } */
            </style>
            
           
            
        </div>
        <div class="container5">
            <div class="box5">
            @if ($soLuongSapHetHan > 0)
            
            @else
                <span></span>
            @endif
            <div class="product-container">
                @if ($hsdList1->count() > 0)
                    <span class="warning-icon">⚠️ Sắp hết hạn!</span>
                    @foreach ($hsdList1 as $item)
                        <table>
                            <tr>
                                <td>
                                    <img src="{{ asset('images/' . $item->product->image) }}"
                                        alt="{{ $item->name }}" class="product-image" style="width:50px;height:50px">
                                </td>
                                <td style="width:200px">{{ $item->product->name }}</td>
                                <td style="width:90px">{{ $item->hansd }} ngày</td>
                            </tr>
                        </table>
                    @endforeach
                @else
                    <span></span>
                @endif
            </div>
            </div>
        </div>
        <div class="container5">
           
                
            <div class="box5">
                {{-- Sản phẩm --}}
                <div class="container6">
                    @if ($products->count() > 0)
                    <h5 style="font-weight:600 ;" >Sản phẩm</h5>
                   
                        <div class="product-container">
                            @foreach ($products as $item)
                                <div class="product-item">
                                    <div class="img-product">

                                        <a href="{{ route('product.sanpham', $item->slug) }}">
                                            <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}"
                                                class="product-image" height="30px" width="30px">

                                        </a>
                                    </div>
                                    <div class="product-details">
                                        {{-- <div class="titlen">
                                    <a href="">
                                        <h4 class="product-title">{{ $item->name }}</h4>
                                    </a>
                                </div> --}}




                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <span>Không có sản phẩm</span>
                    @endif
                </div>
            </div>
            
        </div>
        <div class="container3">
            <div class="box3">
                
            @if ($demtongsp->count() > 0)
                <div class="container4">

                    <h5 style="font-weight:600 ;">Sản phẩm sắp hết hàng</h5>
                    <p>
                        {{ $count_saphet }}
                    </p>
                    <div class="product-container">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width:40px">STT</th>
                                    <th style="width:50px">Ảnh</th>

                                    <th style="width:200px">Tên sản phẩm</th>
                                    <th>Số lượng</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($demtongsp as $item)
                                    <tr>
                                        <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ route('product.sanpham', $item->slug) }}">
                                                <img src="{{ asset('images') }}/{{ $item->image }}" alt=""
                                                width=25px height="20px">
                                            </a>
                                        </td>
                                        <td style="vertical-align: middle;">{{ $item->name }}</td>
                                        <td style="vertical-align: middle;">

                                             còn {{ $item->quantity }} sản phẩm


                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            @else
                {{-- <span>Không có sản phẩm sắp hết</span> --}}
            @endif
            </div>
            <div class="box4">
            @if ($demsp_het->count() > 0)
                <div class="container4">
                    <h5 style="font-weight:600 ;">Sản phẩm hết hàng</h5>
                <p>
                    {{ $count_het }}
                </p>
                   
                    <div class="product-container">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    {{-- <th>Số lượng</th> --}}
                                    {{-- <th></th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($demsp_het as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{-- <a href="{{route('product.sanpham','id')}}"> --}}


                                            <a href="{{ route('product.sanpham', $item->slug) }}">
                                                <img src="{{ asset('images') }}/{{ $item->image }}" alt=""
                                                    width=25px height="20px">
                                            </a>
                                        </td>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        {{-- <td>
                                            <a href="">
                                                Đã hết hàng</a>

                                        </td> --}}
                                        {{-- <td>
                                        <a href="{{ route('nhap.them', ['id' => $item]) }}" class="btn btn-success">Tạo mới
                                        </a>

                                    </td> --}}

                                        <script>
                                            function fillProductId() {
                                                // Lấy mã ID sản phẩm từ trường cần điền
                                                var productId = document.getElementById('product_id').value;

                                                // Điền mã ID sản phẩm vào trường trong form đơn nhập hàng
                                                document.getElementById('input_product_id').value = productId;
                                            }
                                        </script>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            @else
                {{-- <span>Không có sản phẩm hết</span> --}}
            @endif
            
            </div>
        </div>

            {{-- Hết hạn --}}
       
{{-- </div> --}}

        {{-- menu phải --}}
       
    {{-- </div> --}}
</section>
@endsection
