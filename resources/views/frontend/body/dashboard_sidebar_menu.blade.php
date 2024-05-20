
@php
    $route = Route::current()->getName();
@endphp
<div class="dashboard-menu">
    <ul class="nav flex-column" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ ($route == 'dashboard') ? 'active' : '' }}"  href="{{route('dashboard')}}" ><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ ($route ==  'user.order.page') ? 'active' :  '' }}" href="{{route('user.order.page')}}"><i class="fi-rs-shopping-bag mr-10"></i>Đơn đặt hàng</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#track-orders"><i class="fi-rs-shopping-cart-check mr-10"></i>Theo dõi đơn hàng của bạn</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#address"><i class="fi-rs-marker mr-10"></i>Địa chỉ của tôi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ ($route ==  'user.account.page') ? 'active' :  '' }}" href="{{route('user.account.page')}}"><i class="fi-rs-user mr-10"></i>Chi tiết tài khoản</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ ($route ==  'user.change.password') ? 'active' :  '' }}" href="{{route('user.change.password')}}"></i>Đổi mật khẩu</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="background:#edeaea;" href="{{route('user.logout')}}"><i class="fi-rs-sign-out mr-10"></i>Đăng xuất</a>
        </li>
    </ul>
</div>