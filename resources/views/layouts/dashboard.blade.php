<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - @yield('title', 'Toko Online Terbaik di Gunung Putri')</title>
    <meta name="author" content="{{ config('app.name', 'Nama Toko Anda') }}">
    <meta name="description"
        content="{{ $description ?? 'Temukan berbagai produk berkualitas dengan harga terbaik di toko online kami. Pengiriman cepat ke Gunung Putri dan sekitarnya.' }}">
    <meta name="keywords"
        content="{{ $keywords ?? 'toko online, belanja online, produk berkualitas, Gunung Putri, Bogor, 16964, produk, jual, beli' }}">

    <link rel="canonical" href="{{ url()->current() }}">

    <meta name="robots" content="noindex">
    <meta property="og:title" content="{{ config('app.name') }} - @yield('title', 'Toko Online Terbaik di Gunung Putri')">
    <meta property="og:description"
        content="{{ $description ?? 'Temukan berbagai produk berkualitas dengan harga terbaik di toko online kami. Pengiriman cepat ke Gunung Putri dan sekitarnya.' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $ogImage ?? asset('images/default-og-image.jpg') }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ config('app.name') }} - @yield('title', 'Toko Online Terbaik di Gunung Putri')">
    <meta name="twitter:description"
        content="{{ $description ?? 'Temukan berbagai produk berkualitas dengan harga terbaik di toko online kami. Pengiriman cepat ke Gunung Putri dan sekitarnya.' }}">
    <meta name="twitter:image" content="{{ $ogImage ?? asset('images/default-og-image.jpg') }}">

    <script src="{{ mix('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" id="google-font">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/swiper.css') }}" rel="stylesheet">
    <script src="/js/theme-switcher.js"></script>
    <link rel="stylesheet" href="/icons/icons.min.css">

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "{{config('app.name')}}",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('images/logo.png') }}",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Perumahan alam segar sejahtera Blok B1 No 02",
            "addressLocality": "Gunung Putri, Kabupaten Bogor",
            "postalCode": "16964",
            "addressCountry": "ID"
        },
        "telephone": "+628511730095",
        "sameAs": [
            "Link Media Sosial Toko Anda (jika ada)"
        ]
    }
    </script>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "url": "{{ url('/') }}",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "{{ url('/') }}?s={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
    </script>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Nama Toko Anda",
        "image": "{{ asset('images/logo.png') }}",
        "@id": "{{ url('/') }}",
        "url": "{{ url('/') }}",
        "telephone": "Nomor Telepon Toko Anda",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Alamat Toko Anda",
            "addressLocality": "Gunung Putri, Kabupaten Bogor",
            "postalCode": "16964",
            "addressCountry": "ID"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "Latitude Lokasi Anda",
            "longitude": "Longitude Lokasi Anda"
        },
        "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": [
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday",
                "Sunday"
            ],
            "opens": "09:00",
            "closes": "18:00"
        }
    }
    </script>

    <!-- Page loading styles -->
    <style>
        .page-loading {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            -webkit-transition: all .4s .2s ease-in-out;
            transition: all .4s .2s ease-in-out;
            background-color: #fff;
            opacity: 0;
            visibility: hidden;
            z-index: 9999;
        }

        [data-bs-theme="dark"] .page-loading {
            background-color: #121519;
        }

        .page-loading.active {
            opacity: 1;
            visibility: visible;
        }

        .page-loading-inner {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            text-align: center;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            -webkit-transition: opacity .2s ease-in-out;
            transition: opacity .2s ease-in-out;
            opacity: 0;
        }

        .page-loading.active>.page-loading-inner {
            opacity: 1;
        }

        .page-loading-inner>span {
            display: block;
            font-family: "Inter", sans-serif;
            font-size: 1rem;
            font-weight: normal;
            color: #6f788b;
        }

        [data-bs-theme="dark"] .page-loading-inner>span {
            color: #fff;
            opacity: .6;
        }

        .page-spinner {
            display: inline-block;
            width: 2.75rem;
            height: 2.75rem;
            margin-bottom: .75rem;
            vertical-align: text-bottom;
            background-color: #d7dde2;
            border-radius: 50%;
            opacity: 0;
            -webkit-animation: spinner .75s linear infinite;
            animation: spinner .75s linear infinite;
        }

        [data-bs-theme="dark"] .page-spinner {
            background-color: rgba(255, 255, 255, .25);
        }

        @-webkit-keyframes spinner {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
            }

            50% {
                opacity: 1;
                -webkit-transform: none;
                transform: none;
            }
        }

        @keyframes spinner {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
            }

            50% {
                opacity: 1;
                -webkit-transform: none;
                transform: none;
            }
        }
    </style>

    <!-- Page loading scripts -->
    <script>
        (function() {
            window.onload = function() {
                const preloader = document.querySelector('.page-loading')
                preloader.classList.remove('active')
                setTimeout(function() {
                    preloader.remove()
                }, 1500)
            }
        })()
    </script>
</head>

