@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content"> 
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Thông tin nhà cung cấp</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Chi tiết hồ sơ nhà cung cấp</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{route('inactive.vendor.approve')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" id="" value="{{$ActiveVendorDetails->id}}"> 
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Tên tài khoản</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="username" class="form-control" value="{{$ActiveVendorDetails->username}}" disabled />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Tên cửa hàng</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" disabled name="name" class="form-control" value="{{$ActiveVendorDetails->name}}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" disabled name="email" class="form-control" value="{{$ActiveVendorDetails->email}}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Số điện thoại</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" disabled name="phone" class="form-control" value="{{$ActiveVendorDetails->phone}}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Địa Chỉ</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="address" disabled class="form-control" value="{{$ActiveVendorDetails->address}}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">ngày tham gia</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select name="vendor_join" class="form-select mb-3" disabled aria-label="Default select example">
                                        <option selected="" >Chọn này tham gia</option>
                    
                                        <option value="2022" {{ $ActiveVendorDetails->vendor_join == 2022  ? 'selected' : '' }}>2022</option>
                                        <option value="2023" {{ $ActiveVendorDetails->vendor_join == 2023  ? 'selected' : '' }}>2023</option>
                                        <option value="2024" {{ $ActiveVendorDetails->vendor_join == 2024  ? 'selected' : '' }}>2024</option>
                                        <option value="2025" {{ $ActiveVendorDetails->vendor_join == 2025  ? 'selected' : '' }}>2025</option>
                                        <option value="2026" {{ $ActiveVendorDetails->vendor_join == 2026  ? 'selected' : '' }}>2026</option>
                                         </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Thông tin</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <textarea name="vendor_short_info" disabled class="form-control" id="inputAddress2" placeholder="Thông tin " rows="3">{{$ActiveVendorDetails->vendor_short_info}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Ảnh</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="file" name="photo" disabled class="form-control" id="image"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0"></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <img id="showImage" src="{{(!empty($ActiveVendorDetails->photo)) ? url('upload/vendor_images/'.$ActiveVendorDetails->photo):url('upload/no_image.jpg') }}" alt="Admin" style="width:100px;height:100px">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-danger px-4" value="Inactive nhà cung cấp" />
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