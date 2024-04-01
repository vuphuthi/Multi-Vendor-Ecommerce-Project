<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
    <div class="product-image-slider">
        <figure class="border-radius-10">
            <img src="" alt="product image"  />
        </figure>
                            </div>
                            <!-- THUMBNAILS -->
    <div class="slider-nav-thumbnails">
        <div><img src="" alt="product image" id="pimage" /></div>
    </div>
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                            <span class="stock-status out-stock">  </span>
                            <h3 class="title-detail"><a href="shop-product-right.html" id="pname" class="text-heading"></a></h3>

                            <div class="attr-detail attr-size mb-30" id="sizeArea">
                                <strong class="mr-10" style="width:60px;">Size : </strong>
                                        <select class="form-control unicase-form-control" id="size" name="size">
                                        </select>
                                    </div>
                               
                               
                                    <div class="attr-detail attr-size mb-30" id="colorArea">
                                <strong class="mr-10" style="width:60px;">Color : </strong>
                                        <select class="form-control unicase-form-control" id="color" name="color">
                               
                                        </select>
                                    </div>

                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand" id="pprice">$</span>
                                    <span>
                                        <span class="old-price font-md ml-15" id="oldprice">$</span>
                                    </span>
                                </div>
                            </div>
                            <div class="detail-extralink mb-30">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <input type="text" name="qty" id="qty" class="qty-val" value="1" min="1">
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart" onclick="AddToCard()"></i>Thêm vào giỏ hàng</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                    
                                    <div class="font-xs">
                                <ul>
                                    <li class="mb-5">Brand: <span class="text-brand" id="pbrand"></span></li>
                                    <li class="mb-5">Category:<span class="text-brand" id="pcategory"></span></li>
                                </ul>
                            </div>
                    
                                </div> <!-- // End col  -->
                    
                    
                                  <div class="col-md-6">
                    
                                    <div class="font-xs">
                                <ul>
                                    <li class="mb-5">Product Code : <span class="text-brand" id="pcode"></span></li>
                                    <li class="mb-5">Stock:<span class="badge badge-pill badge-success"  id="aviable" style="backgound:green; color: white;"> </span>
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