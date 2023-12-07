@extends('Main.master')
@section('main_page_title', 'Trang Chủ')
@section('main_page')


<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Sản Phẩm Chất Lượng Cao</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Giao Hàng Miễn Phí</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Đổi Hàng Trong Vòng 7 Ngày</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Hỗ Trợ 24/7</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->

<!-- Categories Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-4 col-md-6 pb-1">
            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                <p class="text-right">{{$onghut}} Sản Phẩm</p>
                <a href="" class="cat-img position-relative overflow-hidden mb-3">
                    <img class="img-fluid" src="img/cat-1.jpg" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0">Ống Hút</h5>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 pb-1">
            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                <p class="text-right">15 Products</p>
                <a href="" class="cat-img position-relative overflow-hidden mb-3">
                    <img class="img-fluid" src="img/cat-2.jpg" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0">Women's dresses</h5>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 pb-1">
            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                <p class="text-right">15 Products</p>
                <a href="" class="cat-img position-relative overflow-hidden mb-3">
                    <img class="img-fluid" src="img/cat-3.jpg" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0">Baby's dresses</h5>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 pb-1">
            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                <p class="text-right">15 Products</p>
                <a href="" class="cat-img position-relative overflow-hidden mb-3">
                    <img class="img-fluid" src="img/cat-4.jpg" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0">Accerssories</h5>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 pb-1">
            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                <p class="text-right">15 Products</p>
                <a href="" class="cat-img position-relative overflow-hidden mb-3">
                    <img class="img-fluid" src="img/cat-5.jpg" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0">Bags</h5>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 pb-1">
            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                <p class="text-right">15 Products</p>
                <a href="" class="cat-img position-relative overflow-hidden mb-3">
                    <img class="img-fluid" src="img/cat-6.jpg" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0">Shoes</h5>
            </div>
        </div>
    </div>
</div>
<!-- Categories End -->

<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Sản Phẩm Mới</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">

        @foreach($newProducts as $newProduct)
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="{{ asset('storage' . $newProduct->product_image) }}" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">{{ $newProduct->product_name }}</h6>
                    <div class="d-flex justify-content-center">
                        <h6>{{ number_format($newProduct->product_price, 0, '.', ',') }} VND</h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="{{ asset('/shop/detail/'. $newProduct->product_slug) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem Chi Tiết</a>
                    <a href="{{ asset('/addtocart/' . $newProduct->product_id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm Vào Giỏ Hàng</a>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>
<!-- Products End -->


<!-- Subscribe Start -->
<div class="container-fluid bg-secondary my-5">
    <div class="row justify-content-md-center py-5 px-xl-5">
        <div class="col-md-6 col-12 py-5">
            <div class="text-center mb-2 pb-2">
                <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Đăng Ký Để Nhận Được Những Thông Tin Mới Nhất</span></h2>
                <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod duo labore labore.</p>
            </div>
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control border-white p-4" placeholder="Email Của Bạn">
                    <div class="input-group-append">
                        <button class="btn btn-primary px-4">Đăng Ký</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Subscribe End -->


<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Sản Phẩm Ngẫu Nhiên</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">

        @foreach($randomProducts as $randomProduct)
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="{{ asset('storage' . $randomProduct->product_image) }}" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">{{$randomProduct->product_name}}</h6>
                    <div class="d-flex justify-content-center">
                        <h6>{{ number_format($randomProduct->product_price, 0, '.', ',') }} VND</h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="{{ asset('/shop/detail/'. $randomProduct->product_slug) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                    <a href="{{ asset('/addtocart/' . $randomProduct->product_id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                </div>
            </div>
        </div>

        @endforeach

    </div>
</div>
<!-- Products End -->


<!-- Vendor Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                <div class="vendor-item border p-4">
                    <img src="img/vendor-1.jpg" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="img/vendor-2.jpg" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="img/vendor-3.jpg" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="img/vendor-4.jpg" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="img/vendor-5.jpg" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="img/vendor-6.jpg" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="img/vendor-7.jpg" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="img/vendor-8.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>


@stop
