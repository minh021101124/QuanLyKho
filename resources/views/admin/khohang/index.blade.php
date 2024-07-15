@extends('admin.master')
@section('main-content')
@section('title','Kho hàng')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>

    .container1 {
        max-width: 1050px;
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
   
</style>




    <div class="container1">
      
       
   
        <div class="box1">
            <h3>Sản phẩm đã nhập</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                       
                        <th>Số lượng</th>
                        <th>Ngày sản xuất</th>
                        <th>Ngày hết hạn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nhapchitiet as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                   
                            <img src="{{asset('images')}}/{{$item->product->image}}" alt="" width=50px height="50px">
        
                        </td>
                        <td>{{ $item->product->name }}</td>
                        
                        
                        <td>{{ $item->quantity }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->ngaysx)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->hansd)->format('d/m/Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        
        <div class="box2">
            <h3>Tồn kho</h3>
            <span style="font-size: 20px;color:red"> Tổng hàng tồn:{{$demtongton}}</span>
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
                   
                            <img src="{{asset('images')}}/{{$item->image}}" alt="" width=50px height="50px">
        
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>
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
    {{ $nhapchitiet->links() }}
    </div>
  


@endsection



