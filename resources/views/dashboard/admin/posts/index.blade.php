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
                    <h2 class="h4 mb-0">Post </h2>
                </div>
                <!-- list -->
                <div class="list-group">
                    @foreach ($posts as $post)
                        <div class="list-group-item">
                            <h5>{{ $post->title }}</h5>
                            <p>{{ Str::limit($post->content, 100) }}...</p>
                            <a href="{{ url('posts.show', $post->id) }}" class="btn btn-info">View Post</a>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    </div>
@endsection
