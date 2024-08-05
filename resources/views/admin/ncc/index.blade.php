@extends('admin.master')
@section('title','Nhà cung cấp')
@section('main-content')
@section('content-header')
<style>
    .table {
           width: 100%;
           border-collapse: collapse;
       }

       .table th,
       .table td {
           border: 1px solid #ddd;
           padding: 8px;
       }

       .table th {
           background-color: #1285f1;
           text-align: left; color: #ffffff;
           position: -webkit-sticky;
           /* For Safari */
           position: sticky;
           top: 0;
           /* Stick to the top of the container */
           z-index: 2;
           /* Ensures header stays above the body content */
       }
       
</style>
@if (session('success'))
        <div class="alert hide">
            <span class="fas fa-exclamation-circle"></span>
            <span class="msg">{{ session('success') }}</span>
            <div class="close-btn">
                <span class="fas fa-times"></span>
            </div>
        </div>
    @endif
<section class="content" >
    <span style="font-size:28px;font-weight:500;margin-left:400px">NHÀ CUNG CẤP</span>
    <a href="{{ route('nhacungcap.create') }}" class="btn btn-success" style="position:absolute;top:80px;left:30px">+ Thêm mới
        nhà cung cấp</a>

    <table class="table table-hover" style="margin-top:80px">

        <tbody>
            <tr>
                <th>STT</th>
                <th>Tên NCC</th>
                {{-- <th>Danh mục cha</th> --}}
                <th>Số điện thoại</th>
                <th>Điạ chỉ</th>
            
                <th style="width:40px"></th>
                <th style="width:40px"s></th>
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
                        <a href="{{ route('nhacungcap.edit', $item) }}" style="color: inherit; text-decoration: none;color:#1285f1"><i class="fa fa-edit" style="font-size: 15px;"></i></a>
                    </td>
                    <td>
                        <form action="{{ route('nhacungcap.destroy', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: red; cursor: pointer;" onclick="return confirm('Bạn đã chắc chắn?');"><i class="fa fa-trash" style="font-size: 15px;"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <span>Chưa có dữ liệu</span>
            @endforelse
        </tbody>
    </table>
</section>
@endsection

