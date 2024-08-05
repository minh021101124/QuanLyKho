@extends('admin.master')
@section('title', 'Cập nhật sản phẩm')
@section('main-content')
@section('content-header')
<style>
    .form-control{
       height:28px;font-size:13px
   }
</style>
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
        .parent-container {
            display: flex;
            flex-direction: column;
        }

        .div1 {
            margin-top: 10px;
            font-weight: 700;
        }

        .div2 {
            margin-top: 5px;

            position: relative;

        }

        .image-wrapper {

            position: relative;
        }

        .delete-button1 {
            position: absolute;
            top: -8px;
            /* Điều chỉnh vị trí dấu x phía trên ảnh */
            left: 60px;
            /* Điều chỉnh vị trí dấu x phía bên phải của ảnh */
            background: transparent;
            border: none;
            cursor: pointer;
        }

        .delete-icon {
            font-size: 40px;
            /* Điều chỉnh kích thước của dấu x */
            color: red;
            /* Màu của dấu x */
        }

        .image-text2 {
            font-size: 15px;
            margin-top: 20px;
            color: rgb(0, 0, 0);
        }
    </style>
    <style>
        .delete-button {
            background-color: #e6283b;
            color: white;
            border: none;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 14px;
            line-height: 18px;
            text-align: center;
            cursor: pointer;
            position: absolute;
            top: 2px;
            right: 2px;
            z-index: 1;
        }

        .image-container {
            position: relative;
            display: inline-block;
            margin-right: 10px;
        }
    </style>

    <section class="content">
        <span style="font-size:28px;font-weight:500;margin-left:200px">SỬA SẢN PHẨM</span>
        <div class="row">
            <div class="col-md-12">

                <form role="form" method="POST" action="{{ route('product.update', $product) }}"
                    enctype="multipart/form-data">
                    @csrf @method('PUT')
                    {{-- chỉnh sửa dòng dưới này để update ko lỗi --}}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="parent-container">
                                            <label for="">Ảnh sản phẩm</label>
                                            <div class="div2">
                                                <img id="single_product_image" src="{{ asset('images/' . $product->image) }}"
                                                    alt="{{ $product->name }}"
                                                    style="width:120px; border-radius: 5px;background-color: transparent;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="upload-container">
                                            <label style="margin-top: 20px">Đổi ảnh</label>
                                            <input type="file" class="form-control-file" id="photoInput" name="photo"
                                                onchange="displayImage(event)" style="display: none;">
                                            <div class="upload-box" onclick="document.getElementById('photoInput').click()">
                                                <span class="upload-icon">+</span>
                                                <img id="photoPreview" src="{{ asset('assets') }}/images/user2-160x160.jpg"
                                                    alt="Ảnh sản phẩm"
                                                    style="display:none; width: 25px; height: 15px; margin: 5px;">
                                            </div>
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
                                                name="name" value="{{ $product->name }}" onkeyup="ChangeToSlug()">
                                            @error('name')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('name') has-error @enderror">
                                            <label for="">Giá nhập sản phẩm</label>
                                            <input type="input" class="form-control" id="" placeholder=""
                                                name="sale_price" value="{{ $product->sale_price }}">
                                            @error('name')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('name') has-error @enderror">
                                            <label for="">Giá sỉ</label>
                                            <input type="input" class="form-control" id="" placeholder=""
                                                name="price" value="{{ $product->price }}">
                                            @error('name')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('name') has-error @enderror">
                                            <label for="">Giá bán lẻ</label>
                                            <input type="input" class="form-control" id="" placeholder=""
                                                name="le_price" value="{{ $product->le_price }}">
                                            @error('name')
                                                <span class="help-block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <?php
                                $selectedCategoryId = $product->category_id ?? ''; // Gán ID của danh mục của sản phẩm vào biến $selectedCategoryId, nếu không có sản phẩm nào được chọn thì gán giá trị mặc định là chuỗi rỗng
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
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
                                    </div>
                                </div>
                                <div class="form-group @error('short_description') has-error @enderror">
                                    <label for="short_description">Mô tả ngắn về sản phẩm</label><br>
                                    <textarea id="short_description" name="short_description" class="form-control" rows="1" c>{{ $product->short_description }}</textarea>
                                    @error('short_description')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @error('slug') has-error @enderror">
                                        {{-- <label for="">Đường dẫn</label> --}}
                                        <input type="input" class="form-control" id="slug" placeholder=""
                                            name="slug" value="{{ $product->slug }}" style="display:none">
                                        @error('slug')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </section>
    <script src="{{ asset('script/editprod.js') }}"></script>

@endsection



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
<style>
    .upload-container {
        position: relative;
        display: inline-block;
    }

    .upload-box {
        width: 110px;
        height: 25px;
        border: 2px solid #000000;
        background: #2fd626;
        
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .upload-icon {
        font-size: 36px;
        color: #000000;
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
<?php
function showCategories($categories, $selectedCategoryId, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item) {
        if ($item->parent_id == $parent_id) {
            $selected = $selectedCategoryId == $item->id ? 'selected' : ''; // Kiểm tra nếu danh mục này là được chọn
            echo '<option value="' . $item->id . '" ' . $selected . '>' . $char . $item->name . '</option>';
            unset($categories[$key]);
            showCategories($categories, $selectedCategoryId, $item->id, $char . '--- ');
        }
    }
}
?>
