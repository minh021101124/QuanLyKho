@extends('admin.master')
@section('title','Quản lí banner')
@section('main-content')
@section('content-header')
<h1>Quản lí ảnh trang chủ</h1>
<div class="parent-container">
    <body>
        <h1>Upload Avatar</h1>
        @if(session('success'))
            <div>{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div>{{ session('error') }}</div>
        @endif
        <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data" class="import-form">
            @csrf
            <input type="file" name="file" required>
            <button type="submit">Import</button>
        </form>
        <form action="{{ route('avatar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="avatar">Choose Avatar:</label>
                <input type="file" name="avatar"multiple required>
            </div>
           
            <button type="submit">Upload</button>
        </form>
       


    </body>
  
</div>
<div class="box-body table-responsive no-padding">
    {{-- <form action="{{ route('avatar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="display: flex;">
            <input type="file" id="avatar" name="avatar" style="background: white" ><button type="submit" style="background:rgb(12, 164, 55);border:none;color:white;margin:10px;width:100px;height:40px">Tải ảnh lên</button>
        </div>
        
    </form> --}}
</div>
<div class="box-body table-responsive no-padding">
    <table class="table table-hover">
        <tbody>
            @foreach ($im as $po)
            <tr>
                <td>
                    <img src="{{ asset('imageavatar/' . $po->avatar) }}" alt="" width="240px" height="180px">
                </td>
                <td>
                    <form action="{{ route('deleteimageavt', $po->id) }}" method="post" class="image-delete-form">
                        @csrf
                        @method('delete')
                        <button type="submit" class="delete-button10" style="border:none; background:none;">
                            <img src="{{ asset('assets/images/delete.png') }}" style="width:25px">
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<style>
.delete-button10{
    position: absolute; left: 245px;
    margin-top: -10px;
}
</style>


@endsection

