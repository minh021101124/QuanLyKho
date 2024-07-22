@extends('admin.master')
@section('title', 'Danh sách sản phẩm')
@section('main-content')
@section('content-header')
<style>
    #photoPreviews div {
        margin: 5px;
        /* Khoảng cách giữa các hình ảnh */
        float: left;
        /* Hiển thị các phần tử trên cùng một hàng */
    }

    #photoPreviews img {
        display: block;
        /* Hiển thị hình ảnh là block để tránh các lỗ hổng */
        width: auto;
        /* Đảm bảo chiều rộng của hình ảnh tự động thích ứng */
        height: 150px;
        /* Đảm bảo chiều cao của hình ảnh không vượt quá 200px */
        max-width: 100%;
        /* Đảm bảo hình ảnh không vượt quá chiều rộng của div cha */
        max-height: 100%;
        /* Đảm bảo hình ảnh không vượt quá chiều cao của div cha */
    }

    #photoPreviews button {
        display: block;
        /* Hiển thị nút Xóa là block để nằm ngay dưới hình ảnh */
    }

    .photo-previews {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        /* Adjust gap as needed */
        margin-bottom: 20px;
        /* Add space below images */
    }

    .image-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 10px;
    }

    .image-container img {
        max-width: 120px;
        max-height: 120px;
        margin-bottom: 5px;
    }

    .delete-button {
        background-color: red;
        color: white;
        border: none;
        padding: 5px;
        cursor: pointer;
        border-radius: 3px;
    }

    .delete-button:hover {
        background-color: darkred;
    }

    .form-group {
        clear: both;
        /* Ensure each form group is properly positioned */
        margin-bottom: 20px;
        /* Space between form groups */
    }
    
</style>
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
    <h1>DANH SÁCH SẢN PHẨM</h1>
    <!-- Main content -->

    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <!-- Default box -->
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <button class="btnthem" data-toggle="modal" data-target="#createProductModal" style="position: absolute; top: 0px; right: 60px;">+ Thêm mới</button>

            <tbody>
                <tr>
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Tên </th>
                    <th>Giá</th>
                    <th>Giá KM</th>
                    <th>Danh mục</th>
                    
                    <th></th>
                    <th></th>
                </tr>
                @foreach ($posts as $post)
                    <tr>
                        {{-- <th scope="row">{{ $post->id }}</th> --}}
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset('images') }}/{{ $post->image }}" alt="" width=80px height="80px">
                        </td>
                        <td>{{ $post->name }}</td>
                        <td>{{ number_format($post->price) }}đ</td>
                        <td>{{ number_format($post->sale_price) }}đ</td>
                        <td>
                            @if ($post->category)
                                {{ $post->category->name }}
                            @else
                                Danh mục không tồn tại
                            @endif
                        </td>
                       
                        <td><a href="{{ route('product.edit', $post) }}"><button class="btnsua">Sửa</button></a>
                           
                        </td>
                        <td>
                            <form action="{{ route('product.destroy', $post) }}" method="post">
                                <button class="btnxoa" onclick="return confirm('Bạn đã chắc chắn?');"
                                    type="submit">Xóa</button>
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('product.trash') }}"class="btn btn-primary"><i class="fa fa-trash"> Thùng rác </i></a>
    </div>

    <!-- Create Product Modal -->
    <div class="modal fade" id="createProductModal" tabindex="-1" role="dialog" aria-labelledby="createProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createProductModalLabel">Thêm sản phẩm mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                        @csrf
                        {{-- <input type="hidden" name="selected_category_id" value="{{ $selectedCategoryId }}"> --}}
                        <div class="box-body">
                            <div class="row">
