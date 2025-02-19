<section>
    <div class="jarallax bg-dark min-vh-100 py-5" data-jarallax="" data-type="scroll-opacity" data-speed="0.7">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-40"></div>

        <div class="container position-relative z-5 py-sm-4 py-lg-5 mt-4">
            <div class="row pt-lg-2 py-xl-4 py-xxl-5 mb-md-4 mb-lg-5">
                <div class="col-md-10 col-lg-9 col-xl-8 col-xxl-7 pt-5 mb-5">
                    <h1 class="display-2 text-light text-uppercase pb-sm-2 pb-md-3">{{ $title }}</h1>
                    <p class="text-light opacity-70 pb-3 pb-md-4 mb-3" style="max-width: 520px;">{{ $description }}</p>
                    <a class="btn btn-outline-light" href="{{ $buttonLink }}">{{ $buttonText }}</a>
                </div>
            </div>

            {{ $slot }}

        </div>

        <div id="jarallax-container-0" class="jarallax-container"
            style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; z-index: -100; clip-path: polygon(0px 0px, 100% 0px, 100% 100%, 0px 100%);">
            <div class="jarallax-img"
                style="background-image: url({{ $backgroundImage }}); object-fit: cover; object-position: 50% 50%; max-width: none; position: fixed; top: 0px; left: 0px; width: 1109px; height: 1003px; overflow: hidden; pointer-events: none; transform-style: preserve-3d; backface-visibility: hidden; margin-top: 0px; transform: translate3d(0px, 0px, 0px); opacity: 1;"
                data-jarallax-original-styles="background-image: url({{ $backgroundImage }});"></div>
        </div>
    </div>
</section>
