@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Kategori</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Slug</th>
                    <th>Parent</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->parent ? $category->parent->name : 'No Parent' }}</td>
                        <td>{{ $category->is_active ? 'Aktif' : 'Non-Aktif' }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
