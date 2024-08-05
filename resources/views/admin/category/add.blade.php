@extends('admin.master')
@section('title', 'Thêm mới danh mục')
@section('main-content')
<style>
    .form-control{
       height:28px;font-size:13px
   }
</style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <section class="content">
        <div class="col-md-8">
            <form role="form" method="POST" action="{{ route('category.store') }}">
                @csrf
                <div class="box-body">
                    <div class="form-group @error('name') has-error @enderror">
                        <label for="">Tên danh mục</label>
                        <input type="input" class="form-control" id="" placeholder="" name="name">
                        @error('name')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" name="">Danh mục cha </label>
                        <select name="parent_id" id="input" class="form-control">
                            <option value="">Chọn danh mục cha</option>
                            <?php showCategories($categories); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Chọn trạng thái</label>
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
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
            </form>
        </div>
    </section>

    @if (session('success'))
        <div class="alert hide">
            <span class="fas fa-exclamation-circle"></span>
            <span class="msg">{{ session('success') }}</span>
            <div class="close-btn">
                <span class="fas fa-times"></span>
            </div>
        </div>
    @endif

    {{-- <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="{{ asset('script/thongbao_alert.js') }}"></script> --}}



@endsection

<?php
function showCategories($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item) {
        if ($item->parent_id == $parent_id) {
            echo '<option value="' . $item->id . '">' . $char . $item->name . '</option>';
            unset($categories[$key]);
            showCategories($categories, $item->id, $char . '--- ');
        }
    }
}
?>
