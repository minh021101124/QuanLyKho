@extends('admin.master')
@section('title', 'Danh mục')

@section('main-content')
<style>
    .form-control{
       height:28px;font-size:13px
   }
</style>
    <section class="content">
        <span style="font-size:28px;font-weight:500;margin-left:450px">SỬA DANH MỤC</span>

        <div class="col-md-8">

                    <form role="form" method="POST" action="{{ route('category.update', $category->id) }}">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $category->id }}">
                        <div class="box-body">
                            <div class="form-group @error('name') has-error @enderror">
                                <label for="">Tên danh mục</label>
                                <input type="input" class="form-control" id="" placeholder="" name="name"
                                    value="{{ old('name') ? old('name') : $category->name }}">
                                @error('name')
                                    {{-- <div class="alert alert-danger" >{{$message}}</div> --}}
                                    <span class="help-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" name="">Danh mục cha </label>
                                <select name="parent_id" id="input" class="form-control">
                                    <option value="">Chọn danh mục cha</option>
                                    <?php $displayedCategories = []; ?>
                                    @foreach ($categories as $categoryOption)
                                        <option value="{{ $categoryOption->id }}"
                                            {{ $category->parent_id == $categoryOption->id ? 'selected' : '' }}>
                                            {{ $categoryOption->name }}
                                        </option>
                                        <?php $displayedCategories[] = $categoryOption->id; ?>
                                        @if (count($categoryOption->children))
                                            @include('partials.category-options', [
                                                'categories' => $categoryOption->children,
                                                'prefix' => '--',
                                            ])
                                        @endif
                                    @endforeach
                                </select>
                            </div>







                            <div class="form-group">
                                <label for="">Chọn trạng thái</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" id="input" value="1"
                                            {{ $category->status ? 'checked' : '' }}>
                                        Hiện
                                    </label>
                                    <label>
                                        <input type="radio" name="status" id="input" value="0"
                                            {{ !$category->status ? 'checked' : '' }}>
                                        Ẩn
                                    </label>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
    </section>
@endsection
