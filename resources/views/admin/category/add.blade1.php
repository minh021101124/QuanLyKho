@extends('admin.master')
@section('title', 'Thêm mới danh mục')

@section('main-content')
    <!-- Main content -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <body>
        <!-- Content Header (Page header) -->
       

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
           
            <div class="col-md-8">
                <!-- general form elements -->
               

                    <form role="form" method="POST" action="{{ route('category.store') }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group @error('name') has-error @enderror">
                                <label for="">Tên danh mục</label>
                                <input type="input" class="form-control" id="" placeholder="" name="name">
                                @error('name')
                                    {{-- <div class="alert alert-danger" >{{$message}}</div> --}}
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" name="">Danh mục cha </label>
                                <select name="parent_id" id="input" class="form-control">
                                    <option value="">Chọn danh mục cha</option>


                                    <?php showCategories($categories); ?>


                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Chọn trạng thái</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" id="input" value="1"
                                            checked="checked">
                                        Hiện
                                    </label>
                                    <label>
                                        <input type="radio" name="status" id="input" value="0">
                                        Ẩn
                                    </label>
                                </div>
                            </div>

                       

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </div>
                    </form>
                </div>

                <!-- /.box -->

            </div>
            <!-- /.box -->

        </section>
    </body>

    </html>


    </div>



@endsection

<?php
function showCategories($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item) {
        if ($item->parent_id == $parent_id) {
            echo '<option value="' . $item->id . '">' . $char . $item->name . '</option>';
            unset($categories[$key]);
            showCategories($categories, $item->id, $char . '--- ');
        }
    }
}
?>