<body>
    <!-- Page loading spinner -->
    <div class="page-loading active">
        <div class="page-loading-inner">
            <div class="page-spinner"></div>
            <span>Loading...</span>
        </div>
    </div>

    <!-- Search modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" data-focus-input="#search">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header d-block position-relative border-0 pb-3">
                    <form class="position-relative w-100 mt-2 mb-4">
                        <button class="btn-close position-absolute top-50 end-0 translate-middle-y m-0 me-n1"
                            type="reset" data-bs-dismiss="modal" aria-label="Close"></button>
                        <i class="ai-search fs-xl position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                        <input class="form-control form-control-lg px-5" type="search" placeholder="Type to search"
                            data-focus-on-open="[&quot;modal&quot;, &quot;#searchModal&quot;]">
                    </form>
                    <div class="fs-xs fw-medium text-body-secondary text-uppercase">Suggestions</div>
                </div>
                <div class="modal-body pt-3">

                    <div class="d-flex align-items-center border-bottom pb-4 mb-4">
                        <a class="position-relative d-inline-block flex-shrink-0 bg-secondary rounded-1"
                            href="shop-single.html">
                            <span
                                class="badge bg-success position-absolute top-0 start-100 translate-middle ms-n1">Shop</span>
                            <img src="/images/no-image.jpg" width="90" alt="Product">
                        </a>
                        <div class="ps-3">
                            <h4 class="h6 mb-2">
                                <a href="shop-single.html">Candle in concrete bowl</a>
                            </h4>
                            <span class="mb-0 me-2">$11.00</span>
                            <del class="fs-sm text-body-secondary ms-auto">$15.00</del>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Cart offcanvas -->

    <div class="offcanvas offcanvas-end py-2 p-sm-4 p-md-5" id="cartOffcanvas" style="width: 680px;">

        <!-- Title -->
        <div class="px-4 pt-3">
            <div class="d-flex justify-content-between align-items-center border-bottom pb-3 pb-sm-4">
                <h2 class="offcanvas-title d-flex align-items-center mb-1">
                    Your cart <span class="fs-base fw-normal text-body-secondary ms-3">(3 items)</span>
                </h2>
                <button class="btn-close mb-1 me-n1" type="button" data-bs-dismiss="offcanvas"
                    data-bs-target="#cartOffcanvas" aria-label="Close"></button>
            </div>
        </div>

        <!-- Body -->
        <div class="offcanvas-body">

            <!-- Item -->
            <div class="d-sm-flex align-items-center pb-4"><a
                    class="d-inline-block flex-shrink-0 bg-secondary rounded-1 p-sm-2 p-md-3 mb-2 mb-sm-0"
                    href="shop-single.html"><img src="/images/no-image.jpg" width="110" alt="Product"></a>
                <div class="w-100 pt-1 ps-sm-4">
                    <div class="d-flex">
                        <div class="me-3">
                            <h3 class="h5 mb-2">
                                <a href="shop-single.html">Candle in concrete bowl</a>
                            </h3>
                            <div class="d-flex flex-wrap">
                                <div class="text-body-secondary fs-sm me-3">
                                    Color: <span class="text-dark fw-medium">Gray night</span>
                                </div>
                                <div class="text-body-secondary fs-sm me-3">
                                    Weight: <span class="text-dark fw-medium">140g</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-end ms-auto">
                            <div class="fs-5 mb-2">$11.00</div>
                            <del class="text-body-secondary ms-auto">$15.00</del>
                        </div>
                    </div>
                    <div class="count-input ms-n3">
                        <button class="btn btn-icon fs-xl" type="button" data-decrement="">-</button>
                        <input class="form-control" type="number" value="2" readonly="">
                        <button class="btn btn-icon fs-xl" type="button" data-increment="">+</button>
                    </div>
                    <div class="nav justify-content-end mt-n5 mt-sm-n3">
                        <a class="nav-link fs-xl p-2" href="#" data-bs-toggle="tooltip" aria-label="Remove"
                            data-bs-original-title="Remove">
                            <i class="ai-trash"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Coupon input + Total -->
        <div class="px-4 pb-3 pb-sm-4 pb-sm-5">
            <div class="d-sm-flex align-items-center border-top pt-4">
                <div class="input-group input-group-sm border-dashed mb-3 mb-sm-0 me-sm-4 me-md-5">
                    <input class="form-control text-uppercase" type="text" placeholder="Your coupon code">
                    <button class="btn btn-secondary" type="button">Apply coupon</button>
                </div>
                <div class="d-flex align-items-center justify-content-center">
                    <span class="fs-xl me-3">Total:</span>
                    <span class="h3 mb-0">$92.00</span>
                </div>
            </div>
        </div>

        <!-- Action buttons -->
        <div class="d-flex align-items-center justify-content-between px-4 pb-3">
            <div class="nav d-none d-sm-block">
                <a class="nav-link fw-semibold px-0" href="#cartOffcanvas" data-bs-dismiss="offcanvas">
                    <i class="ai-chevron-left fs-xl me-2"></i>
                    Back to shop
                </a>
            </div>
            <a class="btn btn-lg btn-primary w-100 w-sm-auto" href="shop-checkout.html">
                Proceed to checkout
                <i class="ai-chevron-right ms-2 me-n1"></i>
            </a>
        </div>
    </div>


    <main id="app" class="bg-secondary">
        <!-- Header-->
        @include('partials.header')
        <div class="container py-5 mt-4 mt-lg-5 mb-lg-4 my-xl-5">
            <div class="row pt-sm-2 pt-lg-0">
                @include('dashboard.sidebar')
                @yield('content')
            </div>
        </div>
        <!-- Footer-->
        @include('partials.footer')
    </main>

    <!-- Back to top button -->
    <a class="btn-scroll-top" href="#top" data-scroll="" aria-label="Scroll back to top">
        <svg viewBox="0 0 40 40" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <circle cx="20" cy="20" r="19" fill="none" stroke="currentColor" stroke-width="1.5"
                stroke-miterlimit="10" style="stroke-dasharray: 118.611; stroke-dashoffset: 118.611;"></circle>
        </svg>
        <i class="ai-arrow-up"></i>
    </a>
    @stack('scripts')

</body>

</html>
