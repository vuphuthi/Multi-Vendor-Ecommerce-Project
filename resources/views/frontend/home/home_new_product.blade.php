@php
    $products = App\Models\Product::where('status', 1)->orderBy('id', 'ASC')->limit(10)->get();
    
    $categories = App\Models\Category::orderBy('category_name','ASC')->limit(10)->get();
@endphp
<section class="product-tabs section-padding position-relative">
    <div class="container">

        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3> Sản phẩm mới </h3>
            <ul class="nav nav-tabs links" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Tất cả</button>
                </li>
                @foreach ($categories as $category)
                    
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="nav-tab-two" data-bs-toggle="tab" href="#category{{ $category->id }}"  type="button" role="tab" aria-controls="tab-two" aria-selected="false">{{$category->category_name}}</a>
                </li>

                @endforeach
            </ul>
        </div>

        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        @foreach ($products as $item)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-none d-xl-block">
                            <div class="product-cart-wrap wow animate__animated animate__fadeIn" data-wow-delay=".5s">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{url('product/details/'.$item->id.'/'.$item->product_slug)}}">
                                            <img class="default-img" src="{{ asset($item->product_thambnail) }}"
                                                alt="" />
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Add To Wishlist" class="action-btn" id="{{ $item->id }}" onclick="addToWishList(this.id)"  ><i class="fi-rs-heart"></i></a>
                                        {{-- <a aria-label="Add To Wishlist" class="action-btn" id="{{ $product->id }}" onclick="addToWishList(this.id)"><i class="fi-rs-heart"></i></a> --}}
                                        <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                                class="fi-rs-shuffle"></i></a>
                                                <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"
                                                id="{{ $item->id }}" onclick="productView(this.id)" >
                                                <i class="fi-rs-eye"></i></a>
                                    </div>
                                    @php
                                        $amount = $item->selling_price - $item->discount_price;
                                        $discount = ($amount / $item->selling_price) * 100;
                                    @endphp

                                    <div class="product-badges product-badges-position product-badges-mrg">

                                        @if ($item->discount_price == null)
                                            <span class="new">New</span>
                                        @else
                                            <span class="hot"> {{ round($discount) }} %</span>
                                        @endif

                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                        
                                        <div class="product-category">
                                            <a href="#">{{ $item->category->category_name }}</a>
                                        </div>
                                    <h2><a href="{{url('product/details/'.$item->id.'/'.$item->product_slug)}}">{{ $item->product_name }}</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 50%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (2.0)</span>
                                    </div>
                                    <div>
                                        @if($item->vendor_id == NULL)
                                        <span class="font-small text-muted">Của <a href="vendor-details-1.html">Người sở hữu</a></span>
                                        @else
                                        <span class="font-small text-muted">Của <a href="vendor-details-1.html">{{ $item['vendor']['name'] }}</a></span>
                                        @endif
                                    </div>
                                    <div class="product-card-bottom">
                                        @if ($item->discount_price == NULL)
                                        <div class="product-price">
                                            <span>{{ number_format($item->selling_price, 0, ',', '.') }}</span>
                                        </div>
                                        @else

                                        <div class="product-price">
                                            <span>{{ number_format($item->selling_price, 0, ',', '.') }}&#8363;</span>
                                            <span class="old-price">{{ number_format($item->discount_price,0, ',', '.') }}&#8363;</span>
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
                        <!--end product card-->
                        @endforeach
                    </div>
                <!--End product-grid-4-->
            </div>

            <!--En tab two-->
            @foreach ($categories as $category)
            
            <div class="tab-pane fade" id="category{{ $category->id }}"  role="tabpanel" aria-labelledby="tab-two">
                <div class="row product-grid-4">
                    @php
                        $catwiseProduct = App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get();
                    @endphp
                    @forelse($catwiseProduct as $product)
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{url('product/details/'.$product->id.'/'.$product->product_slug)}}">
                                        <img class="default-img"
                                            src="{{ asset( $product->product_thambnail ) }}"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn" id="{{ $product->id }}" onclick="addToWishList(this.id)"  ><i class="fi-rs-heart"></i></a> 
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal" 
                                            id="{{ $product->id }}" 
                                            onclick="productView(this.id)"> <i class="fi-rs-eye"></i></a>
                                </div>

                                @php
                                $amount = $product->selling_price - $product->discount_price;
                                $discount = ($amount / $product->selling_price) * 100;
                                @endphp

                                <div class="product-badges product-badges-position product-badges-mrg">

                                    @if ($product->discount_price == NULL)
                                    <span class="hot">New</span>
                                    @else
                                    <span class="hot">{{round($discount)}} %</span>
                                    @endif

                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">{{ $product['category']['category_name'] }}</a>
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
                                    <div class="product-price">
                                        @if ($product->discount_price == NULL)
                                        <span>{{ number_format($product->selling_price, 0, ',', '.') }}&#8363;</span>
                                        @else
                                        <span>{{ number_format($product->selling_price, 0, ',', '.') }}</span>
                                        <span class="old-price">{{ number_format($product->discount_price, 0, ',', '.') }}&#8363;</span>
                                        @endif
                                        
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end product card-->
                    @empty

                <h5 class="text-danger text-center"> Không tìm thấy sản phẩm </h5>
                @endforelse
                </div>
                
                <!--End product-grid-4-->
            </div>
            @endforeach
            
        </div>
        <!--End tab-content-->
    </div>
</section>
