@extends('admin.master')
@section('title','Danh | Trang Chủ')
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
                <h3 class="box-title">Cập nhật danh mục</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{route('category.update',$category)}}">
                @method('PUT')
                @csrf
              <input type="hidden" name="id" value="{{$category->id}}">
                <div class="box-body">
                  <div class="form-group @error('name') has-error @enderror">
                    <label for="exampleInputEmail1">Tên Danh mục</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$category->name}}">
                    @error('name')
                     <span class="help-block">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Chọn danh mục cha</label>
                    <select name="parent_id" id="input" class="form-control">
                      <option value="">Chọn danh mục</option>
                      {{-- @foreach ($categories as $item)
                        <option value="{{$item->id}}" {{$category->parent_id == $item->id ? 'selected': ''}}>{{$item->name}}</option>  
                      @endforeach
                       --}}
                       <?php showCategories($categories); ?>
                    </select>
                  </div>
  
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Chọn trạng thái</label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="status" id="input" value="1" {{$category->status ?'checked':""}}>
                        Hiện
                      </label>
                      <label>
                        <input type="radio" name="status" id="input" value="0" {{!$category->status ?'checked':""}}>
                        Ẩn
                      </label>
                    </div>
                  </div>
                  
                </div>
                <!-- /.box-body -->
  
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
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