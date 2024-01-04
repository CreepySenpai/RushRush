@extends('Main.master')
@section('main_page_title', 'Đơn Hàng')
@section('main_page')


@if(session()->has('delete_order_success'))
<script>
    toastr.success("{{session('delete_order_success')}}", 'Thành Công!!');
</script>
@endif

<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Số Tiền</th>
                        <th>Sản Phẩm</th>
                        <th>Tình Trạng</th>
                        <th>Huỷ Đơn Hàng</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach($invoiceList as $invoice)
                        <td>{{ $invoice->invoice_id }}</td>
                        <td>{{ number_format($invoice->invoice_total_money, 0, ',', '.') }} VND</td>
                        <td>

                            @foreach($orderList as $order)
                                {{ $order->produce_qty }}x {{ $order->produce_name }}
                                <br>
                            @endforeach

                        </td>
                        <td>{{ $invoice->invoice_status }}</td>
                        <td>
                            @if($invoice->invoice_status == "WAIT")
                                <a href="{{ asset('cart/order/delete/' . $invoice->invoice_id) }}" class="btn btn-primary px-3"><i class="fas fa-trash mr-1"></i> </a>
                            @elseif($invoice->invoice_status == "DONE")

                            @endif
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@stop
