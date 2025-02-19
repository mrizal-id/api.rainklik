<div class="d-flex align-items-center justify-content-between mb-3">
    <div class="fw-medium text-light text-uppercase">Most Popular</div>

    <div class="d-flex">
        <button class="btn btn-prev btn-icon btn-sm btn-outline-light rounded-circle ms-3" type="button" id="popular-prev"
            aria-label="Previous slide" tabindex="0" aria-controls="swiper-wrapper-1039d154d97310e6ef">
            <i class="ai-arrow-left"></i>
        </button>
        <button class="btn btn-next btn-icon btn-sm btn-outline-light rounded-circle ms-3" type="button"
            id="popular-next" aria-label="Next slide" tabindex="0" aria-controls="swiper-wrapper-1039d154d97310e6ef">
            <i class="ai-arrow-right"></i>
        </button>
    </div>
</div>

<div class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden"
    data-swiper-options="{
        &quot;slidesPerView&quot;: 1,
        &quot;spaceBetween&quot;: 24,
        &quot;loop&quot;: true,
        &quot;navigation&quot;: {
            &quot;prevEl&quot;: &quot;#popular-prev&quot;,
            &quot;nextEl&quot;: &quot;#popular-next&quot;
        },
        &quot;breakpoints&quot;: {
            &quot;500&quot;: {
                &quot;slidesPerView&quot;: 2
            },
            &quot;860&quot;: {
                &quot;slidesPerView&quot;: 3
            },
            &quot;1200&quot;: {
                &quot;slidesPerView&quot;: 4
            }
        }
    }">
    <div class="swiper-wrapper" id="swiper-wrapper-1039d154d97310e6ef" aria-live="polite">
        @foreach ($products as $product)
            <div class="swiper-slide h-auto" role="group" aria-label="{{ $loop->iteration }} / {{ count($products) }}"
                data-swiper-slide-index="{{ $loop->index }}">
                <a class="card h-100 border-0 rounded-1 text-decoration-none px-xxl-1" href="{{ $product['link'] }}">
                    <div class="card-body p-4 px-sm-3 px-md-4">
                        <div class="d-flex align-items-center">
                            <img src="{{ $product['image'] }}" width="97" alt="{{ $product['title'] }}">
                            <div class="ps-3 ps-md-4">
                                <h3 class="fs-sm mb-2">{{ $product['title'] }}</h3>
                                <p class="fs-sm mb-0">{{ $product['price'] }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
</div>
