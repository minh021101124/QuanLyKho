@extends('admin.master')
@section('title','Quản lí banner')
@section('main-content')
@section('content-header')
<h1>Quản lí ảnh trang chủ</h1>
<div class="parent-container">
   
  
</div>
<head>
    <title>Upload Photo</title>
</head>
<body>
    <h1>Upload Photo</h1>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div>{{ session('error') }}</div>
    @endif
    <form action="{{ route('admin.photo.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="photos">
        <button type="submit">Upload</button>
    </form>
</body>
<style>
.delete-button10{
    position: absolute; left: 245px;
    margin-top: -10px;
}
</style>


@endsection

