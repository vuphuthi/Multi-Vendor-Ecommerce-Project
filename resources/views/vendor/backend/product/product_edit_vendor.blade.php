@extends('vendor.vendor_dashboard')
@section('vendor')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Chỉnh sửa sản phẩm</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Sửa sản phẩm</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Sửa sản phẩm</h5>
                <hr />
                <form id="myForm" method="post" action="{{ route('vendor.update.product')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$products->id}}" id="">
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">
                                
                                <div class="mb-3 form-group">
                                    <label for="inputProductTitle" class="form-label">Tên sản phẩm</label>
                                    <input type="text" class="form-control" value="{{$products->product_name}}" name="product_name" id="inputProductTitle"
                                        placeholder="Tên sản phẩm">
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="inputProductTitle" class="form-label">Thẻ sản phẩm</label>
                                    <input type="text" name="product_tags" value="{{$products->product_tags}}" class="form-control visually-hidden"
                                        data-role="tagsinput" value="new product,top product">
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="inputProductTitle" class="form-label">Kích thước sản phẩm</label>
                                    <input type="text" name="product_size" value="{{$products->product_size}}" class="form-control visually-hidden"
                                        data-role="tagsinput" value="Small,Midium,Large ">
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="inputProductTitle" class="form-label">Màu sản phẩm</label>
                                    <input type="text" name="product_color" value="{{$products->product_color}}" class="form-control visually-hidden"
                                        data-role="tagsinput" value="Red,Blue,Black">
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="inputProductDescription" class="form-label">Mô tả ngắn</label>
                                    <textarea name="short_descp"  class="form-control" placeholder="Mô tả ngắn" id="inputProductDescription" rows="3">{{$products->short_descp}}</textarea>
                                </div>

                                <div class="mb-3 form-group">
                                    <label for="inputProductDescription" class="form-label">Mô tả dài</label>
                                    {{-- <textarea id="mytextarea" name="long_descp"></textarea> --}}
                                    <textarea name="long_descp" class="form-control" placeholder="Mô tả dài" id="mytextarea" rows="3">{!! $products->long_descp !!}</textarea>
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-4 form-group">
                            <div class="border border-3 p-4 rounded form-group">
                                <div class="row g-3">
                                    
                                    <div class="col-md-6 form-group">
                                        <label for="inputPrice" class="form-label">Giá sản phẩm</label>
                                        <input type="text" name="selling_price" value="{{$products->selling_price}}" class="form-control" id="inputPrice"
                                            placeholder="00.00">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="inputCompareatprice" class="form-label">Giảm giá sản phẩm</label>
                                        <input type="text" name="discount_price" value="{{$products->discount_price}}" class="form-control"
                                            id="inputCompareatprice" placeholder="00.00">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="inputCostPerPrice" class="form-label">Mã sản phẩm</label>
                                        <input type="text" name="product_code" value="{{$products->product_code}}" class="form-control"
                                            id="inputCostPerPrice" placeholder="00.00">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="inputStarPoints" class="form-label">Số lượng sản phẩm</label>
                                        <input type="text" name="product_qty" value="{{$products->product_qty}}" class="form-control"
                                            id="inputStarPoints" placeholder="00.00">
                                    </div>

                                    <div class="col-12 form-group">
                                        <label for="inputProductType" class="form-label">Thương hiệu sản phẩm</label>
                                        <select name="brand_id" class="form-select" id="inputProductType">
                                            @foreach ($brands as $brand)
                                            {{-- <option value="">Chọn thương hiệu sản phẩm</option> --}}
                                            <option value="{{$brand->id}}" {{$brand->id == $products->brand_id ? 'selected' : ''}}>{{$brand->brand_name}}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="inputVendor" class="form-label">danh mục sản phẩm</label>
                                        <select name="category_id" class="form-select" id="inputVendor">
                                            @foreach ($categories as $category)
                                            {{-- <option value="">Chọn danh mục sản phẩm</option> --}}
                                            <option value="{{$category->id}}" {{$category->id == $products->category_id ? 'selected' : ''}}>{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="inputCollection" class="form-label">Danh mục phụ sản phẩm</label>
                                        <select name="subcategory_id" class="form-select" id="inputCollection">
                                            {{-- <option value="">Chọn danh mục phụ sản phẩm</option> --}}
                                            @foreach ($Subcategory as $subcate)
                                            <option value="{{$subcate->id}}" {{$subcate->id == $products->subcategory_id ? 'selected' : ''}}>{{$subcate->subcategory_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12">

                                        <div class="row g-3">

                                            <div class="col-md-6">
                                                <div class="form-check form-group">
                                                    <input class="form-check-input" name="hot_deals" {{$products->hot_deals == 1 ? 'checked' : ''}} type="checkbox"
                                                        value="1" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault"> Ưu đãi lớn</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-check form-group">
                                                    <input class="form-check-input" name="featured" {{$products->featured == 1 ? 'checked' : ''}} type="checkbox"
                                                        value="1" id="flexCheckDefault">
                                                    <label class="form-check-label"
                                                        for="flexCheckDefault">Đặc sắc</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group form-check">
                                                    <input class="form-check-input" name="special_offer" {{$products->special_offer == 1 ? 'checked' : ''}} type="checkbox"
                                                        value="1" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">Đề xuất đặc biệt</label>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group form-check ">
                                                    <input class="form-check-input" {{$products->special_deals == 1 ? 'checked' : ''}} name="special_deals" type="checkbox"
                                                        value="1" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">Ưu đãi đặc biệt</label>
                                                </div>
                                            </div>
                                        </div> <!-- // end row  -->
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
            </div>
            
            <form id="myForm" method="post" action="{{ route('vendor.update.product.thambnail')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$products->id}}" id="">
                <input type="hidden" name="old_img" value="{{$products->product_thambnail}}" id="">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0 text-uppercase">Sửa hình ảnh</h6>
                    <hr>

                    <div class="mb-3 form-group">
                        <label for="formFile" class="form-label">Hình ảnh</label>
                        <input class="form-control" name="product_thambnail" type="file" id="formFile">
                    </div>

                    <div class="mb-3 form-group">
                        <label for="formFileMultiple" class="form-label"></label>
                        <img src="{{asset($products->product_thambnail)}}" alt="anh" width="100px" height="100px">
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu hình ảnh</button>
        
                </div>
            </div>
            </form>
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0 text-uppercase">Cập nhật nhiều hình ảnh</h6>
                    <hr>
                    <table class="table mb-0 table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Thay đổi ảnh</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form id="myForm" method="post" action="{{ route('vendor.update.product.multiimage')}}" enctype="multipart/form-data">
                                @csrf

                                @foreach ($multiImgs as $key => $img)

                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td> <img src="{{asset($img->photo_name)}}" style="width:70; height: 40px;" alt=""> </td>
                                    <td><input type="file" name="multi_img[{{$img->id}}]" id=""></td>
                                    <td> 
                                        <input type="submit" class="btn btn-primary px-4" value="Cập nhật " />		
                                        <a href="{{ route('vendor.product.multiimg.delete',$img->id) }}" class="btn btn-danger" id="delete" >Xóa</a>		
                                    </td>
                                </tr>

                                @endforeach
                                

                            </form>
                            

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <script type="text/javascript">
        function mainThamUrl(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThmb').attr('src',e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    
    
    <script> 
     
      $(document).ready(function(){
       $('#multiImg').on('change', function(){ //on file input change
          if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
          {
              var data = $(this)[0].files; //this file data
               
              $.each(data, function(index, file){ //loop though each file
                  if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                      var fRead = new FileReader(); //new filereader
                      fRead.onload = (function(file){ //trigger function on successful read
                      return function(e) {
                          var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                      .height(80); //create image element 
                          $('#preview_img').append(img); //append image to output vendor_id
                      };
                      })(file);
                      fRead.readAsDataURL(file); //URL representing the file's data.
                  }
              });
               
          }else{
              alert("Trình duyệt của bạn không hỗ trợ API tệp!"); //if File API is absent
          }
       });
      });
       
      </script>
      <script type="text/javascript">
  		
        $(document).ready(function(){
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/vendor/subcategory/ajax') }}/"+category_id,
                        type: "GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="subcategory_id"]').html('');
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
</script>
<script type="text/javascript">
    $(document).ready(function (){
    $('#myForm').validate({
        rules: {
            product_name: {
                required: true,
            }, 
            short_descp: {
                required: true,
            },
            long_descp: {
                required: true,
            },
            product_thambnail: {
                required: true,
            },
            vendor_id: {
                required: true,
            },
            'multi_img[]': {
                required: true,
                accept: 'image/*', // Chỉ chấp nhận các tệp hình ảnh
            },  
            selling_price: {
                required: true,
            },                   
            product_code: {
                required: true,
            }, 
            product_qty: {
                required: true,
            }, 
            brand_id: {
                required: true,
            }, 
            category_id: {
                required: true,
            }, 
            subcategory_id: {
                required: true,
            }, 
        },
        messages: {
            product_name: {
                required: 'Vui lòng nhập tên sản phẩm',
            },
            short_descp: {
                required: 'Vui lòng nhập mô tả ngắn',
            },
            long_descp: {
                required: 'Vui lòng nhập mô tả dài',
            },
            product_thambnail: {
                required: 'Vui lòng chọn Sản Phẩm Hình Ảnh Thambnail',
            },
            'multi_img[]': {
                required: 'Vui lòng chọn Sản Phẩm Nhiều Hình Ảnh',
            },
            selling_price: {
                required: 'Vui lòng nhập giá bán',
            }, 
            product_code: {
                required: 'Vui lòng nhập Mã Sản Phẩm',
            },
            vendor_id: {
                required: 'Vui lòng chọn nhà cung cấp',
            },
            product_qty: {
                required: 'Vui lòng nhập số lượng sản phẩm',
            },
            brand_id: {
                required: 'Vui lòng chọn thương hiệu',
            }, 
            category_id: {
                required: 'Vui lòng chọn danh mục',
            }, 
            subcategory_id: {
                required: 'Vui lòng chọn danh mục phụ',
            },
        },
        errorElement: 'span', 
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
    });
});

</script>
@endsection
