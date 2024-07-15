<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<section class="sidebar">
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ asset('assets') }}/images/th.jfif" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>--</p>
        </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
        <li>
            <a href="{{ route('admin.index') }}">
                <i class="fa fa-th"></i> <span>Trang chủ</span>
                <span class="pull-right-container">
                </span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Quản lý Nhập hàng </span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('nhap.index') }}"><i class="fa fa-circle-o"></i> Nhập hàng </a></li>
                <li><a href="{{ route('nhap.list') }}"><i class="fa fa-circle-o"></i> Sản phẩm đã nhập </a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Quản lý Xuất hàng </span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('xuat.index') }}"><i class="fa fa-circle-o"></i> Xuất hàng </a></li>
                <li><a href="{{ route('xuat.list') }}"><i class="fa fa-circle-o"></i> Sản phẩm đã xuất </a></li>
            </ul>
        </li>
        <li>
            <a href="{{ route('khohang.index') }}">
                <i class="fa fa-th"></i> <span>Kho hàng</span>
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
            <a href="{{ route('category.index') }}">
                <i class="fa fa-th"></i> <span>Quản lý danh mục </span>
                <span class="pull-right-container">
                </span>
            </a>

        </li>
        <li>
            <a href="{{ route('thongke.doanhthu') }}">
                <i class="fa fa-th"></i> <span>Thống kê </span>
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
      <!-- <li>
       
          <i class="fa fa-th"></i> <span>Quản lí Ảnh trang chủ</span>
         
        </a>
      </li>
      
      <li>
        
          <i class="fa fa-th"></i> <span>Quản lí banner</span>
         
        </a>
      </li>
      
      <li>
        
          <i class="fa fa-th"></i> <span>Thống kê</span>
         
        </a>
      </li> -->
>>>>>>> 7b6cc381869617cc25a5dfdd6449dfbd9ca22767
    </ul>
</section>
