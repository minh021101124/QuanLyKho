@extends('admin.master')
@section('main-content')
<style>
    .ganhet {
        font-weight: 500;
        font-size: 12px;
        color: green;
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
    <h1>Quản lý Nhập kho</h1>
    <a href="{{ route('kho.create') }}" class="btn btn-success" style="margin-left:2%; margin-top:2%">+ Thêm mới</a>
   
    <div class="box-body table-responsive no-padding">
        @if($kho->count() > 0)
            <table class="table table-hover" style="margin-left:2%; margin-top:5%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tên</th>
                        <th>SL</th>
                        <th>Hạn sử dụng</th>
                        <th>Ngày lập</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kho as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($item->hansudung)->setTimezone('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s') }}
                                
                                @php
                                    $ngayhet = \Carbon\Carbon::parse($item->hansudung);
                                    $now = \Carbon\Carbon::now();
                                    $demnguoc = $ngayhet->diffInDays($now, false);
                                    $demnguoc_gio = $ngayhet->diffInHours($now, false);
                                @endphp
                                @if($demnguoc < 0)
                                    <span class="ganhet"><div class="chua">{{ abs($demnguoc) }} ngày nữa hết hạn</div></span>
                                @elseif($demnguoc === 0)
                                    @if($demnguoc_gio < 24)
                                        <span class="ganhet"><div class="chua">{{ abs($demnguoc_gio) }} giờ nữa hết hạn</div></span>
                                    @else
                                        <span class="maihet"><div class="chua">Sắp hết hạn</div></span>
                                    @endif
                                @else
                                    <span class="dahet"><div class="chua">Đã hết hạn</div></span>
                                @endif
                            </td>
                        </td>
                        <td>{{ $item->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s') }}</td>
                        <td>
                                <a href="{{ route('kho.show', $item->id) }}">Xem</a>
                                <a href="{{ route('kho.edit', $item->id) }}">Chỉnh sửa</a>
                                <form action="{{ route('kho.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Xóa</button>
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
@endsection
