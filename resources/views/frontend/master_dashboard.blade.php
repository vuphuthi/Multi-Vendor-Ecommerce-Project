<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Shop bán trái cây</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />



    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/imgs/theme/favicon.svg') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css?v=5.3') }}" />

    {{-- --------------------------------------------------- toastr ---------------------------------- --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    {{-- --------------------------------------------------- toastr ---------------------------------- --}}

    <!-- stripe -->
    <script src="https://js.stripe.com/v3/"></script>
    <!-- stripe -->

</head>

<body>
    <!-- Modal -->

    <!-- Quick view -->
    @include('frontend.body.quickview')
    <!-- Header  -->

    @include('frontend.body.header')

    <!-- End Header  -->

    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="index.html"><img src="{{ asset('frontend/assets/imgs/theme/logo.svg') }}"
                            alt="logo" /></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="Search for items…" />
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="menu-item-has-children">
                                <a href="index.html">Home</a>

                            </li>
                            <li class="menu-item-has-children">
                                <a href="shop-grid-right.html">shop</a>
                                <ul class="dropdown">
                                    <li><a href="shop-grid-right.html">Shop Grid – Right Sidebar</a></li>
                                    <li><a href="shop-grid-left.html">Shop Grid – Left Sidebar</a></li>
                                    <li><a href="shop-list-right.html">Shop List – Right Sidebar</a></li>
                                    <li><a href="shop-list-left.html">Shop List – Left Sidebar</a></li>
                                    <li><a href="shop-fullwidth.html">Shop - Wide</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Single Product</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.html">Product – Right Sidebar</a></li>
                                            <li><a href="shop-product-left.html">Product – Left Sidebar</a></li>
                                            <li><a href="shop-product-full.html">Product – No sidebar</a></li>
                                            <li><a href="shop-product-vendor.html">Product – Vendor Infor</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop-filter.html">Shop – Filter</a></li>
                                    <li><a href="shop-wishlist.html">Shop – Wishlist</a></li>
                                    <li><a href="shop-cart.html">Shop – Cart</a></li>
                                    <li><a href="shop-checkout.html">Shop – Checkout</a></li>
                                    <li><a href="shop-compare.html">Shop – Compare</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Shop Invoice</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-invoice-1.html">Shop Invoice 1</a></li>
                                            <li><a href="shop-invoice-2.html">Shop Invoice 2</a></li>
                                            <li><a href="shop-invoice-3.html">Shop Invoice 3</a></li>
                                            <li><a href="shop-invoice-4.html">Shop Invoice 4</a></li>
                                            <li><a href="shop-invoice-5.html">Shop Invoice 5</a></li>
                                            <li><a href="shop-invoice-6.html">Shop Invoice 6</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-item-has-children">
                                <a href="#">Mega menu</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children">
                                        <a href="#">Women's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.html">Dresses</a></li>
                                            <li><a href="shop-product-right.html">Blouses & Shirts</a></li>
                                            <li><a href="shop-product-right.html">Hoodies & Sweatshirts</a></li>
                                            <li><a href="shop-product-right.html">Women's Sets</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Men's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.html">Jackets</a></li>
                                            <li><a href="shop-product-right.html">Casual Faux Leather</a></li>
                                            <li><a href="shop-product-right.html">Genuine Leather</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Technology</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.html">Gaming Laptops</a></li>
                                            <li><a href="shop-product-right.html">Ultraslim Laptops</a></li>
                                            <li><a href="shop-product-right.html">Tablets</a></li>
                                            <li><a href="shop-product-right.html">Laptop Accessories</a></li>
                                            <li><a href="shop-product-right.html">Tablet Accessories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="blog-category-fullwidth.html">Blog</a>
                                <ul class="dropdown">
                                    <li><a href="blog-category-grid.html">Blog Category Grid</a></li>
                                    <li><a href="blog-category-list.html">Blog Category List</a></li>
                                    <li><a href="blog-category-big.html">Blog Category Big</a></li>
                                    <li><a href="blog-category-fullwidth.html">Blog Category Wide</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Single Product Layout</a>
                                        <ul class="dropdown">
                                            <li><a href="blog-post-left.html">Left Sidebar</a></li>
                                            <li><a href="blog-post-right.html">Right Sidebar</a></li>
                                            <li><a href="blog-post-fullwidth.html">No Sidebar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="page-about.html">About Us</a></li>
                                    <li><a href="page-contact.html">Contact</a></li>
                                    <li><a href="page-account.html">My Account</a></li>
                                    <li><a href="page-login.html">Login</a></li>
                                    <li><a href="page-register.html">Register</a></li>
                                    <li><a href="page-forgot-password.html">Forgot password</a></li>
                                    <li><a href="page-reset-password.html">Reset password</a></li>
                                    <li><a href="page-purchase-guide.html">Purchase Guide</a></li>
                                    <li><a href="page-privacy-policy.html">Privacy Policy</a></li>
                                    <li><a href="page-terms.html">Terms of Service</a></li>
                                    <li><a href="page-404.html">404 Page</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Language</a>
                                <ul class="dropdown">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap">
                    <div class="single-mobile-header-info">
                        <a href="page-contact.html"><i class="fi-rs-marker"></i> Our location </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="page-login.html"><i class="fi-rs-user"></i>Log In / Sign Up </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#"><i class="fi-rs-headphones"></i>(+01) - 2345 - 6789 </a>
                    </div>
                </div>
                <div class="mobile-social-icon mb-50">
                    <h6 class="mb-15">Follow Us</h6>
                    <a href="#"><img
                            src="{{ asset('frontend/assets/imgs/theme/icons/icon-facebook-white.svg') }}"
                            alt="" /></a>
                    <a href="#"><img
                            src="{{ asset('frontend/assets/imgs/theme/icons/icon-twitter-white.svg') }}"
                            alt="" /></a>
                    <a href="#"><img
                            src="{{ asset('frontend/assets/imgs/theme/icons/icon-instagram-white.svg') }}"
                            alt="" /></a>
                    <a href="#"><img
                            src="{{ asset('frontend/assets/imgs/theme/icons/icon-pinterest-white.svg') }}"
                            alt="" /></a>
                    <a href="#"><img
                            src="{{ asset('frontend/assets/imgs/theme/icons/icon-youtube-white.svg') }}"
                            alt="" /></a>
                </div>
                <div class="site-copyright">Copyright 2022 © Nest. All rights reserved. Powered by AliThemes.</div>
            </div>
        </div>
    </div>
    <!--End header-->








    <main class="main">
        @yield('main')

    </main>

    @include('frontend.body.footer')


    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('frontend/assets/imgs/theme/loading.gif') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('frontend/assets/js/main.js?v=5.3') }}"></script>
    <script src="{{ asset('frontend/assets/js/shop.js?v=5.3') }}"></script>

    {{-- sweetalert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- sweetalert2 --}}


        {{----------------------------------------------------- toastr ------------------------------------}}

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;
                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;
                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;
                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>


        {{----------------------------------------------------- toastr ---------------------------------------------}}


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        function productView(id) {
            // alert(id)
            $.ajax({
                url: '/product/view/modal/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#pname').text(data.product.product_name);
                    $('#pprice').text(data.product.selling_price);
                    $('#pcode').text(data.product.product_code);
                    $('#pcategory').text(data.product.category.category_name);
                    $('#pbrand').text(data.product.brand.brand_name);
                    $('#pimage').attr('src', '/' + data.product.product_thambnail);
                    $('#pvendor_id').text(data.product.vendor_id);

                    $('#product_id').val(id);
                    $('#qty').val(1);

                    if (data.product.discount_price == null) {
                        $('#pprice').text('');
                        $('#psale').text('Mới');
                        $('#poldprice').text('');
                        $('#pprice').text(data.product.selling_price);
                    } else {
                        $('#psale').text('Giảm giá');
                        $('#oldprice').text(data.product.discount_price);
                        $('#pprice').text(data.product.selling_price);
                    }

                    if (data.product.product_qty > 0) {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#aviable').text('Có sẵn');
                    } else {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#stockout').text('Hết hàng');
                    }

                    $('select[name="size"]').empty();
                    $.each(data.size, function(key, value) {
                        $('select[name="size"]').append('<option value="' + value + ' ">' + value +
                            '  </option')
                        if (data.size == "") {
                            $('#sizeArea').hide();
                        } else {
                            $('#sizeArea').show();
                        }
                    }) // end size

                    $('select[name="color"]').empty();
                    $.each(data.color, function(key, value) {
                        $('select[name="color"]').append('<option value="' + value + ' ">' + value +
                            '  </option')
                        if (data.size == "") {
                            $('#colorArea').hide();
                        } else {
                            $('#colorArea').show();
                        }
                    }) // end color


                }
            })
        }

        function addToCart() {
            var product_name = $('#pname').text();
            var id = $('#product_id').val();
            var vendor = $('#pvendor_id').text();
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();
            var quantity = $('#qty').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name,
                    vendor:vendor
                },
                url: "/cart/data/store/" + id,
                success: function(data) {
                    miniCart();
                    $('#closeModal').click();
                    // console.log(data)
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            title: data.success,
                        })
                    } else {

                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })
                    }
                }
            })
        }
    </script>

    <script type="text/javascript">
        function miniCart() {
            $.ajax({
                type: "GET",
                url: '/product/mini/cart',
                dataType: 'json',
                success: function(data) {
                    $('#cartQty').text(data.cartQty);
                    $('span[id="cartSubTotal"]').text(numberFormat(data.cartTotal));

                    var miniCart = "";
                    $.each(data.carts, function(key, value) {
                        miniCart += `
                    <ul>
                        <li>
                            <div class="shopping-cart-img">
                                <a href="shop-product-right.html"><img alt="Nest" src="/${value.options.image} " style="width:50px;height:50px;" /></a>
                            </div>
                            <div class="shopping-cart-title" style="margin: -73px 74px 14px; width" 146px;>
                                <h4><a href="shop-product-right.html"> ${value.name} </a></h4>
                                <h4><span>${value.qty} × </span>${numberFormat(value.price)}</h4>
                            </div>
                            <div class="shopping-cart-delete" style="margin: -85px 1px 0px;">
                                <a type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"  ><i class="fi-rs-cross-small"></i></a>
                            </div>
                        </li> 
                    </ul>
                    <hr><br> 
                `;
                    });
                    $('#miniCart').html(miniCart);
                }
            });
        }

        function numberFormat(number) {
            return new Intl.NumberFormat('vi-VN').format(number);
        }

        miniCart();


        function miniCartRemove(rowId) {
            $.ajax({
                type: "GET",
                url: "/product/minicart/remove/" + rowId,
                dataType: 'json',
                success: function(data) {
                    miniCart();
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            title: data.success,
                        })
                    } else {

                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })
                    }

                }
            })
        }

        function AddToCartDetails() {
            var product_name = $('#dname').text();
            var id = $('#dproduct_id').val();
            var vendor = $('#vproduct_id').val();
            var color = $('#dcolor option:selected').text();
            var size = $('#dsize option:selected').text();
            var quantity = $('#dqty').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name,
                    vendor:vendor
                },
                url: "/dcart/data/store/" + id,
                success: function(data) {
                    miniCart();
                    $('#closeModal').click();
                    // console.log(data)
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            title: data.success,
                        })
                    } else {

                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })
                    }
                }
            })
        }
    </script>

    <script type="text/javascript">
        function addToWishList(product_id) {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/add-to-wishlist/" + product_id,
                success: function(data) {
                    GetWishlistProduct();
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })
                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Message  
                }
            })
        }

        function GetWishlistProduct() {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/get-wishlist-product",
                success: function(data) {
                    $('#wishQty').text(data.wishQty);
                    $('#wishQtymore').text(data.wishQty);
                    var rows = "";
                    $.each(data.wishlist, function(key, value) {
                        rows += `<tr class="pt-30">
                    <td class="custome-checkbox pl-30"></td>
                    <td class="image product-thumbnail pt-40"><img src="/${value.product.product_thambnail}" alt="#" /></td>
                    <td class="product-des product-name">
                        <h6><a class="product-name mb-10" href="${value.product.product_link}">${value.product.product_name}</a></h6>
                        <div class="product-rate-cover">
                            <div class="product-rate d-inline-block">
                                <div class="product-rating" style="width: 90%"></div>
                            </div>
                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                        </div>
                    </td>
                    <td class="price" data-title="Price">
                        ${value.product.discount_price == null
                            ? `<h3 class="text-brand">${numberFormat(value.product.selling_price)}</h3>`
                            : `<h3 class="text-brand">${numberFormat(value.product.discount_price)}</h3>`
                        }
                    </td>
                    <td class="text-center detail-info" data-title="Stock">
                        ${value.product.product_qty > 0 
                            ? `<span class="stock-status in-stock mb-0">Còn hàng</span>`
                            : `<span class="stock-status out-stock mb-0">Hết hàng</span>`
                        } 
                    </td>
                    <td class="action text-center" data-title="Xóa">
                        <a type="submit" id="${value.id}" onclick="wishRemove(this.id)" class="text-body"><i class="fi-rs-trash"></i></a>
                    </td>
                </tr>`;
                    });
                    $('#wishlist').html(rows);
                }
            });
        }

        GetWishlistProduct();

        function wishRemove(id) {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/wishlist-remove/" + id,
                success: function(data) {
                    GetWishlistProduct();
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })
                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                }
            });
        }
    </script>
    <script type="text/javascript">
        function addToCompare(product_id) {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/add-to-compare/" + product_id,
                success: function(data) {
                    compare()
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })
                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                }
            })
        }

        function compare() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "/get-compare-product/",
                success: function(data) {
                    // console.log(data);
                    $('#compareQty').text(data.compareQty);
                    $('#compareQtyheader').text(data.compareQty);
                    var rows = ""
                    if (data.compare.length === 0) {
                        rows = `<td class="font-xl text-danger fw-600 font-heading">Chưa có sản phẩm nào</td>`;
                    } else {
                        $.each(data.compare, function(key, value) {
                            rows += `
                    <tr class="pr_image">
                                    <td class="text-muted font-sm fw-600 font-heading mw-200">Xem trước</td>
                                    <td class="row_img"><img src="/${value.product.product_thambnail}" style="width:300px; height:300px;" alt="compare-img" /></td>

                                </tr>
                                <tr class="pr_title">
                                    <td class="text-muted font-sm fw-600 font-heading">Tên sản phẩm</td>
                                    <td class="product_name">
                                        <h6><a href="${value.product.product_link}" class="text-heading">${value.product.product_name}</a></h6>
                                    </td>

                                </tr>
                                <tr class="pr_price">
                                    <td class="text-muted font-sm fw-600 font-heading">Giá</td>
                                    <td class="product_price">
                        ${value.product.discount_price == null
                            ? `<h4 class="price text-brand">${numberFormat(value.product.selling_price)}</h4>`
                            : `<h4 class="price text-brand">${numberFormat(value.product.discount_price)}</h4>`
                        } 
                                    </td>

                                </tr>

                                <tr class="description">
                                    <td class="text-muted font-sm fw-600 font-heading">Mô tả</td>
                                    <td class="row_text font-xs">
                                        <p class="font-sm text-muted"> ${value.product.short_descp}</p>
                                    </td>

                                </tr>
                                <tr class="pr_stock">
                                    <td class="text-muted font-sm fw-600 font-heading">Tình trạng tồn kho</td>
                                    <td class="row_stock">
                                ${value.product.product_qty > 0 
                                ? `<span class="stock-status in-stock mb-0"> Còn hàng </span>`
                                :`<span class="stock-status out-stock mb-0"> Hết hàng </span>`
                                } 
                                </td>

                                <tr class="pr_remove text-muted">
                                    <td class="text-muted font-md fw-600">Xóa</td>
                                    <td class="row_remove">
                                        <a type="submit" onclick="compareRemove(this.id)" id="${value.id}" class="text-muted"><i class="fi-rs-trash mr-5"></i><span>Xóa</span> </a>
                                    </td>

                                </tr>

                    `
                        });
                    }
                    $('#compare').html(rows);

                }

            });

        }
        compare()

        function compareRemove(id) {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/compare-remove/" + id,
                success: function(data) {
                    compare()
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })
                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                }
            })
        }
    </script>


    <script type="text/javascript">
        function mycart() {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/get-cart-product",
                success: function(data) {
                    // console.log(data);
                    var rows = "";

                    $.each(data.carts, function(key, value) {
                        // Định dạng giá tiền thành tiền Việt Nam
                        var formattedPrice = new Intl.NumberFormat('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        }).format(value.price);
                        var formattedSubtotal = new Intl.NumberFormat('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        }).format(value.subtotal);

                        rows += `
                    <tr class="pt-30">
                        <td class="custome-checkbox pl-30"></td>
                        <td class="image product-thumbnail pt-40"><img src="/${value.options.image}" alt="#"></td>
                        <td class="product-des product-name">
                            <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="shop-product-right.html">${value.name}</a></h6>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width:90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                        </td>
                        <td class="price" data-title="Price">
                            <h4 class="text-body">${formattedPrice}</h4>
                        </td>
                        <td class="price" data-title="Price">
                            ${value.options.color == null ? `<span>.... </span>` : `<h6 class="text-body">${value.options.color}</h6>`}
                        </td>
                        <td class="price" data-title="Price">
                            ${value.options.size == null ? `<span>.... </span>` : `<h6 class="text-body">${value.options.size}</h6>`}
                        </td>
                        <td class="text-center detail-info" data-title="Stock">
                            <div class="detail-extralink mr-15">
                                <div class="detail-qty border radius">
                                    <a type="submit" id="${value.rowId}" onclick="cartDecrement(this.id)" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <input type="text" name="quantity" class="qty-val" value="${value.qty}" min="1">
                                    <a type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                            </div>
                        </td>
                        <td class="price" data-title="Price">
                            <h4 class="text-brand">${formattedSubtotal}</h4>
                        </td>
                        <td class="action text-center" data-title="Xóa"><a type="submit" id="${value.rowId}" onclick="cartRemove(this.id)" class="text-body"><i class="fi-rs-trash"></i></a></td>
                    </tr>`;
                    });

                    $('#mycart').html(rows);
                }
            });
        }
        mycart();

        function cartRemove(rowId) {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: '/cart-remove/' + rowId,
                success: function(data) {
                    mycart()
                    couponCalculation();
                    miniCart()
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            title: data.success,
                        })
                    } else {

                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })
                    }
                }
            })
        }

        function cartDecrement(rowId) {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: '/cart-decrement/' + rowId,
                success: function(data) {
                    couponCalculation();
                    mycart()
                    miniCart();
                }
            })
        }

        function cartIncrement(rowId) {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: '/cart-increment/' + rowId,
                success: function(data) {
                    couponCalculation();
                    mycart()
                    miniCart();
                }
            })
        }

        // end increment
    </script>
    <!--  ////////////// Start Apply Coupon ////////////// -->

    <script type="text/javascript">
        function applyCoupon() {
            var coupon_name = $('#coupon_name').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    coupon_name: coupon_name
                },
                url: '/coupon-apply',

                success: function(data) {
                    couponCalculation();
                    if (data.validity == true) {
                        $('#couponField').hide();
                    }

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })
                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                }
            })
        }

        // Start CouponCalculation Method

        function couponCalculation() {
            $.ajax({
                type: "GET",
                url: '/coupon-calculation',
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    if (data.total) {
                        $('#couponCalField').html(
                            ` <tr>
                        <td class="cart_total_label">
                            <h6 class="text-muted">Tổng phụ</h6>
                        </td>
                        <td class="cart_total_amount">
                            <h4 class="text-brand text-end">${numberFormat(data.total)}</h4>
                        </td>
                    </tr>
                    <tr>
                        <td class="cart_total_label">
                            <h6 class="text-muted">Tổng cộng</h6>
                        </td>
                        <td class="cart_total_amount">
                            <h4 class="text-brand text-end">${numberFormat(data.total)}</h4>
                        </td>
                    </tr>`
                        )
                    } else {
                        $('#couponCalField').html(
                            `<tr>
                        <td class="cart_total_label">
                            <h6 class="text-muted">Tổng phụ</h6>
                        </td>
                        <td class="cart_total_amount">
                            <h4 class="text-brand text-end">${numberFormat(data.subtotal)}</h4>
                        </td>
                    </tr>
                    <tr>
                        <td class="cart_total_label">
                            <h6 class="text-muted">Mã giảm giá </h6>
                        </td>
                        <td class="cart_total_amount">
                            <h6 class="text-brand text-end">${data.coupon_name} <a type="submit" onclick="couponRemove()"><i class="fi-rs-trash"></i> </a> </h6>
                        </td>
                    </tr>
                    <tr>
                        <td class="cart_total_label">
                            <h6 class="text-muted">Số tiền được giảm  </h6>
                        </td>
                        <td class="cart_total_amount">
                            <h4 class="text-brand text-end">${numberFormat(data.discount_amount)}</h4>
                        </td>
                    </tr>
                    <tr>
                        <td class="cart_total_label">
                            <h6 class="text-muted">Tổng cộng </h6>
                        </td>
                        <td class="cart_total_amount">
                            <h4 class="text-brand text-end">${numberFormat(data.total_amount)}</h4>
                        </td>
                    </tr>`
                        )
                    }
                }
            });
        }

        function numberFormat(number) {
            return new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
            }).format(number);

        }

        couponCalculation();


        // End CouponCalculation Method

        // Start couponRemove Method
        function couponRemove() {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/coupon-remove",
                success: function(data) {
                    couponCalculation();
                    $('#couponField').show();
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })
                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Message  
                }
            })
        }
        // End couponRemove Method
    </script>


    <!--  ////////////// End Apply Coupon ////////////// -->





</body>

</html>
