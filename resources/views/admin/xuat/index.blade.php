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
<<<<<<< HEAD
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
    </div>
  @endif 
    <h2>Danh sách đơn xuất</h2>
    <a href="{{ route('xuathanghoa.create') }}" class="btn btn-success" style="margin-left:80%; margin-top:0">Tạo mới đơn xuất </a>
=======
    <h3>Danh sách đơn hàng xuất</h3>
    <a href="{{ route('xuathanghoa.create') }}" class="btn btn-success" style="margin-left:85%; margin-top:0">Tạo mới đơn xuất</a>
>>>>>>> d4351c74791ee5f5667b27374b94faf97d700592
   
    <div class="box-body table-responsive no-padding">
        @if($xuat->count() > 0)
            <table class="table table-hover" style="margin-left:0; margin-top:1%">
                <thead>
                    <tr>
                        <th>STT</th>
<<<<<<< HEAD
                        <th>Mã xuất</th>
=======
                        <th>Mã đơn</th>
>>>>>>> d4351c74791ee5f5667b27374b94faf97d700592
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
<<<<<<< HEAD
                          
                            <td>  <a href="{{ route('xuat.donhang', $item->id) }}">{{ $item->ma_xuat }}</a></td>
=======
                            <td>{{ $item->ma_don }}</td>
>>>>>>> d4351c74791ee5f5667b27374b94faf97d700592
                            <td>{{ $item->noi_dung_xuat }}</td>
                            <td>{{ $item->nguoi_xuat }}</td>
                            <td>{{ $item->ghi_chu }}</td>
                        </td>
                        {{-- <td>{{ $item->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s') }}</td> --}}
                        <td>{{ $item->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y') }}</td>
                        <td>
<<<<<<< HEAD
                                <a href="{{ route('xuat.donhang', $item->id) }}"><button class="btn btn-primary">Xem chi tiết</button></a>
=======
                                <a href="{{ route('xuat.donhang', $item->id) }}">Xem</a>
>>>>>>> d4351c74791ee5f5667b27374b94faf97d700592
                                {{-- <a href="{{ route('kho.show', $item->id) }}">Xem</a> --}}
                                {{-- <a href="{{ route('nhap.add', $item->id) }}">Add</a> --}}
                                <form action="{{ route('kho.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    
<<<<<<< HEAD
                                    <button type="submit" class="btn btn-danger">Xóa</button>
=======
                                    <button type="submit">Xóa</button>
>>>>>>> d4351c74791ee5f5667b27374b94faf97d700592
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
</section>

<<<<<<< HEAD
=======

>>>>>>> d4351c74791ee5f5667b27374b94faf97d700592
@endsection
