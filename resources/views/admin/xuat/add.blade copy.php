@extends('admin.master')
@section('main-content')
@section('title','Tạo mới đơn xuất')

<section class="content">

    <form action="{{ route('xuathanghoa.store') }}" method="POST">
        @csrf
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group @error('ma_xuat') has-error @enderror">
                        <label for="ma_xuat">Mã đơn hàng</label>
                        <input type="text" name="ma_xuat" id="ma_xuat" class="form-control">
                        @error('ma_xuat')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group @error('noi_dung_xuat') has-error @enderror">
                        <label for="noi_dung_xuat">Nội dung xuất hàng</label>
                        <input type="text" name="noi_dung_xuat" id="noi_dung_xuat" value="Hóa đơn xuất hàng"class="form-control">
                        @error('noi_dung_xuat')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group @error('ghi_chu') has-error @enderror">
                        <label for="ghi_chu">Ghi chú</label>
                        <textarea name="ghi_chu" id="ghi_chu" class="form-control" rows="2" placeholder="Nhập thông tin ghi chú cho đơn hàng cần xuất"></textarea>
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
                        <select id="product_id" name="product_id[]" class="form-control">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" 
                                        data-sale-price="{{ $product->sale_price }}" 
                                        data-price="{{ $product->price }}" 
                                        data-le-price="{{ $product->le_price }}">
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                        
                    </td>
                    <td><input type="number" id="multiplierInput" name="quantity[]" class="form-control quantity" value="0" min="0" step="1"></td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input price-radio" type="radio" name="price[]" value="sale_price" checked>
                            <label class="form-check-label">Giá nhập</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input price-radio" type="radio" name="price[]" value="le_price">
                            <label class="form-check-label">Giá lẻ</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input price-radio" type="radio" name="price[]" value="price">
                            <label class="form-check-label">Giá sỉ</label>
                        </div>
                    </td>
                   
                    <td><input type="text" name="total_price[]" id="statusInput"class="form-control total-price" readonly></td>
                    <td><input type="date" name="ngaysx[]" class="form-control"></td>
                    <td><input type="date" name="hansd[]" class="form-control"></td>
                    <td><a href="javascript:void(0)" class="btn btn-danger removeRow">-</a></td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-success" style="width:100px;margin-left:1%">Lưu</button>
        <a href="{{ route('xuat.index') }}" class="btn btn-danger" style="margin-left:0; margin-top:0;width:100px;">Hủy</a>
    </form>





    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   

    <script>
        $(document).ready(function () {
            function updateValue() {
                const selectedProduct = $('#product_id').find(':selected');
                const priceType = $('input[name="price[]"]:checked').val();
                
                // Ensure the selectedProduct and priceType are correctly retrieved
                if (selectedProduct.length > 0 && priceType) {
                    const price = parseFloat(selectedProduct.data(priceType.replace('_', '-'))) || 0; 
                    const multiplier = parseFloat($('#multiplierInput').val()) || 1; 
                    const result = price * multiplier;
                    $('#statusInput').val(result.toFixed(0)); 
                }
            }
            
            // Event listeners for input changes
            $('#product_id').change(updateValue);
            $('input[name="price[]"]').change(updateValue);
            $('#multiplierInput').on('input', updateValue);
            
            updateValue();
        });
        </script>
    
    {{-- <script>
        $(document).ready(function(){
            // Add Row button click
            $('thead').on('click', '.addRow', function(){
                var tr = "<tr>"+
                            "<td>"+
                                "<select name='product_id[]'  id='product_id' class='form-control product-id'>"+
                                    "@foreach($products as $product)"+
                                        "<option value='{{ $product->id }}' data-sale-price='{{ $product->sale_price }}' data-price='{{ $product->price }}' data-le-price='{{ $product->le_price }}'>"+
                                            " {{ $product->name }}"+
                                        "</option>"+
                                    "@endforeach"+
                                "</select>"+
                            "</td>"+
                            "<td><input type='number' name='quantity[]' class='form-control quantity' min='1' max='100' step='1'></td>"+
                            "<td>"+
                                "<div class='form-check'>"+
                                    "<input class='form-check-input price-radio' type='radio' name='price[]' value='sale_price' checked>"+
                                    "<label class='form-check-label'>Giá nhập</label>"+
                                "</div>"+
                                "<div class='form-check'>"+
                                    "<input class='form-check-input price-radio' type='radio' name='price[]' value='le_price'>"+
                                    "<label class='form-check-label'>Giá lẻ</label>"+
                                "</div>"+
                                "<div class='form-check'>"+
                                    "<input class='form-check-input price-radio' type='radio' name='price[]' value='price'>"+
                                    "<label class='form-check-label'>Giá sỉ</label>"+
                                "</div>"+
                            "</td>"+
                            "<td><input type='text' name='total_price[]' class='form-control total-price' readonly></td>"+
                            "<td><input type='date' name='ngaysx[]' class='form-control'></td>"+
                            "<td><input type='date' name='hansd[]' class='form-control'></td>"+
                            "<td><a href='javascript:void(0)' class='btn btn-danger removeRow'>-</a></td>"+
                        "</tr>";
                $('tbody').append(tr);
            });
    
            // Remove Row button click
            $('tbody').on('click', '.removeRow', function(){
                $(this).parent().parent().remove();
            });
    
            // Product ID change event
            $(document).on('change', '#product-id', function(){
                var productId = $(this).val();
                var $row = $(this).closest('tr');
    
                if (productId) {
                    $.ajax({
                        url: '/product-price/' + productId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            var priceType = $row.find('input[name="price[]"]:checked').val();
                            var price = response[priceType] || 0;
                            $row.find('.total-price').val(price);
                            calculateTotal();
                        }
                    });
                }
            });
    
            // Price radio change event
            $(document).on('change', 'input[name="price[]"]', function(){
                var $row = $(this).closest('tr');
                var productId = $row.find('#product-id').val();
    
                if (productId) {
                    $.ajax({
                        url: '/product-price/' + productId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            var priceType = $(this).val();
                            var price = response[priceType] || 0;
                            $row.find('.total-price').val(price);
                            calculateTotal();
                        }.bind(this)
                    });
                }
            });
    
            // Quantity input change event
            $(document).on('input', '.quantity', function(){
                calculateTotal();
            });
    
            // Function to calculate total price
            function calculateTotal() {
                $('tbody tr').each(function(){
                    var $row = $(this);
                    var price = parseFloat($row.find('.total-price').val()) || 0;
                    var quantity = parseInt($row.find('.quantity').val()) || 0;
                    var total = price * quantity;
                    $row.find('.total-price').val(total);
                });
            }
        });
    </script> --}}
    
    <script>
        $(document).ready(function(){
            
            $('thead').on('click', '.addRow', function(){
                var tr = "<tr>"+
                            "<td>"+
                                "<select name='product_id[]' id='product-dropdown' class='form-control'>"+
                                    "@foreach($products as $product)"+
                                        "<option value='{{ $product->id }}' data-sale-price='{{ $product->sale_price }}' data-price='{{ $product->price }}' data-le-price='{{ $product->le_price }}'>"+
                                            " {{ $product->name }}"+
                                        "</option>"+
                                    "@endforeach"+
                                "</select>"+
                            "</td>"+
                            "<td><input type='number' name='quantity[]' class='form-control' min='1' max='100' step='1'></td>"+
                            "<td>"+
                                "<div class='form-check'>"+
                                    "<input class='form-check-input' type='radio' name='price[]' value='sale_price'>"+
                                    "<label class='form-check-label'>Giá nhập</label>"+
                                "</div>"+
                                "<div class='form-check'>"+
                                    "<input class='form-check-input' type='radio' name='price[]' value='le_price'>"+
                                    "<label class='form-check-label'>Giá lẻ</label>"+
                                "</div>"+
                                "<div class='form-check'>"+
                                    "<input class='form-check-input' type='radio' name='price[]' value='price'>"+
                                    "<label class='form-check-label'>Giá sỉ</label>"+
                                "</div>"+
                            "</td>"+
                            "<td><input type='text' name='total_price[]' id='total'class='form-control' readonly></td>"+
                            "<td><input type='date' name='ngaysx[]' class='form-control'></td>"+
                            "<td><input type='date' name='hansd[]' class='form-control'></td>"+
                            "<td><a href='javascript:void(0)' class='btn btn-danger removeRow'>-</a></td>"+
                        "</tr>";
                $('tbody').append(tr);
            });
    
            // Remove Row button click
            $('tbody').on('click', '.removeRow', function(){
                $(this).closest('tr').remove();
            });
    
            // Product ID change event
            // $(document).on('change', '#product-dropdown', function(){
            //     var productId = $(this).val();
            //     var $row = $(this).closest('tr');
    
            //     if (productId) {
            //         $.ajax({
            //             url: '/product-price/' + productId,
            //             type: 'GET',
            //             dataType: 'json',
            //             success: function(response) {
            //                 var priceType = $row.find('input[name="price[]"]:checked').val();
            //                 var price = response[priceType] || 0;
            //                 $row.find('#total').val(price);
            //                 calculateTotal();
            //             }
            //         });
            //     }
            // });
    
            // Price radio change event
            // $(document).on('change', 'input[name="price[]"]', function(){
            //     var $row = $(this).closest('tr');
            //     var productId = $row.find('#product-id').val();
    
            //     if (productId) {
            //         $.ajax({
            //             url: '/product-price/' + productId,
            //             type: 'GET',
            //             dataType: 'json',
            //             success: function(response) {
            //                 var priceType = $(this).val();
            //                 var price = response[priceType] || 0;
            //                 $row.find('.total-price').val(price);
            //                 calculateTotal();
            //             }.bind(this)
            //         });
            //     }
            // });
    
            // Quantity input change event
            $(document).on('input', '.quantity', function(){
                calculateTotal();
            });
    
            // Function to calculate total price
            // function calculateTotal() {
            //     $('tbody tr').each(function(){
            //         var $row = $(this);
            //         var price = parseFloat($row.find('.total-price').val()) || 0;
            //         var quantity = parseInt($row.find('.quantity').val()) || 0;
            //         var total = price * quantity;
            //         $row.find('.total-price').val(total);
            //     });
            // }
        });
    </script>
    
    {{-- <script>
        $(document).ready(function(){
            $('thead').on('click', '.addRow', function(){
                var tr = "<tr>"+
                            "<td>"+
                                "<select id='product_id' name='product_id[]'' class='form-control'>"+
                            "@foreach($products as $product)"+
                                "<option value='{{ $product->id }}' data-sale-price='{{ $product->sale_price }}' data-price='{{ $product->price }}'data-le-price='{{ $product->le_price }}'>"+
                                   " {{ $product->name }}"+
                                "</option>"+
                            "@endforeach"+
                        "</select>"+
                            "</td>"+
                            "<td><input type='number' name='quantity[]' id='multiplierInput' min='1' max='100' step='1'class='form-control quantity'></td>"+
                            "<td>"+
                               " <div class='form-check'>"+
                        "<input class='form-check-input price-radio' type='radio' name='price[]' value='sale_price' checked>"+
                        "<label class='form-check-label'>Giá nhập</label></div>"+
                    "<div class='form-check'>"+
                    " <input class='form-check-input price-radio' type='radio' name='price[]' value='le_price'>"+
                        "<label class='form-check-label'>Giá lẻ</label></div>"+
                    "<div class='form-check'>"+
                    " <input class='form-check-input price-radio' type='radio' name='price[]' value='price'>"+
                    " <label class='form-check-label'>Giá sỉ</label></div>"+
                    "</td>"+
                            "<td><input type='text' name='total_price[]' id='statusInput' class='form-control total-price' readonly></td>"+
                            "<td><input type='date' name='ngaysx[]' class='form-control'></td>"+
                            "<td><input type='date' name='hansd[]' class='form-control'></td>"+
                            "<td><a href='javascript:void(0)' class='btn btn-danger removeRow'>-</a></td>"+
                        "</tr>";
                $('tbody').append(tr);
            });
           
            $('tbody').on('click', '.removeRow', function(){
                $(this).parent().parent().remove();
            });

            $(document).on('change', '#product_id', function(){
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
    </script> --}}


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var minNumber = 100;
        var maxNumber = 999;
    
        // Sinh số ngẫu nhiên từ minNumber đến maxNumber
        var randomNumber = Math.floor(Math.random() * (maxNumber - minNumber + 1)) + minNumber;
    
        // Format số ngẫu nhiên thành chuỗi 'HD02110xxx'
        var maDon = 'HD02' + randomNumber.toString().padStart(4, '0');
        
        // Gán giá trị vào ô text có id là 'ma_don'
        document.getElementById('ma_xuat').value = maDon;
        });
    </script>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if(Session::has('success'))
<script>
    swal({
        title: "Thông báo",
        text: "{{ Session::get('success') }}",
        icon: "success",
        button: "OK",
        timer: 8000,
        dangerMode: false,
    });
</script>
@endif
@endsection




{{-- @extends('admin.master')
@section('main-content')
@section('title','Tạo mới đơn xuất')

<section class="content">
<!DOCTYPE html>
<html>
<head>
    <title>Thêm Sản Phẩm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <form action="{{ route('xuathanghoa.store') }}" method="POST">
        @csrf
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group @error('ma_xuat') has-error @enderror">
                        <label for="ma_xuat">Mã đơn hàng</label>
                        <input type="text" name="ma_xuat" id="ma_xuat" class="form-control">
                        @error('ma_xuat')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group @error('noi_dung_xuat') has-error @enderror">
                        <label for="noi_dung_xuat">Nội dung xuất hàng</label>
                        <input type="text" name="noi_dung_xuat" id="noi_dung_xuat" value="Hóa đơn xuất hàng"class="form-control">
                        @error('noi_dung_xuat')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group @error('ghi_chu') has-error @enderror">
                        <label for="ghi_chu">Ghi chú</label>
                        <textarea name="ghi_chu" id="ghi_chu" class="form-control" rows="2" placeholder="Nhập thông tin ghi chú cho đơn hàng cần xuất" ></textarea>
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
                    
                    
                    <td>
                        <div class="form-check">
                            <input class="form-check-input price-radio" type="radio" name="price_type[]" value="sale_price">
                            <label class="form-check-label" for="price_type_gia_nhap">Giá nhập</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input price-radio" type="radio" name="price_type[]" value="le_price">
                            <label class="form-check-label" for="price_type_gia_le">Giá lẻ</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input price-radio" type="radio" name="price_type[]" value="price">
                            <label class="form-check-label" for="price_type_gia_si">Giá sỉ</label>
                        </div>
                    </td>
                      
                    <td><input type="text" name="total_price[]" id="tong_tien"class="form-control"></td>
                    <td><input type="date" name="ngaysx[]" class="form-control"></td>
                    <td><input type="date" name="hansd[]" class="form-control"></td>
                    <td><a href="javascript:void(0)" class="btn btn-danger removeRow">-</a></td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-success" style="width:100px;margin-left:1%">Lưu</button>
        <a href="{{ route('xuat.index') }}" class="btn btn-danger" style="margin-left:0; margin-top:0;width:100px;">Hủy</a>
        
    </form>

    
</body>
</html>
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
            $('#tong_tien').val(total.toFixed(2));
        }
    });
</script>
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
            $('#tong_tien').val(formatCurrency(total) + 'đ');
        }

        function formatCurrency(number) {
            return number.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        }
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
    document.getElementById('ma_xuat').value = maDon;
    });
</script>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if(Session::has('success'))
<script>
    swal({
        title: "Thông báo",
        text: "{{ Session::get('success') }}",
        icon: "success",
        button: "OK",
        timer: 8000,
        dangerMode: false,
    });
</script>
@endif
@if(Session::has('error'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            title: "Thông báo",
            text: "{{ Session::get('error') }}",
            icon: "error",
            confirmButtonText: "OK",
            timer: 8000, // Automatically close after 8 seconds
            timerProgressBar: true, // Show progress bar
            toast: true, // Toast style (displays at the top)
            position: 'top-end', // Position of the toast
            showConfirmButton: false // Hide the confirmation button
        });
    });
</script>
@endif

@endsection --}}