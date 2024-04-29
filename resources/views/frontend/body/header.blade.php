<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <span>Khai mạc <strong>Lên đến 15%</strong>tất cả các mục. Chỉ <strong>3 ngày</strong> bên trái</span>
    </div>
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            
                            <li><a href="page-account.html">Giỏ hàng của tôi</a></li>
                            <li><a href="shop-wishlist.html">Thanh toán</a></li>
                            <li><a href="shop-order.html">Theo dõi đơn hàng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>Giao hàng an toàn 100% mà không cần liên hệ với người chuyển phát nhanh</li>
                                <li>Ưu đãi giá trị bữa tối - Tiết kiệm nhiều hơn với phiếu giảm giá</li>
                                <li>Trang sức bạc 25 hợp thời trang, giảm giá 35% ngay hôm nay</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                           
            <li>
                <a class="language-dropdown-active" href="#">Việt Nam <i class="fi-rs-angle-small-down"></i></a>
                <ul class="language-dropdown">
                    <li>
                        <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/flag-fr.png') }}" alt="" />Français</a>
                    </li>
                    <li>
                        <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/flag-dt.png') }}" alt="" />Deutsch</a>
                    </li>
                    <li>
                        <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/flag-ru.png') }}" alt="" />Pусский</a>
                    </li>
                </ul>
            </li>

             <li>Cần giúp đỡ? Gọi cho chúng tôi: <strong class="text-brand"> + 1800 900</strong></li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="index.html"><img src="{{ asset('frontend/assets/imgs/theme/logo.svg') }}" alt="logo" /></a>
                </div>
