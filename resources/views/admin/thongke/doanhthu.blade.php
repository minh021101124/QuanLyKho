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
            border: 2px solid rgb(147, 148, 150);
            height: 100%;
            padding: 30px;
            margin: 2px;
        }

        .box2 {
            border: 2px solid rgb(147, 148, 150);
            margin-left: 0px;
            width: 40%;
            height: 100%;
            padding: 30px;
            margin: 2px;
        }
    </style>

    <div class="container1" style="margin-bottom:1%; ">
        <h1 style="font-weight:700">THỐNG KÊ</h1>
    </div>

    <div class="container1">

        <div class="box1">
            <h3 style="font-weight:600">Nhập</h3>
            <p>
            <h4>Tổng nhập: {{ number_format($tong) }}đ</h4>
            </p>
        </div>
        <div class="box2">
            <h3 style="font-weight:600"> Xuất</h3>
            <p>
            <h4>Tổng xuất:{{ number_format($tongx) }}đ</h4>
            </p>
        </div>
        <div class="box1">
            <h3 style="font-weight:600">Lợi nhuận</h3>
            <p>
            <h4>Tổng lợi nhuận trong tuần: </h4>
            </p>
        </div>
    </div>








@endsection
