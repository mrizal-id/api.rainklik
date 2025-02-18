<!-- Sidebar (offcanvas on sreens < 992px) -->
<aside class="col-lg-3 pe-lg-4 pe-xl-5 mt-n3">
    <div class="position-lg-sticky top-0">
        <div class="d-none d-lg-block" style="padding-top: 105px;"></div>
        <div class="offcanvas-lg offcanvas-start" id="sidebarAccount">
            <button class="btn-close position-absolute top-0 end-0 mt-3 me-3 d-lg-none" type="button"
                data-bs-dismiss="offcanvas" data-bs-target="#sidebarAccount" aria-label="Close"></button>
            <div class="offcanvas-body">
                <div class="pb-2 pb-lg-0 mb-4 mb-lg-5">
                    <img class="d-block rounded-circle mb-2" src="/images/no-image.jpg" width="80"
                        alt="{{ Auth::user()->name }}">
                    <h3 class="h5 mb-1">{{ Auth::user()->name }}</h3>
                    <p class="fs-sm text-body-secondary mb-0">{{ Auth::user()->email }}</p>
                </div>

                <nav class="nav flex-column pb-2 pb-lg-4 mb-3">
                    <h4 class="fs-xs fw-medium text-body-secondary text-uppercase pb-1 mb-2">Account</h4>
                    <a class="nav-link fw-semibold py-2 px-0 {{ request()->is('dashboard') ? 'active' : '' }}"
                        href="{{ url('dashboard') }}">
                        <i class="ai-user-check fs-5 opacity-60 me-2"></i>
                        Overview
                    </a>

                    <a class="nav-link fw-semibold py-2 px-0" {{ Request::is('dashboard/profile*') ? 'active' : '' }}
                        href="{{ route('dashboard.profile.index') }}">
                        <i class="ai-settings fs-5 opacity-60 me-2"></i>
                        Settings
                    </a>

                    <a class="nav-link fw-semibold py-2 px-0 {{ Request::is('dashboard/billing') ? 'active' : '' }}"
                        href="{{ url('dashboard.billing') }}">
                        <i class="ai-wallet fs-5 opacity-60 me-2"></i>
                        Billing
                    </a>

                </nav>

                <nav class="nav flex-column pb-2 pb-lg-4 mb-1">
                    <h4 class="fs-xs fw-medium text-body-secondary text-uppercase pb-1 mb-2">Dashboard</h4>
                    <a class="nav-link fw-semibold py-2 px-0" href="{{ url('dashboard') }}">
                        <i class="ai-cart fs-5 opacity-60 me-2"></i>
                        Orders
                    </a>
                    <a class="nav-link fw-semibold py-2 px-0" href="{{ url('dashboard') }}">
                        <i class="ai-activity fs-5 opacity-60 me-2"></i>
                        Earnings
                    </a>
                    <a class="nav-link fw-semibold py-2 px-0" href="/dashbord/account-chat">
                        <i class="ai-messages fs-5 opacity-60 me-2"></i>
                        Chat
                        <span class="badge bg-danger ms-auto">4</span>
                    </a>
                    <a class="nav-link fw-semibold py-2 px-0 {{ request()->is('dashboard/whislist*') ? 'active' : '' }}"
                        href="{{ url('dashboard.whislist') }}">
                        <i class="ai-heart fs-5 opacity-60 me-2"></i>
                        Favorites
                    </a>

                </nav>

                <nav class="nav flex-column">
                    <a href="#" class="nav-link fw-semibold py-2 px-0"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ai-logout fs-5 opacity-60 me-2"></i>
                        Sign out
                    </a>
                </nav>

                <form id="logout-form" method="POST" action="{{ url('logout') }}" style="display: none;">
                    @csrf
                </form>

            </div>
        </div>
    </div>
</aside>
