@extends('layouts.app')

@section('content')
    <section>
        <div class="jarallax bg-dark min-vh-100 py-5" data-jarallax="" data-type="scroll-opacity" data-speed="0.7">
            <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-40"></div>

            <div class="container position-relative z-5 py-sm-4 py-lg-5 mt-4">

                <!-- Text + button -->
                <div class="row pt-lg-2 py-xl-4 py-xxl-5 mb-md-4 mb-lg-5">
                    <div class="col-md-10 col-lg-9 col-xl-8 col-xxl-7 pt-5 mb-5">
                        <h1 class="display-2 text-light text-uppercase pb-sm-2 pb-md-3">Decor to create comfort at home</h1>
                        <p class="text-light opacity-70 pb-3 pb-md-4 mb-3" style="max-width: 520px;">On the site you will
                            find all the wonderful decor items from photo frames to tablecloths for the dining table</p><a
                            class="btn btn-outline-light" href="shop-catalog.html">Explore the catalog</a>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="fw-medium text-light text-uppercase">Most Popular</div>

                    <!-- Slider prev/next buttons -->
                    <div class="d-flex">
                        <button class="btn btn-prev btn-icon btn-sm btn-outline-light rounded-circle ms-3" type="button"
                            id="popular-prev" aria-label="Previous slide" tabindex="0"
                            aria-controls="swiper-wrapper-1039d154d97310e6ef">
                            <i class="ai-arrow-left"></i>
                        </button>
                        <button class="btn btn-next btn-icon btn-sm btn-outline-light rounded-circle ms-3" type="button"
                            id="popular-next" aria-label="Next slide" tabindex="0"
                            aria-controls="swiper-wrapper-1039d154d97310e6ef">
                            <i class="ai-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Slider (popular items) -->
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

                        <!-- Item -->


                        <!-- Item -->


                        <!-- Item -->


                        <!-- Item -->


                        <!-- Item -->

                        <div class="swiper-slide h-auto swiper-slide-active" style="width: 324.667px; margin-right: 24px;"
                            role="group" aria-label="1 / 5" data-swiper-slide-index="0">
                            <a class="card h-100 border-0 rounded-1 text-decoration-none px-xxl-1" href="shop-single.html">
                                <div class="card-body p-4 px-sm-3 px-md-4">
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/landing/shop-1/hero/01.png" width="97" alt="Product">
                                        <div class="ps-3 ps-md-4">
                                            <h3 class="fs-sm mb-2">Exquisite glass vase</h3>
                                            <p class="fs-sm mb-0">$19.00</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide h-auto swiper-slide-next" style="width: 324.667px; margin-right: 24px;"
                            role="group" aria-label="2 / 5" data-swiper-slide-index="1">
                            <a class="card h-100 border-0 rounded-1 text-decoration-none px-xxl-1" href="shop-single.html">
                                <div class="card-body p-4 px-sm-3 px-md-4">
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/landing/shop-1/hero/02.png" width="97" alt="Product">
                                        <div class="ps-3 ps-md-4">
                                            <h3 class="fs-sm mb-2">Pot for home flowers</h3>
                                            <p class="fs-sm mb-0">$11.00 <del class="text-body-secondary fs-xs">$15.00</del>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide h-auto" style="width: 324.667px; margin-right: 24px;" role="group"
                            aria-label="3 / 5" data-swiper-slide-index="2">
                            <a class="card h-100 border-0 rounded-1 text-decoration-none px-xxl-1" href="shop-single.html">
                                <div class="card-body p-4 px-sm-3 px-md-4">
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/landing/shop-1/hero/03.png" width="97" alt="Product">
                                        <div class="ps-4">
                                            <h3 class="fs-sm mb-2">Ceramic soap dispenser</h3>
                                            <p class="fs-sm mb-0">$16.00</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide h-auto" style="width: 324.667px; margin-right: 24px;" role="group"
                            aria-label="4 / 5" data-swiper-slide-index="3">
                            <a class="card h-100 border-0 rounded-1 text-decoration-none px-xxl-1" href="shop-single.html">
                                <div class="card-body p-4 px-sm-3 px-md-4">
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/landing/shop-1/hero/04.png" width="97" alt="Product">
                                        <div class="ps-3 ps-md-4">
                                            <h3 class="fs-sm mb-2">Wooden clock with metal hands</h3>
                                            <p class="fs-sm mb-0">$24.00</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide h-auto" role="group" aria-label="5 / 5"
                            style="width: 324.667px; margin-right: 24px;" data-swiper-slide-index="4">
                            <a class="card h-100 border-0 rounded-1 text-decoration-none px-xxl-1"
                                href="shop-single.html">
                                <div class="card-body p-4 px-sm-3 px-md-4">
                                    <div class="d-flex align-items-center">
                                        <img src="assets/img/landing/shop-1/hero/05.png" width="97" alt="Product">
                                        <div class="ps-3 ps-md-4">
                                            <h3 class="fs-sm mb-2">Scented candle in ceramic shell</h3>
                                            <p class="fs-sm mb-0">$13.00</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
            </div>
            <div id="jarallax-container-0" class="jarallax-container"
                style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; z-index: -100; clip-path: polygon(0px 0px, 100% 0px, 100% 100%, 0px 100%);">
                <div class="jarallax-img"
                    style="background-image: url(/images/bg.jpg); object-fit: cover; object-position: 50% 50%; max-width: none; position: fixed; top: 0px; left: 0px; width: 1109px; height: 1003px; overflow: hidden; pointer-events: none; transform-style: preserve-3d; backface-visibility: hidden; margin-top: 0px; transform: translate3d(0px, 0px, 0px); opacity: 1;"
                    data-jarallax-original-styles="background-image: url(/images/bg.jpg);"></div>
            </div>
        </div>
    </section>
    <!-- Blog -->
    <section class="container pb-5 mb-lg-3 mb-xl-4 mb-xxl-5">
        <h2 class="h1 pb-3 pb-md-4">Our blog</h2>
        <div class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden"
            data-swiper-options="{
          &quot;slidesPerView&quot;: 1,
          &quot;spaceBetween&quot;: 24,
          &quot;pagination&quot;: {
            &quot;el&quot;: &quot;.swiper-pagination&quot;,
            &quot;clickable&quot;: true
          },
          &quot;breakpoints&quot;: {
            &quot;500&quot;: {
              &quot;slidesPerView&quot;: 2
            },
            &quot;991&quot;: {
              &quot;slidesPerView&quot;: 3
            }
          }
        }">
            <div class="swiper-wrapper" id="swiper-wrapper-db1d0de936aa3242" aria-live="polite">

                <!-- Item -->
                <div class="swiper-slide swiper-slide-active" style="width: 384px; margin-right: 24px;" role="group"
                    aria-label="1 / 3">
                    <div class="position-relative">
                        <img class="rounded-1" src="/images/no-image.jpg" alt="Post image">
                        <div class="pt-3 mt-3">
                            <h3 class="h4 mb-3">
                                <a class="stretched-link" href="#">Paintings for home decor</a>
                            </h3>
                            <p class="mb-0">Morbi et massa fames ac scelerisque sit commodo dignissim faucibus vel
                                quisque proin lectus laoreet sem adipiscing sollicitudin erat massa tellus lorem</p>
                        </div>
                    </div>
                </div>

                <!-- Item -->
                <div class="swiper-slide swiper-slide-next" style="width: 384px; margin-right: 24px;" role="group"
                    aria-label="2 / 3">
                    <div class="position-relative">
                        <img class="rounded-1" src="/images/no-image.jpg" alt="Post image">
                        <div class="pt-3 mt-3">
                            <h3 class="h4 mb-3">
                                <a class="stretched-link" href="#">How to keep flowers fresh longer</a>
                            </h3>
                            <p class="mb-0">Morbi et massa fames ac scelerisque sit commodo dignissim faucibus vel
                                quisque proin lectus laoreet sem adipiscing sollicitudin erat massa tellus lorem</p>
                        </div>
                    </div>
                </div>

                <!-- Item -->
                <div class="swiper-slide" role="group" aria-label="3 / 3" style="width: 384px; margin-right: 24px;">
                    <div class="position-relative">
                        <img class="rounded-1" src="/images/no-image.jpg" alt="Post image">
                        <div class="pt-3 mt-3">
                            <h3 class="h4 mb-3">
                                <a class="stretched-link" href="#">Bedroom decoration explained</a>
                            </h3>
                            <p class="mb-0">Morbi et massa fames ac scelerisque sit commodo dignissim faucibus vel
                                quisque proin lectus laoreet sem adipiscing sollicitudin erat massa tellus lorem</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination (Bullets) -->
            <div
                class="swiper-pagination position-relative bottom-0 pt-1 mt-4 d-lg-none swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button"
                    aria-label="Go to slide 1" aria-current="true"></span><span class="swiper-pagination-bullet"
                    tabindex="0" role="button" aria-label="Go to slide 2"></span>
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>


    </section>
@endsection
