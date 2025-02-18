@extends('layouts.dashboard')
@section('content')
    <!-- Page content -->
    <div class="col-lg-9 pt-4 pb-2 pb-sm-4">
        <h1 class="h2 mb-4">Settings</h1>

        <!-- Basic info -->
        <section class="card border-0 py-1 p-md-2 p-xl-3 p-xxl-4 mb-4">
            <div class="card-body">
                <div class="d-flex align-items-center mt-sm-n1 pb-4 mb-0 mb-lg-1 mb-xl-3">
                    <i class="ai-user text-primary lead pe-1 me-2"></i>
                    <h2 class="h4 mb-0">Post Create</h2>
                </div>
                <form action="{{ route('dashboard.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="d-flex align-items-center">
                        <div class="row g-3 g-sm-4 mt-0 mt-lg-2">

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>

                            <!-- Content -->
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                            </div>

                            <!-- Cover Image -->
                            <div class="mb-3">
                                <label for="cover" class="form-label">Cover Image</label>
                                <input type="file" class="form-control" id="cover" name="cover" accept="image/*">
                            </div>

                            <!-- Category -->
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <input type="text" class="form-control" id="category" name="category">
                            </div>

                            <!-- Tags (Multiple Tags) -->
                            <div class="mb-3">
                                <label for="tags" class="form-label">Tags</label>
                                <input type="text" class="form-control" id="tags" name="tags[]"
                                    placeholder="Add tags (comma separated)">
                            </div>

                            <!-- User ID (Hidden for now) -->
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">



                        </div>

                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </form>
        </section>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            tinymce.init({
                selector: '#content',
                height: 500,
                plugins: 'advlist autolink lists link charmap preview anchor',
                toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
                menubar: 'file edit view insert format tools table help',
                branding: false,
                license_key: 'gpl',
                setup: function(editor) {
                    editor.on('change', function() {
                        tinymce.triggerSave();
                    });
                }
            });

            document.querySelector("form").addEventListener("submit", function(event) {
                tinymce.triggerSave();
                let content = document.getElementById('content');

                if (!content.value.trim()) {
                    content.style.display = "block";
                    content.focus();
                    event.preventDefault();
                }
            });
        });
    </script>
@endpush
