<!DOCTYPE html>
<html>

<head>
    <title>Daftar Metode Pengiriman</title>
</head>

<body>
    <h1>Daftar Metode Pengiriman</h1>
    <a href="{{ route('shippings.create') }}">Tambah Metode Pengiriman Baru</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Biaya</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shippingMethods as $shippingMethod)
                <tr>
                    <td>{{ $shippingMethod->id }}</td>
                    <td>{{ $shippingMethod->name }}</td>
                    <td>{{ $shippingMethod->cost }}</td>
                    <td>
                        <a href="{{ route('shippings.edit', $shippingMethod->id) }}">Edit</a>
                        <form action="{{ route('shippings.destroy', $shippingMethod->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
