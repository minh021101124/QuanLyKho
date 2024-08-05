@extends('admin.master')
@section('main-content')
@section('title', 'Đơn xuất')
<style>
    .ganhet {
        font-weight: 500;
        font-size: 12px;
        color: green;
    }

    .ganhetroi {
        font-weight: 500;
        font-size: 12px;
        color: rgb(250, 175, 0);
    }

    .maihet {
        font-weight: 500;
        font-size: 12px;
        color: blue;
    }

    .dahet {
        font-weight: 600;
        font-style: italic;
        font-size: 12px;
        color: rgb(255, 0, 0);
    }

    .chua {
        width: 150px;
        margin-left: 10px;
    }
</style>
<style>
    .form-control{
       height:28px;font-size:13px
   }
</style>
<style>
    .container1 {
        max-width: 1060px;
        margin: 0px auto;
        background-color: #ffffff;
        padding: 20px;

        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
    }

    .box1 {
        width: 40%;
        border: 2px solid rgb(147, 148, 150);
        height: 100%;
        padding: 30px;
        margin: 2px;
    }

    .box2 {
        border: 2px solid rgb(147, 148, 150);
        margin-left: 0px;
        width: 40%;
        height: 100%;
        padding: 30px;
        margin: 2px;
    }
    .modal-lg {
            max-width: 100%; /* Adjust as needed */
        }

        .modal-content {
            height: 90vh; /* Adjust as needed */
            
        }
        .modal-title {
            font-size: 25px; /* Adjust as needed */
        }

        .modal-body label {
            font-size: 16px; /* Adjust as needed */
        
        }
        #gia{margin-left: 20px;font-size: 16px}
        .modal-body input, 
        .modal-body select {
            font-size: 16px; /* Adjust as needed */
        }

        .btn-primary {
            font-size: 18px; /* Adjust as needed */
        }
        .form-control{
            font-size: 16px;
        }
        /* .close{
            width: 100px;color: red;
            height: 100px;
        } */
        .modal-body {
            max-height: 80vh; 
            overflow-y: auto;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 4px;
            text-align: left; vertical-align: middle;
        }

        .table th {
            background-color: #d16105;color: #ffffff;
            text-align: left;
            position: -webkit-sticky;
            /* For Safari */
            position: sticky;
            top: 0;
            /* Stick to the top of the container */
            z-index: 2;
            /* Ensures header stays above the body content */
        }
</style>

