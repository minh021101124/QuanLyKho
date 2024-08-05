<style>
    
    body {
        font-family: Arial, sans-serif;
    }
    .invoice {
        
        margin: 20px;
    }
    .invoice-header {
       
        text-align: center;
        margin-bottom: 20px;
    }
    .invoice-details {
        
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

                    <div class="invoice-header">
                        <h1>DANH SÁCH XUẤT HÀNG</h1>
                    </div>
                    <div>
                        <table class="invoice-table">
                            <thead>
                                <tr>
                                    <th style="font-size: 10px">STT</th>
                                    <th style="font-size: 10px;width:400px">Tên Sản Phẩm</th>
                                    <th style="font-size: 10px">Giá</th>
                                    <th style="font-size: 10px">Số lượng</th>
                                    <th style="font-size: 10px">Thành tiền</th>
                                    <th style="font-size: 10px">Ngày sản xuất</th>
                                    <th style="font-size: 10px">Ngày hết hạn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($ctNhaps as $ctNhap)
                                    @php
                                        $total += $ctNhap->total_price; // Accumulate total
                                    @endphp
                                    <tr>
                                        <td style="font-size: 10px">{{ $loop->iteration }}</td>
                                        <td style="font-size: 10px;">{{ $ctNhap->prouctid->name }}</td>
                                        <td style="font-size: 10px">{{ number_format($ctNhap->price) }}đ</td>
                                        <td style="font-size: 10px">{{ $ctNhap->quantity }}</td>
                                        <td style="font-size: 10px">{{ number_format($ctNhap->total_price) }}đ</td>
                                        <td style="font-size: 10px">{{ $ctNhap->ngaysx ? \Carbon\Carbon::parse($ctNhap->ngaysx)->format('d/m/Y') : '' }}</td>
                                        <td style="font-size: 10px">{{ $ctNhap->hansd ? \Carbon\Carbon::parse($ctNhap->hansd)->format('d/m/Y') : '' }}</td>
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
       

