@extends('Main.master')
@section('main_page')
@section('title', 'Chi Tiết Sản Phẩm')

<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="{{ asset('storage' . $product->product_image) }}" alt="Image">
                    </div>
                </div>
            </div>
        </div>

        @if(session()->has('comment_success'))
        <script>
            toastr.success("{{session('comment_success')}}", 'Thành Công!!');
        </script>
        @endif

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold">{{ $product->product_name }}</h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1">({{$commentCounts}} Bình Luận)</small>
            </div>
            <h3 class="font-weight-semi-bold mb-4">{{ number_format($product->product_price, 0, '.', ',') }} VND</h3>
            <p class="mb-4"> {{$product->product_count}} Sản Phẩm Có Sẵn</p>
            <div class="d-flex align-items-center mb-4 pt-2">
                <div class="input-group quantity mr-3" style="width: 130px;">
                    <div class="input-group-btn">
                        <button onclick="decreaseTotal()" class="btn btn-primary btn-minus">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <input id="totalProduct" type="text" class="form-control bg-secondary text-center" value="1">
                    <div class="input-group-btn">
                        <button onclick="increaseTotal()" class="btn btn-primary btn-plus">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Thêm Vào Giỏ Hàng</button>
            </div>
            <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Chia Sẻ Trên :</p>
                <div class="d-inline-flex">
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
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Mô Tả</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Bình Luận ({{$commentCounts}})</a>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-1">
                    <h4 class="mb-3">Mô Tả Sản Phẩm</h4>
                    <?php echo str_replace('"', '', $product->product_desc); ?>
                </div>
                <div class="tab-pane fade" id="tab-pane-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">{{$commentCounts}} bình luận cho "{{ $product->product_name }}"</h4>

                            @foreach($comments as $comment)
                            <div class="media mb-4">
                                <img src="{{ asset('storage/images/avatar.png') }}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6>{{ $comment->com_name }}<small> - <i>{{ date_format($comment->updated_at, "Y-m-d H:i:s") }}</i></small></h6>
                                    <!-- <div class="text-primary mb-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div> -->
                                    <p><?php echo $comment->com_content; ?></p>
                                </div>
                            </div>
                            @endforeach

                        </div>

                        <div class="col-md-6">
                            <h4 class="mb-4">Để Lại Bình Luận</h4>
                            <small>Địa chỉ email của bạn sẽ không được hiển thị. Các trường bắt buộc được đánh dấu *</small>
                            <!-- <div class="d-flex my-3">
                                <p class="mb-0 mr-2">Your Rating * :</p>
                                <div class="text-primary">
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div> -->
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="message">Bình Luận Của Bạn *</label>
                                    <textarea id="message" cols="30" rows="5" class="form-control" name="comment"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Tên *</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Bình Luận" class="btn btn-primary px-3">
                                </div>
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Detail End -->

<!-- Products Start -->
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel related-carousel">

                @foreach($randomProducts as $randomProduct)

                <div class="card product-item border-0 slide">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="{{ asset('storage'. $randomProduct->product_image) }}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{ $randomProduct->product_name }}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>{{ number_format($randomProduct->product_price, 0, '.', ',') }} VND</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="{{ asset('/shop/detail/' . $randomProduct->product_slug) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem Chi Tiết</a>
                        <a href="{{ asset('/addtocart/' . $randomProduct->product_id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm Vào Giỏ Hàng</a>
                    </div>
                </div>
                @endforeach



            </div>
        </div>
    </div>
</div>
<!-- Products End -->


<script>
    var totalProduct = parseInt('{{ $product->product_count }}');
    var buyProduct = 1;

    $('document').ready(function() {
        $('#totalProduct').val(buyProduct);
    })

    function increaseTotal() {
        if (buyProduct >= totalProduct) {
            toastr.warning("Số Lượng Sản Phẩm Không Được > " + totalProduct);

            return;
        }
        $('#totalProduct').val(++buyProduct);
    }

    function decreaseTotal() {
        if (buyProduct <= 1) {
            toastr.warning("Số Lượng Sản Phẩm Không Được <= 0");
            return;
        }
        $('#totalProduct').val(--buyProduct);
    }
</script>

<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items:4,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:1000,
        autoplayHoverPause:true
    });
</script>

@stop
