<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/AdminLTE.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/_all-skins.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/jquery-ui.css">
    <link rel="stylesheet" href="css/style.css" />
    <script src="{{ asset('assets') }}/js/angular.min.js"></script>
    <script src="{{ asset('assets') }}/js/app.js"></script>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    
    <link rel="icon" href="{{ asset('assets') }}/images/page_img.png" type="image/x-icon">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="{{ route('admin.index') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">Kho hàng</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">

                            <ul class="dropdown-menu">

                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="{{ asset('assets') }}/images/user2-160x160.jpg"
                                                        class="img-circle" alt="User Image">
                                                </div>

                                            </a>
                                        </li>

                                    </ul>
                                </li>

                            </ul>
                        </li>


                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('assets') }}/images/photo2.png" class="user-image" alt="User Image">
                                <span class="hidden-xs">Cài đặt</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ asset('assets') }}/images/photo2.png" class="img-circle"
                                        alt="User Image">
                                    <p>
                                    </p>
                                </li>

                                <li class="user-footer">

                                    <a>
                                        <form action="{{ route('logout') }}" method="POST" class="d-flex"
                                            role="search">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                style="margin-left:25px;color:white;background: rgb(4, 108, 236);width:150px;height:50px; border: none; padding: 0; cursor: pointer;">
                                                <span style="font-size: 15px">Đăng xuất</span>
                                            </button>

                                        </form>
                                    </a>
                                    <a href="{{ route('change') }}">
                                        <button type="submit"
                                            style="margin-left:25px;color:white;background: rgb(241, 103, 4);width:150px;height:50px; border: none; padding: 0; cursor: pointer;">
                                            <span style="font-size: 15px">Đổi mật khẩu</span>
                                        </button>
                                    </a>
                                    <a href="{{ route('register') }}">
                                        <button type="submit"
                                            style="margin-left:25px;color:white;background: rgb(17, 146, 45);width:150px;height:50px; border: none; padding: 0; cursor: pointer;">
                                            <span style="font-size: 15px">Thêm tài khoản</span>
                                        </button>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            @include('admin.layouts.menu')
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                @yield('content-header')
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                
            </body>
            </section>
            @yield('main-content')
        </div>
    </div>
    <!-- jQuery 3 -->
    <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery-ui.js"></script>
    <script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/js/adminlte.min.js"></script>
    <script src="{{ asset('assets') }}/js/dashboard.js"></script>
    <script src="{{ asset('assets') }}/js/function.js"></script>
    @yield('custom-js')
</body>

</html>
