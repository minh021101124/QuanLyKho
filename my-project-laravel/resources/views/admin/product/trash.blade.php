@extends('admin.master')
@section('title','Danh | Trang Chủ')
<!-- Main content -->
@section('main-content')
<section class="content">
    <!-- Default box -->
    <div class="col-xs-12">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Giá KM</th>
                            <th>Danh mục</th>
                            <th>Ảnh</th>
                            <th>Ngày tạo</th>
                            <th>Tùy chọn</th>
                        </tr>
                        @forelse ($products as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->sale_price }}</td>
                                <td>
                                    @if($item->category)
                                        {{ $item->category->name }}
                                    @else
                                        Danh mục không tồn tại
                                    @endif
                                </td>
                                <td>
                                    <img src="{{ asset('hinh_anh/' . $item->image) }}" alt="" width="100px" height="100px">
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="{{ route('product.restore', $item->id) }}" class="btn btn-success">Khôi phục</a>
                                    <a href="{{ route('product.forceDelete', $item->id) }}" onclick="return confirm('Chắc chưa?')" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">Không có sản phẩm nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
