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
<div class="tab-content account dashboard-content pl-50">
<div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">

 <div class="card">
    <div class="card-header">
        <h3 class="mb-0">Đơn đặt hàng của bạn</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" style="background:#ddd;font-weight: 600;">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ngày</th>
                        <th>Tổng cộng</th>
                        <th>Thanh toán</th>
                        <th>Hóa đơn</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $order)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{ \Carbon\Carbon::parse($order->order_date)->format('d-m-Y') }}</td>
                        <td> {{ number_format($order->amount,0,',','.') }}&#8363; </td>
                        <td> {{ $order->payment_method }}</td>
                        <td> {{ $order->invoice_no }}</td>
                        <td>
                            @if($order->status == 'pending')
                            <span class="badge rounded-pill bg-warning">Chờ xác nhận</span>
                            @elseif($order->status == 'confirm')
                            <span class="badge rounded-pill bg-info">Xác nhận</span>
                            @elseif($order->status == 'processing')
                            <span class="badge rounded-pill bg-danger">Xử lý</span>
                            @elseif($order->status == 'deliverd')
                            <span class="badge rounded-pill bg-success">Đã giao hàng</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{url('user/order_details/'.$order->id)}}" class="btn-sm btn-success"><i class="fa fa-eye"></i> Xem chi tiết</a>
                            <a href="#" class="btn-sm btn-danger"><i class="fa fa-download"></i> Hóa đơn</a>
                        </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>



@endsection