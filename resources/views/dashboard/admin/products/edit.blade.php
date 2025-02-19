<!DOCTYPE html>
<html>

<head>
    <title>Edit Produk</title>
</head>

<body>
    <h1>Edit Produk</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Judul:</label>
        <input type="text" name="title" value="{{ $product->title }}" required><br><br>
        <label>Slug:</label>
        <input type="text" name="slug" value="{{ $product->slug }}" required><br><br>
        <label>Deskripsi:</label>
        <textarea name="description" required>{{ $product->description }}</textarea><br><br>
        <label>Harga:</label>
        <input type="number" name="price" value="{{ $product->price }}" required><br><br>
        <label>Harga Diskon:</label>
        <input type="number" name="discount_price" value="{{ $product->discount_price }}"><br><br>
        <label>Stok:</label>
        <input type="number" name="stock" value="{{ $product->stock }}"><br><br>
        <label>Tipe:</label>
        <select name="type" required>
            <option value="digital" {{ $product->type == 'digital' ? 'selected' : '' }}>Digital</option>
            <option value="physical" {{ $product->type == 'physical' ? 'selected' : '' }}>Fisik</option>
        </select><br><br>
        <label>Gambar:</label>
        <input type="file" name="image"><br><br>
        <label>Kategori:</label>
        <select name="category_id">
            <option value="">Pilih Kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}</option>
            @endforeach
        </select><br><br>
        <label>Metode Pengiriman:</label>
        <select name="shipping_method_id">
            <option value="">Pilih Metode Pengiriman</option>
            @foreach ($shippingMethods as $shippingMethod)
                <option value="{{ $shippingMethod->id }}"
                    {{ $product->shipping_method_id == $shippingMethod->id ? 'selected' : '' }}>
                    {{ $shippingMethod->name }}</option>
            @endforeach
        </select><br><br>
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>

</html>
