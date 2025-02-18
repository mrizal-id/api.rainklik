<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    <main class="page-wrapper py-5">
        <div
            class="container d-flex flex-column justify-content-center align-items-center h-100 text-center pb-2 py-sm-3 py-md-4 py-lg-5">

            <!-- Logo -->
            <a class="navbar-brand text-dark p-0 m-0 mb-5" href="/">
                <span class="text-primary flex-shrink-0 me-2">
                    <svg width="35" height="32" viewBox="0 0 36 33" xmlns="http://www.w3.org/2000/svg">
                        <path fill="currentColor"
                            d="M35.6,29c-1.1,3.4-5.4,4.4-7.9,1.9c-2.3-2.2-6.1-3.7-9.4-3.7c-3.1,0-7.5,1.8-10,4.1c-2.2,2-5.8,1.5-7.3-1.1c-1-1.8-1.2-4.1,0-6.2l0.6-1.1l0,0c0.6-0.7,4.4-5.2,12.5-5.7c0.5,1.8,2,3.1,3.9,3.1c2.2,0,4.1-1.9,4.1-4.2s-1.8-4.2-4.1-4.2c-2,0-3.6,1.4-4,3.3H7.7c-0.8,0-1.3-0.9-0.9-1.6l5.6-9.8c2.5-4.5,8.8-4.5,11.3,0L35.1,24C36,25.7,36.1,27.5,35.6,29z">
                        </path>
                    </svg>
                </span>
                {{ config('app.name') }}
            </a>

            <h1 class="display-2 text-primary">Whipping up our website</h1>
            <p class="fs-xl mx-auto mb-5" style="max-width: 680px;">We can't wait to unveil what we've been working on,
                and we appreciate your patience. Thanks for being a part of our journey!</p>

            <!-- Countdown -->
            <div class="countdown d-flex flex-wrap justify-content-center mb-5"
                data-countdown-date="01/01/2026 12:00:00">
                <div class="text-center mb-2">
                    <div class="position-relative p-2">
                        <span
                            class="position-absolute top-0 start-0 w-100 h-100 bg-white rounded-1 d-dark-mode-none"></span>
                        <span
                            class="position-absolute top-0 start-0 w-100 h-100 bg-secondary rounded-1 d-none d-dark-mode-block"></span>
                        <div class="h3 fw-medium position-relative z-1 mb-0 mx-1" data-days="">319</div>
                    </div>
                    <span class="fs-sm">days</span>
                </div>
                <span class="blinking text-body-secondary fs-2 mx-2">:</span>
                <div class="text-center mb-2">
                    <div class="position-relative p-2">
                        <span
                            class="position-absolute top-0 start-0 w-100 h-100 bg-white rounded-1 d-dark-mode-none"></span>
                        <span
                            class="position-absolute top-0 start-0 w-100 h-100 bg-secondary rounded-1 d-none d-dark-mode-block"></span>
                        <div class="h3 fw-medium position-relative z-1 mb-0 mx-1" data-hours="">07</div>
                    </div>
                    <span class="fs-sm">hours</span>
                </div>
                <span class="blinking text-body-secondary fs-2 mx-2">:</span>
                <div class="text-center mb-2">
                    <div class="position-relative p-2">
                        <span
                            class="position-absolute top-0 start-0 w-100 h-100 bg-white rounded-1 d-dark-mode-none"></span>
                        <span
                            class="position-absolute top-0 start-0 w-100 h-100 bg-secondary rounded-1 d-none d-dark-mode-block"></span>
                        <div class="h3 fw-medium position-relative z-1 mb-0 mx-1" data-minutes="">30</div>
                    </div>
                    <span class="fs-sm">mins</span>
                </div>
                <span class="blinking text-body-secondary fs-2 mx-2">:</span>
                <div class="text-center mb-2">
                    <div class="position-relative p-2">
                        <span
                            class="position-absolute top-0 start-0 w-100 h-100 bg-white rounded-1 d-dark-mode-none"></span>
                        <span
                            class="position-absolute top-0 start-0 w-100 h-100 bg-secondary rounded-1 d-none d-dark-mode-block"></span>
                        <div class="h3 fw-medium position-relative z-1 mb-0 mx-1" data-seconds="">59</div>
                    </div>
                    <span class="fs-sm">secs</span>
                </div>
            </div>


            <!-- Notification form -->
            <form class="input-group mx-auto" style="max-width: 480px;">
                <input type="email" class="form-control" placeholder="Enter your email" required="">
                <button type="submit" class="btn btn-primary">Notify me</button>
            </form>
        </div>
    </main>
</body>

</html>
