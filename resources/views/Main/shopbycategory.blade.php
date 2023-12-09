@extends('Main.master')
@section('main_page')
@section('title', 'Sản Phẩm Theo Danh Mục')


<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Shop Product Start -->
        <div class="col-lg-12 col-md-12">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="display-4 text-left">
                        Danh Sách Sản Phẩm Thuộc Loại {{ $categoryName->cate_name }}
                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <form action="{{ asset('/shop/search/') }}" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Tìm Kiếm" name="result">
                                <div class="input-group-append">
                                    <button type="submit" style="border-color: transparent;">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="dropdown ml-4">
                            <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sort by
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="#">Latest</a>
                                <a class="dropdown-item" href="#">Popularity</a>
                                <a class="dropdown-item" href="#">Best Rating</a>
                            </div>
                        </div>
                    </div>
                </div>


                @foreach($productListByCategory as $product)
                <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{ asset('storage'. $product->product_image) }}" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{ $product->product_name }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{ number_format($product->product_price, 0, '.', ',') }} VND</h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ asset('/shop/detail/' . $product->product_slug) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem Chi Tiết</a>
                            <a href="{{ asset('/cart/add/' . $product->product_id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm Vào Giỏ Hàng</a>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="col-12 pb-1">
                    {{ $productListByCategory->links('vendor/pagination/default') }}
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->

@stop
