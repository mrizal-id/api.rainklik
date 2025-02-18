@extends('layouts.app')
@section('content')
    <section class="container pt-5 mt-5">
        <!-- Breadcrumb-->
        <nav aria-label="breadcrumb">
            <ol class="pt-lg-3 pb-lg-4 pb-2 breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-9 col-xl-8 pe-lg-4 pe-xl-0">

                <!-- Post title + post meta -->
                <h1 class="pb-2 pb-lg-3">{{ $post->title }}</h1>
                <div class="d-flex flex-wrap align-items-center justify-content-between border-bottom mb-4">
                    <div class="d-flex align-items-center mb-4 me-4">
                        <span class="fs-sm me-2">By:</span>
                        <a class="nav-link position-relative fw-semibold p-0" href="#author" data-scroll=""
                            data-scroll-offset="80">
                            {{ $post->user->name }}
                            <span class="d-block position-absolute start-0 bottom-0 w-100"
                                style="background-color: currentColor; height: 1px;"></span>
                        </a>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <span class="fs-sm me-2">Share post:</span>
                        <div class="d-flex">
                            <a class="nav-link p-2 me-2" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                aria-label="Instagram" data-bs-original-title="Instagram">
                                <i class="ai-instagram"></i>
                            </a>
                            <a class="nav-link p-2 me-2" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                aria-label="Facebook" data-bs-original-title="Facebook">
                                <i class="ai-facebook"></i>
                            </a>
                            <a class="nav-link p-2 me-2" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                aria-label="Telegram" data-bs-original-title="Telegram">
                                <i class="ai-whatsapp "></i>
                            </a>
                            <a class="nav-link p-2" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                aria-label="X" data-bs-original-title="X">
                                <i class="ai-x"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Post content -->
                <p class="fs-lg pt-2 pt-sm-3">{{ $post->content }}</p>

                <!-- Tags -->
                <div class="d-flex flex-wrap pb-5 pt-3 pt-md-4 pt-xl-5 mt-xl-n2">
                    <h3 class="h6 py-1 mb-0 me-4">Relevant tags:</h3>

                    @foreach ($post->tags as $tag)
                        <a class="nav-link fs-sm py-1 px-0 me-3" href="#">
                            <span class="text-primary">#</span>{{ $tag }}
                        </a>
                    @endforeach
                </div>

                <!-- Author widget -->
                <div class="border-top border-bottom py-4" id="author">
                    <div class="d-flex align-items-start py-2">
                        <img class="d-block rounded-circle mb-3" src="assets/img/avatar/04.jpg" width="56"
                            alt="Author image">
                        <div class="d-md-flex w-100 ps-4">
                            <div style="max-width: 26rem;">
                                <h3 class="h5 mb-2">{{ $post->user->name }}</h3>
                                <p class="fs-sm mb-0">Porta nisl a ultrices ut libero id. Gravida mi neque, tristique justo,
                                    et pharetra laoreet nulla est nulla cras ac arcu sed mattis tristique convallis suspen
                                    enim blandit massa cursus augue dui mattis morbi velit semper nunc at etiam lacinia.</p>
                            </div>
                            <div class="pt-4 pt-md-0 ps-md-4 ms-md-auto">
                                <h3 class="h5">Share post:</h3>
                                <div class="d-flex">
                                    <a class="nav-link p-2 me-2" href="#" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" aria-label="Instagram"
                                        data-bs-original-title="Instagram">
                                        <i class="ai-instagram"></i>
                                    </a>
                                    <a class="nav-link p-2 me-2" href="#" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" aria-label="Facebook" data-bs-original-title="Facebook">
                                        <i class="ai-facebook"></i>
                                    </a>
                                    <a class="nav-link p-2 me-2" href="#" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" aria-label="Telegram" data-bs-original-title="Telegram">
                                        <i class="ai-telegram fs-sm"></i>
                                    </a>
                                    <a class="nav-link p-2" href="#" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" aria-label="X" data-bs-original-title="X">
                                        <i class="ai-x"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Comments -->
            </div>


            <!-- Sidebar (offcanvas on sreens < 992px) -->
            <aside class="col-lg-3 offset-xl-1">
                <div class="offcanvas-lg offcanvas-end" id="sidebar">
                    <div class="offcanvas-header">
                        <h4 class="offcanvas-title">Sidebar</h4>
                        <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas"
                            data-bs-target="#sidebar" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">

                        <!-- Search box -->
                        <div class="position-relative mb-4 mb-lg-5">
                            <i class="ai-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                            <input class="form-control ps-5" type="search" placeholder="Enter keyword">
                        </div>

                        <!-- Popular posts -->
                        <h4 class="pt-1 pt-lg-0 mt-lg-n2">Most popular:</h4>
                        <div class="mb-lg-5 mb-4">
                            @foreach ($recentPosts as $recentPost)
                                <article class="position-relative pb-2 mb-3 mb-lg-4">
                                    <img class="rounded-5" src="{{ $recentPost->cover }}" alt="Post image">
                                    <h5 class="h6 mt-3 mb-0">
                                        <a class="stretched-link"
                                            href="{{ route('blogs.show', $recentPost->slug) }}">{{ $recentPost->title }}</a>
                                    </h5>
                                </article>
                            @endforeach

                        </div>

                        <!-- Recent posts -->
                        <h4 class="pt-3 pt-lg-1 mb-4">Recent posts:</h4>
                        <ul class="list-unstyled mb-lg-5 mb-4">
                            @foreach ($recentPosts as $recentPost)
                                <li class="border-bottom pb-3 mb-3">
                                    <span class="h6 mb-0">
                                        <a
                                            href="{{ route('blogs.show', $recentPost->slug) }}">{{ $recentPost->title }}</a>
                                    </span>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Relevant topics -->
                        <h4 class="pt-3 pt-lg-1 mb-4">Relevant topics:</h4>
                        <div class="d-flex flex-wrap mt-n3 ms-n3 mb-lg-5 mb-4 pb-3 pb-lg-0">
                            @foreach ($post->tags as $tag)
                                <a class="btn btn-outline-secondary rounded-pill mt-3 ms-3"
                                    href="{{ route('blogs.index', ['tag' => $tag]) }}">
                                    {{ $tag }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </section>




    <button class="d-lg-none btn btn-sm fs-sm btn-primary w-100 rounded-0 fixed-bottom" type="button"
        data-bs-toggle="offcanvas" data-bs-target="#sidebar">
        <i class="ai-layout-column me-2"></i>
        Menu
    </button>



    <!-- Share Modal -->
    <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shareModalLabel">Share this post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Image">
                        <div class="card-body">
                            <h5 class="card-title">Example Title</h5>
                            <p class="card-text">This is an example of the content you are going to share. You can embed
                                any content here, like a blog post, product details, etc.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center mb-4">
                        <span class="fs-sm me-2">Share post:</span>
                        <div class="d-flex">
                            <a id="shareInstagram" class="nav-link p-2 me-2" href="#" data-bs-toggle="tooltip"
                                data-bs-placement="top" aria-label="Instagram" data-bs-original-title="Instagram">
                                <i class="ai-instagram"></i>
                            </a>
                            <a id="shareFacebook" class="nav-link p-2 me-2" href="#" data-bs-toggle="tooltip"
                                data-bs-placement="top" aria-label="Facebook" data-bs-original-title="Facebook">
                                <i class="ai-facebook"></i>
                            </a>
                            <a id="shareTelegram" class="nav-link p-2 me-2" href="#" data-bs-toggle="tooltip"
                                data-bs-placement="top" aria-label="Telegram" data-bs-original-title="Telegram">
                                <i class="ai-whatsapp"></i>
                            </a>
                            <a id="shareX" class="nav-link p-2" href="#" data-bs-toggle="tooltip"
                                data-bs-placement="top" aria-label="X" data-bs-original-title="X">
                                <i class="ai-x"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <link rel="stylesheet" href="{{ asset('/css/swiper.css') }}">
@endpush
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var shareButtons = document.querySelectorAll('.nav-link');
            var shareModal = new bootstrap.Modal(document.getElementById('shareModal'), {
                keyboard: false
            });
            shareButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();

                    var platform = button.getAttribute('aria-label').toLowerCase();

                    var modalTitle = "{{ $post->title }}";
                    var modalContent =
                        "{{ Str::limit($post->content, 100) }}...";
                    var imageUrl =
                        "{{ $post->cover ?? '/images/no-image.jpg' }}";

                    document.querySelector('.card-title').textContent = modalTitle;
                    document.querySelector('.card-text').textContent = modalContent;
                    document.querySelector('.card-img-top').src = imageUrl;

                    shareModal.show();

                    window.selectedSharePlatform = platform;
                });
            });

            document.getElementById('shareInstagram').addEventListener('click', function() {
                if (window.selectedSharePlatform === 'instagram') {
                    var shareUrl = 'https://www.instagram.com/';
                    window.open(shareUrl, '_blank');
                }
            });

            document.getElementById('shareFacebook').addEventListener('click', function() {
                if (window.selectedSharePlatform === 'facebook') {
                    var shareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(
                        window.location.href);
                    window.open(shareUrl, '_blank');
                }
            });

            document.getElementById('shareTelegram').addEventListener('click', function() {
                if (window.selectedSharePlatform === 'telegram') {
                    var shareUrl = 'https://t.me/share/url?url=' + encodeURIComponent(window.location.href);
                    window.open(shareUrl, '_blank');
                }
            });

            document.getElementById('shareX').addEventListener('click', function() {
                if (window.selectedSharePlatform === 'x') {
                    var shareUrl = 'https://twitter.com/intent/tweet?text=' + encodeURIComponent(window
                        .location.href);
                    window.open(shareUrl, '_blank');
                }
            });
        });
    </script>


    <script src="/js/swiper.js"></script>
@endpush
