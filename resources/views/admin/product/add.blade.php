@extends('admin.master')
@section('title', 'Thêm mới sản phẩm')
@section('main-content')
@section('content-header')

    <style>
        .button-container {
            display: flex;
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically (if the container height is set) */
        }

        .table-container {
            max-height: 470px;
            /* Adjust height as needed */
            overflow-y: auto;
            /* Vertical scrollbar will appear if content exceeds max-height */
            border: 1px solid #ddd;
            /* Optional: add a border around the table */
            padding: 0 10px;
            /* Optional: add some padding inside the container */
        }

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
            background-color: #f4f4f4;
            text-align: left;
            position: -webkit-sticky;
            /* For Safari */
            position: sticky;
            top: 0;
            /* Stick to the top of the container */
            z-index: 2;
            /* Ensures header stays above the body content */
        }


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
    .form-control{
       height:28px;font-size:13px
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

        <span style="font-size:28px;font-weight:500;margin-left:200px">THÊM SẢN PHẨM</span>
        <div class="row">
            <div class="box-body" style="margin-top: 20px">
                <div class="col-md-12" style="background: rgb(255, 255, 255); ">
                    <form role="form" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group @error('photo') has-error @enderror">
                                                <label for="photo">Ảnh</label>

                                                <input type="file" class="form-control-file" id="photoInput" name="photo"
                                                    onchange="displayImage(event)" style="display: none;">
                                                <div class="upload-box" onclick="document.getElementById('photoInput').click()">
                                                    <span class="upload-icon">+</span>
                                                    <img id="photoPreview" src="{{ asset('assets') }}/images/user2-160x160.jpg"
                                                        alt="Ảnh sản phẩm"
                                                        style="display:none; max-width: 95px; max-height: 95px; margin: 5px;">
                                                </div>

                                                @error('photo')
                                                    <span class="help-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group @error('name') has-error @enderror">
                                                <label for="">Tên sản phẩm</label>
                                                <input type="input" class="form-control" id="productName" placeholder=""
                                                    name="name" value="{{ old('name') }}" onkeyup="ChangeToSlug()">
                                                @error('name')
                                                    <span class="help-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group @error('sale_price') has-error @enderror">
                                                <label for="">Giá nhập</label>
                                                <input type="input" class="form-control" id="" placeholder=""
                                                    name="sale_price" value="{{ old('sale_price') }}">
                                                @error('sale_price')
                                                    <span class="help-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group @error('price') has-error @enderror">
                                                <label for="">Giá sỉ</label>
                                                <input type="input" class="form-control" id="" placeholder=""
                                                    name="price" value="{{ old('price') }}">
                                                @error('price')
                                                    <span class="help-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group @error('le_price') has-error @enderror">
                                                <label for="">Giá bán lẻ</label>
                                                <input type="input" class="form-control" id="" placeholder=""
                                                    name="le_price" value="{{ old('le_price') }}">
                                                @error('le_price')
                                                    <span class="help-block">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
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
                                        </div>
                                    </div>
                                   
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group @error('short_description') has-error @enderror">
                                                <label for="">Mô tả ngắn về sản phẩm</label>
                                                <textarea name="short_description" class="form-control" rows="2">{{ old('short_description') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group @error('slug') has-error @enderror">
                                            {{-- <label for="">Đường dẫn</label> --}}
                                            <input type="input" class="form-control" id="slug" placeholder="" name="slug"
                                                value="{{ old('slug') }}" style="display:none">
                                            @error('slug')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="button-container">
                                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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

            <!-- New div on the right -->
            {{-- <div class="col-md-8"> 
                    <div class="box-body" style="margin-top: 20px">
                        <div class="table-container">
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ảnh</th>
                                        <th>Tên</th>
                                        <th>Giá nhập</th>
                                        <th>Giá sỉ </th>
                                        <th>Giá lẻ </th>
                                        <th>Danh mục</th>
                                        <th style="width:40px"></th>
                                        <th style="width:40px"s></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('images') }}/{{ $post->image }}" alt=""
                                                    width="40" height="40">
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
                        </div>
                    </div>
                </div> --}}
        </div>
    </section>


    </html>


    </div>


    <script src="{{ asset('script/addprod.js') }}"></script>
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
    </script>
@endsection
