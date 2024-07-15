@extends('admin.master')
@section('main-content')
@section('title','Tạo mới đơn xuất')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
</head>
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
    <table class="table table-bordered" id="tblEntAttributes">
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
                        <input class="form-check-input price-radio" type="radio" name="price[]" value="sale_price">
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
                <td><input type="text" name="total_price[]" class="form-control total-price" readonly></td>
                <td><input type="date" name="ngaysx[]" class="form-control"></td>
                <td><input type="date" name="hansd[]" class="form-control"></td>
                <td><a href="javascript:void(0)" class="btn btn-danger removeRow">-</a></td>
            </tr>
        </tbody>
    </table>
    <button type="submit" class="btn btn-success">Lưu</button>
</form>
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
<script>
    var rowIdx = 1; // Starting from 1 as the initial row has price[0]

    function newRowContent(index) {
        return `
            <tr>
                <td>
                    <select name="product_id[]" class="form-control">
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
                <td><input type="number" name="quantity[]" class="form-control quantity" value="0" min="0" step="1"></td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input price-radio" type="radio" name="price[${index}]" value="sale_price">
                        <label class="form-check-label">Giá nhập</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input price-radio" type="radio" name="price[${index}]" value="le_price">
                        <label class="form-check-label">Giá lẻ</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input price-radio" type="radio" name="price[${index}]" value="price">
                        <label class="form-check-label">Giá sỉ</label>
                    </div>
                </td>
                <td><input type="text" name="total_price[]" class="form-control total-price" readonly></td>
                <td><input type="date" name="ngaysx[]" class="form-control"></td>
                <td><input type="date" name="hansd[]" class="form-control"></td>
                <td><a href="javascript:void(0)" class="btn btn-danger removeRow">-</a></td>
            </tr>
        `;
    }

    $(document).on('click', '.addRow', function() {
        $('#tblEntAttributes tbody').append(newRowContent(rowIdx));
        rowIdx++;
    });

    $(document).on('click', '.removeRow', function() {
        $(this).closest('tr').remove();
    });

    $(document).on('change', '.quantity, .price-radio, select[name^="product_id"]', function() {
        var row = $(this).closest('tr');
        var quantity = parseFloat(row.find('.quantity').val());
        var priceType = row.find('.price-radio:checked').val();
        var selectedProduct = row.find('select[name="product_id[]"] option:selected');
        
        // Ensure a valid price type is selected
        if (priceType && selectedProduct.length > 0) {
            var price = parseFloat(selectedProduct.data(priceType.replace('_', '-')));
            var totalPrice = quantity * price;
            row.find('.total-price').val(totalPrice.toFixed(2)); // Display totalPrice with 2 decimal places
        }
    });
</script>



@endsection