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
    .hoadon{
        margin: auto;
        width: 600px;
        height: 700px;
        padding: 5%;
        background: #ffffff;
    }

    .table {
        width: 100%;
        margin: auto; /* Centers the table horizontally */
    }

    .table th,
    .table td {
        border: 1px solid #ddd;
        padding: 4px;font-size: 10px;
        text-align: left;
        vertical-align: middle;
    }

    .table th {
        background-color: #1d42a8;
        color: #ffffff;
        text-align: left;
        position: -webkit-sticky; 
        position: sticky;
        top: 0; /* Stick to the top of the container */
        z-index: 2; /* Ensures header stays above the body content */
    }
   
</style>

<section class="content" style="background: #969696">
        <div class="hoadon">
                    <h1 style="margin-bottom:5%; text-align:center; font-weight:600">HÓA ĐƠN XUẤT HÀNG</h1>
                    
                    <table style="border:none; width: 60%; font-size:14px; margin-left:10px ;margin-bottom: 1%">
                        <tr>
                            <td style="font-weight: 400; color: red; padding-left: 10%;">Mã xuất:</td>
                            <td style="padding-left: 10%;">{{ $nhap->ma_xuat }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: 400; color: red; padding-left: 10%;">Ngày Xuất:</td>
                            <td style="padding-left: 10%;">{{ $nhap->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('H:i - d/m/Y') }}</td>
                        </tr>
                    </table>

                    <div>
                        <table class="table" >
                            <thead>
                                <tr>
                                    <th style="font-size: 10px">STT</th>
                                    <th style="font-size: 10px;width:400px">Tên Sản Phẩm</th>
                                    <th style="font-size: 10px">Giá</th>
                                    <th style="font-size: 10px">Số lượng</th>
                                    <th style="font-size: 10px">Thành tiền</th>
                                    <th style="font-size: 10px">Ngày sản xuất</th>
                                    <th style="font-size: 10px">Ngày hết hạn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($ctNhaps as $ctNhap)
                                    @php
                                        $total += $ctNhap->total_price; // Accumulate total
                                    @endphp
                                    <tr>
                                        <td style="font-size: 10px">{{ $loop->iteration }}</td>
                                        <td style="font-size: 10px;">{{ $ctNhap->prouctid->name }}</td>
                                        <td style="font-size: 10px">{{ number_format($ctNhap->price) }}đ</td>
                                        <td style="font-size: 10px">{{ $ctNhap->quantity }}</td>
                                        <td style="font-size: 10px">{{ number_format($ctNhap->total_price) }}đ</td>
                                        <td style="font-size: 10px">{{ $ctNhap->ngaysx ? \Carbon\Carbon::parse($ctNhap->ngaysx)->format('d/m/Y') : '' }}</td>
                                        <td style="font-size: 10px">{{ $ctNhap->hansd ? \Carbon\Carbon::parse($ctNhap->hansd)->format('d/m/Y') : '' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="text-align:right; margin-right:10%;">
                            <span style="font-weight: 600; color: red; font-size:18px;"><strong>Tổng:</strong></span>
                            <strong>{{ number_format($total) }}đ</strong>
                        </div>
                    </div>
        </div>
        <form action="{{ route('xuat.in') }}" method="POST">
            @csrf
           
            <button type="submit">Print</button>
        </form>
</section>
@endsection
