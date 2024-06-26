@extends('frontend.master_dashboard')
@section('main')
    @include('frontend.home.home_slider')
        <!--End hero slider-->
    @include('frontend.home.home_features_category')
        
        <!--End category slider-->
    @include('frontend.home.home_banner')
        
        <!--End banners-->

        @include('frontend.home.home_new_product')

        <!--Products Tabs-->

        @include('frontend.home.home_features_product')

        <!--End Best Sales-->


        <!-- TV Category -->

    <section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title style-2 wow animate__animated animate__fadeIn">
                    <h3>{{$skip_category_0->category_name}} </h3>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                       
                            
                        
                        <div class="row product-grid-4">
                            @foreach ($skip_product_0 as $product)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                                <img class="default-img" src="{{ asset($product->product_thambnail) }}"
                                                alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Add To Wishlist" class="action-btn" id="{{ $product->id }}" onclick="addToWishList(this.id)"  ><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn" onclick="addToCompare(this.id)" id="{{ $product->id }} "><i
                                                    class="fi-rs-shuffle"></i></a>
                                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                                                    id="{{ $product->id }}" onclick="productView(this.id)" >
                                                    <i class="fi-rs-eye"></i></a>
                                        </div>
                                        @php
                                        $amount = $product->selling_price - $product->discount_price;
                                        $discount = ($amount / $product->selling_price) * 100;
                                    @endphp

                                    <div class="product-badges product-badges-position product-badges-mrg">

                                        @if ($product->discount_price == null)
                                            <span class="new">Mới</span>
                                        @else
                                            <span class="hot"> {{ round($discount) }} %</span>
                                        @endif

                                    </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{ $product['category']['category_name'] }}</a>
                                        </div>
                                        <h2><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{ $product->product_name }}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div>
                                            @if($product->vendor_id == NULL)
                                            <span class="font-small text-muted">Của <a href="vendor-details-1.html">Người sở hữu</a></span>
                                            @else
                                            <span class="font-small text-muted">Của <a href="vendor-details-1.html">{{ $product['vendor']['name'] }}</a></span>
                                            @endif
                                        </div>
                                        <div class="product-card-bottom">
                                            @if ($product->discount_price == NULL)
                                            <div class="product-price">
                                                <span>{{ number_format($product->selling_price, 0, ',', '.') }}</span>
                                            </div>
                                            @else
    
                                            <div class="product-price">
                                                <span>{{ number_format($product->selling_price, 0, ',', '.') }}&#8363;</span>
                                                <span class="old-price">{{ number_format($product->discount_price,0, ',', '.') }}&#8363;</span>
                                            </div>
    
                                            @endif
                                            
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            @endforeach
                            <!--end product card-->

                        </div>
                        <!--End product-grid-4-->
                    </div>
                   
                   
                </div>
                <!--End tab-content-->
            </div>


  </section>
        <!--End TV Category -->





        <!-- Tshirt Category -->

        <section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title style-2 wow animate__animated animate__fadeIn">
                    <h3>{{$skip_category_4->category_name}} </h3>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                       
                        <div class="row product-grid-4">
                            @foreach ($skip_product_4 as $product)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                                <img class="default-img" src="{{ asset($product->product_thambnail) }}"
                                                alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Add To Wishlist" class="action-btn" id="{{ $product->id }}" onclick="addToWishList(this.id)"  ><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn" onclick="addToCompare(this.id)" id="{{ $product->id }} "><i
                                                    class="fi-rs-shuffle"></i></a>
                                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                                                    id="{{ $product->id }}" onclick="productView(this.id)" >
                                                    <i class="fi-rs-eye"></i></a>
                                        </div>
                                        @php
                                        $amount = $product->selling_price - $product->discount_price;
                                        $discount = ($amount / $product->selling_price) * 100;
                                    @endphp

                                    <div class="product-badges product-badges-position product-badges-mrg">

                                        @if ($product->discount_price == null)
                                            <span class="new">Mới</span>
                                        @else
                                            <span class="hot"> {{ round($discount) }} %</span>
                                        @endif

                                    </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{ $product['category']['category_name'] }}</a>
                                        </div>
                                        <h2><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{ $product->product_name }}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div>
                                            @if($product->vendor_id == NULL)
                                            <span class="font-small text-muted">Của <a href="vendor-details-1.html">Người sở hữu</a></span>
                                            @else
                                            <span class="font-small text-muted">Của <a href="vendor-details-1.html">{{ $product['vendor']['name'] }}</a></span>
                                            @endif
                                        </div>
                                        <div class="product-card-bottom">
                                            @if ($product->discount_price == NULL)
                                            <div class="product-price">
                                                <span>{{ number_format($product->selling_price, 0, ',', '.') }}</span>
                                            </div>
                                            @else
    
                                            <div class="product-price">
                                                <span>{{ number_format($product->selling_price, 0, ',', '.') }}&#8363;</span>
                                                <span class="old-price">{{ number_format($product->discount_price,0, ',', '.') }}&#8363;</span>
                                            </div>
    
                                            @endif
                                            
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            @endforeach
                            <!--end product card-->

                        </div>
                        <!--End product-grid-4-->
                    </div>
                   
                   
                </div>
                <!--End tab-content-->
            </div>


  </section>
        <!--End Tshirt Category -->


 





        <!-- Computer Category -->

        <section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title style-2 wow animate__animated animate__fadeIn">
                    <h3>{{$skip_category_2->category_name}} </h3>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                       
                        <div class="row product-grid-4">
                            @foreach ($skip_product_2 as $product)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                                <img class="default-img" src="{{ asset($product->product_thambnail) }}"
                                                alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Add To Wishlist" class="action-btn" id="{{ $product->id }}" onclick="addToWishList(this.id)"  ><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn" onclick="addToCompare(this.id)" id="{{ $product->id }} "><i
                                                    class="fi-rs-shuffle"></i></a>
                                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                                                    id="{{ $product->id }}" onclick="productView(this.id)" >
                                                    <i class="fi-rs-eye"></i></a>
                                        </div>
                                        @php
                                        $amount = $product->selling_price - $product->discount_price;
                                        $discount = ($amount / $product->selling_price) * 100;
                                    @endphp

                                    <div class="product-badges product-badges-position product-badges-mrg">

                                        @if ($product->discount_price == null)
                                            <span class="new">Mới</span>
                                        @else
                                            <span class="hot"> {{ round($discount) }} %</span>
                                        @endif

                                    </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{ $product['category']['category_name'] }}</a>
                                        </div>
                                        <h2><a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">{{ $product->product_name }}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div>
                                            @if($product->vendor_id == NULL)
                                            <span class="font-small text-muted">Của <a href="vendor-details-1.html">Người sở hữu</a></span>
                                            @else
                                            <span class="font-small text-muted">Của <a href="vendor-details-1.html">{{ $product['vendor']['name'] }}</a></span>
                                            @endif
                                        </div>
                                        <div class="product-card-bottom">
                                            @if ($product->discount_price == NULL)
                                            <div class="product-price">
                                                <span>{{ number_format($product->selling_price, 0, ',', '.') }}</span>
                                            </div>
                                            @else
    
                                            <div class="product-price">
                                                <span>{{ number_format($product->selling_price, 0, ',', '.') }}&#8363;</span>
                                                <span class="old-price">{{ number_format($product->discount_price,0, ',', '.') }}&#8363;</span>
                                            </div>
    
                                            @endif
                                            
                                            <div class="add-cart">
                                                <a class="add" href="shop-cart.html"><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            @endforeach
                            <!--end product card-->

                        </div>
                        <!--End product-grid-4-->
                    </div>
                   
                   
                </div>
                <!--End tab-content-->
            </div>


  </section>
        <!--End Computer Category -->

        <section class="section-padding mb-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <h4 class="section-title style-1 mb-30 animated animated"> Ưu đãi nóng hổi </h4>
                        <div class="product-list-small animated animated">
                            @foreach ($hotdeals as $product)
                                                        
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html">
                                        <img src="{{ asset($product->product_thambnail) }}" alt="" />
                                    </a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">{{$product->product_name}}</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                            
                                        @if($product->discount_price == NULL)
                                        <div class="product-price">
                                            <span>{{ number_format($product->selling_price, 0, ',', '.') }}&#8363; </span>
                                       </div>
                   
                                       @else
                                       <div class="product-price">
                                        <span>{{ number_format($product->selling_price, 0, ',', '.') }}&#8363; </span>
                                        <span class="old-price">{{ number_format($product->discount_price, 0, ',', '.') }} &#8363;</span>
                                       </div>
                                       @endif

                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>


                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <h4 class="section-title style-1 mb-30 animated animated"> Khuyến mãi đặc biệt </h4>
                        <div class="product-list-small animated animated">
                            @foreach ($special_offer as $product)
                                                        
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html">
                                        <img src="{{ asset($product->product_thambnail) }}" alt="" />
                                    </a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">{{$product->product_name}}</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                            
                                        @if($product->discount_price == NULL)
                                        <div class="product-price">
                                            <span>{{ number_format($product->selling_price, 0, ',', '.') }}&#8363; </span>
                                       </div>
                   
                                       @else
                                       <div class="product-price">
                                        <span>{{ number_format($product->selling_price, 0, ',', '.') }}&#8363; </span>
                                        <span class="old-price">{{ number_format($product->discount_price, 0, ',', '.') }} &#8363;</span>
                                       </div>
                                       @endif

                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <h4 class="section-title style-1 mb-30 animated animated"> Đã thêm gần đây </h4>
                        <div class="product-list-small animated animated">
                            @foreach ($new as $product)
                                                        
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html">
                                        <img src="{{ asset($product->product_thambnail) }}" alt="" />
                                    </a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">{{$product->product_name}}</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                            
                                        @if($product->discount_price == NULL)
                                        <div class="product-price">
                                            <span>{{ number_format($product->selling_price, 0, ',', '.') }}&#8363; </span>
                                       </div>
                   
                                       @else
                                       <div class="product-price">
                                        <span>{{ number_format($product->selling_price, 0, ',', '.') }}&#8363; </span>
                                        <span class="old-price">{{ number_format($product->discount_price, 0, ',', '.') }} &#8363;</span>
                                       </div>
                                       @endif

                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>


                    <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <h4 class="section-title style-1 mb-30 animated animated"> Siêu ưu đãi khủng </h4>
                        <div class="product-list-small animated animated">
                            @foreach ($special_deals as $product)
                                                        
                            <article class="row align-items-center hover-up">
                                <figure class="col-md-4 mb-0">
                                    <a href="shop-product-right.html">
                                        <img src="{{ asset($product->product_thambnail) }}" alt="" />
                                    </a>
                                </figure>
                                <div class="col-md-8 mb-0">
                                    <h6>
                                        <a href="shop-product-right.html">{{$product->product_name}}</a>
                                    </h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <div class="product-price">
                                            
                                        @if($product->discount_price == NULL)
                                        <div class="product-price">
                                            <span>{{ number_format($product->selling_price, 0, ',', '.') }}&#8363; </span>
                                       </div>
                   
                                       @else
                                       <div class="product-price">
                                        <span>{{ number_format($product->selling_price, 0, ',', '.') }}&#8363; </span>
                                        <span class="old-price">{{ number_format($product->discount_price, 0, ',', '.') }} &#8363;</span>
                                       </div>
                                       @endif

                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End 4 columns-->









  <!--Vendor List -->


        @include('frontend.home.home_vendor_list')

 <!--End Vendor List -->

@endsection