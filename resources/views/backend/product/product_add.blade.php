@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Thương mại điện tử</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm mới</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Thêm sản phẩm mới</h5>
                <hr />
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="product_name" id="inputProductTitle"
                                        placeholder="Tên sản phẩm">
                                </div>

                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Thẻ sản phẩm</label>
                                    <input type="text" name="product_tags" class="form-control visually-hidden"
                                        data-role="tagsinput" value="new product,top product">
                                </div>

                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Kích thước sản phẩm</label>
                                    <input type="text" name="product_size" class="form-control visually-hidden"
                                        data-role="tagsinput" value="Small,Midium,Large ">
                                </div>

                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Màu sản phẩm</label>
                                    <input type="text" name="product_color" class="form-control visually-hidden"
                                        data-role="tagsinput" value="Red,Blue,Black">
                                </div>

                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Mô tả ngắn</label>
                                    <textarea name="short_descp" class="form-control" placeholder="Mô tả ngắn" id="inputProductDescription" rows="3"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Mô tả dài</label>
                                    <textarea id="mytextarea" name="long_descp">Xin chào!</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Hình ảnh thu nhỏ</label>
                                    <input name="product_thambnail" class="form-control" type="file" id="formFile" onChange="mainThamUrl(this)" >
				                    <img src="" id="mainThmb" />
                                </div>

                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Nhiều hình ảnh</label>
                                    <input class="form-control" name="multi_img[]" type="file" id="multiImg" multiple="">
			                        <div class="row" id="preview_img"></div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Giá sản phẩm</label>
                                        <input type="text" name="selling_price" class="form-control" id="inputPrice"
                                            placeholder="00.00">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputCompareatprice" class="form-label">Giảm giá sản phẩm</label>
                                        <input type="text" name="discount_price" class="form-control"
                                            id="inputCompareatprice" placeholder="00.00">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputCostPerPrice" class="form-label">Mã sản phẩm</label>
                                        <input type="text" name="product_code" class="form-control"
                                            id="inputCostPerPrice" placeholder="00.00">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputStarPoints" class="form-label">Số lượng sản phẩm</label>
                                        <input type="text" name="product_qty" class="form-control"
                                            id="inputStarPoints" placeholder="00.00">
                                    </div>

                                    <div class="col-12">
                                        <label for="inputProductType" class="form-label">Thương hiệu sản phẩm</label>
                                        <select name="brand_id" class="form-select" id="inputProductType">
                                            @foreach ($brands as $brand)
                                            <option value="">Chọn thương hiệu sản phẩm</option>
                                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputVendor" class="form-label">danh mục sản phẩm</label>
                                        <select name="category_id" class="form-select" id="inputVendor">
                                            <option>Chọn danh mục sản phẩm</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputCollection" class="form-label">Danh mục phụ sản phẩm</label>
                                        <select name="subcategory_id" class="form-select" id="inputCollection">
                                            <option>Chọn danh mục phụ sản phẩm</option>
                                            @foreach ($subcategories as $subcategory)
                                            <option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label for="inputCollection" class="form-label">Chọn nhà cung cấp</label>
                                        <select name="vendor_id" class="form-select" id="inputCollection">
                                            <option>Chọn nhà cung cấp</option>
                                            @foreach ($activeVendor as $vendor)
                                            <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12">

                                        <div class="row g-3">

                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="hot_deals" type="checkbox"
                                                        value="1" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault"> Ưu đãi lớn</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="featured" type="checkbox"
                                                        value="1" id="flexCheckDefault">
                                                    <label class="form-check-label"
                                                        for="flexCheckDefault">Đặc sắc</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="special_offer" type="checkbox"
                                                        value="1" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">Đề xuất đặc biệt</label>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="special_deals" type="checkbox"
                                                        value="1" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">Ưu đãi đặc biệt</label>
                                                </div>
                                            </div>
                                        </div> <!-- // end row  -->
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="button" class="btn btn-primary">Lưu sản phẩm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
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
                  if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                      var fRead = new FileReader(); //new filereader
                      fRead.onload = (function(file){ //trigger function on successful read
                      return function(e) {
                          var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                      .height(80); //create image element 
                          $('#preview_img').append(img); //append image to output element
                      };
                      })(file);
                      fRead.readAsDataURL(file); //URL representing the file's data.
                  }
              });
               
          }else{
              alert("Your browser doesn't support File API!"); //if File API is absent
          }
       });
      });
       
      </script>
@endsection
