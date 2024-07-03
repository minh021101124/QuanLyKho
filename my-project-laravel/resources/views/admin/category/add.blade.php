@extends('admin.master')
@section('title','Danh | Trang Chủ')
@section('title-page','Thêm mới danh mục')
<!-- Main content -->
@section('main-content')
<section class="content">
    <!-- Default box -->
    <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Thêm mới menu</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{route('category.store')}}">
              @csrf
                <div class="box-body">
                  <div class="form-group @error('name') has-error @enderror">
                    <label for="exampleInputEmail1">Tên Danh mục</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                    @error('name')
                     <span class="help-block">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Chọn danh mục cha</label>
                    <select name="parent_id" id="input" class="form-control">
                      <option value="">Chọn danh mục cha</option>
                      <?php showCategories($categories); ?>
                       @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>  
                      @endforeach
                       
                    </select>
                  </div>
  
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Chọn trạng thái</label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="status" id="input" value="1" checked="checked">
                        Hiện
                      </label>
                      <label>
                        <input type="radio" name="status" id="input" value="0">
                        Ẩn
                      </label>
                    </div>
                  </div>
                  
                </div>
                <!-- /.box-body -->
  
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
              </form>
            </div>
         
            <!-- /.box -->
  
          </div>
          <!-- /.box-body -->
          
        </div>
        <!-- /.box -->
      </div>
    <!-- /.box -->

  </section>
@endsection

<?php  
function showCategories($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item)
    {
        if ($item->parent_id == $parent_id)
        {
            echo '<option value="'.$item->id.'">'.$char.$item->name.'</option>'; 
            unset($categories[$key]);                                                                
            showCategories($categories, $item->id, $char.'--- ');
        }
    }
}
?>
