{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        
        {{-- <img src="{{asset('assets')}}/images/th.jfif" class="img-circle" alt="User Image"> --}}
      </div>
      <div class="pull-left info">
        <p>--</p>
        {{-- <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
          @csrf
          @method('DELETE')
          <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
              <img src="{{ asset('assets/images/logout.png') }}" width="20px" style="background: rgb(128, 126, 132)" alt="Logout">
              <span style="font-size: 10px">Đăng xuất</span>
          </button>
      </form> --}}
      
        {{-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> --}}
      </div>
    </div>
    <!-- search form -->
    {{-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form> --}}
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->

    <ul class="sidebar-menu" data-widget="tree">
      {{-- <li>
        <a href="{{route('admin.index')}}">
          <i class="fa fa-home" style="font-size: 20px"></i> <span>Trang chủ</span>
          <span class="pull-right-container">
         
          </span>
        </a>
        
      </li> --}}
      <li class="treeview">
        <a href="#">
          <i class="fa fa-download" style="font-size: 20px"></i> <span>Quản lý Nhập hàng </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">@php
          $id = 1; // Ví dụ: gán giá trị cho biến $id
      @endphp
          <li><a href="{{ route('nhap.index') }}"><i class="fa fa-cart-plus" style="font-size: 15px"></i>Xem đơn nhập</a></li>
          {{-- , ['id' => $id] --}}
          
          <li><a href="{{ route('nhaphanghoa.create') }}"><i class="fa fa-gift" style="font-size: 15px"></i>Tạo đơn nhập</a></li>
          <li><a href="{{route('nhap.list')}}"><i class="fa fa-gift" style="font-size: 15px"></i> Sản phẩm đã nhập </a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-truck" style="font-size: 20px"></i> <span>Quản lý Xuất hàng </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('xuat.index')}}"><i class="fa fa-send" style="font-size: 15px"></i>Xem đơn xuất</a></li>
          <li><a href="{{ route('xuathanghoa.create') }}"><i class="fa fa-gift" style="font-size: 15px"></i>Tạo đơn xuất</a></li>
          <li><a href="{{route('xuat.list')}}"><i class="fa fa-gift" style="font-size: 15px"></i> Sản phẩm đã xuất </a></li>
        </ul>
      </li>
      <li>
        <a href="{{route('khohang.index')}}">
          <i class="fa fa-archive" style="font-size: 20px"></i> <span>Kho hàng</span>
          <span class="pull-right-container">
         
          </span>
        </a>
        
      </li>
      <li>
        <a href="{{route('nhacungcap.index')}}">
          <i class="fa fa-archive" style="font-size: 20px"></i> <span> Nhà cung cấp</span>
          <span class="pull-right-container">
         
          </span>
        </a>
        
      </li>
      {{-- <li>
        <a href="{{route('xuat.barcode')}}">
          <i class="fa fa-th"></i> <span>Quét mã vạch</span>
          <span class="pull-right-container">
         
          </span>
        </a>
        
      </li> --}}
      
      <li>
        <a href="{{route('category.index')}}">
          <i class="fa fa-navicon" style="font-size: 20px"></i> <span>Quản lý danh mục </span>
          <span class="pull-right-container">
         
          </span>
        </a>
        
      </li>
      <li>
        <a href="{{route('thongke.doanhthu')}}">
          <i class="fa fa-pie-chart" style="font-size: 20px"></i> <span>Thống kê </span>
          <span class="pull-right-container">
         
          </span>
        </a>
        
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-th" style="font-size: 20px"></i> <span>Quản lý sản phẩm </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('product.create')}}"><i class="fa fa-plus-square" style="font-size: 15px"></i> Thêm mới sản phẩm </a></li>
          <li><a href="{{route('product.index')}}"><i class="fa fa-cubes" style="font-size: 15px"></i> Danh sách sản phẩm </a></li>
        </ul>
      </li>
     
    </ul>
  </section>
  <!-- /.sidebar -->