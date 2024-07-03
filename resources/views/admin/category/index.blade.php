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
          <div class="box-header">
         <a href="{{route('category.create')}}" class="btn btn-success">+Thêm mới Danh mục</a>

            <div class="box-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>STT</th>
                  <th>Tên danh mục </th>
                  <th>Danh mục cha </th>
                  <th>Ngày tạo</th>
                  <th>Trạng thái</th>
                  <th>Tùy chọn</th>
                  <th></th>
                </tr>

                @forelse ($categories as $item)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$item->name}}</td>
                  {{-- <td>
                      @if($item->parent)
                          {{$item->parent->name}}
                      @else
                          Không có danh mục cha
                      @endif
                  </td> --}}
                  <td>
                    @if($item->parent_id && $item->parent)
                        {{ $item->parent->name }}
                    @else
                        {{-- Hiển thị một giá trị mặc định nếu không có danh mục cha --}}
                        NULL
                    @endif
                </td>
                

                  <td>{{$item->created_at}}</td>
                  <td>{!!$item->status ? '<span class="label label-success">Hiển thị</span>' : '<span class="label label-danger">Ẩn</span>'!!}</td>
                  <td>
                      <a href="{{route('category.edit',$item)}}" class="btn btn-success">Sửa</a>
                  </td>
                  <td>
                      <form action="{{route('category.destroy',$item)}}"  method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" onclick="return confirm('Bạn muốn xóa nó chứ')" class="btn btn-danger">Xóa</button>
                      </form>
                  </td>
               </tr>
              
                @empty
                   <span>Chưa có dữ liệu</span> 
                @endforelse
                
                
              </tbody></table>
              <a href="{{route('category.trash')}}" class="btn btn-primary"><i class=" fa fa-trash"></i>Thùng Rác</a>
            </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    <!-- /.box -->

  </section>
@endsection

