@extends('admin.master')
@section('main-content')
@section('title', 'Tạo mới đơn xuất')
<style>
    .form-control{
       height:28px;font-size:13px
   }
</style>
<style>
    .price-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        /* Căn giữa theo chiều dọc */
    }

    .form-check {
        margin-right: 20px;
        /* Điều chỉnh khoảng cách giữa các nút */
    }
</style>


@if (session('success'))
<div class="alert hide">
    <span class="fas fa-exclamation-circle"></span>
    <span class="msg">{{ session('success') }}</span>
    <div class="close-btn">
        <span class="fas fa-times"></span>
    </div>
</div>
@endif
<section class="content">
    <div style="padding-top:12px">
        <a href="{{ route('admin.index') }}" style="margin-left:30px;font-size:17px;color: inherit;"><i class="fas fa-arrow-left"></i></a>
        <span style="font-size:22px;font-weight:600;margin:10px;">Tạo đơn xuất kho</span>
    </div>
    <form action="{{ route('xuathanghoa.store') }}" method="POST" id="xuatForm">
        @csrf
        <div class="container1">
        <div class="box-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group @error('ma_xuat') has-error @enderror">
                        <label for="ma_xuat">Mã đơn hàng</label>
                        <input type="text" name="ma_xuat" id="ma_xuat" class="form-control">
                        @error('ma_xuat')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            {{-- </div>
            <div class="row"> --}}
                <div class="col-md-3">
                    <div class="form-group @error('noi_dung_xuat') has-error @enderror">
                        <label for="noi_dung_xuat">Nội dung xuất hàng</label>
                        <input type="text" name="noi_dung_xuat" id="noi_dung_xuat" value="Hóa đơn xuất hàng"
                            class="form-control">
                        @error('noi_dung_xuat')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            {{-- </div>
            <div class="row"> --}}
                <div class="col-md-3">
                    <div class="form-group @error('ghi_chu') has-error @enderror">
                        <label for="ghi_chu">Ghi chú</label>
                        <textarea name="ghi_chu" id="ghi_chu" class="form-control ghi-chu-text" rows="1"
                            placeholder="Nhập thông tin ghi chú cho đơn hàng cần xuất"></textarea>
                        @error('ghi_chu')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div>
            <div class="container1">
        <table class="table table-bordered" id="tblEntAttributes" >
            <thead style="background-color: rgb(255, 255, 255); color:rgb(0, 0, 0);">
                <tr>
                    {{-- <th class="text-center" style="font-size: 13px;" >Sản phẩm</th>
                   
                    <th class="text-center custom-thead" style="font-size: 13px">Số lượng</th>
                    <th class="text-center custom-thead" style="width: 280px;font-size: 13px">Đơn giá</th>
                    <th class="text-center custom-thead"style="font-size: 13px">Tổng tiền</th>
                    <th class="text-center custom-thead"style="font-size: 13px">Ngày sản xuất</th>
                    <th class="text-center custom-thead"style="font-size: 13px">Ngày hết hạn</th> --}}
                    <th class="text-center custom-thead"style="font-size: 13px">
                        <a href="javascript:void(0)" class="btn btn-success addRow">+</a>
                    </th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>
                        <select id="product_id" name="product_id[]" class="form-control product-select">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" data-sale-price="{{ $product->sale_price }}"
                                    data-price="{{ $product->price }}" data-le-price="{{ $product->le_price }}">
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </td>
                    <td style="width:80px"><input type="number" id="multiplierInput" name="quantity[]"
                            class="form-control quantity" value="1" min="1" step="1"
                            style="width:75px">
                        @error('quantity')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </td>
                    <td >
                        <div class="price-options">
                            <div class="form-check">
                                <input class="form-check-input price-radio" type="radio" name="price[0]"
                                    value="sale_price" id="sale_price">
                                <label class="form-check-label" for="sale_price">Giá nhập</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input price-radio" type="radio" name="price[0]"
                                    value="le_price" id="le_price">
                                <label class="form-check-label" for="le_price">Giá lẻ</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input price-radio" type="radio" name="price[0]"
                                    value="price" id="price">
                                <label class="form-check-label" for="price">Giá sỉ</label>
                            </div>
                        </div>

                       

                        @error('price')
                            <span class="help-block text-danger">{{ $message }}</span>
                        @enderror
                    </td>




                    <td style="width:120px"><input type="text" name="total_price[]" class="form-control total-price"
                            style="width:100px" readonly></td>
                    <td style="width:130px"><input type="date" name="ngaysx[]" class="form-control"
                            style="width:130px">
                        @error('ngaysx')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </td>
                    <td style="width:130px"><input type="date" name="hansd[]" class="form-control"
                            style="width:130px">
                        @error('hansd')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </td>
                    <td><a href="javascript:void(0)" class="btn btn-danger removeRow">-</a></td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-success">Lưu</button>
    </form>
