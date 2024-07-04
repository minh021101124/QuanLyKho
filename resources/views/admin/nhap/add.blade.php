@extends('admin.master')
@section('main-content')

<section class="content">
<h1>Thêm mới</h1>
    <form action="{{ route('kho.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Tên:</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="quantity">Số lượng:</label>
            <input type="number" name="quantity" id="quantity">
        </div>
        <div>
            <label for="type">Loại:</label>
            <select name="type" id="type">
                <option value="nhap">Nhập</option>
                <option value="xuat">Xuất</option>
            </select>
        </div>
        <div>
            <label for="hansudung">Ngày sử dụng:</label>
            <input type="date" name="hansudung" id="hansudung">
        </div>
        <button type="submit">Lưu</button>
    </form>
    </section>
@endsection