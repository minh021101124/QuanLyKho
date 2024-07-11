@extends('admin.master')
@section('main-content')
@section('title','Tạo mới đơn xuất')
<style>
  .scanner-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin-top: 20px;
        }
        #scanner-container {
            width: 400px;
            height: 300px;
            background: rgb(46, 46, 46);
        }
        .scanner-controls {
            margin-top: 10px;
        }
</style>
<section class="content">
    <!DOCTYPE html>
    <html>
    <head>
        <title>Create Invoice</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
    </head>
    <body>
        @if(session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ session('error') }}',
                });
            </script>
        @endif
    
        <form action="{{route('xuathanghoa.store')}}" method="POST">
            @csrf
            <input type="hidden" id="barcode" name="barcode">
            
            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Tạo hóa đơn xuất</button>
        </form>
    
        <div class="scanner-container">
            <div id="scanner-container"></div>
            <div class="scanner-controls">
                <button id="start-scanner" class="btn btn-success">Quét</button>
                <button id="stop-scanner" class="btn btn-danger">Dừng</button>
            </div>
        </div>
        <script>
            function startScanner() {
                Quagga.init({
                    inputStream: {
                        name: "Live",
                        type: "LiveStream",
                        target: document.querySelector('#scanner-container'),
                        constraints: {
                            width: 400,
                            height: 300,
                            facingMode: "environment" // Use the rear camera
                        }
                    },
                    decoder: {
                        readers: ["code_128_reader", "ean_reader", "ean_8_reader", "code_39_reader"]
                    }
                }, function (err) {
                    if (err) {
                        console.error(err);
                        return;
                    }
                    Quagga.start();
                });
    
                Quagga.onDetected(function (data) {
                    var code = data.codeResult.code;
                    document.getElementById('barcode').value = code;
                    Quagga.stop();
                    alert('Barcode detected: ' + code);
                    // Optionally submit the form automatically
                    // document.forms[0].submit();
                });
            }
    
            function stopScanner() {
                Quagga.stop();
            }
    
            document.getElementById('start-scanner').addEventListener('click', startScanner);
            document.getElementById('stop-scanner').addEventListener('click', stopScanner);
        </script>
    </body>
    </html>
    
</section>
@endsection