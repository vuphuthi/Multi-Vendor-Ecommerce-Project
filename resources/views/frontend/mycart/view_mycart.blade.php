@extends('frontend.master_dashboard')
@section('main')

 <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Trang chủ</a> 
                    <span></span> Giỏ hàng
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h4 class="heading-2 mb-10">Giỏ hàng của bạn</h4>
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body">There are products in your cart</h6>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive shopping-summery">
                        <table class="table table-wishlist">
                            <thead>
                                <tr class="main-heading">
                                    <th class="custome-checkbox start pl-30">

                                    </th>
                                    <th scope="col" colspan="2">Sản phẩm</th>
                                    <th scope="col">Đơn giá</th>
                                    <th scope="col">Màu</th>
                                    <th scope="col">Kích cỡ</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tổng phụ</th>
                                    <th scope="col" class="end">Xóa</th>
                                </tr>
                            </thead>
                            
                            <tbody id="mycart">


    
                            </tbody>

                        </table>
                    </div>


                    <div class="row mt-50">

                            <div class="col-lg-5">
                            <div class="p-40">
                                <h4 class="mb-10">Áp dụng phiếu giảm giá</h4>
                                <p class="mb-30"><span class="font-lg text-muted">Sử dụng mã khuyến mãi?</p>
                                <form action="#">
                                    <div class="d-flex justify-content-between">
                                        <input class="font-medium mr-15 coupon" name="Coupon" placeholder="Nhập phiếu giảm giá của bạn">
                                        <button class="btn"><i class="fi-rs-label mr-10"></i>Áp dụng</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="col-lg-7">
                             <div class="divider-2 mb-30"></div>



                            <div class="border p-md-4 cart-totals ml-30">
                        <div class="table-responsive">
                            <table class="table no-border">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Tổng phụ</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">$12.31</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="col" colspan="2">
                                            <div class="divider-2 mt-10 mb-10"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Đang chuyển hàng</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h5 class="text-heading text-end">Miễn phí</h4</td> </tr> <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Ước tính cho</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h5 class="text-heading text-end">Vương quốc Anh</h4</td> </tr> <tr>
                                        <td scope="col" colspan="2">
                                            <div class="divider-2 mt-10 mb-10"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Total</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">$12.31</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="#" class="btn mb-20 w-100">Proceed To CheckOut<i class="fi-rs-sign-out ml-15"></i></a>
                    </div>
                        </div>



                    </div>
                </div>

            </div>
        </div>




@endsection