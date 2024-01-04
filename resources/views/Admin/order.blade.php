@extends('Admin.master')
@section('title', 'Danh Sách Đơn Hàng')
@section('main')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/extra-libs/multicheck/multicheck.css') }}">
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">

<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Đơn Hàng</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ asset('admin/home') }}">Trang Chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Đơn Hàng</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    @if(session()->has('edit_category_success'))
        <script>
            toastr.success( "{{ session('edit_category_success') }}", 'Thành Công!!');
        </script>
    @endif

    @if(session()->has('delete_order_success'))
        <script>
            toastr.success("{{ session('delete_category_success') }}", 'Thành Công!!');
        </script>
    @endif

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh Sách Đơn Hàng</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Thông Tin Liên Hệ</th>
                                        <th>Sản Phẩm</th>
                                        <th>Tình Trạng</th>
                                        <th>Tổng Tiền</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($invoiceList as $invoice)
                                        <tr>
                                            <td>
                                                {{ $invoice->invoice_id }}
                                            </td>
                                            <td>
                                                SĐT: {{ $invoice->invoice_user_phone }}
                                                <br>
                                                Email: {{ $invoice->invoice_user_email }}
                                                <br>
                                                Địa Chỉ: {{ $invoice->invoice_user_address }}
                                            </td>
                                            <td>
                                                @foreach($orderList as $order)
                                                    @if($order->order_code == $invoice->invoice_id)
                                                    {{ $order->produce_qty }}x   {{ $order->produce_name }}
                                                    <br>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                {{ $invoice->invoice_status }}
                                            </td>
                                            <td>
                                                {{ number_format($invoice->invoice_total_money, 0, ',', '.') }} VND
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    @if($invoice->invoice_status == "WAIT")
                                                        <a href="{{ asset('admin/invoice/done/' . $invoice->invoice_id ) }}" style="color: white; background-color: #17a2b8 !important; border-color: #17a2b8;" class="btn btn-info"><i class="fas fa-pen-square"></i> Giao Hàng</a>
                                                        <a href="{{ asset('admin/invoice/delete/' . $invoice->invoice_id ) }}" style="color: white;" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xoá</a>
                                                    @else
                                                        <a href="#" style="color: white; background-color: #17a2b8 !important; border-color: #17a2b8;" class="btn btn-info"><i class="fas fa-pen-square"></i> Đơn Hàng Đã Được Giao </a>
                                                    @endif
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Thông Tin Liên Hệ</th>
                                        <th>Sản Phẩm</th>
                                        <th>Tình Trạng</th>
                                        <th>Tổng Tiền</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
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
