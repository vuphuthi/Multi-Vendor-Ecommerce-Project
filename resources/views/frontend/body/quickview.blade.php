<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" id="closeModal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <!-- MAIN SLIDES -->
                    <img src="" alt="product image" id="pimage" />
                            <!-- THUMBNAILS -->
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                            {{-- <span class="stock-status out-stock" id="psale">  </span> --}}
                            <h5 class="title-detail"><a href=" " class="text-heading" id="pname"> </a></h5>
                            <br>
                            <div class="attr-detail attr-size mb-30" id="sizeArea">
                                <strong class="mr-10" class="mr-10" style="width:60px;" style="width:60px;">Kích cỡ: </strong>
                                        <select class="form-control unicase-form-control" id="size" name="size">
                                            
                                        </select>
                                    </div>
                               
                               
                                    <div class="attr-detail attr-size mb-30" id="colorArea">
                                <strong class="mr-10" class="mr-10" style="width:60px;" style="width:60px;">Màu: </strong>
                                        <select class="form-control unicase-form-control" id="color" name="color">
                               
                                        </select>
                                    </div>

                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            
                                            <span class="current-price text-brand" id="pprice"> </span>
                                            <span class="current-price text-brand">&#8363;</span>
                            
                                   <span class="old-price font-md ml-15" id="oldprice">  </span>
                                  <span class="old-price font-md ml-15">&#8363; </span>

                                        </div>
                                    </div>
                            <div class="detail-extralink mb-30">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <input type="text" name="qty" id="qty" class="qty-val" value="1" min="1">
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <input type="hidden" name="" id="product_id">
                                    <button type="submit" class="button button-add-to-cart" onclick="addToCart()"><i class="fi-rs-shopping-cart" 
                                    ></i>Thêm vào giỏ hàng</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                    
                                    <div class="font-xs">
                                <ul>
                                    <li class="mb-5">Thương hiệu: <span class="text-brand" id="pbrand"></span></li>
                                    <li class="mb-5">Danh mục:<span class="text-brand" id="pcategory"></span></li>
                                    <li class="mb-5">Người cung cấp:<span class="text-brand" id="pvendor_id"> </span></li>
                                </ul>
                            </div>
                    
                                </div> <!-- // End col  -->
                    
                    
                                  <div class="col-md-6">
                    
                                    <div class="font-xs">
                                <ul>
                                    <li class="mb-5">Mã sản phẩm : <span class="text-brand" id="pcode"></span></li>
                                    <li class="mb-5">Số lượng:<span class="badge badge-pill badge-success"  id="aviable" style="background:green; color: white;"> </span>
                                        <span class="badge badge-pill badge-danger" id="stockout" style="backgound:red; color: white;">Nest </span></li>
                                </ul>
                            </div>
                    
                                </div> <!-- // End col  -->
                    
                    
                    
                            </div> <!-- // end row -->
                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>