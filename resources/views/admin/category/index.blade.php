@extends('admin.master')
@section('title', 'Danh mục sản phẩm')
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
<section class="content">
    <span style="font-size:28px;font-weight:500;margin-left:450px">DANH MỤC</span>

    <div class="box-body table-responsive no-padding">

        <table class="table table-hover" style="margin-left:0%; margin-top:2%">
            <a href="{{ route('category.create') }}" class="btn btn-success" style="margin-left:2%; margin-top:5%">+ Thêm mới
                danh mục</a>

            <tbody>
                <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    
                    <th>ID</th>
                    <th>Ngày tạo</th>
                   
                    <th style="width:40px"></th>
                <th style="width:40px"s></th>
                </tr>

                @forelse ($categories as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        {{-- <td>{{$item->parent_id}}</td> --}}
                        <td>{{ $item->id }}</td>

                        <td>{{ $item->created_at }}</td>

                        {{-- <td>{!! $item->status
                            ? '<span class="label label-success">Hiển thị</span> '
                            : ' <span class="label label-success">Ẩn hiển thị</span>' !!}</td>--}}
                        <td> 
                            <a href="{{ route('category.edit', $item) }}" ><i class="fa fa-edit" style="font-size: 15px;"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('category.destroy', $item) }}" method="POST">
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
        <a href="{{ route('category.trash') }}" style="position: absolute; top: 550px; left: 30px;" class="btn btn-primary"><i class="fa fa-trash"> Thùng
                rác</i></a>
    </div>
</section>
@endsection


   
