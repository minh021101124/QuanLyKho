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
        
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>STT</th>
                  <th>Tên</th>
                  <th> Giá</th>
                  <th> Giá KM </th>
                  <th>Danh mục</th>
                  <th> Ảnh </th>
                  <th> Ngày tạo </th>
                  <th>Tùy chọn</th>
                  <th></th>
                </tr>

                @forelse ($product as $item)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->sale_price}}</td>
                    <td>@if($item->category)
                      {{$item->category->name}}
                      @else
                      Danh mục không tồn tại
                          
                      @endif
                    </td>
                    <td> 
                      {{-- Hình ảnh ở trong public/hinh_anh  --}}
                      {{-- <img src="{{asset('storage/images')}}/{{$item->image}}" alt="" width=150px height="150px"> --}}
                      <img src="{{asset('hinh_anh')}}/{{$item->image}}" alt="" width=150px height="150px">
                    </td>
                    <td>{{$item->created_at}}</td>
                    
                    <td>
                    <a href="{{route('product.edit',$item)}}" class="btn btn-success">Sửa</a>
                    
                    </td>
                    <td>
                      <form action="{{route('product.destroy',$item)}}"  method="POST">
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
              <a href="{{route('product.trash',)}}" class="btn btn-primary"><i class=" fa fa-trash"></i>Thùng Rác</a>
            </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    <!-- /.box -->

  </section>
@endsection

{{--<!-- Thêm một phần tử div để hiển thị ảnh sản phẩm -->
<div id="preview-product-image"></div>

<!-- Thêm một phần tử div để hiển thị ảnh mô tả -->
<div id="preview-description-images"></div>

<script>
    // Hàm để hiển thị ảnh sản phẩm khi người dùng chọn ảnh
    function previewProductImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview-product-image').html('<img src="' + e.target.result + '" width="200" />');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Hàm để hiển thị ảnh mô tả khi người dùng chọn ảnh
   function previewDescriptionImages(input) {
        if (input.files) {
            $('#preview-description-images').html('');

            for (var i = 0; i < input.files.length; i++) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview-description-images').append('<img src="' + e.target.result + '" width="200" />');
                }

                reader.readAsDataURL(input.files[i]);
            }
        }
    }

    // Gọi hàm khi người dùng chọn ảnh sản phẩm
    $('#exampleInputEmail1[name="photo"]').change(function(){
        previewProductImage(this);
    });

    // Gọi hàm khi người dùng chọn ảnh mô tả
    $('#exampleInputEmail1[name="photos[]"]').change(function(){
        previewDescriptionImages(this);
    });
</script>--}}

