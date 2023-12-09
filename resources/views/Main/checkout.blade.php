@extends('Main.master')
@section('main_page_title', 'Thanh Toán')
@section('main_page')

@php

$shippingFee = 20000;

@endphp
<!-- Checkout Start -->
<div class="container-fluid pt-5">
    <form method="post">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Thông Tin Liên Hệ</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Tên</label>
                            <input name="userName" class="form-control" type="text" require>
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Email</label>
                            <input name="userEmail" class="form-control" type="text" require>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Số Điện Thoại</label>
                            <input name="userPhoneNumber" class="form-control" type="text" require>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Địa Chỉ</label>
                            <input name="userAddress" class="form-control" type="text" require>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Hoá Đơn</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Sản Phẩm</h5>
                        @foreach($productInCart as $product)
                        <div class="d-flex justify-content-between">
                            <p> {{ $product->name }}</p>
                            <p> {{ number_format($product->price * $product->qty, 0, ',', '.') }} VND</p>
                        </div>
                        @endforeach

                        <hr class="mt-0">
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Phí Vận Chuyển</h6>
                            <h6 class="font-weight-medium">{{ number_format($shippingFee, 0, ',', '.') }} VND</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng Tiền</h5>
                            <?php
                                $totalMoney = $totalMoney + $shippingFee;
                            ?>
                            <h5 class="font-weight-bold">{{ number_format($totalMoney, 0, ',', '.') }} VND</h5>
                        </div>
                        <input type="hidden" name="userTotalPay" value="{{ $totalMoney }}">
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Thanh Toán</button>
                    </div>
                </div>

            </div>
        </div>
        {{ csrf_field() }}
    </form>
</div>
<!-- Checkout End -->

@stop
