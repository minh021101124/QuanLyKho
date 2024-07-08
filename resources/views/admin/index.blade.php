@extends('admin.master')
@section('main-content')

<section class="content">

    <style>
        /* body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        } */
        .container1 {
            max-width: 800px;
            margin: 0 auto;
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

        <div class="summary">
            <p class="total">Sản phẩm:  {{ $count }}</p>
        </div>

        
        {{-- <ul>
            @foreach ($products as $product)
                <li>{{ $product->name }} - {{ $product->price }}</li>
            @endforeach
        </ul> --}}
    </div>


</section>
@endsection
