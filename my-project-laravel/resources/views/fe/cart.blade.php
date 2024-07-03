@extends('fe.index')
@section('main')
<main class="main">
    <div class="container">
        <h1>Giỏ hàng</h1>

        <div class="row">
            <div class="col-lg-8">
                <div class="cart-table-container">
                    <table class="table table-cart">
                        <thead>
                            <tr>
                                <th class="thumbnail-col"></th>
                                <th class="product-col">Sản Phẩm</th>
                                <th class="price-col">Giá</th>
                                <th class="qty-col">Số lượng</th>
                                <th class="text-right">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($cart->list() as $key=>$value)
                        <tr class="product-row">
                            <td>
                                <figure class="product-image-container">
                                    <a href="product.html" class="product-image">
                                        <img src="{{asset('hinh_anh')}}/{{$value['image']}}" alt="product" width="90px">
                                    </a>
                                    <a href="#" class="btn-remove icon-cancel" title="Remove Product"></a>
                                </figure>
                            </td>
                            <td class="product-col">
                                <h5 class="product-title">
                                    <a href="product.html">{{$value['name']}}</a>
                                </h5>
                            </td>
                            <td>{{number_format($value['price'])}}</td>
                            <td>
                                <div class="product-single-qty">
                                    <!-- Kiểm tra xem đã có số lượng được chọn từ trang detail hay chưa -->
                                    @php
                                        $selectedQuantity = isset($value['selected_quantity']) ? $value['selected_quantity'] : $value['quantity'];
                                    @endphp
                                    <input class="horizontal-quantity form-control" type="text" value="{{$selectedQuantity}}">
                                </div><!-- End .product-single-qty -->
                            </td>
                            <td class="text-right"><span class="subtotal-price">{{number_format($value['price'] * $selectedQuantity)}}</span></td>
                        </tr>
                        
                        @endforeach
                           
                        </tbody>


                        <tfoot>
                            <tr>
                                <td colspan="5" class="clearfix">
                                    <div class="float-left">
                                        <div class="cart-discount">
                                            <form action="#">
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm"
                                                        placeholder="Nhập mã" required>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-sm" type="submit">Áp dụng mã giảm giá
                                                            </button>
                                                    </div>
                                                </div><!-- End .input-group -->
                                            </form>
                                        </div>
                                    </div><!-- End .float-left -->

                                    <div class="float-right">
                                        <button type="submit" class="btn btn-shop btn-update-cart">
                                            Cập nhật giỏ hàng
                                        </button>
                                    </div><!-- End .float-right -->
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- End .cart-table-container -->
            </div><!-- End .col-lg-8 -->

            <div class="col-lg-4">
                <div class="cart-summary">
                    <h3>Giỏ hàng</h3>

                    <table class="table table-totals">
                        <tbody>
                           

                            <tr>
                                <td colspan="2" class="text-left">
                                    <h4>Vận chuyển</h4>

                                    <div class="form-group form-group-custom-control">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" name="radio"
                                                checked>
                                            <label class="custom-control-label">Nhận hàng tận nơi</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-group -->

                                    <div class="form-group form-group-custom-control mb-0">
                                        <div class="custom-control custom-radio mb-0">
                                            <input type="radio" name="radio" class="custom-control-input">
                                            <label class="custom-control-label">Vận chuyển</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-group -->

                                    <form action="#">
                                        <div class="form-group form-group-sm">
                                            <label>Vận chuyển đến  <strong></strong></label>
                                            <div class="select-custom">
                                                <select class="form-control form-control-sm">
                                                    <option value="USA">Việt Nam</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="China">China</option>
                                                    <option value="Germany">Germany</option>
                                                </select>
                                            </div><!-- End .select-custom -->
                                        </div><!-- End .form-group -->

                                        <div class="form-group form-group-sm">
                                            <div class="select-custom">
                                                <select class="form-control form-control-sm">
                                                    <option value="NY">Tiền Giang</option>
                                                    <option value="CA">California</option>
                                                    <option value="TX">Texas</option>
                                                </select>
                                            </div><!-- End .select-custom -->
                                        </div><!-- End .form-group -->

                                        <div class="form-group form-group-sm">
                                            <input type="text" class="form-control form-control-sm"
                                                placeholder="Thành phố/ Tỉnh">
                                        </div><!-- End .form-group -->

                                        <div class="form-group form-group-sm">
                                            <input type="text" class="form-control form-control-sm"
                                                placeholder="xã/huyện">
                                        </div><!-- End .form-group -->

                                        <button type="submit" class="btn btn-shop btn-update-total">
                                            Cập nhật thành tiền
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>

                        <tfoot>
                            <tr>
                                <td>Tổng cộng</td>
                                <td>{{number_format($cart->getTotalPrice())}}</td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="checkout-methods">
                        <a href="cart.html" class="btn btn-block btn-dark">Tiến hành thanh toán
                            <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div><!-- End .cart-summary -->
            </div><!-- End .col-lg-4 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-6"></div><!-- margin -->
</main><!-- End .main -->
@endsection
