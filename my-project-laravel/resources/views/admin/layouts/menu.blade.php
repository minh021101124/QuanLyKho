<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('assets')}}/images/danh.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Danh PC</p>
          
          
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      {{-- <a href="{{route('register')}}"><button style="background: rgb(222, 60, 32);width:130px;height:35px;margin-left:15px;"> Đổi mật khẩu</button></a> --}}
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">

        <li>
          <a href="{{route('category.index')}}">
            <i class="fa fa-th"></i> <span>Quản lý Danh mục</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">FE</small>
            </span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Quản lý sản phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('product.index')}}"><i class="fa fa-circle-o"></i> Danh sách sản phẩm</a></li>
            <li><a href="{{route('product.create')}}"><i class="fa fa-circle-o"></i> Thêm mới sản phẩm</a></li>
          </ul>
        </li>
        
        <li>
          <a href="">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">Hot</small>
            </span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>