@extends('layouts.app')
@section('title', 'Blog')
@section('content')
    <div class="container pt-5 pb-lg-5 pb-md-4 pb-2 my-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="pt-lg-3 pb-lg-4 pb-2 breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
        </nav>
        <section class="container pt-5 pb-4 pb-lg-0 my-md-2 my-lg-5">
            <div class="row pt-5 pb-4 pb-lg-5 mb-2 mt-1 mt-sm-2 my-xl-3">
                <div class="col-md-7">
                    <h1 class="display-3 fw-medium text-uppercase mb-0">Blog Tentang Produk dan Gaya Hidup</h1>
                </div>
                <div class="col-md-5 col-lg-4 offset-lg-1 pt-3 pt-md-2">
                    <p class="mb-0">Temukan informasi bermanfaat tentang produk terbaru, tips gaya hidup, dan inspirasi
                        dari toko kami. Kami berbagi pengetahuan agar Anda dapat membuat keputusan terbaik.</p>
                </div>
            </div>
            <hr>
        </section>
        <div class="row mb-md-2 mb-xl-4">

            <!-- Blog posts -->
            <div class="col-lg-9 col-xl-8 pe-lg-4 pe-xl-0">

                <div class="masonry-grid mb-2 mb-md-4 pb-lg-3 shuffle" data-columns="2" style="position: relative;">
                    @foreach ($posts as $post)
                        <x-blog-post :post="$post" />
                    @endforeach
                </div>


                <!-- Pagination -->
                <div class="row gy-3 align-items-center">
                    <div class="col col-md-4 col-6 order-md-1 order-1">
                        <div class="d-flex align-items-center">
                            <span class="text-body-secondary fs-sm">Show</span>
                            <select class="form-select form-select-flush w-auto">
                                <option value="6">6</option>
                                <option value="9">9</option>
                                <option value="12">12</option>
                                <option value="24">24</option>
                            </select>
                        </div>
                    </div>


                    <div class="col col-md-4 col-6 order-md-3 order-2">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm justify-content-end">
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">1<span class="visually-hidden">(current)</span></span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>


            <!-- Sidebar (offcanvas on sreens < 992px) -->
            <aside class="col-lg-3 offset-xl-1">
                <div class="offcanvas-lg offcanvas-end" id="sidebarBlog">
                    <div class="offcanvas-header">
                        <h4 class="offcanvas-title">Sidebar</h4>
                        <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas"
                            data-bs-target="#sidebarBlog" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">

                        <!-- Search box -->
                        <div class="position-relative mb-4 mb-lg-5">
                            @include('home.blog.search')
                        </div>

                        <!-- Category links -->
                        <h4 class="pt-1 pt-lg-0 mt-lg-n2">Categories:</h4>
                        <ul class="nav flex-column mb-lg-5 mb-4">
                            <li class="mb-2">
                                <a class="nav-link d-flex p-0 active" href="#">
                                    All categories
                                    <span class="fs-sm text-body-secondary ms-2">(110)</span>
                                </a>
                            </li>

                        </ul>

                        <!-- Featured posts widget -->
                        <h4 class="pt-3 pt-lg-0 pb-1">Trending posts:</h4>
                        <div class="mb-lg-5 mb-4">
                            <article class="position-relative d-flex align-items-center mb-4">
                                <img class="rounded" src="/images/no-image.jpg" width="92" alt="Post image">
                                <div class="ps-3">
                                    <h4 class="h6 mb-2">
                                        <a class="stretched-link" href="blog-single-v1.html">Instagram trends that will
                                            definitely work</a>
                                    </h4>
                                    <span class="fs-sm text-body-secondary">13 hours ago</span>
                                </div>
                            </article>

                        </div>

                        <!-- Social buttons -->
                        <h4 class="pt-3 pt-lg-0 pb-1">Join us:</h4>
                        <div class="d-flex mt-n3 ms-n3 mb-lg-5 mb-4 pb-3 pb-lg-0">
                            <a class="btn btn-secondary btn-icon btn-sm btn-instagram rounded-circle mt-3 ms-3"
                                href="#" aria-label="Instagram">
                                <i class="ai-instagram"></i>
                            </a>
                            <a class="btn btn-secondary btn-icon btn-sm btn-facebook rounded-circle mt-3 ms-3"
                                href="#" aria-label="Facebook">
                                <i class="ai-facebook"></i>
                            </a>
                            <a class="btn btn-secondary btn-icon btn-sm btn-telegram rounded-circle mt-3 ms-3"
                                href="#" aria-label="Telegram">
                                <i class="ai-telegram"></i>
                            </a>
                            <a class="btn btn-secondary btn-icon btn-sm btn-x rounded-circle mt-3 ms-3" href="#"
                                aria-label="X">
                                <i class="ai-x"></i>
                            </a>
                        </div>

                        <!-- Banner -->
                        <div class="position-relative mb-3">
                            <div class="position-absolute w-100 text-center top-0 start-50 translate-middle-x pt-4"
                                style="max-width: 15rem;" data-bs-theme="light">
                                <h3 class="h2 pt-3 mb-0">Your banner here!</h3>
                            </div>
                            <img class="rounded-5" src="/images/no-image.jpg" alt="Ads Here">
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
    <!-- Sidebar toggle button -->
    <button class="btn btn-success rounded-circle position-fixed bottom-3 end-3 d-lg-none" type="button"
        data-bs-toggle="offcanvas" data-bs-target="#sidebarBlog"
        style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; z-index: 1000;">
        <i class="ai-layout-column fs-3"></i>
    </button>
@endsection
