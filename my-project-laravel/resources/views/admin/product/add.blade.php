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
                <h3 class="box-title">Thêm mới sản phẩm</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
              @csrf 
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group @error('name') has-error @enderror">
                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="productName" name="name" value="{{ old('name') }}" onkeyup="ChangeToSlug()">
                        @error('name')
                         <span class="help-block">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group @error('slug') has-error @enderror">
                        <label for="exampleInputEmail1">Đường dẫn slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}">
                        @error('slug')
                         <span class="help-block">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group @error('price') has-error @enderror">
                        <label for="exampleInputEmail1">Giá sản phẩm</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="price" value="{{ old('price') }}">
                        @error('price')
                         <span class="help-block">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group @error('sale_price') has-error @enderror">
                        <label for="exampleInputEmail1">Giá sản phẩm khuyến mãi</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="sale_price" ">
                    @error('sale_price')
                     <span class="help-block">{{$message}}</span>
                    @enderror
                      </div>
                    </div>

                  </div>
                  
              
                  <div class="form-group @error('category_id') has-error @enderror">
                    <label for="category_id">Chọn danh mục</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Chọn danh mục</option>
                        <?php showCategories($categories, old('category_id')); ?>
                    </select>
                    @error('category_id')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
                  <div class="form-group @error('photo') has-error @enderror">
                    <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" name="photo">
                    @error('photo')
                     <span class="help-block">{{$message}}</span>
                    @enderror
                  </div>
                  <div id="preview-product-image"></div>

                  
                  <div class="form-group @error('photos') has-error @enderror">
                    <label for="exampleInputEmail1">Ảnh mô tả</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" name="photos[]"multiple>
                    @error('photos')
                     <span class="help-block">{{$message}}</span>
                    @enderror
                  </div>
                  <div id="preview-description-images"></div>


                  <div class="form-group @error('name') has-error @enderror">
                     <!-- /.box-body -->
                    <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                    <textarea name="description"id="editor1" rows="10" cols="80" value="{{ old('description') }}">
                     
                    </textarea>
                  </div>
                  {{-- <div class="col-md-6">
                    <div class="form-group @error('name') has-error @enderror">
                      <label for="exampleInputEmail1">FEATURED</label>
                      <input type="checkbox"  id="exampleInputEmail1" name="stock">
                      @error('name')
                       <span class="help-block">{{$message}}</span>
                      @enderror
                    </div>
                  </div> --}}
                </div>
                
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
@section('custom-js')
  <script src="{{asset('assets\ckeditor\ckeditor.js')}}"></script>
  <script>
    CKEDITOR.replace('editor1');
  </script>
  <script language="javascript">
            function ChangeToSlug()
            {
                var productName, slug;
 
                //Lấy text từ thẻ input title 
                productName = document.getElementById("productName").value;
 
                //Đổi chữ hoa thành chữ thường
                slug = productName.toLowerCase();
 
                //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
                document.getElementById('slug').value = slug;
            }
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

             // Gọi hàm khi người dùng chọn ảnh sản phẩm
               $('#exampleInputEmail1[name="photo"]').change(function(){
                  previewProductImage(this);
               });
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

    // Gọi hàm khi người dùng chọn ảnh mô tả
    $('#exampleInputEmail1[name="photos[]"]').change(function(){
      previewDescriptionImages(this);
    });
  </script>
@endsection


<?php  
function showCategories($categories, $selectedCategoryId = null, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item)
    {
        if ($item->parent_id == $parent_id)
        {
            echo '<option value="'.$item->id.'"';
            if ($item->id == $selectedCategoryId) {
                echo ' selected';
            }
            echo '>'.$char.$item->name.'</option>'; 
            unset($categories[$key]);                                                                
            showCategories($categories, $selectedCategoryId, $item->id, $char.'--- ');
        }
    }
}
?>