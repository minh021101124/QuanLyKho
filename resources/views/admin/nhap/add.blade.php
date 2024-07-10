@extends('admin.master')
@section('main-content')
@section('title','Tạo mới đơn nhập')
<section class="content">
<!DOCTYPE html>
<html>
<head>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h2>Tạo mới đơn nhập</h2>
    <form action="{{ route('nhaphanghoa.store') }}" method="POST">
        @csrf
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group @error('ma_don') has-error @enderror">
                        <label for="ma_don">Mã đơn hàng</label>
                        <input type="text" name="ma_don" id="ma_don" class="form-control">
                        @error('ma_don')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group @error('noi_dung_nhap') has-error @enderror">
                        <label for="noi_dung_nhap">Nội dung nhập hàng</label>
                        <input type="text" name="noi_dung_nhap" id="noi_dung_nhap" value="Hóa đơn nhập hàng"class="form-control">
                        @error('noi_dung_nhap')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group @error('ghi_chu') has-error @enderror">
                        <label for="ghi_chu">Ghi chú</label>
                        <textarea name="ghi_chu" id="ghi_chu" class="form-control" rows="2" placeholder="Nhập thông tin ghi chú cho đơn hàng cần nhập" ></textarea>
                        @error('ghi_chu')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Tổng tiền</th>
                    <th>Ngày sản xuất</th>
                    <th>Ngày hết hạn</th>
                    <th><a href="javascript:void(0)" class="btn btn-success addRow">+</a></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select name="product_id[]" id="product-dropdown"class="form-control">
                            <option value="">Chọn sản phẩm</option>
                            @foreach($products as $prod)
                                <option value="{{ $prod->id }}">{{ $prod->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="number" name="quantity[]" id="quantity" min="1" max="100"class="form-control"></td>
                    <td><input type="text" name="price[]" id="product-price" class="form-control"></td>
                    <td><input type="text" name="total_price[]" id="tong_tien"class="form-control"></td>
                    <td><input type="date" name="ngaysx[]" class="form-control"></td>
                    <td><input type="date" name="hansd[]" class="form-control"></td>
                    <td><a href="javascript:void(0)" class="btn btn-danger removeRow">-</a></td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-success" style="width:100px;margin-left:1%">Lưu</button>
        <a href="{{ route('nhap.index') }}" class="btn btn-danger" style="margin-left:0; margin-top:0;width:100px;">Hủy</a>
    </form>

    <script>
        $(document).ready(function(){
            $('thead').on('click', '.addRow', function(){
                var tr = "<tr>"+
                            "<td>"+
                                "<select name='product_id[]' id='product-dropdown' class='form-control'>"+
                                    "<option value=''>Chọn sản phẩm</option>"+
                                    "@foreach($products as $prod)"+
                                        "<option value='{{ $prod->id }}'>{{ $prod->name }}</option>"+
                                    "@endforeach"+
                                "</select>"+
                            "</td>"+
                            "<td><input type='number' name='quantity[]' id='quantity' min='1' max='100' class='form-control'></td>"+
                            "<td><input type='text' name='price[]' id='product-price' class='form-control'></td>"+
                            "<td><input type='text' name='total_price[]' id='tong_tien' class='form-control'></td>"+
                            "<td><input type='date' name='ngaysx[]' class='form-control'></td>"+
                            "<td><input type='date' name='hansd[]' class='form-control'></td>"+
                            "<td><a href='javascript:void(0)' class='btn btn-danger removeRow'>-</a></td>"+
                        "</tr>";
                $('tbody').append(tr);
            });

            $('tbody').on('click', '.removeRow', function(){
                $(this).parent().parent().remove();
            });

            $(document).on('change', '#product-dropdown', function(){
                var productId = $(this).val();
                var $row = $(this).closest('tr');

                if (productId) {
                    $.ajax({
                        url: '/product-price/' + productId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.price !== undefined) {
                                $row.find('#product-price').val(response.price);
                                calculateTotal($row);
                            }
                        }
                    });
                } else {
                    $row.find('#product-price').val('');
                    calculateTotal($row);
                }
            });

            $(document).on('input', '#quantity', function(){
                var $row = $(this).closest('tr');
                calculateTotal($row);
            });

            function calculateTotal($row) {
                var price = parseFloat($row.find('#product-price').val()) || 0;
                var quantity = parseInt($row.find('#quantity').val()) || 0;
                var total = price * quantity;
                $row.find('#tong_tien').val(total);
            }
        });
    </script>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script type="text/javascript">
    $(document).ready(function() {
        $('#product-dropdown').change(function() {
            var productId = $(this).val();

            if (productId) {
                $.ajax({
                    url: '/product-price/' + productId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.price !== undefined) {
                            $('#product-price').val(response.price);
                            calculateTotal();
                        }
                    }
                });
            } else {
                $('#product-price').val('');
                calculateTotal();
            }
        });

        $('#quantity').on('input', function() {
            calculateTotal();
        });

        function calculateTotal() {
            var price = parseFloat($('#product-price').val()) || 0;
            var quantity = parseInt($('#quantity').val()) || 0;
            var total = price * quantity;
        }
    });
</script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#product-dropdown').change(function() {
            var productId = $(this).val();
            if (productId) {
                $.ajax({
                    url: '/product-price/' + productId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.price !== undefined) {
                            $('#product-price').val(response.price.toFixed(0)+'đ');
                            calculateTotal();
                        }
                    }
                });
            } else {
                $('#product-price').val('');
                calculateTotal();
            }
        });

        $('#quantity').on('input', function() {
            calculateTotal();
        });

        function calculateTotal() {
            var price = parseFloat($('#product-price').val()) || 0;
            var quantity = parseInt($('#quantity').val()) || 0;
            var total = price * quantity;
            // $('#tong_tien').val(total.toFixed(0)+ 'đ');
            $('#tong_tien').val(total.toFixed(0) + 'đ');
        }

        // function formatCurrency(number) {
        //     return number.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        // }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var minNumber = 100;
    var maxNumber = 999;

    // Sinh số ngẫu nhiên từ minNumber đến maxNumber
    var randomNumber = Math.floor(Math.random() * (maxNumber - minNumber + 1)) + minNumber;

    // Format số ngẫu nhiên thành chuỗi 'HD02110xxx'
    var maDon = 'HD02' + randomNumber.toString().padStart(4, '0');
    
    // Gán giá trị vào ô text có id là 'ma_don'
    document.getElementById('ma_don').value = maDon;
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var minNumber = 100;
    var maxNumber = 999;

    // Sinh số ngẫu nhiên từ minNumber đến maxNumber
    var randomNumber = Math.floor(Math.random() * (maxNumber - minNumber + 1)) + minNumber;

    // Format số ngẫu nhiên thành chuỗi 'HD02110xxx'
    var maDon = 'HD02' + randomNumber.toString().padStart(4, '0');
    
    // Gán giá trị vào ô text có id là 'ma_don'
    document.getElementById('ma_don').value = maDon;
    });
</script>
</section>
@endsection