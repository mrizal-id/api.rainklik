@extends('layouts.app')
@section('content')
    <h1>Tambah Metode Pengiriman Baru</h1>
    <form action="{{ route('shippings.store') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="name" required><br><br>
        <label>Biaya:</label>
        <input type="number" name="cost" required><br><br>
        <button type="submit">Simpan</button>
    </form>
@endsection
