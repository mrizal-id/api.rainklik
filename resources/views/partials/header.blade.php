<header class="navbar navbar-expand-lg fixed-top bg-light">
    <div class="container">

        <!-- Navbar brand (Logo) -->
        <a class="navbar-brand pe-sm-3" href="{{ url('/') }}">
            <span class="text-primary flex-shrink-0 me-2">
                <svg width="35" height="32" viewBox="0 0 36 33" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor"
                        d="M35.6,29c-1.1,3.4-5.4,4.4-7.9,1.9c-2.3-2.2-6.1-3.7-9.4-3.7c-3.1,0-7.5,1.8-10,4.1c-2.2,2-5.8,1.5-7.3-1.1c-1-1.8-1.2-4.1,0-6.2l0.6-1.1l0,0c0.6-0.7,4.4-5.2,12.5-5.7c0.5,1.8,2,3.1,3.9,3.1c2.2,0,4.1-1.9,4.1-4.2s-1.8-4.2-4.1-4.2c-2,0-3.6,1.4-4,3.3H7.7c-0.8,0-1.3-0.9-0.9-1.6l5.6-9.8c2.5-4.5,8.8-4.5,11.3,0L35.1,24C36,25.7,36.1,27.5,35.6,29z">
                    </path>
                </svg>
            </span>
            <span class="d-none d-sm-inline">{{ config('app.name') }}</span>
        </a>

        <!-- Theme switcher -->
        <div class="form-check form-switch mode-switch order-lg-2 me-3 me-lg-4 ms-auto" data-bs-toggle="mode">
            <input class="form-check-input" type="checkbox" id="theme-mode">
            <label class="form-check-label" for="theme-mode">
                <i class="ai-sun fs-lg"></i>
            </label>
            <label class="form-check-label" for="theme-mode">
                <i class="ai-moon fs-lg"></i>
            </label>
        </div>

        <!-- Search + Account + Cart -->
        <div class="nav align-items-center order-lg-3 ms-n1 me-3 me-sm-0">
            <a class="nav-link fs-4 p-2 mx-sm-1" href="#searchModal" data-bs-toggle="modal" aria-label="Search">
                <i class="ai-search"></i>
            </a>
            @if (Auth::check())
                <div class="dropdown nav d-none d-sm-block order-lg-3">
                    <a class="nav-link d-flex align-items-center p-0" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img class="border rounded-circle" src="/images/avatar.jpg" width="48"
                            alt="{{ Auth::user()->name }} ">
                        <div class="ps-2">
                            <div class="fs-xs lh-1 opacity-60">Hello,</div>
                            <div class="fs-sm dropdown-toggle">{{ Auth::user()->name }} </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end my-1">
                        <h6 class="dropdown-header fs-xs fw-medium text-body-secondary text-uppercase pb-1">Account</h6>
                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                            <i class="ai-user-check fs-lg opacity-70 me-2"></i>
                            Overview
                        </a>
                        <a class="dropdown-item" href="{{ route('dashboard.profile.index') }}">
                            <i class="ai-settings fs-lg opacity-70 me-2"></i>
                            Settings
                        </a>

                        <a class="dropdown-item" href="account-orders.html">
                            <i class="ai-cart fs-lg opacity-70 me-2"></i>
                            Orders
                            <span class="badge bg-danger ms-auto">4</span>

                        </a>
                        <a class="dropdown-item" href="account-favorites.html">
                            <i class="ai-heart fs-lg opacity-70 me-2"></i>
                            Favorites
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ai-logout fs-lg opacity-70 me-2"></i>
                            Sign out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @else
                <a class="nav-link fs-4 p-2 mx-sm-1 d-none d-sm-flex" href="{{ route('login') }}" aria-label="Account">
                    <i class="ai-user"></i>
                </a>
            @endif

            <a class="nav-link position-relative fs-4 p-2" href="#cartOffcanvas" data-bs-toggle="offcanvas"
                aria-label="Shopping cart">
                <i class="ai-cart"></i>
                <span class="badge bg-primary fs-xs position-absolute end-0 top-0 me-n1"
                    style="padding: .25rem .375rem;" id="cart-count"></span>
            </a>
        </div>

        <!-- Mobile menu toggler (Hamburger) -->
        <button class="navbar-toggler ms-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar collapse (Main navigation) -->
        <nav class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav navbar-nav-scroll mx-auto" style="--ar-scroll-height: 520px;">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="/category" data-bs-toggle="dropdown"
                        aria-expanded="false">Category</a>
                    <div class="dropdown-menu overflow-hidden p-0">
                        <div class="d-lg-flex">
                            <div class="mega-dropdown-column pt-1 pt-lg-3 pb-lg-4">
                                <ul class="list-unstyled mb-0">
                                    <!-- Loop Parent Categories -->
                                    @foreach ($categories as $parentCategory)
                                        <li class="dropdown-item">
                                            <a href="/category/{{ $parentCategory->slug }}">
                                                {{ $parentCategory->title }}
                                            </a>

                                            <!-- Check if the parent category has children -->
                                            @if ($categoryTree->has($parentCategory->id))
                                                <ul class="list-unstyled">
                                                    <!-- Loop Child Categories -->
                                                    @foreach ($categoryTree[$parentCategory->id] as $childCategory)
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="/category/{{ $childCategory->slug }}">
                                                                {{ $childCategory->title }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="mega-dropdown-column pb-2 pt-lg-3 pb-lg-4">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a class="dropdown-item" href="landing-creative-agency.html">Creative
                                            Agency</a>
                                        <span
                                            class="mega-dropdown-column position-absolute top-0 end-0 h-100 bg-size-cover bg-repeat-0 z-2 opacity-0"
                                            style="background-image: url(assets/img/megamenu/creative-agency.jpg);"></span>
                                    </li>
                                </ul>
                            </div>

                            <div class="mega-dropdown-column position-relative border-start z-3"></div>
                        </div>
                    </div>
                </li>



                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
                </li>


            </ul>
            <div class="d-md-none p-3 mt-n3">
                @if (Auth::check())
                    <!-- Jika pengguna sudah login -->
                    <a class="btn btn-danger w-100 mb-1" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ai-logout fs-xl me-2 ms-n1"></i>
                        Logout
                    </a>
                    <!-- Form logout yang tersembunyi -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <!-- Jika pengguna belum login -->
                    <a class="btn btn-primary w-100 mb-1" href="{{ route('login') }}" target="_blank"
                        rel="noopener">
                        <i class="ai-login fs-xl me-2 ms-n1"></i>
                        Sign In
                    </a>
                @endif
            </div>
        </nav>
    </div>
</header>