<div class="header-right">
    <div class="search-style-2">
        <form action="#">
            <select class="select-active">
                <option>Danh mục</option>
                @php
                $categories = App\Models\Category::orderBy('category_name','ASC')->get();
                @endphp
                @foreach ($categories as $item)
                <option> {{$item->category_name }}</option>
                @endforeach
            </select>
            <input type="text" placeholder="Tìm kiếm các mục..." />
        </form>
    </div>
    <div class="header-action-right">
        <div class="header-action-2">
            {{-- <div class="search-location">
                <form action="#">
                    <select class="select-active">
                        <option>Your Location</option>
                        <option>Alabama</option>
                        <option>Alaska</option>
                        <option>Arizona</option>
                        <option>Delaware</option>
                        <option>Florida</option>
                        <option>Georgia</option>
                        <option>Hawaii</option>
                        <option>Indiana</option>
                        <option>Maryland</option>
                        <option>Nevada</option>
                        <option>New Jersey</option>
                        <option>New Mexico</option>
                        <option>New York</option>
                    </select>
                </form>
            </div> --}}
           
            <div class="header-action-icon-2">
                <a href="{{ route('compare') }}">
                    <img class="svgInject" alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-compare.svg')}}" />
                    <span class="pro-count blue" id="compareQtyheader">0</span>
                </a>
                <a href="{{ route('compare') }}"><span class="lable ml-0">So sánh</span></a>
            </div>

            <div class="header-action-icon-2">
                <a href="shop-wishlist.html">
                    <img class="svgInject" alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}" />
                    <span class="pro-count blue" id="wishQty">0</span>
                </a>
                <a href="{{route('wishlist')}}"><span class="lable">Danh sách yêu thích</span></a>
            </div>
            <div class="header-action-icon-2">
                <a class="mini-cart-icon" href="shop-cart.html">
                    <img alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
                    <span class="pro-count blue" id="cartQty"></span>
                </a>
                <a href="{{route('mycart')}}"><span class="lable">Giỏ hàng</span></a>
                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                    
                <!--   // mini cart start with ajax -->

                <div id="miniCart">

                </div>

                <!--   // End mini cart start with ajax -->

                    <div class="shopping-cart-footer">
                        <div class="shopping-cart-total">
                            <h4>Tổng <span id="cartSubTotal"></span></h4>
                        </div>
                        <div class="shopping-cart-button">
                            <a href="{{route('mycart')}}" class="outline">Xem giỏ hàng</a>
                            <a href="shop-checkout.html">Checkout</a>
                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="header-action-icon-2">
                                <a href="page-account.html">
                                    <img class="svgInject" alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-user.svg') }}" />
                                </a>

                                @auth
                                <a href="{{route('dashboard')}}"><span class="lable ml-0">{{Auth::user()->name}}</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        <li>
                                            <a href="{{route('dashboard')}}"><i class="fi fi-rs-user mr-10"></i>Tài khoản của tôi</a>
                                        </li>
                                        <li>
                                            <a href="{{route('dashboard')}}"><i class="fi fi-rs-location-alt mr-10"></i>Theo dõi đơn hàng</a>
                                        </li>
                                        <li>
                                            <a href="{{route('dashboard')}}"><i class="fi fi-rs-label mr-10"></i>Voucher</a>
                                        </li>
                                        <li>
                                            <a href="{{route('dashboard')}}"><i class="fi fi-rs-heart mr-10"></i>Sản phẩm yêu thích</a>
                                        </li>
                                        <li>
                                            <a href="{{route('dashboard')}}"><i class="fi fi-rs-settings-sliders mr-10"></i>Cài đặt</a>
                                        </li>
                                        <li>
                                            <a href="{{route('user.logout')}}"><i class="fi fi-rs-sign-out mr-10"></i>Đăng xuất</a>
                                        </li>
                                    </ul>
                                </div>
                                @else
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        <li>
                                            <a href="{{route('login')}}"><i class="fi fi-rs-user mr-10"></i>Đăng nhập</a>
                                        </li>
                                        <li>
                                            <a href="{{route('register')}}"><i class="fi fi-rs-label mr-10"></i>Đăng ký</a>
                                        </li>
                                    </ul>
                                </div>
                                @endauth
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
    $categories = App\Models\Category::orderBy('category_name','ASC')->get();
    @endphp




    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="index.html"><img src="{{ asset('frontend/assets/imgs/theme/logo.svg') }}" alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span>   Danh mục
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    @foreach ($categories as $item)
                                    <li>
                                        <a href="{{ url('product/category/'.$item->id.'/'.$item->category_slug) }}"> <img src="{{ asset($item->category_image) }}" alt="" />{{$item->category_name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                <ul class="end">
                                    @foreach ($categories as $item)
                                    <li>
                                        <a href="{{ url('product/category/'.$item->id.'/'.$item->category_slug) }}"> <img src="{{ asset($item->category_image) }}" alt="" />{{$item->category_name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="more_slide_open" style="display: none">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul>
                                        <li>
                                            <a href="shop-grid-right.html"> <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-1.svg') }}" alt="" />Milks and Dairies</a>
                                        </li>
                                        <li>
                                            <a href="shop-grid-right.html"> <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-2.svg') }}" alt="" />Clothing & beauty</a>
                                        </li>
                                    </ul>
                                    <ul class="end">
                                        <li>
                                            <a href="shop-grid-right.html"> <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-3.svg') }}" alt="" />Wines & Drinks</a>
                                        </li>
                                        <li>
                                            <a href="shop-grid-right.html"> <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-4.svg') }}" alt="" />Fresh Seafood</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show more...</span></div>
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                
                                <li>
                                    <a class="active" href="{{ url('/') }}">Trang chủ  </a>
                                    
                                </li>
                                @php
                                $categories = App\Models\Category::orderBy('category_name','ASC')->limit(6)->get();
                                @endphp
                                @foreach ($categories as $item)
                                <li>
                                    <a href="{{ url('/product/category/'.$item->id.'/'.$item->category_slug) }}">{{$item->category_name}} <i class="fi-rs-angle-down"></i></a>
                                    @php
                                        $subcategory = App\Models\Subcategory::where('category_id',$item->id)->orderBy('subcategory_name','ASC')->get();
                                    @endphp
                                    <ul class="sub-menu">
                                        @foreach ($subcategory as $item)
                                        <li><a href="{{ url('/product/subcategory/'.$item->id.'/'.$item->subcategory_slug) }}">{{$item->subcategory_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                                
            <li>
                <a href="page-contact.html">Contact</a>
            </li>
        </ul>
    </nav>
</div>
</div>


<div class="hotline d-none d-lg-flex">
<img src="{{ asset('frontend/assets/imgs/theme/icons/icon-headphone.svg') }}" alt="hotline" />
<p>1900 - 888<span>24/7 Support Center</span></p>
</div>
<div class="header-action-icon-2 d-block d-lg-none">
<div class="burger-icon burger-icon-white">
    <span class="burger-icon-top"></span>
    <span class="burger-icon-mid"></span>
    <span class="burger-icon-bottom"></span>
</div>
</div>
<div class="header-action-right d-block d-lg-none">
<div class="header-action-2">
    <div class="header-action-icon-2">
        <a href="shop-wishlist.html">
            <img alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}" />
            <span class="pro-count white">4</span>
        </a>
    </div>
    <div class="header-action-icon-2">
        <a class="mini-cart-icon" href="#">
            <img alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
            <span class="pro-count white">2</span>
        </a>
        <div class="cart-dropdown-wrap cart-dropdown-hm2">
            <ul>
                <li>
                    <div class="shopping-cart-img">
                        <a href="shop-product-right.html"><img alt="Nest" src="{{ asset('frontend/assets/imgs/shop/thumbnail-3.jpg') }}" /></a>
                    </div>
                    <div class="shopping-cart-title">
                        <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>
                        <h3><span>1  </span>$800.00</h3>
                    </div>
                    <div class="shopping-cart-delete">
                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                    </div>
                </li>
                <li>
                    <div class="shopping-cart-img">
                        <a href="shop-product-right.html"><img alt="Nest" src="{{ asset('frontend/assets/imgs/shop/thumbnail-4.jpg') }}" /></a>
                    </div>
                    <div class="shopping-cart-title">
                        <h4><a href="shop-product-right.html">Macbook Pro 2022</a></h4>
                        <h3><span>1  </span>$3500.00</h3>
                    </div>
                    <div class="shopping-cart-delete">
                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                    </div>
                </li>
            </ul>
            <div class="shopping-cart-footer">
                <div class="shopping-cart-total">
                    <h4>Total <span>$383.00</span></h4>
                </div>
                <div class="shopping-cart-button">
                    <a href="{{route('mycart')}}">Xem giỏ hàng</a>
                    <a href="shop-checkout.html">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
</header>