<section class="content">
    <p style="font-size: 30px;font-weight:400">Danh sách đơn xuất</p>
    {{-- <h2>Danh sách đơn xuất</h2> --}}

    {{-- <a href="{{ route('xuathanghoa.create') }}" class="btn btn-success" style="position: absolute; top: 100px; right: 60px;">Tạo mới đơn
    xuất</a> --}}
    <button class="btn btn-success" data-toggle="modal" data-target="#createProductModal" >+ Thêm mới</button>

    @if ($xuat->count() > 0)
        <table class="table table-hover" style="margin-left:0; margin-top:1%">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã xuất</th>
                    <th>Nội dung xuất</th>
                    <th>Người xuất</th>
                    <th>Ghi chú</th>
                    <th>Ngày lập</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($xuat as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td> <a href="{{ route('xuat.donhang', $item->id) }}">{{ $item->ma_xuat }}</a></td>
                        <td>{{ $item->noi_dung_xuat }}</td>
                        <td>{{ $item->nguoi_xuat }}</td>
                        <td>{{ $item->ghi_chu }}</td>
                        </td>
                        {{-- <td>{{ $item->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s') }}</td> --}}
                        <td>{{ $item->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('xuat.donhang', $item->id) }}"><button class="btn btn-primary">Xem chi
                                    tiết</button></a>
                            {{-- <form action="{{ route('kho.destroy', $item->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <span>Chưa có dữ liệu</span>
    @endif


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
<div class="modal fade" id="createProductModal" tabindex="-1" role="dialog" aria-labelledby="createProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" >
            <div class="modal-header">
               
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                <form action="{{ route('xuathanghoa.store') }}" method="POST" id="xuatForm" style="font-size:14px">
                    @csrf
                    <div class="box-body" >
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
                                    <input type="text" name="noi_dung_xuat" id="noi_dung_xuat" value="Hóa đơn xuất hàng"
                                        class="form-control">
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
                                    <textarea name="ghi_chu" id="ghi_chu" class="form-control ghi-chu-text" rows="2"
                                        placeholder="Nhập thông tin ghi chú cho đơn hàng cần xuất"></textarea>
                                    @error('ghi_chu')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <table class="table table-bordered" id="tblEntAttributes" >
                        <thead style="background-color: rgb(54, 54, 172); color:white;">
                            <tr>
                                <th class="text-center" style="font-size: 16px;width:300px" >Sản phẩm</th>
                                <th class="text-center custom-thead" style="font-size: 16px;width:20px">SL</th>
                                <th class="text-center custom-thead" style="width: 300px;font-size: 16px">Đơn giá</th>
                                <th class="text-center custom-thead"style="font-size: 16px">Tổng tiền</th>
                                <th class="text-center custom-thead"style="font-size: 16px">Ngày sản xuất</th>
                                <th class="text-center custom-thead"style="font-size: 16px">Ngày hết hạn</th>
                                <th class="text-center custom-thead"style="font-size: 16px">
                                    <a href="javascript:void(0)" class="btn btn-success addRow">+</a>
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <td >
                                    <select id="product_id" name="product_id[]" class="form-control product-select">
                                        @foreach ($product_xuat as $product)
                                            <option value="{{ $product->id }}" data-sale-price="{{ $product->sale_price }}"
                                                data-price="{{ $product->price }}" data-le-price="{{ $product->le_price }}"
                                                data-quantity="{{ $product->quantity }}">
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('product_id')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td style="width:60px">
                                    <input type="number" id="quantity" name="quantity[]" class="form-control quantity" value="1" min="1" step="1"
                                        style="width:75px">
                                    @error('quantity')
                                        <span class="help-block">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>  
                                    <div class="price-options">
                                        <div class="form-check">
                                            <input class="form-check-input price-radio" type="radio" name="price[${index}]" value="sale_price" id="sale_price">
                                            <span class="form-check-label" for="sale_price">Nhập</span>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input price-radio" type="radio" name="price[${index}]" value="le_price" id="le_price">
                                            <span class="form-check-label" for="le_price">Lẻ</span>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input price-radio" type="radio" name="price[${index}]" value="price" id="price">
                                            <span class="form-check-label" for="price">Sỉ</span>
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
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to update max quantity based on selected product
        function updateMaxQuantity(selectElement) {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const maxQuantity = selectedOption.getAttribute('data-quantity');
            const quantityInput = selectElement.closest('tr').querySelector('.quantity');
            quantityInput.setAttribute('data-max-quantity', maxQuantity);
        }

        // Select all product select elements and add event listener
        const productSelects = document.querySelectorAll('.product-select');
        productSelects.forEach(function(selectElement) {
            selectElement.addEventListener('change', function() {
                updateMaxQuantity(selectElement);
            });
            // Initialize the max quantity on page load
            updateMaxQuantity(selectElement);
        });

        // Add event listener for quantity input change
        document.addEventListener('input', function(event) {
            if (event.target.classList.contains('quantity')) {
                const quantityInput = event.target;
                const maxQuantity = parseInt(quantityInput.getAttribute('data-max-quantity'), 10);
                const selectedQuantity = parseInt(quantityInput.value, 10);

                if (selectedQuantity > maxQuantity) {
                    alert('Số lượng vượt quá số lượng hiện có! Tối đa là: ' + maxQuantity);
                    quantityInput.value = maxQuantity; // Reset to max quantity
                }
            }
        });
    });
</script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if (Session::has('success'))
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
@endif --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var minNumber = 100;
        var maxNumber = 999;
        var randomNumber = Math.floor(Math.random() * (maxNumber - minNumber + 1)) + minNumber;
        var maDon = 'HD02' + randomNumber.toString().padStart(4, '0');
        document.getElementById('ma_xuat').value = maDon;
    });
</script>
<script>
    var rowIdx = 1;

    function newRowContent(index) {
        return `
            <tr>
                <td>
                    <select id="product_id" name="product_id[]" class="form-control product-select">
                        @foreach ($product_xuat as $product)
                            <option value="{{ $product->id }}" data-sale-price="{{ $product->sale_price }}"
                                data-price="{{ $product->price }}" data-le-price="{{ $product->le_price }}"
                                data-quantity="{{ $product->quantity }}">
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </td>
                <td style="width:80px">
                    <input type="number" id="quantity" name="quantity[]" class="form-control quantity" value="1" min="1" step="1"
                        style="width:75px">
                    @error('quantity')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </td>
                <td>  
                    <div class="price-options">
                        <div class="form-check">
                            <input class="form-check-input price-radio" type="radio" name="price[${index}]" value="sale_price" id="sale_price">
                            <span class="form-check-label" for="sale_price">Nhập</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input price-radio" type="radio" name="price[${index}]" value="le_price" id="le_price">
                            <span class="form-check-label" for="le_price">Lẻ</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input price-radio" type="radio" name="price[${index}]" value="price" id="price">
                            <span class="form-check-label" for="price">Sỉ</span>
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

    function updateMaxQuantity(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const maxQuantity = selectedOption.getAttribute('data-quantity');
        const quantityInput = selectElement.closest('tr').querySelector('.quantity');
        quantityInput.setAttribute('data-max-quantity', maxQuantity);
    }

    $(document).on('change', '.product-select', function() {
        var row = $(this).closest('tr');
        updateMaxQuantity(this);
        var selectedProduct = row.find('select[name="product_id[]"] option:selected');
        var maxQuantity = parseInt(selectedProduct.data('quantity'), 10);
        var quantityInput = row.find('.quantity');

        if (quantityInput.val() > maxQuantity) {
            alert('Số lượng vượt quá số lượng hiện có! Tối đa là: ' + maxQuantity);
            quantityInput.val(maxQuantity); // Reset to max quantity
        }
    });

    $(document).on('input', '.quantity', function() {
        var row = $(this).closest('tr');
        var maxQuantity = parseInt($(this).attr('data-max-quantity'), 10);
        var selectedQuantity = parseInt($(this).val(), 10);

        if (selectedQuantity > maxQuantity) {
            alert('Số lượng vượt quá số lượng hiện có! Tối đa là: ' + maxQuantity);
            $(this).val(maxQuantity); // Reset to max quantity
        }
    });

    $(document).on('change', '.quantity, .price-radio, select[name^="product_id"]', function() {
        var row = $(this).closest('tr');
        var quantity = parseFloat(row.find('.quantity').val());
        var priceType = row.find('.price-radio:checked').val();
        var selectedProduct = row.find('select[name="product_id[]"] option:selected');

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


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to update max quantity based on selected product
        function updateMaxQuantity(selectElement) {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const maxQuantity = selectedOption.getAttribute('data-quantity');
            const quantityInput = selectElement.closest('tr').querySelector('.quantity');
            quantityInput.setAttribute('data-max-quantity', maxQuantity);
        }

        // Select all product select elements and add event listener
        const productSelects = document.querySelectorAll('.product-select');
        productSelects.forEach(function(selectElement) {
            selectElement.addEventListener('change', function() {
                updateMaxQuantity(selectElement);
            });
            // Initialize the max quantity on page load
            updateMaxQuantity(selectElement);
        });

        // Add event listener for quantity input change
        document.addEventListener('input', function(event) {
            if (event.target.classList.contains('quantity')) {
                const quantityInput = event.target;
                const maxQuantity = parseInt(quantityInput.getAttribute('data-max-quantity'), 10);
                const selectedQuantity = parseInt(quantityInput.value, 10);

                if (selectedQuantity > maxQuantity) {
                    alert('Số lượng vượt quá số lượng hiện có! Tối đa là: ' + maxQuantity);
                    quantityInput.value = maxQuantity; // Reset to max quantity
                }
            }
        });
    });
</script>
@endsection
