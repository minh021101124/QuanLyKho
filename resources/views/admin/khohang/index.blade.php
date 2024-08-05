@extends('admin.master')
@section('main-content')
@section('title','Kho hàng')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
{{-- --}}
<style>

    .container1 {
        max-width: 1150px;
        margin: 0px auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        display: flex;
        
       
    }
    h1 {
        font-size: 38px;
        margin-bottom: 20px;
        color: #333;
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; 'Arial Narrow Bold', sans-serif;
    }
    
    .box {
        padding: 10px;
        border: 2px solid rgb(147, 148, 150);
        box-sizing: border-box; 
    }
    .box1 {
        width: 50%; 
        height: 100%; /* Height of the first div */
    }
    .box2 {
        margin-left: 20px;
        width: 40%; 
        height: 100%; 
    }
   
</style>
<style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    
    tr:nth-child(even) {
      background-color: #;
    }
    </style>
<style>
    body {font-family: Arial;}
    
    /* Style the tab */
    .tab {
      overflow: hidden;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
    }
    
    /* Style the buttons inside the tab */
    .tab button {
      background-color: inherit;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 16px;
      transition: 0.3s;
      font-size: 17px;
    }
    
    /* Change background color of buttons on hover */
    .tab button:hover {
      background-color: #ddd;
    }
    
    /* Create an active/current tablink class */
    .tab button.active {
      background-color: #ccc;
    }
    
    /* Style the tab content */
    .tabcontent {
      display: none;
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-top: none;
    }
    </style>
<section class="content">
    <span style="font-size:28px;font-weight:500;margin-left:400px">KHO HÀNG</span>
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Tồn kho</button>
        <button class="tablinks" onclick="openCity(event, 'Paris')">Nhập</button>
        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Xuất</button>
      </div>
      <div id="London" class="tabcontent">
       
        <h3 style="text-align: center;font-weight:600">Tồn kho  </h3>
        <span style="font-size: 20px;margin-left:80%;color:red"> Hàng tồn: {{$demtongton}}</span>
        <div class="table-container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width:30px">STT</th>
                        <th style="width:60px">Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th style="width:60px">Số lượng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($demtongsp as $item)
                    <tr>
                        <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
                        <td>
                
                            <img src="{{asset('images')}}/{{$item->image}}" alt="" width=40px height="40px">
        
                        </td>
                        <td style="vertical-align: middle;">{{ $item->name }}</td>
                        <td style="vertical-align: middle;">
                            @if($item->quantity == 0)
                                Đã hết
                            @elseif($item->quantity < 3)
                                Sắp hết hàng ({{ $item->quantity }})
                            @else
                                {{ $item->quantity }}
                            @endif
                        </td>                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
      </div>
      
      <div id="Paris" class="tabcontent">
       
        <h3 style="text-align: center;font-weight:600">Sản phẩm đã nhập</h3>

        <span style="font-size: 20px;margin-left:80%;color:red"> Tổng nhập : {{$demtongspnhap}}</span>
            <div class="table-container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width:30px">STT</th>
                                <th style="width:60px">Ảnh</th>
                                <th>Tên sản phẩm</th>                         
                                
                                <th style="width:115px">Ngày sản xuất</th>
                                <th style="width:115px"> Ngày hết hạn</th>
                                <th style="width:60px">Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nhapchitiet as $item)
                                <tr>
                                    <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
                                    <td>                       
                                        <img src="{{asset('images')}}/{{$item->product->image}}" alt="" width=40px height="40px">              
                                    </td>
                                    <td style="vertical-align: middle;">{{ $item->product->name }}</td>
                                    
                                    <td style="vertical-align: middle;">{{ \Carbon\Carbon::parse($item->ngaysx)->format('d/m/Y') }}</td>
                                    <td style="vertical-align: middle;">{{ \Carbon\Carbon::parse($item->hansd)->format('d/m/Y') }}</td>
                                    <td style="vertical-align: middle;text-align:center">{{ $item->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
            </div>
      </div>
      
      <div id="Tokyo" class="tabcontent">
        
        <h3 style="text-align: center;font-weight:600">Sản phẩm đã xuất  </h3>
        <span style="font-size: 20px;margin-left:80%;color:red"> Tổng xuất : {{$demtongspxuat}}</span>
            <div class="table-container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width:30px">STT</th>
                                <th style="width:60px">Ảnh</th>
                                <th>Tên sản phẩm</th>                         
                                
                                <th style="width:115px">Ngày sản xuất</th>
                                <th style="width:115px">Ngày hết hạn</th>
                                <th style="width:60px">Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($xuatchitiet as $item)
                                <tr>
                                    <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
                                    <td>                       
                                        <img src="{{asset('images')}}/{{$item->product->image}}" alt="" width=40px height="40px">              
                                    </td>
                                    <td style="vertical-align: middle;">{{ $item->product->name }}</td>
                                   
                                    <td style="vertical-align: middle;">{{ \Carbon\Carbon::parse($item->ngaysx)->format('d/m/Y') }}</td>
                                    <td style="vertical-align: middle;">{{ \Carbon\Carbon::parse($item->hansd)->format('d/m/Y') }}</td>
                                    <td style="vertical-align: middle;text-align:center">{{ $item->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div> 
      </div>
</section>
      <script>
        function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }
        
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
        </script>
</div>
    
    {{-- {{ $nhapchitiet->links() }} --}}
    </div>
  


@endsection



