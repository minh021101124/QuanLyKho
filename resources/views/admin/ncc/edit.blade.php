@extends('admin.master')
@section('title', 'Nhà cung cấp')
{{-- @section('TenTrang', 'THÊM MỚI DANH MỤC') --}}
@section('main-content')
<style>
    .form-control{
       height:28px;font-size:13px
   }
</style>
    <!-- Main content -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add New Menu</title>

    <body>
        <!-- Content Header (Page header) -->
        <span style="font-size:28px;font-weight:500;margin-left:80px">SỬA NHÀ CUNG CẤP</span>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="col-md-8">
                <!-- general form elements -->
                
               
                    <form role="form" method="POST" action="{{ route('nhacungcap.update', $ncc->id) }}">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $ncc->id }}">
                        <div class="box-body">
                            <div class="form-group @error('ten') has-error @enderror">
                                <label for="">Tên nhà cung cấp</label>
                                <input type="input" class="form-control" id="" placeholder="" name="ten"
                                    value="{{ old('ten') ? old('ten') : $ncc->ten }}">
                                @error('ten')
                                    {{-- <div class="alert alert-danger" >{{$message}}</div> --}}
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group @error('sodt') has-error @enderror">
                                <label for="">Số điện thoại</label>
                                <input type="input" class="form-control" id="" placeholder="" name="sodt"
                                    value="{{ old('sodt') ? old('sodt') : $ncc->sodt }}">
                                @error('sodt')
                                    {{-- <div class="alert alert-danger" >{{$message}}</div> --}}
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group @error('diachi') has-error @enderror">
                                <label for="">Địa chỉ</label>
                                <input type="input" class="form-control" id="" placeholder="" name="diachi"
                                    value="{{ old('diachi') ? old('diachi') : $ncc->diachi }}">
                                @error('diachi')
                                    {{-- <div class="alert alert-danger" >{{$message}}</div> --}}
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>





                           
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
              

                <!-- /.box -->

            </div>
            <!-- /.box -->

        </section>
    </body>

    </html>


    </div>



@endsection
