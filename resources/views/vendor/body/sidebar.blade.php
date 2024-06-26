@php
    $id = Auth::user()->id;
    $vendor_id = App\Models\User::find($id);
    $status = $vendor_id->status;
@endphp
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img  src="{{asset('adminbackend/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Nhà cung cấp</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('vendor.dashboard')}}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        @if ($status === 'active')
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Quản lý sản phẩm</div>
            </a>
            <ul>
                <li> <a href="{{route('vendor.all.product')}}"><i class="bx bx-right-arrow-alt"></i>Danh sách sản phẩm</a>
                </li>
                <li> <a href="{{route('vendor.add.product')}}"><i class="bx bx-right-arrow-alt"></i>Thêm sản phẩm</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Đơn hàng</div>
            </a>
            <ul>
                <li> <a href="{{ route('vendor.order') }}"><i class="bx bx-right-arrow-alt"></i>Đơn đặt hàng của nhà cung cấp</a>
            </ul>
        </li>
        @else
        @endif
        <li>
            <a href="" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Hỗ trợ</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>