<table style="margin:auto">
    <tr>
        <td><label for="">Tên sản phẩm</label></td>
        <td>
            
            <input type="input" class="form-control" id="productName" placeholder=""
            name="name" value="{{ old('name') }}" onkeyup="ChangeToSlug()">
        @error('name')
            <span class="help-block">{{ $message }}</span>
        @enderror
        </td>
       
    </tr>
    <tr>
        <td><label for="">Giá nhập</label></td>
        <td>
                                        <input type="input" class="form-control" id="" placeholder=""
                                            name="sale_price" value="{{ old('sale_price') }}">
                                        @error('sale_price')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
        </td>
    </tr> 
            <td><label for="">Giá sỉ</label></td>
            <td><input type="input" class="form-control" id="" placeholder=""
                name="price" value="{{ old('price') }}">
            @error('price')
                <span class="help-block">{{ $message }}</span>
            @enderror
            </td>
    <tr>
        <td><label for="">Giá bán lẻ</label>
            </td>
        <td> <input type="input" class="form-control" id="" placeholder=""
            name="le_price" value="{{ old('le_price') }}">
        @error('le_price')
            <span class="help-block">{{ $message }}</span>
        @enderror</td>
    </tr> 

    <tr>
        <td> <label for="category_id">Chọn danh mục</label>
           </td>
        <td> <select name="category_id" id="category_id" class="form-control">
            <option value="">Chọn danh mục</option>
            <?php showCategories($categories, old('category_id')); ?>
        </select>
        @error('category_id')
            <span class="help-block">{{ $message }}</span>
        @enderror</td>
    </tr> 
    
    <tr>
        <td> <label for="photo">Ảnh sản phẩm</label>
           </td>
        <td> <input type="file" class="form-control" id="photoInput" placeholder="" name="photo"
            onchange="displayImage(event)">
        <img id="photoPreview" src="#" alt="Ảnh sản phẩm"
            style="display: none; max-width: 200px; max-height: 200px;">
        @error('photo')
            <span class="help-block">{{ $message }}</span>
        @enderror</td>
    </tr> 

    <tr>
        <td> <label for="photos">Ảnh mô tả</label>
           </td>
        <td> <input type="file" class="form-control" id="photos" name="photos[]" multiple
            onchange="displayImages(event)">
        <div id="photoPreviews" class="photo-previews"></div>
        @error('photos')
            <span class="help-block">{{ $message }}</span>
        @enderror</td>
    </tr> 

    <tr>
        <td> <label for="">Mô tả</label>
          
           </td>
        <td>   <textarea name="short_description" class="form-control" rows="2">{{ old('short_description') }}</textarea></td>
    </tr> 
   
    <tr>
        <td>  <label for="">Đường dẫn</label>
           
           </td>
        <td>   <input type="input" class="form-control" id="slug" placeholder=""
            name="slug" value="{{ old('slug') }}">
        @error('slug')
            <span class="help-block">{{ $message }}</span>
        @enderror</td>
    </tr> 
</table>
<button type="submit" class="btn btn-primary" style="position: absolute; top: -40px; right: 20px;">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        td {
            padding: 5px;
        }
        .form-control {
            width: 100%;
        }
        .help-block {
            color: red;
        }
    </style>
    <style>
        .btnxoa {
            border: none;
            width: 50px;
            background: red;
            color: white;
        }

        .btnsua a {
            color: white;
        }

        .btnsua {
            border: none;
            width: 50px;
            color: white;
            background: rgb(9, 128, 225);
        }

        .btnthem {
            border: none;
            width: 150px;
            height: 40px;
            color: white;
            background: rgb(7, 74, 129);
        }
    </style>
@endsection
<?php
function showCategories($categories, $selectedCategoryId = null, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item) {
        if ($item->parent_id == $parent_id) {
            echo '<option value="' . $item->id . '"';
            if ($item->id == $selectedCategoryId) {
                echo ' selected';
            }
            echo '>' . $char . $item->name . '</option>';
            unset($categories[$key]);
            showCategories($categories, $selectedCategoryId, $item->id, $char . '--- ');
        }
    }
}
?>


@section('custom-js')
    <script src="{{ asset('assets\ckeditor\ckeditor.js') }}"></script>
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
        
function displayImages(event) {
    var files = event.target.files;
    var photoPreviews = document.getElementById('photoPreviews');
    var fileInput = document.getElementById('photos');

    // Clear the photoPreviews container before adding new images
    photoPreviews.innerHTML = '';

    for (var i = 0; i < files.length; i++) {
        (function(index) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var imageContainer = document.createElement('div');
                imageContainer.classList.add('image-container');
                
                var image = document.createElement('img');
                var deleteButton = document.createElement('button');

                var fileName = files[index].name; // Save the file name

                image.src = e.target.result;
                image.style.maxWidth = '120px';
                image.style.maxHeight = '120px';

                deleteButton.innerText = 'Xóa';
                deleteButton.classList.add('delete-button');
                deleteButton.onclick = function() {
                    // Remove the image from the UI
                    imageContainer.parentNode.removeChild(imageContainer);
                    // Remove the image from the file input
                    var newFiles = Array.from(fileInput.files);
                    newFiles.splice(index, 1);
                    var newFileList = new DataTransfer();
                    newFiles.forEach(function(file) {
                        if (file.name !== fileName) { // Check file name before adding to the list
                            newFileList.items.add(file);
                        }
                    });
                    fileInput.files = newFileList.files;
                };

                imageContainer.appendChild(image);
                imageContainer.appendChild(deleteButton);
                photoPreviews.appendChild(imageContainer);
            };
            reader.readAsDataURL(files[index]);
        })(i);
    }
}



                        
                        function displayImage(event) {
                            var reader = new FileReader();
                            
                            reader.onload = function(){
                                var image = document.getElementById('photoPreview');
                                image.src = reader.result;
                                image.style.display = 'block';
                            }
                            
                            reader.readAsDataURL(event.target.files[0]);
                        }
                  
    </script>