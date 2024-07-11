@extends('admin.master')
@section('main-content')
@section('title','Trang chủ')
<section class="content">

    <style>
        .product-image {
   width: 140px;height: 130px;
    
    display: block; 
    margin: 10px 10px 10px 10px; 
    box-sizing: border-box; 
}

.product-details {
    margin-top: 20px;
    padding: 10px; 
    max-height: 250px; 
    width: 140px;
}
.product-detailss{
    margin-top: 10px;
}
.titlen{
    height: 30px;
    
}
.titlen a{
    text-decoration: none;
    color: #000000;
}
.titlen a:hover{
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
        /* body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        } */
        .container1 {
            max-width: 1000px;
            margin: 15px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            font-size: 38px;
            margin-bottom: 20px;
            color: #333;
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; 'Arial Narrow Bold', sans-serif;
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
            font-size: 24px;
            color: #007bff;
        }
    </style>

    <div class="container1">
        <h1>TRANG CHỦ</h1>
    </div>
    <div class="container1">
      
        <div class="summary">
            <p class="total">Sản phẩm sắp hết hàng : {{ $count_saphet }}</p>
        </div>
        <div class="product-container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh</th>
                                
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demtongsp as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ route('product.sanpham', $item->slug) }}"> 
                                    <img src="{{asset('images')}}/{{$item->image}}" alt="" width=50px height="50px">
                                    </a>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>
                                  
                                        Sắp hết hàng ( còn {{ $item->quantity }} sản phẩm)
                                    
                                    
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>              
        </div>
    </div>
    <div class="container1">
      
        <div class="summary">
            <p class="total">Sản phẩm hết hàng : {{$count_het}}</p>
        </div>
        <div class="product-container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demsp_het as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{-- <a href="{{route('product.sanpham','id')}}"> --}}


                                        <a href="{{ route('product.sanpham', $item->slug) }}"> 
                                    <img src="{{asset('images')}}/{{$item->image}}" alt="" width=50px height="50px">
                                </a>
                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                   <a href="">
                                        Đã hết hàng</a>
                                    
                                </td>
                                <td>
                                    <a href="{{ route('nhap.them', ['id' => $item]) }}" class="btn btn-success">Tạo mới </a>

                                </td>
                                
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
    <div class="container1">
      
        <div class="summary">
            <p class="total">Tổng số mặt hàng :  {{ $count }}</p>
        </div>
        <div class="product-container">
            @foreach ($products as $item)
                <div class="product-item">
                    <div class="img-product">
                       
                            <a href="{{ route('product.sanpham', $item->slug) }}">
                            <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}" class="product-image" height="200px">
        
                        </a>
                    </div>
                    <div class="product-details">
                        <div class="titlen"> 
                            <a href="">
                                <h4 class="product-title">{{ $item->name }}</h4>
                            </a>
                        </div>
                       
                      
                       
                       
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</section>
@endsection
