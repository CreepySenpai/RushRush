@extends('Admin.master')
@section('title', 'Trang Quản Trị')
@section('main')



<link href="{{ asset('assets/libs/flot/css/float-chart.css') }}" rel="stylesheet">
<link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">

@if(session()->has('already_loggin'))
<script>
    toastr.error("{{session('already_loggin')}}", 'Thất Bại!!');
</script>
@endif

<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Dashboard</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="{{ asset('admin/home') }}">Trang Chủ</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Sales Cards  -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <a href="{{ asset('/') }}" class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                        <h6 class="text-white">Trang Sản Phẩm</h6>
                    </div>
                </a>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-3">
                <div class="card card-hover">
                    <div class="box bg-success text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                        <h6 class="text-white">Charts</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                    <div class="box bg-warning text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                        <h6 class="text-white">Widgets</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                        <h6 class="text-white">Tables</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                    <div class="box bg-info text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-arrow-all"></i></h1>
                        <h6 class="text-white">Full Width</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-3">
                <div class="card card-hover">
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-receipt"></i></h1>
                        <h6 class="text-white">Forms</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                    <div class="box bg-info text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-relative-scale"></i></h1>
                        <h6 class="text-white">Buttons</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-pencil"></i></h1>
                        <h6 class="text-white">Elements</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                    <div class="box bg-success text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-calendar-check"></i></h1>
                        <h6 class="text-white">Calnedar</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                    <div class="box bg-warning text-center">
                        <h1 class="font-light text-white"><i class="mdi mdi-alert"></i></h1>
                        <h6 class="text-white">Errors</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Tổng Quan</h4>
                                <h5 class="card-subtitle">Tổng Quan Trang Web</h5>
                            </div>
                        </div>
                        <div class="row">
                            <!-- column -->
                            <div class="col-lg-9">
                                <div class="flot-chart">
                                    <div class="flot-chart-content" id="flot-line-chart"></div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="fa fa-user m-b-5 font-16"></i>
                                            <h5 class="m-b-0 m-t-5">{{ $userCount }}</h5>
                                            <small class="font-light">Total Users</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="fa fa-plus m-b-5 font-16"></i>
                                            <h5 class="m-b-0 m-t-5">{{ $categoryCount }}</h5>
                                            <small class="font-light">Total Category</small>
                                        </div>
                                    </div>
                                    <div class="col-6 m-t-15">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="fa fa-cart-plus m-b-5 font-16"></i>
                                            <h5 class="m-b-0 m-t-5">{{ $productCount }}</h5>
                                            <small class="font-light">Total Product</small>
                                        </div>
                                    </div>
                                    <div class="col-6 m-t-15">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="fa fa-tag m-b-5 font-16"></i>
                                            <h5 class="m-b-0 m-t-5">{{ $invoiceCount }}</h5>
                                            <small class="font-light">Total Orders</small>
                                        </div>
                                    </div>
                                    <div class="col-6 m-t-15">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="fa fa-table m-b-5 font-16"></i>
                                            <h5 class="m-b-0 m-t-5">{{ $pendingInvoiceCount }}</h5>
                                            <small class="font-light">Pending Orders</small>
                                        </div>
                                    </div>
                                    <div class="col-6 m-t-15">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="fa fa-globe m-b-5 font-16"></i>
                                            <h5 class="m-b-0 m-t-5">{{ number_format($revenue, 0, ',', '.') }} VND</h5>
                                            <small class="font-light">Revenue</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- column -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-lg-12">
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bình Luận Gần Đây</h4>
                        <div class="todo-widget scrollable" style="height:450px;">
                            <ul class="list-task todo-list list-group m-b-0" data-role="tasklist">
                                @foreach($commentList as $comment)
                                <li class="list-group-item todo-item" data-role="task">
                                    <div class="custom-control custom-checkbox">
                                        <img src="{{ asset('storage/images/avatar.png') }}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <span class="todo-desc">{{ $comment->com_name }}</span> <span class="badge badge-pill badge-danger float-right">{{ $comment->updated_at }}</span>
                                    </div>
                                    <div class="ml-5"> <b>Nội Dung: </b>
                                        {{ $comment->com_content }}
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>



            </div>
            <!-- column -->

            <div class="col-lg-12">
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Đơn Hàng Gần Đây</h4>
                        <div class="todo-widget scrollable" style="height:450px;">
                            <ul class="list-task todo-list list-group m-b-0" data-role="tasklist">
                                @foreach($invoiceList as $invoice)
                                <li class="list-group-item todo-item" data-role="task">
                                    <div class="custom-control custom-checkbox">
                                        <img src="{{ asset('storage/images/avatar.png') }}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <span class="todo-desc">Khách Hàng: {{ $invoice->invoice_user_email }}</span> <span class="badge badge-pill badge-danger float-right">{{ $invoice->updated_at }}</span>
                                    </div>
                                    <div class="ml-5"> <b>Tình Trạng: </b>
                                        {{ $invoice->invoice_status }}
                                    </div>
                                    <div class="ml-5"> <b>Thông Tin Thanh Toán: </b>
                                        <br>
                                        <div style="padding-left: 3%;">
                                            SĐT:  {{ $invoice->invoice_user_phone }}
                                            <br>
                                            Địa Chỉ: {{ $invoice->invoice_user_address }}
                                        </div>
                                    </div>

                                    <div class="ml-5"> <b>Sản Phẩm: </b>
                                        <br>
                                        <div style="padding-left: 3%;">
                                            @foreach($orderList as $order)
                                                @if($order->order_code == $invoice->invoice_id)
                                                    {{ $order->produce_qty }}x {{ $order->produce_name }}
                                                    <br>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="ml-5"> <b>Tổng Tiền: </b>
                                        {{ number_format($invoice->invoice_total_money, 0, ',', '.') }} VND
                                    </div>
                                </li>


                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>



            </div>

        </div>
        <!-- ============================================================== -->
        <!-- Recent comment and chats -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center">
        All Rights Reserved by Matrix-admin. Designed and Developed by <a href="">OniChan</a>.
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

@stop
