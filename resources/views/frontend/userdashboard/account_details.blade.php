@extends('dashboard') 
@section('user')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


  <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Trang chủ</a>
                    <span></span> Chi tiết tài khoản
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
            <h5>Chi tiết tài khoản</h5>
        </div>
        <div class="card-body">
            {{-- <p>Already have an account? <a href="page-login.html">Log in instead!</a></p> --}}
            <form method="post" action="{{route('user.profile.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Tên tài khoản <span class="required">*</span></label>
                        <input required="" value="{{$userData->username}}" id="username" class="form-control" name="username" type="text" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Họ và tên <span class="required">*</span></label>
                        <input required="" value="{{$userData->name}}" id="name" class="form-control" name="name" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Email <span class="required">*</span></label>
                        <input required="" value="{{$userData->email}}" class="form-control" id="email" name="email" type="email" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Số điện thoại <span class="required">*</span></label>
                        <input required="" value="{{$userData->phone}}" class="form-control" name="phone" id="phone" type="text" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Địa chỉ <span class="required">*</span></label>
                        <input required="" value="{{$userData->address}}" class="form-control" id="address" name="address" type="text" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Ảnh <span class="required">*</span></label>
                        <input type="file" name="photo" name="image" class="form-control" id="image"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label><span class="required">*</span></label>
                        <img id="showImage" src="{{(!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo):url('upload/no_image.jpg') }}" alt="User" style="width:100px;height:100px">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Lưu thay đổi</button>
                    </div>
                </div>
            </form>
        </div>

        <script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>



@endsection