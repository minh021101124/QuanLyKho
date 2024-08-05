@extends('admin.master')
@section('main-content')
@section('title', 'Đơn nhập')
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

    .pagination-container {
        display: flex;
        justify-content: center;

    }

    .modal-lg {
        max-width: 80%;
        /* Adjust as needed */
    }

    .modal-content {
        height: 95vh;
        /* Adjust as needed */
    }

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
            background-color: #107715;color: #ffffff;
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

    <h2>Danh sách đơn đã nhập</h2>

    {{-- <a href="{{ route('nhaphanghoa.create') }}" class="btn btn-success" style="margin-left:80%; margin-top:0">Tạo mới đơn
        nhập</a> --}}
    <button class="btn btn-success" data-toggle="modal" data-target="#createProductModal"
        style="position: absolute; top: 100px; right: 60px;">+ Thêm mới</button>
    <div class="box-body table-responsive no-padding" style="height:440px">
        @if ($nhap->count() > 0)
            <table class="table table-hover" style="margin-left:0; margin-top:1%">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn</th>
                        <th>Nội dung nhập</th>
                        <th>Người nhập</th>
                        <th>Ghi chú</th>
                        <th>Ngày lập</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nhap as $nha)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td> <a href="#">{{ $nha->ma_don }}</a></td>
                            <td>{{ $nha->noi_dung_nhap }}</td>
                            <td>{{ $nha->nguoi_nhap }}</td>
                            <td>{{ $nha->ghi_chu }}</td>
                            </td>
                            {{-- <td>{{ $nha->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s') }}</td> --}}
                            <td>{{ $nha->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y') }}</td>
                            
                            <td>

                                <a href="{{ route('nhap.donhang', $nha->id) }}"><button class="btn btn-primary">Xem chi
                                        tiết</button></a>
                            </td>
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- @if (Session::has('message'))
            <script>
                swal({
                    title: "Message",
                    text: "{{ Session::get('message') }}",
                    icon: "success",
                    button: "OK",
                });
            </script>
        @endif

         --}}
            <div class="pagination-container">
                {{ $nhap->links() }}
            </div>
        @else
            <span>Chưa có dữ liệu</span>
        @endif
    </div>
    <div class="modal fade" id="createProductModal" tabindex="-1" role="dialog"
        aria-labelledby="createProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createProductModalLabel">Thêm sản phẩm mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                                        <input type="text" name="noi_dung_nhap" id="noi_dung_nhap"
                                            value="Hóa đơn nhập hàng" class="form-control">
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
                                        <textarea name="ghi_chu" id="ghi_chu" class="form-control ghi-chu-text" rows="2"
                                            placeholder="Nhập thông tin ghi chú cho đơn hàng cần xuất"></textarea>
                                        @error('ghi_chu')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="table table-bordered" id="tblEntAttributes">
                            <thead style="background-color: rgb(54, 54, 172); color:white;">
                                <tr>
                                    <th class="text-center" style="font-size: 16px">Sản phẩm</th>
                                    <th class="text-center custom-thead" style="font-size: 16px">Số lượng</th>
                                    <th class="text-center custom-thead" style="width: 280px;font-size: 16px">Đơn giá
                                    </th>
                                    <th class="text-center custom-thead" style="font-size: 16px">Tổng tiền</th>
                                    <th class="text-center custom-thead" style="font-size: 16px">Ngày sản xuất</th>
                                    <th class="text-center custom-thead" style="font-size: 16px">Ngày hết hạn</th>
                                    <th class="text-center custom-thead" style="font-size: 16px">
                                        <a href="javascript:void(0)" class="btn btn-success addRow">+</a>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        <select id="product_id" name="product_id[]" class="form-control product-select">
                                            <option>Chọn</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}"
                                                    data-sale-price="{{ $product->sale_price }}">
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
                                    <td><input type="text" name="price[]" id="price"
                                            class="form-control price"></td>
                                    <td style="width:120px"><input type="text" name="total_price[]"
                                            class="form-control total-price" style="width:100px" readonly></td>
                                    <td style="width:130px"><input type="date" name="ngaysx[]"
                                            class="form-control" style="width:130px">
                                        @error('ngaysx')
                                            <span class="help-block">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td style="width:130px"><input type="date" name="hansd[]"
                                            class="form-control" style="width:130px">
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
                    <script>
                        var rowIdx = 1;

                        function newRowContent(index) {
                            return `
        <tr>
            <td>
                <select name="product_id[]" class="form-control product-select">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" 
                                data-sale-price="{{ $product->sale_price }}">
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
            </td>
            <td><input type="number" name="quantity[]" class="form-control quantity" value="0" min="1" step="1"></td>
            <td><input type="text" name="price[]" class="form-control price"></td>
            <td><input type="text" name="total_price[]" class="form-control total-price" readonly></td>
            <td><input type="date" name="ngaysx[]" class="form-control" style="width:130px"></td>
            <td><input type="date" name="hansd[]" class="form-control" style="width:130px"></td>
            <td><a href="javascript:void(0)" class="btn btn-danger removeRow">-</a></td>
        </tr>
    `;
                        }

                        $(document).on('change', '.quantity, .price, select[name^="product_id"]', function() {
                            var row = $(this).closest('tr');
                            var quantity = parseFloat(row.find('.quantity').val());
                            var price = parseFloat(row.find('.price').val());

                            if (!isNaN(quantity) && !isNaN(price)) {
                                var totalPrice = quantity * price;
                                row.find('.total-price').val(totalPrice.toFixed(0)); // Display totalPrice with 0 decimal places
                            } else {
                                row.find('.total-price').val("Không");
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

                        $(document).on('change', '.quantity, .price, .product-select', function() {
                            updateGhiChu();
                        });

                        $(document).on('change', '.product-select', function() {
                            var row = $(this).closest('tr');
                            var selectedProduct = row.find('option:selected');
                            var price = parseFloat(selectedProduct.data('sale-price'));
                            row.find('.price').val(price);
                            updateTotalPrice(row);
                        });

                        function updateTotalPrice(row) {
                            var quantity = parseFloat(row.find('.quantity').val());
                            var price = parseFloat(row.find('.price').val());

                            if (!isNaN(quantity) && !isNaN(price)) {
                                var totalPrice = quantity * price;
                                row.find('.total-price').val(totalPrice.toFixed(0)); // Display totalPrice with 0 decimal places
                            } else {
                                row.find('.total-price').val("Không");
                            }
                        }

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
                </div>
            </div>
        </div>
    </div>
</section>



<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if (Session::has('success'))
    <script>
        swal({
            title: "Message",
            text: "{{ Session::get('success') }}",
            icon: "success",
            button: "OK",
            timer: 8000,
            dangerMode: false,
        });
    </script>
@endif


<script>
    document.addEventListener('DOMContentLoaded', function() {
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
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
