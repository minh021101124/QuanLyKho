@extends('admin.master')
@section('title', 'Danh sách sản phẩm')
@section('main-content')
@section('content-header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
<style>
    .form-control{
       height:28px;font-size:13px
   }
</style>
    <style>
        #photoPreviews div {
            margin: 5px;
            
            float: left;
          
        }

        #photoPreviews img {
            display: block;           
            width: auto;          
            height: 150px;           
            max-width: 100%;           
            max-height: 100%;           
        }

        #photoPreviews button {
            display: block;
            
        }

        .photo-previews {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;         
            margin-bottom: 20px;
            
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
            margin-bottom: 20px;         
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
            text-align: left;
            color: #ffffff;
            position: -webkit-sticky;
           
            position: sticky;
            top: 0;
           
            z-index: 2;
           
        }
    </style>
    <style>
        .import-form {
            margin: 20px;
        }
        .import-form input[type="file"] {
            margin-right: 10px;
        }
        .import-form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .import-form button:hover {
            background-color: #0056b3;
        }
        .add-image-btn {
            margin-left: 10%;
            margin-top: 0;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .add-image-btn:hover {
            background-color: #218838;
        }
    </style>
    @if (session('success'))
    <div class="alert hide">
        <span class="fas fa-exclamation-circle"></span>
        <span class="msg">{{ session('success') }}</span>
        <div class="close-btn">
            <span class="fas fa-times"></span>
        </div>
    </div>
@endif
    <section class="content">
        <span style="font-size:28px;font-weight:500;margin-left:330px">DANH SÁCH SẢN PHẨM</span>
        
       
     
   
    @if ($posts->count() > 0)
        <div class="box-body table-responsive no-padding" style="margin-top: 50px">
            <table class="table table-hover">
              
                {{-- <div style="margin-left: 200px">{{ $posts->links() }}</div> --}}
            </section>
                <button class="btn btn-success" data-toggle="modal" data-target="#createProductModal"
                    style="position: absolute; top: 50px; left: 20px;">+Thêm mới</button>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#createImport"
                    style="position: absolute; top: 50px; left: 125px;">Nhập file Excel</button>
                <tbody>
                    <tr>
                        <th style="width:30px">STT</th>
                        <th style="width:60px">Ảnh</th>
                        <th                   >Tên </th>
                        
                        <th style="width:80px">Giá nhập</th>
                        <th style="width:80px">Giá sỉ</th>
                        <th style="width:80px">Giá lẻ</th>
                        <th style="width:150px">Danh mục</th>

                        <th style="width:40px"></th>
                        <th style="width:40px"s></th>
                    </tr>
                    @foreach ($posts as $post)
                        <tr>
                            {{-- <th scope="row">{{ $post->id }}</th> --}}
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('images') }}/{{ $post->image }}" alt="" width=40px height="40px">
                            </td>
                            <td>{{ $post->name }}</td>
                            
                            <td>{{ number_format($post->sale_price) }}đ</td>
                            <td>{{ number_format($post->price) }}đ</td>
                            <td>{{ number_format($post->le_price) }}đ</td>
                            <td>
                                @if ($post->category)
                                    {{ $post->category->name }}
                                @else
                                    Danh mục không tồn tại
                                @endif
                            </td>

                            <td >
                                <a href="{{ route('product.edit', $post) }}"  style="color: inherit; text-decoration: none;color:#1285f1">
                                    <i class="fa fa-edit" style="font-size: 15px;"></i>
                                </a>
                            </td>
                            
                            <td>
                                <form action="{{ route('product.destroy', $post) }}" method="post" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button style="background: none; border: none; color: red; cursor: pointer;" onclick="return confirm('Bạn đã chắc chắn?');" type="submit">
                                        <i class="fa fa-trash" style="font-size: 15px;"></i>
                                    </button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('product.trash') }}"class="btn btn-primary"><i class="fa fa-trash"> Thùng rác </i></a>
        </div>
    @else
    <p>Chưa có dữ liệu</p>
    @endif
    

    <div class="modal fade" id="createImport" tabindex="-1" role="dialog" aria-labelledby="createProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 800px;margin:auto">
                <div class="modal-header">
                    <h4 class="modal-title" id="createProductModalLabel " style="font-weight:500">Nhập file Excel sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-container">
                        
                        <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data" class="import-form">
                            @csrf
                            <div class="custom-file-input">
                                <label for="file-upload">Chọn file chứa thông tin</label>
                                <input type="file" name="file" required id="file-upload">
                               
                            </div>
                            <button type="submit">Lưu</button>
                        </form>
                        <form action="{{ route('avatar.store') }}" method="POST" enctype="multipart/form-data" class="import-form">
                            @csrf
                            <div class="custom-file-input">
                                <label for="avatar-upload">Thêm ảnh sản phẩm</label> <span style="color: red">(*Chọn ảnh của sản phẩm và tải kèm theo sản phẩm)</span>
                                <input type="file" name="avatar" multiple required id="avatar-upload">
                                
                            </div>
                            <button type="submit">Tải lên</button>
                        </form>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    

    <!-- Create Product Modal -->
    <div class="modal fade" id="createProductModal" tabindex="-1" role="dialog" aria-labelledby="createProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 800px;margin:auto">
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
                                <div class="col-md-2">
                                    <div class="form-group @error('photo') has-error @enderror">

                                        <label for="photo">Ảnh</label>
                                        <div class="upload-container">
                                            <input type="file" class="form-control-file" id="photoInput" name="photo" onchange="displayImage(event)" style="display: none;">
                                            <div class="upload-box" onclick="document.getElementById('photoInput').click()">
                                                <span class="upload-icon">+</span>
                                                <img id="photoPreview" src="{{ asset('assets') }}/images/user2-160x160.jpg" alt="Ảnh sản phẩm"
                                                    style="display:none; max-width: 95px; max-height: 95px; margin: 5px;">
                                            </div>
                                        </div>
                                        @error('photo')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-7">
                            <table style="margin:auto">
                                
                                
                                <style>
                                    .upload-container {
                                    position: relative;
                                    display: inline-block;
                                }
                                
                                .upload-box {
                                    width: 100px;
                                    height: 100px;
                                    border: 2px dashed #ddd;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    cursor: pointer;
                                    position: relative;
                                    overflow: hidden;
                                }
                                
                                .upload-icon {
                                    font-size: 36px;
                                    color: #aaa;
                                    position: absolute;
                                }
                                
                                .upload-box img {
                                    position: absolute;
                                    top: 0;
                                    left: 0;
                                    width: 100%;
                                    height: 100%;
                                    object-fit: cover;
                                }
                                
                                    </style>   
                                    <script>
                                        function displayImage(event) {
                                            const file = event.target.files[0];
                                            const photoPreview = document.getElementById('photoPreview');
                                            
                                            if (file) {
                                                const reader = new FileReader();
                                                
                                                reader.onload = function(e) {
                                                    photoPreview.src = e.target.result;
                                                    photoPreview.style.display = 'block';
                                                }
                                                
                                                reader.readAsDataURL(file);
                                            } else {
                                                photoPreview.src = '';
                                                photoPreview.style.display = 'none';
                                            }
                                        }
                                    </script>
                               
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
                                    <td> <label for="">Mô tả</label>
                                    
                                    </td>
                                    <td>   <textarea name="short_description" class="form-control" rows="2">{{ old('short_description') }}</textarea></td>
                                </tr> 
                            
                                <tr>
                                    <td>  <label for=""></label>
                                    
                                    </td>
                                    <td>   <input type="input" class="form-control" id="slug" placeholder=""
                                        name="slug" value="{{ old('slug') }}" style="display: none">
                                    @error('slug')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror</td>
                                </tr> 
                            </table>
                            <button type="submit" class="btn btn-primary" style="position: absolute; top: 290px; right: 65px;">Thêm mới</button>
                                </div>
                        </div>
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
                                if (file.name !==
                                    fileName) { // Check file name before adding to the list
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

            reader.onload = function() {
                var image = document.getElementById('photoPreview');
                image.src = reader.result;
                image.style.display = 'block';
            }

            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
