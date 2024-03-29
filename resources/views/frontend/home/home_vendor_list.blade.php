@php
    $vendors = App\Models\User::where('status', 'active')->where('role','vendor')->orderBy('id', 'DESC')->get();
@endphp
<div class="container">

    <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
        <h3 class="">Danh sách nhà cung cấp của chúng tôi </h3>
        <a class="show-all" href="shop-grid-right.html">
            Tất cả
            <i class="fi-rs-angle-right"></i>
        </a>
    </div>
    <div class="row vendor-grid">
        @foreach ($vendors as $vendor)
            
        <div class="col-lg-3 col-md-6 col-12 col-sm-6 justify-content-center">
            <div class="vendor-wrap mb-40">
                <div class="vendor-img-action-wrap">
                    <div class="vendor-img">
                        <a href="vendor-details-1.html">
                            <img class="default-img" src="{{ (!empty($vendor->photo)) ? url('upload/vendor_images/'.$vendor->photo):url('upload/no_image.jpg') }}" style="width:120px;height: 120px;" alt="" />
                        </a>
                    </div>
                    <div class="product-badges product-badges-position product-badges-mrg">
                        <span class="hot">Mall</span>
                    </div>
                </div>
                <div class="vendor-content-wrap">
                    <div class="d-flex justify-content-between align-items-end mb-30">
                        <div>
                            <div class="product-category">
                                <span class="text-muted">{{$vendor->vendor_join }}</span>
                            </div>
                            <h4 class="mb-5"><a href="vendor-details-1.html">{{ $vendor->name }}</a></h4>
                                @php
                                $products = App\Models\Product::where('vendor_id',$vendor->id)->get();
                                @endphp
                            <div class="product-rate-cover">
                                <span class="font-small total-product">{{ count($products) }} sản phẩm</span>
                            </div>
                        </div>

                    </div>
                    @if ($vendor->phone == null)
                    <div class="vendor-info mb-30">
                        <ul class="contact-infor text-muted">
                            
                            <strong>Số điện thoại đang cập nhật </strong>
                    </div>
                    @else
                    <div class="vendor-info mb-30">
                        <ul class="contact-infor text-muted">

                            <li><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-contact.svg') }}"
                                    alt="" /><strong>Gọi cho chúng tôi: </strong><span>{{$vendor->phone}}</span></li>
                        </ul>
                    </div>
                    @endif
                    <a href="vendor-details-1.html" class="btn btn-xs">Ghé thăm cửa hàng <i
                            class="fi-rs-arrow-small-right"></i></a>
                </div>
            </div>
        </div>
        @endforeach
        <!--end vendor card-->

    </div>
</div>
