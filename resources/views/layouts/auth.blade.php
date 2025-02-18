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
</head>

<body>
    <main id="app" class="page-wrapper">
        <div class="d-lg-flex position-relative h-100">
            <a class="text-nav btn btn-icon bg-light border rounded-circle position-absolute top-0 end-0 p-0 mt-3 me-3 mt-sm-4 me-sm-4"
                href="{{ url('/') }}" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Back to home"
                data-bs-original-title="Back to home">
                <i class="ai-home"></i>
            </a>
            <div class="d-flex flex-column align-items-center w-lg-50 h-100 px-3 px-lg-5 pt-5">
                <!-- Content -->
                @yield('content')

                <!-- Copyright -->
                <p class="nav w-100 fs-sm pt-5 mt-auto mb-5" style="max-width: 526px;">
                    <span class="text-body-secondary">©2025 All
                        rights reserved. Made by</span>
                    <a class="nav-link d-inline-block p-0 ms-1" href="{{ url('/') }}" target="_blank"
                        rel="noopener">RainKlik</a>
                </p>
            </div>
            <!-- Cover image -->
            <div class="w-50 bg-size-cover bg-repeat-0 bg-position-center"
                style="background-image: url(/images/cover.jpg);" loading="lazy">
            </div>
        </div>
    </main>
</body>

</html>
