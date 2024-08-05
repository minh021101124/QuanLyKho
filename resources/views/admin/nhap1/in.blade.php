<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hóa đơn nhập hàng</title>
    <style>
        /* Define your CSS styles for the invoice here */
        body {
            font-family: Arial, sans-serif;
        }
        .invoice {
            /* Define styles for your invoice layout */
            margin: 20px;
        }
        .invoice-header {
            /* Styles for invoice header */
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-details {
            /* Styles for invoice details section */
            margin-bottom: 20px;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #000;
            padding: 8px;
            font-size: 10px;
        }
        .total-section {
            text-align: right;
            margin-right: 10%;
            margin-top: 20px;
        }
    </style>
        <style>
            @font-face 
            {
                font-family: "DejaVu Sans"; 
                src: url("/fonts/DejaVuSans.ttf"); 
                 } 
                 body 
                 { 
                    font-family: "DejaVu Sans";
                    
                    }
                    p{
                        line-height: 10px;
                    }
            
                    table {
                        width: 100%;
                        border-collapse: collapse; /* Ensures that the table borders are collapsed into a single border */
                    }
                    th, td {
                        /* border: 1px solid black; Adds a border to table headers and data cells */
                        padding: 0px; /* Adds padding to cells for better readability */
                        text-align: left; /* Aligns text to the left */
                    }
            
                    
                    .pr{
                        border: 1px solid black;text-align: left;
                        padding: 5px;
                    }
                    #sl{
                        text-align: center;
                    }
                    td{
                        line-height: 13px;
                    }
            </style>
</head>
<body>
    <div class="invoice">
        <div class="invoice-header">
            <h1>HÓA ĐƠN NHẬP HÀNG</h1>
        </div>

        <div class="invoice-details">
            <p><strong>Mã hóa đơn:</strong> {{ $invoice_number }}</p>
            <p><strong>Ngày tạo:</strong> {{ $created_at->format('d/m/Y H:i') }}</p>
        </div>

        <table class="invoice-table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th style="width: 250px;">Tên Sản Phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Ngày sản xuất</th>
                    <th>Ngày hết hạn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ctNhaps as $ctNhap)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ctNhap->product->name }}</td>
                        <td>{{ number_format($ctNhap->price) }}đ</td>
                        <td>{{ $ctNhap->quantity }}</td>
                        <td>{{ number_format($ctNhap->total_price) }}đ</td>
                        <td>{{ $ctNhap->ngaysx ? \Carbon\Carbon::parse($ctNhap->ngaysx)->format('d/m/Y') : '' }}</td>
                        <td>{{ $ctNhap->hansd ? \Carbon\Carbon::parse($ctNhap->hansd)->format('d/m/Y') : '' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total-section">
            {{-- <span style="font-weight: 600; color: red; font-size: 18px;font-family: Arial, sans-serif;">Tong:</span> --}}
            <span>Tổng:</span>
            <strong>{{ number_format($total) }}đ</strong>
        </div>
    </div>
</body>
</html>
