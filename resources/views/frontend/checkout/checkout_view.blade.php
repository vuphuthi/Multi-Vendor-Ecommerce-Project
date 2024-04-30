@extends('frontend.master_dashboard')
@section('main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Trang chủ</a>
                <span></span> Thủ tục thanh toán
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h3 class="heading-2 mb-10">Thủ tục thanh toán</h3>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body">There are products in your cart</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">

                <div class="row">
                    <h4 class="mb-30">Chi tiết thanh toán</h4>
                    <form method="post">


                        <div class="row">
                            <div class="form-group col-lg-6">
                                <input type="text" required="" name="shipping_name" value="{{Auth::user()->name}}" placeholder="Nhập tên của bạn">
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="email" required="" name="shipping_email" value="{{Auth::user()->email}}" placeholder="Nhập chịa chỉ Email của bạn">
                            </div>
                        </div>



                        <div class="row shipping_calculator">
                            <div class="form-group col-lg-6">
                                <div class="custom_select">
                                    <select name="division_id" class="form-control select-active">
                                        <option value="" disabled selected style="display:none;">Chọn thành phố</option>
                                        @foreach ($divisions as $item)
                                            <option value="{{ $item->id }}">{{ $item->division_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="shipping_phone" value="{{Auth::user()->phone}}" placeholder="Nhập số điện thoại của bạn">
                            </div>
                        </div>
                        

                        <div class="row shipping_calculator">
                            <div class="form-group col-lg-6">
                                <div class="custom_select">
                                    <select name="district_id"  class="form-control select-active">
                                        <option value="" disabled selected style="display:none;">Chọn Quận/Huyện</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="post_code" placeholder="Mã bưu điện (Không bắt buộc)">
                            </div>
                        </div>


                        <div class="row shipping_calculator">
                            <div class="form-group col-lg-6">
                                <div class="custom_select">
                                    <select name="state_id" class="form-control select-active">
                                        <option value="" disabled selected style="display:none;">Chọn Phường/Xã</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="" type="text" name="shipping_address" placeholder="Nhập đại chỉ của bạn" value="{{ Auth::user()->address }}">
                            </div>
                        </div>





                        <div class="form-group mb-30">
                            <textarea rows="5" placeholder="Thông tin thêm lưu ý (Không bắt buộc)" name="notes"></textarea>
                        </div>



                    </form>
                </div>
            </div>


            <div class="col-lg-5">
                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Đơn hàng của bạn</h4>
                        <h6 class="text-muted">Tổng giá trị</h6>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout">
                        <table class="table no-border">
                            <tbody>
                                @foreach ($carts as $item)
                                    
                                        <tr>
                                            <td class="image product-thumbnail"><img
                                                    src="{{ asset($item->options->image) }}" alt="#"></td>
                                            <td>
                                                <h6 class="w-160 mb-5"><a href="shop-product-full.html"
                                                        class="text-heading">{{ $item->name }}</a></h6></span>
                                                <div class="product-rate-cover">

                                                    <strong>Màu sắc : {{ $item->options->color }} </strong> <br>
                                                    <strong>Kích thước : {{ $item->options->size }} </strong>

                                                </div>
                                            </td>
                                            <td>
                                                <h6 class="text-muted pl-20 pr-20">x{{ $item->qty }}</h6>
                                            </td>
                                            <td>
                                                <h4 class="text-brand">{{ number_format($item->price, 0, ',', '.') }}&#8363;
                                                </h4>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>




                        <table class="table no-border">
                            <tbody>
                                @if (Session::has('coupon'))
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Tổng cộng</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">{{ number_format($cartTotal, 0, ',', '.') }}&#8363;
                                        </h4>
                                    </td>
                                </tr>


                                <tr>

                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Tên Mã Giảm Giá</h6>
                                    </td>

                                    <td class="cart_total_amount">
                                        <h6 class="text-brand text-end">{{ session()->get('coupon')['coupon_name'] }} (
                                            {{ session()->get('coupon')['coupon_discount'] }}% ) </h6>
                                    </td>

                                </tr>

                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Giảm Giá</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">
                                            {{ number_format(session()->get('coupon')['discount_amount'], 0, ',', '.') }}&#8363;
                                        </h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Tổng cộng </h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">{{ number_format(session()->get('coupon')['total_amount'], 0, ',', '.') }}&#8363;
                                        </h4>
                                    </td>
                                </tr>

                            @else

                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Tổng cộng </h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">{{ number_format($cartTotal,0,',','.') }}&#8363;</h4>
                                    </td>
                                </tr>

                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="payment ml-30">
                    <h4 class="mb-30">Thanh toán</h4>
                    <div class="payment_option">
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_option"
                                id="exampleRadios3" checked="">
                            <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse"
                                data-target="#bankTranfer" aria-controls="bankTranfer">Chuyển khoản ngân hàng trực
                                tiếp</label>
                        </div>
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_option"
                                id="exampleRadios4" checked="">
                            <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse"
                                data-target="#checkPayment" aria-controls="checkPayment">Thanh toán khi nhận hàng</label>
                        </div>
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_option"
                                id="exampleRadios5" checked="">
                            <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse"
                                data-target="#paypal" aria-controls="paypal">Cổng thanh toán trực tuyến</label>
                        </div>
                    </div>
                    <div class="payment-logo d-flex">
                        <img class="mr-15" src="assets/imgs/theme/icons/payment-paypal.svg" alt="">
                        <img class="mr-15" src="assets/imgs/theme/icons/payment-visa.svg" alt="">
                        <img class="mr-15" src="assets/imgs/theme/icons/payment-master.svg" alt="">
                        <img src="assets/imgs/theme/icons/payment-zapper.svg" alt="">
                    </div>
                    <a href="#" class="btn btn-fill-out btn-block mt-30">Đặt hàng<i
                            class="fi-rs-sign-out ml-15"></i></a>
                </div>
            </div>

        </div>
    </div>


    <script type="text/javascript">
  		
          $(document).ready(function(){
    // Xử lý sự kiện khi chọn tỉnh/huyện
    $('select[name="division_id"]').on('change', function(){
        var division_id = $(this).val();
        if (division_id) {
            // Gửi yêu cầu AJAX để lấy dữ liệu các huyện/quận
            $.ajax({
                url: "{{ url('/district-get/ajax') }}/"+division_id,
                type: "GET",
                dataType:"json",
                success:function(data){
                    // Xóa tất cả các tùy chọn cũ của huyện/quận
                    $('select[name="district_id"]').empty();
                    // Thêm các tùy chọn mới
                    $.each(data, function(key, value){
                        $('select[name="district_id"]').append('<option value="'+ value.id + '">' + value.district_name + '</option>');
                    });
                },
            });
        } else {
            alert('danger');
        }
    });

    // Xử lý sự kiện khi chọn huyện
    $('select[name="district_id"]').on('change', function(){
        var district_id = $(this).val();
        if (district_id) {
            // Gửi yêu cầu AJAX để lấy dữ liệu các xã/phường
            $.ajax({
                url: "{{ url('/state-get/ajax') }}/"+district_id,
                type: "GET",
                dataType:"json",
                success:function(data){
                    // Xóa tất cả các tùy chọn cũ của xã/phường
                    $('select[name="state_id"]').empty();
                    // Thêm các tùy chọn mới
                    $.each(data, function(key, value){
                        $('select[name="state_id"]').append('<option value="'+ value.id + '">' + value.state_name + '</option>');
                    });
                },
            });
        } else {
            alert('danger');
        }
    });
});

    </script>

@endsection




