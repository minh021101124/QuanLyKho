@extends('admin.master')

@section('title', 'Thống kê')

@section('main-content')

    @section('content-header')
        <h1> THỐNG KÊ </h1>
    @endsection

    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tổng nhập</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <p>Tổng nhập: {{ number_format($tong )}}đ</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tổng xuất</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <p>Tổng xuất: {{ number_format($tongx )}}đ</p>
                    {{-- <td>{{ number_format($item->price) }}đ</td> --}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection
