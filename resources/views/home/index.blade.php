@extends('layouts.app')

@section('content')
    <x-hero title="Decor to create comfort at home"
        description="On the site you will find all the wonderful decor items from photo frames to tablecloths for the dining table"
        buttonLink="shop-catalog.html" buttonText="Explore the catalog" backgroundImage="/images/bg.jpg">
        <x-product-slider :products="$products" />
    </x-hero>

    <section class="container py-5 my-md-2 my-lg-3 my-xl-4 my-xxl-5">
        <h2 class="h1 pb-3 py-md-4">Latest Posts</h2>

        <div class="row pb-md-4 pb-lg-5">
            @if ($featured)
                <!-- Featured article -->
                <div class="col-lg-6 pb-2 pb-lg-0 mb-4 mb-lg-0">
                    <article
                        class="card h-100 border-0 position-relative overflow-hidden bg-size-cover bg-position-center me-lg-4"
                        style="background-image: url({{ asset('assets/' . $featured->cover) }});">
                        <div class="bg-dark position-absolute top-0 start-0 w-100 h-100 opacity-60"></div>
                        <div class="card-body d-flex flex-column position-relative z-2 mt-sm-5">
                            <h3 class="pt-5 mt-4 mt-sm-5 mt-lg-auto">
                                <a class="stretched-link text-light" href="{{ route('blogs.show', $featured->slug) }}">
                                    {{ $featured->title }}
                                </a>
                            </h3>
                            <p class="card-text text-light opacity-70">{!! Str::limit($featured->content, 120) !!}</p>
                            <div class="d-flex align-items-center">
                                <span
                                    class="fs-sm text-light opacity-50">{{ $featured->created_at->diffForHumans() }}</span>
                                <span class="fs-xs text-light opacity-30 mx-3">|</span>
                                <a class="badge text-light fs-xs border border-light" href="#">
                                    {{ $featured->category }}
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            @endif

            @if ($recentPosts->isNotEmpty())
                <!-- Other articles -->
                <div class="col-lg-6">
                    <div class="row row-cols-1 row-cols-sm-2 g-4">
                        @foreach ($recentPosts as $post)
                            <article class="col py-1 py-xl-2">
                                <div class="border-bottom pb-4 ms-xl-3">
                                    <h3 class="h4">
                                        <a href="{{ route('blogs.show', $post->slug) }}">{{ $post->title }}</a>
                                    </h3>
                                    <p>{!! Str::limit($post->content, 80) !!}</p>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="fs-sm text-body-secondary">{{ $post->created_at->diffForHumans() }}</span>
                                        <span class="fs-xs opacity-20 mx-3">|</span>
                                        <a class="badge text-nav fs-xs border" href="#">{{ $post->category }}</a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>



@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jarallax/1.12.7/jarallax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jarallax/1.12.7/jarallax.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            jarallax(document.querySelectorAll('.jarallax'));
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const swiper = new Swiper('.swiper', {
                slidesPerView: 1,
                spaceBetween: 24,
                loop: true,
                navigation: {
                    prevEl: '#popular-prev',
                    nextEl: '#popular-next',
                },
                breakpoints: {
                    500: {
                        slidesPerView: 2,
                    },
                    860: {
                        slidesPerView: 3,
                    },
                    1200: {
                        slidesPerView: 4,
                    },
                },
            });
        });
    </script>
@endsection
