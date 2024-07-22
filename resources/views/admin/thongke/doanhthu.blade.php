@extends('admin.master')

@section('title', 'Thống kê')

@section('main-content')
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
            border: 2px solid rgb(255, 255, 255);
            height: 100px;
            padding: 10px;
            margin: 2px;
        }

        .box2 {
            border: 2px solid rgb(255, 255, 255);
            margin-left: 0px;
            width: 40%;
            height: 100px;
            padding: 10px;
            margin: 2px;
        }

        .table-container {
            max-height: 245px;
            /* Adjust height as needed */
            overflow-y: auto;
            /* Vertical scrollbar will appear if content exceeds max-height */
            border: 1px solid #ddd;
            /* Optional: add a border around the table */
            padding: 0 10px;
            /* Optional: add some padding inside the container */
            width: 100%;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table th {
            background-color: #1285f1;
            text-align: left; color: #ffffff;
            position: -webkit-sticky;
            /* For Safari */
            position: sticky;
            top: 0;
            /* Stick to the top of the container */
            z-index: 2;
            /* Ensures header stays above the body content */
        }
    </style>

    {{-- <div class="container1" style="margin-bottom:1%; ">
        <h1 style="font-weight:700">THỐNG KÊ</h1>
    </div> --}}

    <div class="container1">

        <div class="box1" style="background: #107715;color:#ffffff">
            <h3 style="font-weight:600 ;" >Nhập</h3>
            <p>
            <h4>Tổng nhập: {{ number_format($tong) }}đ</h4>
            </p>
        </div>
        <div class="box2" style="background: #d16105;color:#ffffff">
            <h3 style="font-weight:600 ;"> Xuất</h3>
            <p>
            <h4>Tổng xuất: {{ number_format($tongx) }}đ</h4>
            </p>
        </div>
        <div class="box1" style="background: #cd0404;color:#ffffff">
            <h3 style="font-weight:600 ;">Lợi nhuận</h3>
            <p>
            <h4>Tổng lợi nhuận</h4>
            </p>
        </div>

    </div>
    <div class="container1">
        <div class="container">
            <div class="row"> <!-- Start row to contain columns -->
                <div class="col-md-12" style="background: rgb(255, 255, 255); ">

                    <form action="{{ route('thongke.filter') }}" method="POST">
                        @csrf
                        <table class="table" style="border: none;">
                            <tr>
                                <td style="width:105px;text-align: center; vertical-align: middle;border: none;font-weight:600">
                                    Bắt đầu:
                                </td>
                                <td style="width:120px;border: none;">
                                    <input type="date" name="start_date" class="form-control" data-date="" data-date-format="DD/MM/YYYY"
                                        style="width:120px" value="{{ old('start_date', $startDate ?? '') }}" required>
                                </td>
                                <td style="width:106px;text-align: center; vertical-align: middle;border: none;font-weight:600">
                                    Kết thúc:
                                </td>
                                <td style="width:120px;border: none;">
                                    <input type="date" name="end_date" class="form-control" data-date="" data-date-format="DD/MM/YYYY"
                                        style="width:120px" value="{{ old('end_date', $endDate ?? '') }}" required>
                                </td>
                                <td style="border: none;">
                                    <button type="submit" class="btn btn-primary" style="width:70px">Lọc</button>
                                </td>
                            </tr>
                        </table>
                        {{-- @php
                        use Carbon\Carbon;
                        $formattedStartDate = Carbon::parse($startDate)->format('d/m/Y');
                        $formattedEndDate = Carbon::parse($endDate)->format('d/m/Y');
                    @endphp --}}
                        @if (isset($totalRevenue))
                       
                    
                    <h4>Doanh thu {{ number_format($totalRevenue, 0, ',', '.') }} VND</h4>
                       
                        @endif
                       
                       
                    </form>

                </div>
            </div>

        </div>

                <div class="col-md-12" style="background: rgb(255, 255, 255); ">
                    @if (isset($totalRevenue))
                        {{-- Doanh Thu Tổng: {{ number_format($totalRevenue, 0, ',', '.') }} VND
                        <h5>Từ ngày : {{ $startDate }} đến ngày : {{ $endDate }}</h5> --}}
                        <div class="table-container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ngày xuất</th>
                                        <th>Giá tiền (đồng)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ \Carbon\Carbon::parse($order->xuat->created_at)->format('d/m/Y') }}</td>
                                            <td>{{ number_format($order->total_price, 0, ',', '.') }} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
            </div>
        </div>
    </div>

    </div>







@endsection
