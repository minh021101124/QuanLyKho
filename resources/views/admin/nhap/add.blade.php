@extends('admin.master')
@section('main-content')

<section class="content">
    
<h1>Thêm mới</h1>

    <form action="{{ route('kho.store') }}" method="POST">
        @csrf
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group @error('name') has-error @enderror">
                        <label for="name">Tên </label>
                        <input type="text" name="name" id="name" class="form-control">
                        @error('name')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group @error('quantity') has-error @enderror">
                        <label for="name">Số lượng</label>
                        <input type="number" name="quantity" id="quantity" min= "1" max="100"class="form-control">
                        @error('quantity')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group @error('hansudung') has-error @enderror">
                        <label for="name">Ngày sử dụng</label>
                        <input type="date" name="hansudung" id="hansudung" class="form-control">
                        @error('hansudung')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>


        
        
        <div>
            <label for="type">Loại:</label>
            <select name="type" id="type">
                <option value="nhap">Nhập</option>
                <option value="xuat">Xuất</option>
            </select>
        </div>
       
        <button type="submit" class="btn btn-success" style="width:65px">Lưu</button>
        <a href="{{ route('nhap.index') }}" class="btn btn-success" style="margin-left:0; margin-top:0">Trở về</a>
    </form>
   
    </section>
@endsection