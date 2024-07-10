@extends('admin.master')
@section('main-content')

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
            <p class="total">Tổng số mặt hàng :  {{ $count }}</p>
        </div>
        <div class="product-container">
            @foreach ($products as $item)
                <div class="product-item">
                    <div class="img-product">
                        <a href=""> 
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
