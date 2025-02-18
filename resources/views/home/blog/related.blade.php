<section class="container pt-2 pt-sm-3 pb-5 mb-md-3 mb-lg-4 mb-xl-5">
    <div class="d-flex align-items-center pb-3 mb-3 mb-lg-4">
        <h2 class="h1 mb-0 me-4">Related Articles</h2>
        <div class="d-flex ms-auto">
            <button class="btn btn-prev btn-icon btn-sm btn-outline-primary rounded-circle me-3" type="button"
                id="prev-post" aria-label="Previous slide">
                <i class="ai-arrow-left"></i>
            </button>
            <button class="btn btn-next btn-icon btn-sm btn-outline-primary rounded-circle" type="button" id="next-post"
                aria-label="Next slide">
                <i class="ai-arrow-right"></i>
            </button>
        </div>
    </div>

    @if ($recentPosts->isNotEmpty())
        <div class="swiper pb-2 pb-sm-3 pb-md-4"
            data-swiper-options='{
                "spaceBetween": 24,
                "loop": true,
                "autoHeight": true,
                "navigation": {
                    "prevEl": "#prev-post",
                    "nextEl": "#next-post"
                },
                "breakpoints": {
                    "576": { "slidesPerView": 2 },
                    "1000": { "slidesPerView": 3 }
                }
            }'>
            <div class="swiper-wrapper">
                @foreach ($recentPosts as $topic)
                    <article class="swiper-slide">
                        <div class="position-relative">
                            <img class="rounded-5 w-100" src="{{ asset('assets/' . $topic->cover) }}"
                                alt="{{ $topic->title }}">
                            <h3 class="h4 mt-4 mb-0">
                                <a class="stretched-link" href="{{ route('blogs.show', $topic->slug) }}">
                                    {{ $topic->title }}
                                </a>
                            </h3>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-muted text-center">Belum ada artikel terkait.</p>
    @endif
</section>
