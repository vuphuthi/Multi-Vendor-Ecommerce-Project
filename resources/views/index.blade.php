@extends('dashboard')
@section('user')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="" rel="nofollow"><i class="fi-rs-home mr-5"></i>Trang chủ</a>
            <span></span> Trang <span></span> Tài khoản của tôi
        </div>
    </div>
</div>
<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    <div class="col-md-3">
                
                
                        @include('frontend.body.dashboard_sidebar_menu')



                    </div>
                    <div class="col-md-9">
                        <div class="tab-content account dashboard-content pl-50">
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">Xin chào {{Auth::user()->name}}</h3>
                                    </div>
                                    <img src="{{(!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo):url('upload/no_image.jpg') }}" alt="user" class="rounded-circle p-1 bg-primary" width="110">
                                    <div class="card-body">
                                        <p>
                                            Từ bảng điều khiển tài khoản của bạn. bạn có thể dễ dàng kiểm tra &amp; xem của bạn <a href="#">những đơn đặt hàng gần đây</a>,<br />
                                            quản lý của bạn <a href="#">địa chỉ giao hàng và thanh toán</a> Và <a href="#">chỉnh sửa mật khẩu và chi tiết tài khoản của bạn.</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">Đơn đặt hàng của bạn</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>#1357</td>
                                                        <td>March 45, 2020</td>
                                                        <td>Processing</td>
                                                        <td>$125.00 for 2 item</td>
                                                        <td><a href="#" class="btn-small d-block">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>#2468</td>
                                                        <td>June 29, 2020</td>
                                                        <td>Completed</td>
                                                        <td>$364.00 for 5 item</td>
                                                        <td><a href="#" class="btn-small d-block">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>#2366</td>
                                                        <td>August 02, 2020</td>
                                                        <td>Completed</td>
                                                        <td>$280.00 for 3 item</td>
                                                        <td><a href="#" class="btn-small d-block">View</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">Theo dõi đơn hàng</h3>
                                    </div>
                                    <div class="card-body contact-from-area">
                                        <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <form class="contact-form-style mt-30 mb-50" action="#" method="post">
                                                    <div class="input-style mb-20">
                                                        <label>Order ID</label>
                                                        <input name="order-id" placeholder="Found in your order confirmation email" type="text" />
                                                    </div>
                                                    <div class="input-style mb-20">
                                                        <label>Billing email</label>
                                                        <input name="billing-email" placeholder="Email you used during checkout" type="email" />
                                                    </div>
                                                    <button class="submit submit-auto-width" type="submit">Track</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card mb-3 mb-lg-0">
                                            <div class="card-header">
                                                <h3 class="mb-0">Địa chỉ thanh toán</h3>
                                            </div>
                                            <div class="card-body">
                                                <address>
                                                    3522 Interstate<br />
                                                    75 Business Spur,<br />
                                                    Sault Ste. <br />Marie, MI 49783
                                                </address>
                                                <p>New York</p>
                                                <a href="#" class="btn-small">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Địa chỉ giao hàng</h5>
                                            </div>
                                            <div class="card-body">
                                                <address>
                                                    4299 Express Lane<br />
                                                    Sarasota, <br />FL 34249 USA <br />Phone: 1.941.227.4444
                                                </address>
                                                <p>Sarasota</p>
                                                <a href="#" class="btn-small">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Chi tiết tài khoản --}}
                            
                            {{-- đổi mật khẩu --}}
                            <div class="tab-pane fade" id="changer-detail" role="tabpanel" aria-labelledby="changer-detail-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Đổi mật khẩu</h5>
                                    </div>
                                    <div class="card-body">
                                        {{-- <p>Already have an account? <a href="page-login.html">Log in instead!</a></p> --}}
                                        <form method="post" action="{{route('user.update.password')}}" enctype="multipart/form-data">
                                            @csrf
                                            @if(session('status'))
                                            <div class="alert alert-success" role='alert'>
                                                {{session('status')}}
                                            </div>
                                            @elseif(session('error'))
                                            <div class="alert alert-danger" role='alert'>
                                                {{session('error')}}
                                            </div>
                                            @endif
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>Mật khẩu cũ <span class="required">*</span></label>
                                                    <input required=""  @error('old_password') is-invalid @enderror placeholder="Mật khẩu cũ"
                                                    id="current_password" class="form-control" name="old_password" id="old_password" type="password" />
                                                    @error('old_password')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Mật khẩu Mới <span class="required">*</span></label>
                                                    <input required=""  @error('new_password') is-invalid @enderror placeholder="Mật khẩu mới"
                                                    id="current_password" class="form-control" name="new_password" id="new_password" type="password" />
                                                    @error('new_password')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Xác nhận mật khẩu <span class="required">*</span></label>
                                                    <input required=""  @error('new_password_confirmation') is-invalid @enderror placeholder="Xác nhận mật khẩu"
                                                    id="new_password_confirmation" class="form-control" name="new_password_confirmation" id="new_password_confirmation" type="password" />
                                                    @error('new_password_confirmation')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Lưu thay đổi</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>
@endsection