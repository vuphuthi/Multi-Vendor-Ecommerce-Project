@extends('dashboard') 
@section('user')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


  <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('dashboard')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Trang chủ</a>
                    <span></span> Đơn đặt hàng của bạn
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
<div class="row">

<!-- // Start Col md 3 menu -->

<div class="col-md-3">
    @include('frontend.body.dashboard_sidebar_menu')
</div>
<!-- // End Col md 3 menu -->




<div class="col-md-9">

    <div class="row">
    
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h4>Chi Tiết Giao Hàng</h4></div>
                <hr>
                <div class="card-body">
                    <table class="table" style="background:#F4F6FA;font-weight: 600;">
                        <tr>
                            <th>Họ và tên:</th>
                            <th>{{ $order->name }}</th>
                        </tr>
                        <tr>
                            <th>Số điện Thoại:</th>
                            <th>{{ $order->phone }}</th>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <th>{{ $order->email }}</th>
                        </tr>
                        <tr>
                            <th>Địa Chỉ:</th>
                            <th>{{ $order->adress }}</th>
                        </tr>
                        <tr>
                            <th>Tỉnh/Thành Phố:</th>
                            <th>{{ $order->division->division_name }}</th>
                        </tr>
                        <tr>
                            <th>Quận/Huyện:</th>
                            <th>{{ $order->district->district_name }}</th>
                        </tr>
                        <tr>
                            <th>Thị Xã/Huyện:</th>
                            <th>{{ $order->state->state_name }}</th>
                        </tr>
                        <tr>
                            <th>Mã Bưu Chính:</th>
                            <th>{{ $order->post_code }}</th>
                        </tr>
                        <tr>
                            <th>Ngày Đặt Hàng:</th>
                            <th>{{ \Carbon\Carbon::parse($order->order_date)->format('d-m-Y') }}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- // end col-md-6 -->
    
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h4>Chi Tiết Đơn Hàng <br/>
                    <span class="text-danger">Hóa Đơn: {{ $order->invoice_no }}</span></h4>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table" style="background:#F4F6FA;font-weight: 600;">
                        <tr>
                            <th>Tên:</th>
                            <th>{{ $order->user->name }}</th>
                        </tr>
                        <tr>
                            <th>Điện Thoại:</th>
                            <th>{{ $order->user->phone }}</th>
                        </tr>
                        <tr>
                            <th>Phương Thức Thanh Toán:</th>
                            <th>{{ $order->payment_method }}</th>
                        </tr>
                        <tr>
                            <th>ID Giao Dịch:</th>
                            <th>{{ $order->transaction_id }}</th>
                        </tr>
                        <tr>
                            <th>Hóa Đơn:</th>
                            <th class="text-danger">{{ $order->invoice_no }}</th>
                        </tr>
                        <tr>
                            <th>Số Tiền Đặt Hàng:</th>
                            <th>{{ number_format($order->amount,0,',','.') }}&#8363;</th>
                        </tr>
                        <tr>
                            <th>Tình Trạng Đơn Hàng:</th>
                            <th>
                                @if($order->status == 'pending')
                                <span class="badge rounded-pill bg-warning">Chờ xác nhận</span>
                                @elseif($order->status == 'confirm')
                                <span class="badge rounded-pill bg-info">Xác nhận</span>
                                @elseif($order->status == 'processing')
                                <span class="badge rounded-pill bg-danger">Xử lý</span>
                                @elseif($order->status == 'deliverd')
                                <span class="badge rounded-pill bg-success">Đã giao hàng</span>
                                @endif
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- // end col-md-6 -->
    
    </div><!-- // end row -->

    </div>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table" style="font-weight: 600;">
                    <tbody>
                        <tr>
                            <td class="col-md-1">
                                <label>Hình ảnh</label>
                            </td>
                            <td class="col-md-2">
                                <label>Tên sản phẩm</label>
                            </td>
                            <td class="col-md-2">
                                <label>Tên nhà cung cấp</label>
                            </td>
                            <td class="col-md-2">
                                <label>Mã sản phẩm</label>
                            </td>
                            <td class="col-md-1">
                                <label>Màu sắc</label>
                            </td>
                            <td class="col-md-1">
                                <label>Kích thước</label>
                            </td>
                            <td class="col-md-1">
                                <label>Số lượng</label>
                            </td>
                            <td class="col-md-3">
                                <label>Giá</label>
                            </td>
                        </tr>
                        @foreach($orderItem as $item)
                        <tr>
                            <td class="col-md-1">
                                <label><img src="{{ asset($item->product->product_thambnail) }}" style="width:50px; height:50px;"></label>
                            </td>
                            <td class="col-md-2">
                                <label>{{ $item->product->product_name }}</label>
                            </td>
                            @if($item->vendor_id == NULL)
                            <td class="col-md-2">
                                <label>Chủ sở hữu</label>
                            </td>
                            @else
                            <td class="col-md-2">
                                <label>{{ $item->product->vendor->name }}</label>
                            </td>
                            @endif
                            <td class="col-md-2">
                                <label>{{ $item->product->product_code }}</label>
                            </td>
                            @if($item->color == NULL)
                            <td class="col-md-1">
                                <label>....</label>
                            </td>
                            @else
                            <td class="col-md-1">
                                <label>{{ $item->color }}</label>
                            </td>
                            @endif
                            @if($item->size == NULL)
                            <td class="col-md-1">
                                <label>....</label>
                            </td>
                            @else
                            <td class="col-md-1">
                                <label>{{ $item->size }}</label>
                            </td>
                            @endif
                            <td class="col-md-1">
                                <label>{{ $item->qty }}</label>
                            </td>
                            <td class="col-md-3">
                                <label>{{ number_format($item->price,0,',','.') }}&#8363; <br> Tổng cộng: {{ number_format($item->price * $item->qty,0,',','.') }}&#8363;</label>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




@endsection