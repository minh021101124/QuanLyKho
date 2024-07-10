@extends('admin.master')
@section('main-content')
<style>
    .ganhet {
        font-weight: 500;
        font-size: 12px;
        color: green;
    }
    .ganhetroi {
        font-weight: 500;
        font-size: 12px;
        color: rgb(250, 175, 0);
    }
    .maihet {
        font-weight: 500;
        font-size: 12px;
        color: blue;
    }
    .dahet {
        font-weight: 600;
        font-style: italic;
        font-size: 12px;
        color: rgb(255, 0, 0);
    }
    .chua {
        width: 150px;
        margin-left: 10px;
    }
    .container {
        display: flex;
        /* justify-content: space-between; */
        margin-top: 1%;
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
    .table-container .table {
        border-collapse: collapse;
    }
    .table-container th, .table-container td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
</style>

<section class="content">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>  
        <strong>{{ $message }}</strong>
    </div>
    @endif 

    <h2>Kho hàng</h2>
    <div class="container">
        <div class="box box1">
            <h3>Sản phẩm đã nhập</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
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
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->ngaysx)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->hansd)->format('d/m/Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="box box2">
            <div style="background: red;height:100%;"><h3>Tồn kho</h3></div>
            <h3>Tồn kho</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($demtongsp as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->quantity }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
