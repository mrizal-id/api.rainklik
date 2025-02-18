@extends('layouts.dashboard')

@section('content')
    <!-- Page content -->
    <div class="col-lg-9 pt-4 pb-2 pb-sm-4">
        <h1 class="h2 mb-4">Edit Post</h1>

        <!-- Basic info -->
        <section class="card border-0 py-1 p-md-2 p-xl-3 p-xxl-4 mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center mt-sm-n1 pb-4 mb-0 mb-lg-1 mb-xl-3">
                    <i class="ai-user text-primary lead pe-1 me-2"></i>
                    <h2 class="h4 mb-0">Edit Post</h2>
                </div>

                <!-- Form Edit -->
                <form action="{{ route('dashboard.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Indicate this is a PUT request -->

                    <div class="d-flex align-items-center">
                        <div class="row g-3 g-sm-4 mt-0 mt-lg-2">

                            <!-- Title -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ old('title', $post->title) }}" required>
                            </div>

                            <!-- Content -->
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $post->content) }}</textarea>
                            </div>

                            <!-- Cover Image -->
                            <div class="mb-3">
                                <label for="cover" class="form-label">Cover Image</label>
                                <input type="file" class="form-control" id="cover" name="cover" accept="image/*">
                                @if ($post->cover)
                                    <img src="{{ asset('storage/' . $post->cover) }}" alt="Cover" class="img-fluid mt-2"
                                        style="max-height: 100px;">
                                @endif
                            </div>

                            <!-- Category -->
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-control" id="category" name="category">
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <option value="teknologi"
                                        {{ old('category', $post->category) == 'teknologi' ? 'selected' : '' }}>Teknologi
                                    </option>
                                    <option value="kesehatan"
                                        {{ old('category', $post->category) == 'kesehatan' ? 'selected' : '' }}>Kesehatan
                                    </option>
                                    <option value="hiburan"
                                        {{ old('category', $post->category) == 'hiburan' ? 'selected' : '' }}>Hiburan
                                    </option>
                                    <option value="gaya-hidup"
                                        {{ old('category', $post->category) == 'gaya-hidup' ? 'selected' : '' }}>Gaya Hidup
                                    </option>
                                    <option value="pendidikan"
                                        {{ old('category', $post->category) == 'pendidikan' ? 'selected' : '' }}>Pendidikan
                                    </option>
                                    <option value="bisnis"
                                        {{ old('category', $post->category) == 'bisnis' ? 'selected' : '' }}>Bisnis</option>
                                    <option value="pariwisata"
                                        {{ old('category', $post->category) == 'pariwisata' ? 'selected' : '' }}>Pariwisata
                                    </option>
                                </select>
                            </div>


                            <!-- Tags (Multiple Tags) -->
                            <div class="mb-3">
                                <label for="tags" class="form-label">Tags</label>
                                <input type="text" class="form-control" id="tags" name="tags[]"
                                    value="{{ old('tags', implode(',', $post->tags)) }}"
                                    placeholder="Add tags (comma separated)">
                            </div>

                            <!-- User ID (Hidden for now) -->
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update Post</button>
                </form>
        </section>
    </div>
@endsection
