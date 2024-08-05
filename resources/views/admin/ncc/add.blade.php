@extends('admin.master')
@section('main-content')
@section('title', 'Tạo mới nhà cung cấp')
@if (session('success'))
<style>
    .form-control{
       height:28px;font-size:13px
   }
</style>
<div class="alert hide">
    <span class="fas fa-exclamation-circle"></span>
    <span class="msg">{{ session('success') }}</span>
    <div class="close-btn">
        <span class="fas fa-times"></span>
    </div>
</div>
@endif
<section class="content">
    <!DOCTYPE html>
    <html>

    <head>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>
        <span style="font-size:28px;font-weight:500;margin-left:80px">THÊM NHÀ CUNG CẤP</span>
        <form action="{{ route('nhacungcap.store') }}" method="POST">
            @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @error('ten') has-error @enderror">
                            <label for="ma_don">Tên nhà cung cấp</label>
                            <input type="text" name="ten" id="ma_don" class="form-control">
                            @error('ten')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @error('sodt') has-error @enderror">
                            <label for="noi_dung_nhap">Số điện thoại</label>
                            <input type="text" name="sodt" id="noi_dung_nhap"
                               class="form-control">
                            @error('sodt')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @error('diachi') has-error @enderror">
                            <label for="ghi_chu">Địa chỉ</label>
                            <input type="text" name="diachi" id="noi_dung_nhap"
                                class="form-control">
                            @error('diachi')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-success" style="width:100px;margin-left:1%">Lưu</button>
            <a href="{{ route('nhap.index') }}" class="btn btn-danger"
                style="margin-left:0; margin-top:0;width:100px;">Hủy</a>
        </form>
        <table class="table table-hover">

            <tbody>
                <tr>
                    <th>STT</th>
                    <th>Tên NCC</th>
                    {{-- <th>Danh mục cha</th> --}}
                    <th>Số điện thoại</th>
                    <th>Điạ chỉ</th>
                   
                    <th></th>
                    <th></th>
                </tr>
        
                @forelse ($ncc as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->ten }}</td>
                        {{-- <td>{{$item->parent_id}}</td> --}}
                        <td>{{ $item->sodt }}</td>
        
                        <td>{{ $item->diachi }}</td>
        
                        {{-- <td>{!! $item->status
                            ? '<span class="label label-success">Hiển thị</span> '
                            : ' <span class="label label-success">Ẩn hiển thị</span>' !!}</td>--}}
                        <td> 
                            <a href="{{ route('nhacungcap.edit', $item) }}" class="btn btn-success">Sửa</a>
                        </td>
                        <td>
                            <form action="{{ route('nhacungcap.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn đã chắc chắn?');">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <span>Chưa có dữ liệu</span>
                @endforelse
            </tbody>
        </table>
        
    </body>
</section>
@endsection
