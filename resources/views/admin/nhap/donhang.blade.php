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
</style>
<section class="content">
  
    {{-- @foreach ($madon as $item)
    Đơn hàng số : {{$item -> ma_don}}
    @endforeach --}}
    <h1>Thông Tin Đơn Nhập Hàng</h1>
    {{-- <p>ID: {{ $nhap->id }}</p> --}}
    <p style="font-size: 16px">Mã đơn hàng: {{ $nhap->ma_don }}</p>
    <p>Ngày Nhập: {{ $nhap->ngay_nhap }}</p>
    <div class="box-body table-responsive no-padding">
        {{-- @if($duli->count() > 0) --}}
            <table class="table table-hover" style="margin-left:0; margin-top:1%">
                
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ctNhaps as $ctNhap)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ctNhap->product->name }}</td>
                               
                                
                                <td>{{ $ctNhap->quantity }}</td>
                                <td>{{ $ctNhap->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                
            </table>
        {{-- @else
            <span>Chưa có dữ liệu</span>
        @endif --}}
    </div>
</section>
@endsection





