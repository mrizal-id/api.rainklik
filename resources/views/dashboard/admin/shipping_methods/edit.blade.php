<!DOCTYPE html>
<html>

<head>
    <title>Edit Metode Pengiriman</title>
</head>

<body>
    <h1>Edit Metode Pengiriman</h1>
    <form action="{{ route('shippings.update', $shippingMethod) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nama:</label>
        <input type="text" name="name" value="{{ $shippingMethod->name }}" required><br><br>
        <label>Biaya:</label>
        <input type="number" name="cost" value="{{ $shippingMethod->cost }}" required><br><br>
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>

</html>
