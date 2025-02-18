@extends('layouts.error')

@section('content')
    <div class="container overflow-hidden pb-5">


        <!-- Dangling lamp -->
        <div class="d-flex justify-content-center px-5 mt-n1">
            <img class="d-dark-mode-none" src="/images/error/lamp-light.png" width="348" alt="Lamp"
                style="transform-origin: 50% 0; animation: swinging 3.5s ease-in-out forwards infinite;">
            <img class="d-none d-dark-mode-block" src="assets/img/404/lamp-dark.png" width="348" alt="Lamp"
                style="transform-origin: 50% 0; animation: swinging 3.5s ease-in-out forwards infinite;">
        </div>


        <!-- Text + search bar -->
        <div class="d-flex justify-content-center pb-5 mb-md-2 mb-lg-3 mb-xl-4 mb-xxl-5">
            <div style="max-width: 420px;">
                <div class="d-none d-sm-block" style="margin-top: -127px;"></div>
                <div class="d-sm-none" style="margin-top: -25%;"></div>
                <div class="d-flex align-items-center mb-4">
                    <h1 class="display-1 mb-0">404</h1>
                    <p class="text-dark lead ps-4 mb-0">Whoops! That page is missing...</p>
                </div>
                <form class="input-group">
                    <input class="form-control" type="search" placeholder="Enter keywords" required="">
                    <button class="btn btn-dark" type="submit">Search</button>
                </form>
            </div>
        </div>


        <!-- Categories -->
        <h2 class="h4 text-center pb-lg-2 mb-4">Let's go back on track!</h2>
        <div class="row g-4 pb-3 pb-lg-4 pb-xl-5">

            <!-- Card -->
            <div class="col-md-4">
                <div class="card zoom-effect h-100 border-0 rounded-1 overflow-hidden" style="min-height: 320px;">
                    <span class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-10 z-2"></span>
                    <div class="zoom-effect-wrapper rounded-1 position-absolute top-0 start-0 w-100 h-100">
                        <div class="zoom-effect-img bg-size-cover bg-position-bottom-center position-absolute top-0 start-0 w-100 h-100"
                            style="background-image: url(/images/no-image.jpg);"></div>
                    </div>
                    <a class="card-body d-flex flex-column justify-content-end align-items-start position-absolute top-0 start-0 w-100 h-100 text-decoration-none z-3"
                        href="shop-catalog.html">
                        <span class="bg-light text-dark rounded-pill fs-sm fw-semibold lh-1 py-3 px-4">
                            For the living room
                        </span>
                    </a>
                </div>
            </div>

            <!-- Card -->
            <div class="col-md-8">
                <div class="card zoom-effect border-0 rounded-1 overflow-hidden">
                    <span class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-10 z-2"></span>
                    <div class="zoom-effect-wrapper rounded-1">
                        <img class="zoom-effect-img" src="/images/no-image.jpg" alt="Category image">
                    </div>
                    <a class="card-body d-flex flex-column justify-content-end align-items-start position-absolute top-0 start-0 w-100 h-100 text-decoration-none z-3"
                        href="shop-catalog.html">
                        <span class="bg-light text-dark rounded-pill fs-sm fw-semibold lh-1 py-3 px-4">
                            For the kitchen
                        </span>
                    </a>
                </div>
                <div class="row g-4 pt-4">

                    <!-- Card -->
                    <div class="col-sm-6">
                        <div class="card zoom-effect border-0 rounded-1 overflow-hidden">
                            <span class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-10 z-2"></span>
                            <div class="zoom-effect-wrapper rounded-1">
                                <img class="zoom-effect-img" src="/images/no-image.jpg" alt="Category image">
                            </div>
                            <a class="card-body d-flex flex-column justify-content-end align-items-start position-absolute top-0 start-0 w-100 h-100 text-decoration-none z-3"
                                href="shop-catalog.html">
                                <span class="bg-light text-dark rounded-pill fs-sm fw-semibold lh-1 py-3 px-4">
                                    For the bathroom
                                </span>
                            </a>
                        </div>
                    </div>

                    <!-- Card -->
                    <div class="col-sm-6">
                        <div class="card zoom-effect border-0 rounded-1 overflow-hidden">
                            <span class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-10 z-2"></span>
                            <div class="zoom-effect-wrapper rounded-1">
                                <img class="zoom-effect-img" src="/images/no-image.jpg" alt="Category image">
                            </div>
                            <a class="card-body d-flex flex-column justify-content-end align-items-start position-absolute top-0 start-0 w-100 h-100 text-decoration-none z-3"
                                href="shop-catalog.html">
                                <span class="bg-light text-dark rounded-pill fs-sm fw-semibold lh-1 py-3 px-4">
                                    For the bedroom
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
