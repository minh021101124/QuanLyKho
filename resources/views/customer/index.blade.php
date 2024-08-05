<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Import Excel Data into NhapChitiet</h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('customer/import') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="input-group">
                            <input type="file" name="import_file" class="form-control" />
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>

                    </form>

                    <hr>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product ID</th>
                                <th>Nhap ID</th>
                                <th>Price</th>
                                <th>Total Price</th>
                                <th>Quantity</th>
                                <th>Ngaysx</th>
                                <th>Hansd</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->product_id }}</td>
                                <td>{{ $item->nhap_id }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->total_price }}</td>
                                <td>{{ $item->quantity }}</td>
                                {{-- <td>{{ $item->ngaysx->format('Y-m-d') }}</td>
                                <td>{{ $item->hansd->format('Y-m-d') }}</td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
