@extends('admin.master')
@section('main-content')

<section class="content">
    
<h3>Tạo mới đơn nhập hàng</h3>

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
                    <input type="text" name="noi_dung_nhap" id="noi_dung_nhap" class="form-control">
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
                    <textarea name="ghi_chu" id="ghi_chu" class="form-control" rows="3"></textarea>
                    @error('ghi_chu')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-2">
                <div class="form-group @error('product') has-error @enderror">
                    <label for="product">Sản phẩm</label>
                    <select name="product_id" id="product-dropdown" class="form-control">
                        <option value="">Chọn sản phẩm</option>
                        @foreach($products as $prod)
                            <option value="{{ $prod->id }}">{{ $prod->name }}</option>
                        @endforeach
                    </select>
                    @error('product')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            {{-- <div class="col-md-2">
                <div class="form-group @error('ncc') has-error @enderror">
                    <label for="ncc">Nhà cung cấp</label>
                    <select name="ncc_id" id="ncc" class="form-control">
                        <option value="">Chọn NCC</option>
                        @foreach($nccs as $ncc)
                            <option value="{{ $ncc->id }}">{{ $ncc->name }}</option>
                        @endforeach
                    </select>
                    @error('ncc')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
            </div> --}}
            <div class="col-md-2">
                <div class="form-group @error('quantity') has-error @enderror">
                    <label for="quantity">Số lượng</label>
                    <input type="number" name="quantity" id="quantity" min="1" max="100" class="form-control">
                    @error('quantity')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group @error('price') has-error @enderror">
                    <label for="don_gia">Đơn giá</label>
                    <input type="text" name="price" id="product-price" class="form-control" readonly>
                    @error('don_gia')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="tong_tien">Tổng tiền</label>
                    <input type="text" id="tong_tien" name="total_price" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group @error('ngaysx') has-error @enderror">
                    <label for="ngaysx">Ngày sản xuất</label>
                    <input type="date" name="ngaysx" id="ngaysx" class="form-control">
                    @error('ngaysx')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group @error('hansudung') has-error @enderror">
                    <label for="hansudung">Ngày hết hạn</label>
                    <input type="date" name="hansd" id="hansudung" class="form-control">
                    @error('hansudung')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    
    <button type="submit" class="btn btn-success" style="width:100px;margin-left:1%">Lưu</button>
    <a href="{{ route('nhap.index') }}" class="btn btn-danger" style="margin-left:0; margin-top:0;width:100px;">Hủy</a>
</form>


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
    
</section>
@endsection