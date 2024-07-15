@extends('admin.master')
@section('main-content')
@section('title', 'Danh sách nhập')
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
  @endif  --}}
    <h3>Danh sách sản phẩm đã nhập</h3>
    <div class="box-body table-responsive no-padding" style="height:390px">
        @if ($nhap->count() > 0)
            <table class="table table-hover" style="margin-left:0; margin-top:1%">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Tên mặt hàng</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                        <th>Ngày nhập hàng</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($nhapchitiet as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>

                                <img src="{{ asset('images') }}/{{ $item->product->image }}" alt="" width=50px
                                    height="50px">

                            </td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price) }}đ</td>
                            <td>{{ number_format($item->total_price) }}đ</td>
                            <td>{{ $item->nhap->created_at ? $item->nhap->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y') : '' }}
                            </td>

                            <td></td>
                            </td>
                            {{-- <td>{{ $item->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s') }}</td> --}}
                            {{-- <td>{{ $item->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y') }}</td> --}}

                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $nhapchitiet->links() }} --}}
        @else
            <span>Chưa có dữ liệu</span>
        @endif
    </div>
    <div class="pagination-container">
        {{ $nhapchitiet->links() }}
    </div>
</section>


@endsection