</section>



<script>
     document.addEventListener('DOMContentLoaded', function() {
        var minNumber = 100;
        var maxNumber = 999;

        // Sinh số ngẫu nhiên từ minNumber đến maxNumber
        var randomNumber = Math.floor(Math.random() * (maxNumber - minNumber + 1)) + minNumber;

        // Format số ngẫu nhiên thành chuỗi 'HD02110xxx'
        var maDon = 'HD02' + randomNumber.toString().padStart(4, '0');

        // Gán giá trị vào ô text có id là 'ma_don'
        document.getElementById('ma_xuat').value = maDon;
    });
    var rowIdx = 1;

    function newRowContent(index) {
        return `
            <tr>
                <td>
                    <select name="product_id[]" class="form-control product-select">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" 
                                    data-sale-price="{{ $product->sale_price }}" 
                                    data-price="{{ $product->price }}" 
                                    data-le-price="{{ $product->le_price }}">
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td><input type="number" name="quantity[]" class="form-control quantity" value="0" min="1" step="1"></td>
                <td>  
                    <div class="price-options">
                        <div class="form-check">
                            <input class="form-check-input price-radio" type="radio" name="price[${index}]" value="sale_price" id="sale_price">
                            <label class="form-check-label" for="sale_price">Giá nhập</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input price-radio" type="radio" name="price[${index}]" value="le_price" id="le_price">
                            <label class="form-check-label" for="le_price">Giá lẻ</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input price-radio" type="radio" name="price[${index}]" value="price" id="price">
                            <label class="form-check-label" for="price">Giá sỉ</label>
                        </div>
                    </div>
                        <style>
                            .price-options {
                            display: flex;
                            justify-content: space-between;
                            align-items: center; /* Căn giữa theo chiều dọc */
                            }

                            .form-check {
                                margin-right: 20px; /* Điều chỉnh khoảng cách giữa các nút */
                            }
                        </style>
                </td>
                <td><input type="text" name="total_price[]" class="form-control total-price" readonly></td>
                <td><input type="date" name="ngaysx[]" class="form-control" style="width:130px"></td>
                <td><input type="date" name="hansd[]" class="form-control" style="width:130px"></td>
                <td><a href="javascript:void(0)" class="btn btn-danger removeRow">-</a></td>
            </tr>
        `;
    }

  

    $(document).on('change', '.quantity, .price-radio, select[name^="product_id"]', function() {
        var row = $(this).closest('tr');
        var quantity = parseFloat(row.find('.quantity').val());
        var priceType = row.find('.price-radio:checked').val();
        var selectedProduct = row.find('select[name="product_id[]"] option:selected');

        // Ensure a valid price type is selected
        if (priceType && selectedProduct.length > 0) {
            var price = parseFloat(selectedProduct.data(priceType.replace('_', '-')));
            var totalPrice = quantity * price;
            row.find('.total-price').val(totalPrice.toFixed(0)); // Display totalPrice with 2 decimal places
        }
        if (isNaN(totalPrice)) {
            row.find('.total-price').val("Không");
        } else {
            row.find('.total-price').val(totalPrice.toFixed(0)); // Display totalPrice with 0 decimal places
        }
    });
    $(document).on('click', '.addRow', function() {
        $('#tblEntAttributes tbody').append(newRowContent(rowIdx));
        rowIdx++;
        updateGhiChu();
    });

    $(document).on('click', '.removeRow', function() {
        $(this).closest('tr').remove();
        updateGhiChu();
    });

    $(document).on('change', '.quantity, .price-radio, .product-select', function() {
        updateGhiChu();
    });

    function updateGhiChu() {
        let ghiChuText = [];
        $('#tblEntAttributes tbody tr').each(function() {
            let productName = $(this).find('.product-select option:selected').text().trim();
            let quantity = $(this).find('.quantity').val().trim();
            if (productName && quantity) {
                ghiChuText.push(`${productName} sl: ${quantity}`);
            }
        });
        $('.ghi-chu-text').val(ghiChuText.join('; '));
    }
</script>



@endsection
