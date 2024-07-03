<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Mar 2024 13:26:56 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Hệ Thống Máy Tính TMoblie</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('fe-asset')}}/assets/images/icons/favicon.png">


    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700', 'Poppins:300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800', 'Playfair+Display:900', 'Shadows+Into+Light:400']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = '{{asset('fe-asset')}}/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('fe-asset')}}/assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('fe-asset')}}/assets/css/demo1.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('fe-asset')}}/assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('fe-asset')}}/assets/vendor/simple-line-icons/css/simple-line-icons.min.css">
</head>

<body>
    <div class="page-wrapper">
        
        <!-- End .top-notice -->

        <header class="header home">
            <div class="header-top bg-primary text-uppercase">
                <div class="container">
                    
                    <!-- End .header-left -->

                    <div class="header-right header-dropdowns ml-0 ml-sm-auto">
                        <p class="top-message mb-0 d-none d-sm-block">Chào mừng đến với TMoblie</p>
                        <div class="header-dropdown dropdown-expanded mr-3">
                            <a href="#">Links</a>
                            <div class="header-menu">
                                <ul>
                                    {{-- <li><a href="dashboard.html">My Account</a></li>
                                    <li><a href="demo1-contact.html">Contact Us</a></li>
                                    <li><a href="wishlist.html">My Wishlist</a></li>
                                    <li><a href="#">Site Map</a></li>
                                    <li><a href="cart.html">Cart</a></li> --}}
                                    <li><a href="{{route('logout')}}" >Đăng xuất </a></li>
                                </ul>
                            </div>
                            <!-- End .header-menu -->
                        </div>
                        <!-- End .header-dropown -->

                        <span class="separator"></span>

                        <div class="social-icons">
                            <a href="https://www.facebook.com/profile.php?id=100078936511659&mibextid=ZbWKwL" class="social-icon social-facebook icon-facebook ml-0" target="_blank"></a>
                           
                            <a href="http://www.discardless.eu/twitter.com/logine034.html?lang=vi" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                        </div>
                        <!-- End .social-icons -->
                    </div>
                    <!-- End .header-right -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .header-top -->

            <div class="header-middle text-dark sticky-header">
                <div class="container">
                    <div class="header-left col-lg-2 w-auto pl-0">
                        <button class="mobile-menu-toggler mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="pull-left image">
                            <a href="{{route('index')}}">
                            <img src="{{asset('assets')}}/images/logodanh.jpg" class="img-circle" alt="User Image" style="width: 100%;">
                            </a>
                        </div>
                        
                    </div>
                    <!-- End .header-left -->

                    <div class="header-right w-lg-max pl-2">
                        <div class="header-search header-icon header-search-inline header-search-category w-lg-max">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Tìm kiếm..." required>
                                    <div class="select-custom">
                                     
                                    </div>
                                    <!-- End .select-custom -->
                                    <button class="btn icon-magnifier" type="submit"></button>
                                </div>
                                <!-- End .header-search-wrapper -->
                            </form>
                        </div>
                        <!-- End .header-search -->

                        <div class="header-contact d-none d-lg-flex align-items-center pr-xl-5 mr-5 mr-xl-3 ml-5">
                            <i class="icon-phone-2"></i>
                            <h6 class="pt-1 line-height-1">hotline:<a href="tel:#" class="d-block text-dark ls-10 pt-1">0394312345</a></h6>
                        </div>
                        <!-- End .header-contact -->

                        @if(Auth::check())
                            <a href="" class="header-icon header-icon-user"><i class="icon-user-2"></i>{{Auth::user()->name}}</a>
                        @else
                        <a href="{{route('login')}}" class="header-icon header-icon-user"><i class="icon-user-2"></i>Đăng nhập</a>
                        @endif
                        <a href="wishlist.html" class="header-icon"><i class="icon-wishlist-2"></i></a>

                        <div class="dropdown cart-dropdown">
                            <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="minicart-icon"></i>
                                <span class="cart-count badge-circle">{{$cart->getTotalQuantity()}}</span>
                            </a>

                            <div class="cart-overlay"></div>

                            <div class="dropdown-menu mobile-cart">
                                <a href="#" title="Close (Esc)" class="btn-close">×</a>

                                <div class="dropdownmenu-wrapper custom-scrollbar">
                                    <div class="dropdown-cart-header">Giỏ hàng </div>
                                    <!-- End .dropdown-cart-header -->

                                    <div class="dropdown-cart-products">
                                        
                                        <!-- End .product -->

                                       
                                        <!-- End .product -->

                                        
                                        <!-- End .product -->
                                    </div>
                                    <!-- End .cart-product -->

                                    
                                    <!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        <a href="{{route('cart.index')}}" class="btn btn-gray btn-block view-cart">Chi tiết giỏ hàng
                                            </a>
                                        <a href="checkout.html" class="btn btn-dark btn-block">Thanh toán</a>
                                    </div>
                                    <!-- End .dropdown-cart-total -->
                                </div>
                                <!-- End .dropdownmenu-wrapper -->
                            </div>
                            <!-- End .dropdown-menu -->
                        </div>
                        <!-- End .dropdown -->
                    </div>
                    <!-- End .header-right -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .header-middle -->
        </header>
        <!-- End .header -->

        @yield('main')
        <!-- End .main -->

        <footer class="footer bg-dark position-relative">
            <div class="footer-middle">
                <div class="container position-static">
                    <div class="footer-ribbon">Liên hệ với chúng tôi</div>
        
                    <div class="row">
                        <!-- Cột 1 -->
                        <div class="col-lg-4 col-sm-12">
                            <div class="widget">
                                <h4 class="widget-title">Về chúng tôi</h4>
                                <div class="pull-left image">
                                    <a href="{{route('index')}}">
                                        <img src="{{asset('assets')}}/images/logodanh.jpg" class="img-circle" alt="User Image" style="width: 90%;">
                                    </a>
                                </div>
                                <p class="m-b-4">TMoblie là một trong những cửa hàng kinh doanh về lĩnh vực máy tính, linh kiện. Nơi đặt niềm tin và trao đi chất lượng về dịch vụ và sản phẩm.</p>
                                <a href="#" class="read-more text-white">Đọc thêm...</a>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End Cột 1 -->
        
                        <!-- Cột 2 -->
                        <div class="col-lg-4 col-sm-12">
                            <div class="widget mb-2">
                                <h4 class="widget-title mb-1 pb-1">Thông tin liên hệ</h4>
                                <ul class="contact-info m-b-4">
                                    <li>
                                        <span class="contact-info-label">Địa chỉ:</span>123 Đường Ấp Bắc, TP Mỹ Tho, Tiền Giang
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Điện thoại:</span><a href="tel:">0394312345</a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Email:</span> <a href="https://accounts.google.com/v3/signin/identifier?service=mail&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&flowName=GlifWebSignIn&flowEntry=AccountChooser&ec=asw-gmail-globalnav-signin&ddm=0"><span class="__cf_email__" data-cfemail="365b575f5a76534e575b465a531855595b">[danh021101075@tgu.edu.vn]</span></a>
                                    </li>
                                    <li>
                                        <span class="contact-info-label">Giờ làm việc:</span> Thứ hai - Chủ nhật / 9:00 AM - 8:00 PM
                                    </li>
                                </ul>
                                <div class="social-icons">
                                    <a href="https://www.facebook.com/profile.php?id=100078936511659&mibextid=ZbWKwL" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                                    <a href="http://www.discardless.eu/twitter.com/logine034.html?lang=vi" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                                </div>
                                <!-- End .social-icons -->
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End Cột 2 -->
        
                        <!-- Cột 3 -->
                        <div class="col-lg-4 col-sm-12">
                            <div class="widget">
                                <h4 class="widget-title pb-1">Dịch vụ khách hàng</h4>
                                <ul class="links">
                                    <li><a href="">Trợ giúp & Câu hỏi thường gặp</a></li>
                                    <li><a href="">Theo dõi đơn hàng</a></li>
                                    <li><a href="">Vận chuyển & Giao hàng</a></li>
                                    <li><a href="">Lịch sử đơn hàng</a></li>
                                    <li><a href="">Tìm kiếm nâng cao</a></li>
                                    <li><a href="demo1-about.html">Về chúng tôi</a></li>
                                </ul>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End Cột 3 -->
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .footer-middle -->
        
            <div class="container">
                <div class="footer-bottom d-sm-flex align-items-center">
                    <div class="footer-left">
                        <span class="footer-copyright">©TMoblie. 2024. Bản quyền đã được đăng ký</span>
                    </div>
        
                    <div class="footer-right ml-auto mt-1 mt-sm-0">
                        <div class="payment-icons">
                            <span class="payment-icon visa" style="background-image: url({{asset('fe-asset')}}/assets/images/payments/payment-visa.svg)"></span>
                            <span class="payment-icon paypal" style="background-image: url({{asset('fe-asset')}}/assets/images/payments/payment-paypal.svg)"></span>
                            <span class="payment-icon stripe" style="background-image: url({{asset('fe-asset')}}/assets/images/payments/payment-stripe.png)"></span>
                            <span class="payment-icon verisign" style="background-image:  url({{asset('fe-asset')}}/assets/images/payments/payment-verisign.svg)"></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .footer-bottom -->
        </footer>
        
        
        <!-- End .footer -->
    </div>
    <!-- End .page-wrapper -->

    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div class="mobile-menu-overlay"></div>
    <!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu menu-with-icon">
                    <li><a href="demo1.html"><i class="icon-home"></i>Home</a></li>
                    <li>
                        <a href="demo1-shop.html" class="sf-with-ul"><i class="sicon-badge"></i>Categories</a>
                        <ul>
                            <li><a href="category.html">Full Width Banner</a></li>
                            <li><a href="category-banner-boxed-slider.html">Boxed Slider Banner</a></li>
                            <li><a href="category-banner-boxed-image.html">Boxed Image Banner</a></li>
                            <li><a href="https://www.portotheme.com/html/porto_ecommerce/category-sidebar-left.html">Left Sidebar</a></li>
                            <li><a href="category-sidebar-right.html">Right Sidebar</a></li>
                            <li><a href="category-off-canvas.html">Off Canvas Filter</a></li>
                            <li><a href="category-horizontal-filter1.html">Horizontal Filter 1</a></li>
                            <li><a href="category-horizontal-filter2.html">Horizontal Filter 2</a></li>
                            <li><a href="#">List Types</a></li>
                            <li><a href="category-infinite-scroll.html">Ajax Infinite Scroll<span
                                        class="tip tip-new">New</span></a></li>
                            <li><a href="category.html">3 Columns Products</a></li>
                            <li><a href="category-4col.html">4 Columns Products</a></li>
                            <li><a href="category-5col.html">5 Columns Products</a></li>
                            <li><a href="category-6col.html">6 Columns Products</a></li>
                            <li><a href="category-7col.html">7 Columns Products</a></li>
                            <li><a href="category-8col.html">8 Columns Products</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="demo1-product.html" class="sf-with-ul"><i class="sicon-basket"></i>Products</a>
                        <ul>
                            <li>
                                <a href="#" class="nolink">PRODUCT PAGES</a>
                                <ul>
                                    <li><a href="product.html">SIMPLE PRODUCT</a></li>
                                    <li><a href="product-variable.html">VARIABLE PRODUCT</a></li>
                                    <li><a href="product.html">SALE PRODUCT</a></li>
                                    <li><a href="product.html">FEATURED & ON SALE</a></li>
                                    <li><a href="product-sticky-info.html">WIDTH CUSTOM TAB</a></li>
                                    <li><a href="product-sidebar-left.html">WITH LEFT SIDEBAR</a></li>
                                    <li><a href="product-sidebar-right.html">WITH RIGHT SIDEBAR</a></li>
                                    <li><a href="product-addcart-sticky.html">ADD CART STICKY</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="nolink">PRODUCT LAYOUTS</a>
                                <ul>
                                    <li><a href="product-extended-layout.html">EXTENDED LAYOUT</a></li>
                                    <li><a href="product-grid-layout.html">GRID IMAGE</a></li>
                                    <li><a href="product-full-width.html">FULL WIDTH LAYOUT</a></li>
                                    <li><a href="product-sticky-info.html">STICKY INFO</a></li>
                                    <li><a href="product-sticky-both.html">LEFT & RIGHT STICKY</a></li>
                                    <li><a href="product-transparent-image.html">TRANSPARENT IMAGE</a></li>
                                    <li><a href="product-center-vertical.html">CENTER VERTICAL</a></li>
                                    <li><a href="#">BUILD YOUR OWN</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="sf-with-ul"><i class="sicon-envelope"></i>Pages</a>
                        <ul>
                            <li>
                                <a href="wishlist.html">Wishlist</a>
                            </li>
                            <li>
                                <a href="cart.html">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="checkout.html">Checkout</a>
                            </li>
                            <li>
                                <a href="dashboard.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="login.html">Login</a>
                            </li>
                            <li>
                                <a href="forgot-password.html">Forgot Password</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="blog.html"><i class="sicon-book-open"></i>Blog</a></li>
                    <li><a href="demo1-about.html"><i class="sicon-users"></i>About Us</a></li>
                </ul>

                <ul class="mobile-menu menu-with-icon mt-2 mb-2">
                    <li class="border-0">
                        <a href="#" target="_blank"><i class="sicon-star"></i>Buy Porto!<span
                                class="tip tip-hot">Hot</span></a>
                    </li>
                </ul>

                <ul class="mobile-menu">
                    <li><a href="login.html">My Account</a></li>
                    <li><a href="demo1-contact.html">Contact Us</a></li>
                    <li><a href="wishlist.html">My Wishlist</a></li>
                    <li><a href="#">Site Map</a></li>
                    <li><a href="cart.html">Cart</a></li>
                    <li><a href="login.html" class="login-link">Log In</a></li>
                </ul>
            </nav>
            <!-- End .mobile-nav -->

            <form class="search-wrapper mb-2" action="#">
                <input type="text" class="form-control mb-0" placeholder="Search..." required />
                <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
            </form>

            <div class="social-icons">
                <a href="#" class="social-icon social-facebook icon-facebook" target="_blank">
                </a>
                <a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
                </a>
                <a href="#" class="social-icon social-instagram icon-instagram" target="_blank">
                </a>
            </div>
        </div>
        <!-- End .mobile-menu-wrapper -->
    </div>
    <!-- End .mobile-menu-container -->

    <div class="sticky-navbar">
        <div class="sticky-info">
            <a href="demo1.html">
                <i class="icon-home"></i>Home
            </a>
        </div>
        <div class="sticky-info">
            <a href="demo1-shop.html" class="">
                <i class="icon-bars"></i>Categories
            </a>
        </div>
        <div class="sticky-info">
            <a href="wishlist.html" class="">
                <i class="icon-wishlist-2"></i>Wishlist
            </a>
        </div>
        <div class="sticky-info">
            <a href="login.html" class="">
                <i class="icon-user-2"></i>Account
            </a>
        </div>
        <div class="sticky-info">
            <a href="cart.html" class="">
                <i class="icon-shopping-cart position-relative">
                    <span class="cart-count badge-circle">{{$cart->getTotalQuantity()}}</span>
                </i>Cart
            </a>
        </div>
    </div>

   
    <!-- End .newsletter-popup -->

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{asset('fe-asset')}}/assets/js/jquery.min.js"></script>
    <script src="{{asset('fe-asset')}}/assets/js/plugins.min.js"></script>
    <script src="{{asset('fe-asset')}}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('fe-asset')}}/assets/js/jquery.appear.min.js"></script>
    <script src="{{asset('fe-asset')}}/assets/js/jquery.plugin.min.js"></script>
    <script src="{{asset('fe-asset')}}/assets/js/jquery.countdown.min.js"></script>

    <!-- Main JS File -->
    <script src="{{asset('fe-asset')}}/assets/js/main.min.js"></script>
</body>


<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Mar 2024 13:27:28 GMT -->
</html>