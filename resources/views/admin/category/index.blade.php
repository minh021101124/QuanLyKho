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
    <h1>DANH MỤC SẢN PHẨM</h1>

    <div class="box-body table-responsive no-padding">

        <table class="table table-hover" style="margin-left:0%; margin-top:5%">
            <!-- Default box -->
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <a href="{{ route('category.create') }}" class="btn btn-success" style="margin-left:2%; margin-top:5%">+ Thêm mới
                danh mục</a>

            <tbody>
                <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    {{-- <th>Danh mục cha</th> --}}
                    <th>Ngày tạo</th>
                  
                    <th></th>
                    <th></th>
                </tr>

                @forelse ($categories as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        {{-- <td>{{$item->parent_id}}</td> --}}
                       

                        <td>{{ $item->created_at }}</td>

                        {{-- <td>{!! $item->status
                            ? '<span class="label label-success">Hiển thị</span> '
                            : ' <span class="label label-success">Ẩn hiển thị</span>' !!}</td>--}}
                        <td> 
                            <a href="{{ route('category.edit', $item) }}" class="btn btn-success">Sửa</a>
                        </td>
                        <td>
                            <form action="{{ route('category.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <span>Chưa có dữ liệu</span>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('category.trash') }}" style="position: absolute; top: 100px; right: 60px;" class="btn btn-primary"><i class="fa fa-trash"> Thùng
                rác</i></a>
    </div>

@endsection


   
