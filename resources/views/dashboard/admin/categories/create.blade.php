@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Kategori</h1>

        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                    required>
            </div>


            <div class="form-group">
                <label for="parent_id">Kategori Parent</label>
                <select class="form-control" id="parent_id" name="parent_id">
                    <option value="">Pilih Kategori Parent</option>
                    @foreach ($parentCategories as $parent)
                        <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="is_active">Aktif</label>
                <select class="form-control" id="is_active" name="is_active" required>
                    <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Non-Aktif</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Gambar</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
