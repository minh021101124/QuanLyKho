@extends('admin.master')
@section('main-content')
@section('title', 'Đơn xuất')
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

<style>
    .container1 {
        max-width: 1060px;
        margin: 0px auto;
        background-color: #ffffff;
        padding: 20px;

        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
    }

    .box1 {
        width: 40%;
        border: 2px solid rgb(147, 148, 150);
        height: 100%;
        padding: 30px;
        margin: 2px;
    }

    .box2 {
        border: 2px solid rgb(147, 148, 150);
        margin-left: 0px;
        width: 40%;
        height: 100%;
        padding: 30px;
        margin: 2px;
    }
</style>

<div class="container1" style="margin-bottom:1%; ">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <h2>Danh sách đơn xuất</h2>

</div>
<a href="{{ route('xuathanghoa.create') }}" class="btn btn-success" style="margin-left:80%; margin-top:0">Tạo mới đơn
    xuất</a>
<div class="container1">



    @if ($xuat->count() > 0)
        <table class="table table-hover" style="margin-left:0; margin-top:1%">

            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã xuất</th>
                    <th>Nội dung xuất</th>
                    <th>Người xuất</th>
                    <th>Ghi chú</th>
                    <th>Ngày lập</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($xuat as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td> <a href="{{ route('xuat.donhang', $item->id) }}">{{ $item->ma_xuat }}</a></td>
                        <td>{{ $item->noi_dung_xuat }}</td>
                        <td>{{ $item->nguoi_xuat }}</td>
                        <td>{{ $item->ghi_chu }}</td>
                        </td>
                        {{-- <td>{{ $item->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s') }}</td> --}}
                        <td>{{ $item->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('xuat.donhang', $item->id) }}"><button class="btn btn-primary">Xem chi
                                    tiết</button></a>
                            {{-- <a href="{{ route('kho.show', $item->id) }}">Xem</a> --}}
                            {{-- <a href="{{ route('nhap.add', $item->id) }}">Add</a> --}}
                            <form action="{{ route('kho.destroy', $item->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <span>Chưa có dữ liệu</span>
    @endif



</div>














@endsection
