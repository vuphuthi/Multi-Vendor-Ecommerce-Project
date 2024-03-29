@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content"> 
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Danh mục con</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm danh mục con</li>
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
                            <form id="myForm" method="post" action="{{ route('store.subcategory') }}" >
                                @csrf
                            <div class="row mb-3">
                                <div class="foe col-sm-3">
                                    <h6 class="mb-0">Tên danh mục</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <select name="category_id" id="category_id" class="form-select mb-3" aria-label="Default select example">
                                        <option disabled selected="">Vui lòng chọn danh mục</option>
                           
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                           
                                        </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="foe col-sm-3">
                                    <h6 class="mb-0">Tên danh mục con</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <input type="text" placeholder="Thêm danh mục" name="subcategory_name" class="form-control" />
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
                category_id: {
                    required : true,
                    min: 1 
                },
                subcategory_name: {
                    required : true,
                }
            },
            messages :{
                category_id: {
                    required : 'Vui lòng chọn danh mục',
                    min: 'Vui lòng chọn danh mục'
                },
                subcategory_name: {
                    required : 'Vui lòng nhập tên danh mục con',
                }
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                if (element.attr("name") == "category_id") {
                    error.addClass('text-danger'); // Sử dụng lớp CSS của Bootstrap để thêm màu đỏ
                    error.insertAfter("#category_id"); // Hiển thị thông báo lỗi sau trường select
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

@endsection