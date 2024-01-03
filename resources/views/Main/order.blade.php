@extends('Main.master')
@section('main_page_title', 'Đơn Hàng')
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
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Số Tiền</th>
                        <th>Sản Phẩm</th>
                        <th>Tình Trạng</th>
                        <th>Huỷ Bỏ</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <td>A</td>
                    <td>B</td>
                    <td>C</td>
                    <td>D</td>
                    <td>E</td>
                </tbody>
            </table>
        </div>

    </div>
</div>

@stop
