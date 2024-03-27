@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content"> 
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Banner</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">sửa banner</li>
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
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form id="myForm" method="post" action="{{ route('update.banner') }}" enctype="multipart/form-data" >
                                @csrf
                                <input type="hidden" name="id" value="{{$banner->id}}" id="">
                                <input type="hidden" name="old_img" value="{{$banner->banner_image}}" id="">
                            <div class="row mb-3">
                                <div class="foe col-sm-3">
                                    <h6 class="mb-0">Tiêu đề</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <input type="text" placeholder="Nhập tiêu đề" value="{{$banner->banner_title}}" name="banner_title" class="form-control" />
                                </div>
                            </div>
                           
                            <div class="row mb-3">
                                <div class="foe col-sm-3">
                                    <h6 class="mb-0">Đường dẫn</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <input type="text" placeholder="Nhập đường dẫn" value="{{$banner->banner_url}}" name="banner_url" class="form-control" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Hình ảnh</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <input type="file" name="banner_image" class="form-control" id="image"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0"></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <img id="showImage" src="{{asset($banner->banner_image)}}" alt="Admin" style="width:100px;height:100px">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="Lưu thay đổi" />
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
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                banner_title: {
                    required : true,
                },
                banner_url: {
                    required : true,
                }
            },
            messages :{
                banner_title: {
                    required : 'Vui lòng nhập tiêu đề',
                },
                banner_url: {
                    required : 'Vui lòng nhập đường dẫn',
                }
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                if (element.attr("name") == "category_image") {
                    error.addClass('text-danger'); // Sử dụng lớp CSS của Bootstrap để thêm màu đỏ
                    error.insertAfter("#showImage"); // Hiển thị thông báo lỗi sau ảnh
                } else {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                }
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>

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