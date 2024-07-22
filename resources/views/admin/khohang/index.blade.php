@extends('admin.master')
@section('main-content')
@section('title','Kho hàng')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
{{-- --}}
<style>

    .container1 {
        max-width: 1150px;
        margin: 0px auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        display: flex;
        
       
    }
    h1 {
        font-size: 38px;
        margin-bottom: 20px;
        color: #333;
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; 'Arial Narrow Bold', sans-serif;
    }
    
    .box {
        padding: 10px;
        border: 2px solid rgb(147, 148, 150);
        box-sizing: border-box; 
    }
    .box1 {
        width: 50%; 
        height: 100%; /* Height of the first div */
    }
    .box2 {
        margin-left: 20px;
        width: 40%; 
        height: 100%; 
    }
    .table-container {
            max-height: 530px;
            /* Adjust height as needed */
            overflow-y: auto;
            /* Vertical scrollbar will appear if content exceeds max-height */
            border: 1px solid #ddd;
            /* Optional: add a border around the table */
            padding: 0 10px;
            /* Optional: add some padding inside the container */
            width: 100%;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 4px;
            text-align: left; vertical-align: middle;
        }

        .table th {
            background-color: #115f19;color: #ffffff;
            text-align: left;
            position: -webkit-sticky;
            /* For Safari */
            position: sticky;
            top: 0;
            /* Stick to the top of the container */
            z-index: 2;
            /* Ensures header stays above the body content */
        }
   
</style>
    <div class="container1">
        <div class="box1">
            <h3>Sản phẩm đã nhập</h3>
            <div class="table-container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>                         
                                <th>SL</th>
                                <th>Ngày sản xuất</th>
                                <th>Ngày hết hạn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nhapchitiet as $item)
                                <tr>
                                    <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
                                    <td>                       
                                        <img src="{{asset('images')}}/{{$item->product->image}}" alt="" width=40px height="40px">              
                                    </td>
                                    <td style="vertical-align: middle;">{{ $item->product->name }}</td>
                                    <td style="vertical-align: middle;text-align:center">{{ $item->quantity }}</td>
                                    <td style="vertical-align: middle;">{{ \Carbon\Carbon::parse($item->ngaysx)->format('d/m/Y') }}</td>
                                    <td style="vertical-align: middle;">{{ \Carbon\Carbon::parse($item->hansd)->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>        
        </div>
        
        
        <div class="box2">
            <h3>Tồn kho  <span style="font-size: 20px;margin-left:30%;color:red"> Tổng hàng tồn: {{$demtongton}}</span></h3>
           
            <div class="table-container">
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
                                <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
                                <td>
                        
                                    <img src="{{asset('images')}}/{{$item->image}}" alt="" width=40px height="40px">
                
                                </td>
                                <td style="vertical-align: middle;">{{ $item->name }}</td>
                                <td style="vertical-align: middle;">
                                    @if($item->quantity == 0)
                                        Đã hết
                                    @elseif($item->quantity < 3)
                                        Sắp hết hàng ({{ $item->quantity }})
                                    @else
                                        {{ $item->quantity }}
                                    @endif
                                </td>                       
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
        
    </div>
    {{ $nhapchitiet->links() }}
    </div>
  


@endsection



