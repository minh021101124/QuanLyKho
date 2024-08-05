<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice #{{ $invoice->id }}</title>
    <style>
        /* Add your CSS styles for the PDF here */
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Invoice #{{ $invoice->id }}</h1>
    <p>Date: {{ $invoice->created_at->format('d/m/Y') }}</p>
    <p>Customer: {{ $invoice->customer_name }}</p>

    <h2>Products</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>{{ number_format($product->pivot->price, 2) }}</td>
                    <td>{{ number_format($product->pivot->quantity * $product->pivot->price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align: right;">Total</td>
                <td>{{ number_format($invoice->products->sum(fn($product) => $product->pivot->quantity * $product->pivot->price), 2) }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
