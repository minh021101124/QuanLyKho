@extends('admin.master')
@section('main-content')
@section('title', 'Đơn nhập sản phẩm')
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
        .hoadon{
        margin: auto;
        width: 600px;
        height: 700px;
        padding: 5%;
        background: #ffffff;
    }
</style>
<section class="content" style="background: #969696">
    <div class="hoadon">

    {{-- @foreach ($madon as $item)
    Đơn hàng số : {{$item -> ma_don}}
    @endforeach --}}
    <h1 style="margin-bottom:5%; text-align:center; font-weight:600">Chi tiết Đơn Nhập Hàng</h1>
    {{-- <p>ID: {{ $nhap->id }}</p> --}}
    <table style="border:none; width: 75%; font-size:18px;">
        <tr>
            <td style="font-weight: 600; color: red; padding-left: 10px;">Mã đơn hàng:</td>
            <td style="padding-left: 20px;">{{ $nhap->ma_don }}</td>
        </tr>
        <tr>
            <td style="font-weight: 600; color: red; padding-left: 10px;">Ngày Nhập:</td>
            <td style="padding-left: 20px;">
                {{ $nhap->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('H:i - d/m/Y') }}
            </td>
        </tr>
    </table>
    


    <div class="box-body table-responsive no-padding">
        {{-- @if ($duli->count() > 0) --}}
        <table class="table table-hover" style="margin-left:0; margin-top:1%">

            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>

                    <th>Ngày sản xuất</th>
                    <th>Ngày hết hạn</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0; // Khởi tạo biến tổng
                @endphp
                @foreach ($ctNhaps as $ctNhap)
                    @php
                        $total += $ctNhap->total_price; // Cộng dồn vào biến tổng
                    @endphp
                    <tr>
                        <td >{{ $loop->iteration }}</td>
                        <td>{{ $ctNhap->product->name }}</td>
                        <td>{{ number_format($ctNhap->price) }}đ</td>
                        <td>{{ $ctNhap->quantity }}</td>
                        <td>{{ number_format($ctNhap->total_price) }}đ</td>
                        <td>{{ $ctNhap->ngaysx ? \Carbon\Carbon::parse($ctNhap->ngaysx)->format('d/m/Y') : '' }}
                        </td>
                        <td>{{ $ctNhap->hansd ? \Carbon\Carbon::parse($ctNhap->hansd)->format('d/m/Y') : '' }}
                        </td>

                    </tr>
                @endforeach
                <tr>
                    <td colspan="3"></td>
                    <td style="font-weight: 600; color: red;font-size:18px;"><strong>Tổng:</strong></td>
                    <td><strong>{{ number_format($total) }}đ</strong></td>
                    <td></td>
                </tr>
            </tbody>



        </table>
        <div class="col-md-4">
            
        </div>
        {{-- @else
            <span>Chưa có dữ liệu</span>
        @endif --}}
    </div>
    </div>
</section>
@endsection
