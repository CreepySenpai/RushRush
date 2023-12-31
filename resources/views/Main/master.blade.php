<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('main_page_title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('pageassets/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('pageassets/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('pageassets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('pageassets/css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/libs/toastr/build/toastr.min.css') }}" rel="stylesheet">

    <script src="{{ asset('pageassets/js/jquery-3.4.1.min.js') }}"></script>

    <script src="{{ asset('pageassets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('pageassets/lib/easing/easing.min.js') }}"></script>

    <script src="{{ asset('pageassets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('assets/libs/toastr/build/toastr.min.js') }}"></script>
    <script src="{{ asset('pageassets/js/main.js') }}"></script>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{ asset('/') }}" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="{{ asset('/shop/search/') }}" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm Kiếm Sản Phẩm" name="result">
                        <div class="input-group-append">
                            <button type="submit" style="border-color: transparent;">
                                <span class="input-group-text bg-transparent text-primary">
                                    <i class="fa fa-search"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">{{ Cart::count() }}</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">

            @include('Main.toolbar_category')

            <div class="col-lg-9">

                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="{{ asset('/') }}" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{ asset('/') }}" class="nav-item nav-link">Trang Chủ</a>
                            <a href="{{ asset('/shop/') }}" class="nav-item nav-link">Sản Phẩm</a>

                            <div class="nav-item dropdown">
                                <a href="{{ asset('/cart/show') }}" class="nav-link dropdown-toggle" data-toggle="dropdown">Giỏ Hàng</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="{{ asset('/cart/show') }}" class="dropdown-item">Xem Giỏ Hàng</a>
                                    <a href="{{ asset('/cart/order') }}" class="dropdown-item">Xem Đơn Hàng</a>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            @if(Auth::check())
                                <a href="{{ asset('/logout') }}" class="nav-item nav-link">Đăng Xuất</a>
                            @else
                                <a href="{{ asset('/login') }}" class="nav-item nav-link">Đăng Nhập</a>
                                <a href="{{ asset('/register') }}" class="nav-item nav-link">Đăng Ký</a>
                            @endif

                        </div>
                    </div>
                </nav>



                <!-- Need To Insert -->
                @include('Main.toolbar_show_image')

            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Main Page -->


    @yield('main_page')

    <!-- Vendor End -->



    <!-- End Main Page -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Shopper</h1>
                </a>
                <p>Chúng tôi cung cấp nhiều loại sản phẩm tốt cho hành tinh và phù hợp ví tiền của bạn. Sản phẩm của chúng tôi được làm từ nguyên liệu tự nhiên, có nguồn gốc rõ ràng và bao bì đảm bảo an toàn thực phẩm.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Tam Kỳ, Quảng Nam</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>tuana8255@proton.me</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Truy Cập Nhanh</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="{{ asset('/') }}"><i class="fa fa-angle-right mr-2"></i>Trang Chủ</a>
                            <a class="text-dark mb-2" href="{{ asset('/shop/') }}"><i class="fa fa-angle-right mr-2"></i>Sản Phẩm</a>
                            <a class="text-dark mb-2" href="{{ asset('/shop/cart') }}"><i class="fa fa-angle-right mr-2"></i>Giỏ Hàng</a>
                            <a class="text-dark mb-2" href="{{ asset('/shop/checkout') }}"><i class="fa fa-angle-right mr-2"></i>Thanh Toán</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Nhận Thông Báo</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Tên" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Email" required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Đăng Ký Ngay</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">EShopper</a>. All Rights Reserved. Designed
                    by
                    Onichan
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


</body>

</html>
