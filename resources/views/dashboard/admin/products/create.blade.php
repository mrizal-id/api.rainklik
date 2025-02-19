@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Tambah Produk Baru</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Judul:</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title') }}" required placeholder="Nama Produk">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="slug">Slug:</label>
                <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                    value="{{ old('slug') }}" required placeholder="Slug URL (unik)">
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required
                    placeholder="Deskripsi Produk">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Harga:</label>
                <input type="number" name="price" id="price"
                    class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required
                    placeholder="Harga Produk">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="discount_price">Harga Diskon (Opsional):</label>
                <input type="number" name="discount_price" id="discount_price"
                    class="form-control @error('discount_price') is-invalid @enderror" value="{{ old('discount_price') }}"
                    placeholder="Harga Diskon (jika ada)">
                @error('discount_price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="stock">Stok (Untuk Produk Fisik):</label>
                <input type="number" name="stock" id="stock"
                    class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}"
                    placeholder="Stok (kosongkan jika digital)">
                @error('stock')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="type">Tipe:</label>
                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" required>
                    <option value="digital" {{ old('type') == 'digital' ? 'selected' : '' }}>Digital</option>
                    <option value="physical" {{ old('type') == 'physical' ? 'selected' : '' }}>Fisik</option>
                </select>
                @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Gambar (Opsional):</label>
                <input type="file" name="image" id="image"
                    class="form-control-file @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_id">Kategori (Opsional):</label>
                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="shipping_method_id">Metode Pengiriman (Untuk Produk Fisik):</label>
                <select name="shipping_method_id" id="shipping_method_id"
                    class="form-control @error('shipping_method_id') is-invalid @enderror">
                    <option value="">Pilih Metode Pengiriman</option>
                    @foreach ($shippingMethods as $shippingMethod)
                        <option value="{{ $shippingMethod->id }}"
                            {{ old('shipping_method_id') == $shippingMethod->id ? 'selected' : '' }}>
                            {{ $shippingMethod->name }}</option>
                    @endforeach
                </select>
                @error('shipping_method_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="is_active">Status Aktif:</label>
                <select name="is_active" id="is_active" class="form-control @error('is_active') is-invalid @enderror">
                    <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('is_active', 1) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
                @error('is_active')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="is_returnable">Dapat Dikembalikan (Untuk Produk Fisik):</label>
                <select name="is_returnable" id="is_returnable"
                    class="form-control @error('is_returnable') is-invalid @enderror">
                    <option value="1" {{ old('is_returnable', 1) == 1 ? 'selected' : '' }}>Ya</option>
                    <option value="0" {{ old('is_returnable', 1) == 0 ? 'selected' : '' }}>Tidak</option>
                </select>
                @error('is_returnable')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="warranty_period">Periode Garansi (Untuk Produk Fisik, Opsional):</label>
                <input type="number" name="warranty_period" id="warranty_period"
                    class="form-control @error('warranty_period') is-invalid @enderror"
                    value="{{ old('warranty_period') }}" placeholder="Periode Garansi (hari)">
                @error('warranty_period')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="physical_shipping">Membutuhkan Pengiriman Fisik:</label>
                <select name="physical_shipping" id="physical_shipping"
                    class="form-control @error('physical_shipping') is-invalid @enderror">
                    <option value="1" {{ old('physical_shipping', 1) == 1 ? 'selected' : '' }}>Ya</option>
                    <option value="0" {{ old('physical_shipping', 1) == 0 ? 'selected' : '' }}>Tidak</option>
                </select>
                @error('physical_shipping')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="download_limit">Batas Unduhan (Untuk Produk Digital, Opsional):</label>
                <input type="number" name="download_limit" id="download_limit"
                    class="form-control @error('download_limit') is-invalid @enderror"
                    value="{{ old('download_limit') }}" placeholder="Batas Unduhan">
                @error('download_limit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="license_type">Tipe Lisensi (Untuk Produk Digital, Opsional):</label>
                <input type="text" name="license_type" id="license_type"
                    class="form-control @error('license_type') is-invalid @enderror" value="{{ old('license_type') }}"
                    placeholder="Tipe Lisensi">
                @error('license_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="license_expiry">Tanggal Kadaluarsa Lisensi (Untuk Produk Digital, Opsional):</label>
                <input type="date" name="license_expiry" id="license_expiry"
                    class="form-control @error('license_expiry') is-invalid @enderror"
                    value="{{ old('license_expiry') }}">
                @error('license_expiry')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="video_url">URL Video Demo (Untuk Produk Digital, Opsional):</label>
                <input type="text" name="video_url" id="video_url"
                    class="form-control @error('video_url') is-invalid @enderror" value="{{ old('video_url') }}"
                    placeholder="URL Video Demo">
                @error('video_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="parent_category_id">Kategori Induk (Opsional):</label>
                <select name="parent_category_id" id="parent_category_id"
                    class="form-control @error('parent_category_id') is-invalid @enderror">
                    <option value="">Pilih Kategori Induk</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('parent_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('parent_category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
