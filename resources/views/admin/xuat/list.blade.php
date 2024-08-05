@extends('admin.master')
@section('main-content')
@section('title', 'Danh sách xuất')
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
        text-align: left;
        vertical-align: middle;
    }

    .table th {
        background-color: #115f19;
        color: #ffffff;
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
<section class="content">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <p style="font-size: 30px;font-weight:400">Sản phẩm đã xuất</p>
    @if ($nhap->count() > 0)
    <div class="box-body table-responsive no-padding">
        {{-- @if ($xuat->count() > 0) --}}
        <table class="table table-hover" style="margin-left:0; margin-top:1%">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Tên mặt hàng</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                    <th>Ngày xuất hàng</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($xuatchitiet as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>

                            <img src="{{ asset('images') }}/{{ $item->prouctid->image }}" alt="" width=50px
                                height="50px">

                        </td>
                        <td>{{ $item->prouctid->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price) }}đ</td>
                        <td>{{ number_format($item->total_price) }}đ</td>
                        <td>{{ $item->xuat->created_at ? $item->xuat->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y') : '' }}
                        </td>


                        {{-- <td>{{ $item->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s') }}</td> --}}
                        {{-- <td>{{ $item->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y') }}</td> --}}

                    </tr>
                @endforeach
            </tbody>
        </table>


        <form action="{{ route('xuat.in') }}" method="POST" style="">
            @csrf
        
            <button type="submit" style="width: 100px">In</button>
        </form>
        @else
        <span>Chưa có dữ liệu</span>
    @endif
    </div>
</section>


@endsection
