@extends('Main.master')
@section('main_page_title', 'Giỏ Hàng')
@section('main_page')

@if(session()->has('add_cart_success'))
<script>
    toastr.success("{{session('add_cart_success')}}", 'Thành Công!!');
</script>
@endif
@if(session()->has('remove_cart_success'))
<script>
    toastr.success("{{session('remove_cart_success')}}", 'Thành Công!!');
</script>
@endif
@if(session()->has('destroy_cart_success'))
<script>
    toastr.success("{{session('destroy_cart_success')}}", 'Thành Công!!');
</script>
@endif
@if(session()->has('cart_empty'))
<script>
    toastr.error("{{session('cart_empty')}}", 'Thất Bại!!');
</script>
@endif

<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Sản Phẩm</th>
                        <th>Số Tiền</th>
                        <th>Số Lượng</th>
                        <th>Tổng</th>
                        <th>Loại Bỏ</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach($productInCart as $product)
                    <tr>
                        <td class="align-middle"><img src="{{ asset('storage' . $product->options->img) }}" alt="" style="width: 50px;"> {{ $product->name }}</td>
                        <td class="align-middle"> {{ number_format($product->price, 0, ',', '.') }} VND</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">

                                <!-- <input readonly type="text" class="form-control form-control-sm bg-secondary text-center" value="{{ $product->qty }}"> -->

                                <!-- <div class="input-group-btn">
                                    <button onclick="decreaseTotal()" class="btn btn-sm btn-primary btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div> -->
                                <input onchange="updateCart(this.value, '{{ $product->rowId }}', '{{ $product->id }}')" type="text" class="form-control form-control-sm bg-secondary text-center" value="{{ $product->qty }}">
                                <!-- <div class="input-group-btn">
                                    <button onclick="increaseTotal()" class="btn btn-sm btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div> -->
                            </div>
                        </td>
                        <td class="align-middle">{{ number_format($product->price * $product->qty, 0, ',', '.') }} VND</td>
                        <td class="align-middle"><a href="{{ asset('cart/remove/' . $product->rowId) }}" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Tổng Quan Giỏ Hàng</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Tổng Tiền Sản Phẩm</h6>
                        <h6 class="font-weight-medium">{{ number_format($totalMoney, 0, ',', '.') }} VND</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Tổng Tiền</h5>
                        <h5 class="font-weight-bold">
                        @if($totalMoney == 0)
                            0
                        @else
                            {{number_format($totalMoney, 0, ',', '.')}}
                        @endif
                        VND</h5>
                    </div>
                    <a href="{{ asset('/cart/checkout/') }}" class="btn btn-block btn-primary my-3 py-3">Thanh Toán</a>
                    <a href="{{ asset('/cart/destroy/') }}" class="btn btn-block btn-danger my-3 py-3">Xoá Toàn Bộ Giỏ Hàng</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->

<script>
    function updateCart(productCount, rowId, id){
        $.get(
            "{{ asset('cart/update') }}",
            {
                productCount : productCount,
                rowId : rowId,
                id : id
            },
            function(response){
                location.reload();
                if (response.status === "success") {
                    toastr.success(response.message, 'Thành Công!!', { timeOut: 10000 });
                } else {
                    toastr.error(response.message, 'Thất Bại!!', { timeOut: 10000 });
                }
            }
        );
    }
</script>

@stop
