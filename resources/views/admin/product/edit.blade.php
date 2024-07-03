@extends('admin.master')
@section('title','Danh | Trang Sửa sản phẩm')
@section('title-page','Sửa sản phẩm')
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
                <h3 class="box-title">Cập nhật sản phẩm</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{route('product.update',$product)}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf 
                <input type="hidden" name="id" value="{{$product->id}}">  
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group @error('name') has-error @enderror">
                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="productName" name="name" value="{{ $product->name }}" onkeyup="ChangeToSlug()">
                        @error('name')
                          <span class="help-block">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group @error('name') has-error @enderror">
                        <label for="exampleInputEmail1">Đường dẫn slug</label>
                        <input type="text" class="form-control" id="slug" value="{{ $product->slug }}" name="slug">
                        @error('name')
                          <span class="help-block">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group @error('name') has-error @enderror">
                        <label for="exampleInputEmail1">Giá sản phẩm</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="price" value="{{ $product->price }}">
                        @error('name')
                          <span class="help-block">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group @error('name') has-error @enderror">
                        <label for="exampleInputEmail1">Giá sản phẩm khuyến mãi</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $product->sale_price }}" name="sale_price" >
                        @error('name')
                          <span class="help-block">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  
                  <?php
                  $selectedCategoryId = $product->category_id ?? ''; // Gán ID của danh mục của sản phẩm vào biến $selectedCategoryId, nếu không có sản phẩm nào được chọn thì gán giá trị mặc định là chuỗi rỗng
                  ?>
                  
                  <div class="form-group @error('category_id') has-error @enderror">
                    <label for="category_id">Chọn danh mục</label>
                    <select name="category_id" id="category_id" class="form-control">
                      <option value="">Chọn danh mục</option>
                      <?php showCategories($categories, $selectedCategoryId); ?>
                    </select>
                    @error('category_id')
                      <span class="help-block">{{ $message }}</span>
                    @enderror
                  </div>
                  
                  <div class="form-group @error('photo') has-error @enderror">
                    <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                    <input type="file" class="form-control" id="productPhoto" name="photo" onchange="previewProductImage(this)">
                    @error('photo')
                      <span class="help-block">{{ $message }}</span>
                    @enderror
                    <!-- Hiển thị hình ảnh đã chọn -->
                    <div id="preview-product-image">
                      <img src="{{ asset('hinh_anh/' . $product->image) }}" alt="{{$product->name}}" style="width:25%">
                    </div>
                  </div>
                
                  <div class="form-group @error('name') has-error @enderror">
                    <label for="descriptionPhotos">Ảnh mô tả</label>
                    <input type="file" class="form-control" id="descriptionPhotos" name="photos[]" multiple>
                    @error('name')
                        <span class="help-block">{{$message}}</span>
                    @enderror
                    <!-- Hiển thị các ảnh có sẵn từ cơ sở dữ liệu -->
                    <div id="multiple_product_images" style="display: flex; flex-wrap: wrap; gap: 10px;">
                        @foreach($product->images as $key => $image)
                            <div class="image-item" data-image-id="{{ $image->id }}">
                                <img src="{{ asset('hinh_anh_mo_ta/' . $image->image) }}" alt="{{ $product->name }}" style="width: 100px; height: auto;">
                            </div>
                        @endforeach
                    </div>
                    <label>Ảnh mới:</label>
                    <div id="imagePreview" style="display: flex; flex-wrap: wrap; gap: 10px;"></div>
                </div>
                
                <script>
                    document.getElementById('descriptionPhotos').addEventListener('change', function(event) {
                        const files = event.target.files;
                        const imagePreview = document.getElementById('imagePreview');
                        imagePreview.innerHTML = ''; // Clear any existing previews
                
                        for (const file of files) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const img = document.createElement('img');
                                img.src = e.target.result;
                                img.style.maxWidth = '100px'; // Set the max width for the preview
                                img.style.margin = '10px'; // Add some margin for spacing
                                imagePreview.appendChild(img);
                            }
                            reader.readAsDataURL(file);
                        }
                    });
                </script>
                
                  </div>

                  <div class="form-group @error('name') has-error @enderror">
                    <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                    <textarea name="description" id="editor1" rows="10" cols="80">{{ $product->description }}</textarea>
                  </div>
                </div>
                
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

@section('custom-js')
  <script src="{{asset('assets\ckeditor\ckeditor.js')}}"></script>
  <script>
    CKEDITOR.replace('editor1');
  </script>
  <script language="javascript">
    function ChangeToSlug() {
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

    function previewProductImage(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          document.getElementById('preview-product-image').innerHTML = '<img src="' + e.target.result + '" width="200" />';
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    function previewDescriptionImages(input) {
      if (input.files) {
        var previewContainer = document.getElementById('preview-description-images');
        previewContainer.innerHTML = ''; 
        for (var i = 0; i < input.files.length; i++) {
          var reader = new FileReader();
          reader.onload = function (e) {
            var img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '100px'; 
            previewContainer.appendChild(img);
          }
          reader.readAsDataURL(input.files[i]);
        }
      }
    }

    document.getElementById('productPhoto').addEventListener('change', function() {
      previewProductImage(this);
    });

    document.getElementById('descriptionPhotos').addEventListener('change', function() {
      previewDescriptionImages(this);
    });
  </script>
@endsection

<?php  
function showCategories($categories, $selectedCategoryId, $parent_id = 0, $char = '')
{
  foreach ($categories as $key => $item)
  {
    if ($item->parent_id == $parent_id)
    {
      $selected = ($selectedCategoryId == $item->id) ? 'selected' : ''; // Kiểm tra nếu danh mục này là được chọn
      echo '<option value="'.$item->id.'" '.$selected.'>'.$char.$item->name.'</option>'; 
      unset($categories[$key]);                                                                
      showCategories($categories, $selectedCategoryId, $item->id, $char.'--- ');
    }
  }
}
?>
