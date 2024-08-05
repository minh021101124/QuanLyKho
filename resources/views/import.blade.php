<!DOCTYPE html>
<html>
<head>
    <title>Import Products</title>
</head>
<body>
    <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit">Import</button>
    </form>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
</body>
</html>
