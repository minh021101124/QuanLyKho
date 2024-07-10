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
    .pagination-container {
    display: flex;
    justify-content: center;
    
}

</style>
<section class="content">
    {{-- @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
    </div>
   @endif --}}
    <h2>Danh sách đơn đã nhập</h2>
   
    <a href="{{ route('nhaphanghoa.create') }}" class="btn btn-success" style="margin-left:80%; margin-top:0">Tạo mới đơn nhập</a>
   
    <div class="box-body table-responsive no-padding" style="height:440px">
        @if($nhap->count() > 0)
            <table class="table table-hover" style="margin-left:0; margin-top:1%">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn</th>
                        <th>Nội dung nhập</th>
                        <th>Người nhập</th>
                        <th>Ghi chú</th>
                        <th>Ngày lập</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nhap as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                          
                            <td>  <a href="{{ route('nhap.donhang', $item->id) }}">{{ $item->ma_don }}</a></td>
                            <td>{{ $item->noi_dung_nhap }}</td>
                            <td>{{ $item->nguoi_nhap }}</td>
                            <td>{{ $item->ghi_chu }}</td>
                        </td>
                        {{-- <td>{{ $item->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s') }}</td> --}}
                        <td>{{ $item->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y') }}</td>
                        <td>
                                <a href="{{ route('nhap.donhang', $item->id) }}"><button class="btn btn-primary">Xem chi tiết</button></a>
                                {{-- <a href="{{ route('kho.show', $item->id) }}">Xem</a> --}}
                                {{-- <a href="{{ route('nhap.add', $item->id) }}">Add</a> --}}
                                <form action="{{ route('kho.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- @if(Session::has('message'))
            <script>
                swal({
                    title: "Message",
                    text: "{{ Session::get('message') }}",
                    icon: "success",
                    button: "OK",
                });
            </script>
        @endif

         --}}
         <div class="pagination-container">
            {{ $nhap->links() }}
        </div>
        
        @else
            <span>Chưa có dữ liệu</span>
        @endif
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if(Session::has('success'))
<script>
    swal({
        title: "Thông báo",
        text: "{{ Session::get('success') }}",
        icon: "success",
        button: "OK",
        timer: 8000,
        dangerMode: false,
    });
</script>
@endif

@endsection
