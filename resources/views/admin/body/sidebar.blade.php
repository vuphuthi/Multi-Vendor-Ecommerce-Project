<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img  src="{{asset('adminbackend/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Admin</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('admin.dashboard')}}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Thương hiệu</div>
            </a>
            <ul>
                <li> <a href="{{route('all.brand')}}"><i class="bx bx-right-arrow-alt"></i>Tất cả thương hiệu</a>
                </li>
                <li> <a href="{{route('add.brand')}}"><i class="bx bx-right-arrow-alt"></i>Thêm thương hiệu</a>
                </li>
                <li> <a href="dashboard-analytics.html"><i class="bx bx-right-arrow-alt"></i>Analytics</a>
                </li>
                <li> <a href="dashboard-digital-marketing.html"><i class="bx bx-right-arrow-alt"></i>Digital Marketing</a>
                </li>
                <li> <a href="dashboard-human-resources.html"><i class="bx bx-right-arrow-alt"></i>Human Resources</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Danh mục</div>
            </a>
            <ul>
                <li> <a href="{{route('all.category')}}"><i class="bx bx-right-arrow-alt"></i>Tất cả danh mục</a>
                </li>
                <li> <a href="{{route('add.category')}}"><i class="bx bx-right-arrow-alt"></i>Thêm danh mục</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Danh mục con</div>
            </a>
            <ul>
                <li> <a href="{{route('all.subcategory')}}"><i class="bx bx-right-arrow-alt"></i>Danh sách danh mục con</a>
                </li>
                <li> <a href="{{route('add.subcategory')}}"><i class="bx bx-right-arrow-alt"></i>Thêm danh mục con</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Quản lý sản phẩm</div>
            </a>
            <ul>
                <li> <a href="{{route('all.product')}}"><i class="bx bx-right-arrow-alt"></i>Danh sách sản phẩm</a>
                </li>
                <li> <a href="{{route('add.product')}}"><i class="bx bx-right-arrow-alt"></i>Thêm sản phẩm</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Quản lý slider</div>
            </a>
            <ul>
                <li> <a href="{{route('all.slider')}}"><i class="bx bx-right-arrow-alt"></i>Danh sách slider</a>
                </li>
                <li> <a href="{{route('add.slider')}}"><i class="bx bx-right-arrow-alt"></i>Thêm slider</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Quản lý banner</div>
            </a>
            <ul>
                <li> <a href="{{route('all.banner')}}"><i class="bx bx-right-arrow-alt"></i>Danh sách banner</a>
                </li>
                <li> <a href="{{route('add.banner')}}"><i class="bx bx-right-arrow-alt"></i>Thêm banner</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Phiếu giảm giá</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.coupon') }}"><i class="bx bx-right-arrow-alt"></i>Danh sách phiếu giảm giá</a>
                </li>
                <li> <a href="{{ route('add.coupon') }}"><i class="bx bx-right-arrow-alt"></i>Thêm phiếu giảm giá</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Khu vực vận chuyển </div>
            </a>
            <ul>
                <li> <a href="{{ route('all.division') }}"><i class="bx bx-right-arrow-alt"></i>Danh sách khu vực</a>
                </li>
                <li> <a href="{{ route('add.coupon') }}"><i class="bx bx-right-arrow-alt"></i>Danh sách quận huyện</a>
                </li>

                <li> <a href="{{ route('add.coupon') }}"><i class="bx bx-right-arrow-alt"></i>Danh sách tỉnh/Thành phố</a>
                </li>

            </ul>
        </li>


        <li class="menu-label">UI Elements</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Quản lý nhà cung cấp</div>
            </a>
            <ul>
                <li> <a href="{{route('inactive.vendor')}}"><i class="bx bx-right-arrow-alt"></i>Inactive nhà cung cấp</a>
                </li>
                <li> <a href="{{route('active.vendor')}}"><i class="bx bx-right-arrow-alt"></i>Active nhà cung cấp</a>
                </li>
                <li> <a href="ecommerce-add-new-products.html"><i class="bx bx-right-arrow-alt"></i>Add New Products</a>
                </li>
                <li> <a href="ecommerce-orders.html"><i class="bx bx-right-arrow-alt"></i>Orders</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Components</div>
            </a>
            <ul>
                <li> <a href="component-alerts.html"><i class="bx bx-right-arrow-alt"></i>Alerts</a>
                </li>
                <li> <a href="component-accordions.html"><i class="bx bx-right-arrow-alt"></i>Accordions</a>
                </li>
                <li> <a href="component-badges.html"><i class="bx bx-right-arrow-alt"></i>Badges</a>
                </li>
                <li> <a href="component-buttons.html"><i class="bx bx-right-arrow-alt"></i>Buttons</a>
                </li>
                <li> <a href="component-cards.html"><i class="bx bx-right-arrow-alt"></i>Cards</a>
                </li>
                <li> <a href="component-carousels.html"><i class="bx bx-right-arrow-alt"></i>Carousels</a>
                </li>
                <li> <a href="component-list-groups.html"><i class="bx bx-right-arrow-alt"></i>List Groups</a>
                </li>
                <li> <a href="component-media-object.html"><i class="bx bx-right-arrow-alt"></i>Media Objects</a>
                </li>
                <li> <a href="component-modals.html"><i class="bx bx-right-arrow-alt"></i>Modals</a>
                </li>
                <li> <a href="component-navs-tabs.html"><i class="bx bx-right-arrow-alt"></i>Navs & Tabs</a>
                </li>
                <li> <a href="component-navbar.html"><i class="bx bx-right-arrow-alt"></i>Navbar</a>
                </li>
                <li> <a href="component-paginations.html"><i class="bx bx-right-arrow-alt"></i>Pagination</a>
                </li>
                <li> <a href="component-popovers-tooltips.html"><i class="bx bx-right-arrow-alt"></i>Popovers & Tooltips</a>
                </li>
                <li> <a href="component-progress-bars.html"><i class="bx bx-right-arrow-alt"></i>Progress</a>
                </li>
                <li> <a href="component-spinners.html"><i class="bx bx-right-arrow-alt"></i>Spinners</a>
                </li>
                <li> <a href="component-notifications.html"><i class="bx bx-right-arrow-alt"></i>Notifications</a>
                </li>
                <li> <a href="component-avtars-chips.html"><i class="bx bx-right-arrow-alt"></i>Avatrs & Chips</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-repeat"></i>
                </div>
                <div class="menu-title">Content</div>
            </a>
            <ul>
                <li> <a href="content-grid-system.html"><i class="bx bx-right-arrow-alt"></i>Grid System</a>
                </li>
                <li> <a href="content-typography.html"><i class="bx bx-right-arrow-alt"></i>Typography</a>
                </li>
                <li> <a href="content-text-utilities.html"><i class="bx bx-right-arrow-alt"></i>Text Utilities</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                </div>
                <div class="menu-title">Icons</div>
            </a>
            <ul>
                <li> <a href="icons-line-icons.html"><i class="bx bx-right-arrow-alt"></i>Line Icons</a>
                </li>
                <li> <a href="icons-boxicons.html"><i class="bx bx-right-arrow-alt"></i>Boxicons</a>
                </li>
                <li> <a href="icons-feather-icons.html"><i class="bx bx-right-arrow-alt"></i>Feather Icons</a>
                </li>
            </ul>
        </li>
    
        <li class="menu-label">Charts & Maps</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-line-chart"></i>
                </div>
                <div class="menu-title">Charts</div>
            </a>
            <ul>
                <li> <a href="charts-apex-chart.html"><i class="bx bx-right-arrow-alt"></i>Apex</a>
                </li>
                <li> <a href="charts-chartjs.html"><i class="bx bx-right-arrow-alt"></i>Chartjs</a>
                </li>
                <li> <a href="charts-highcharts.html"><i class="bx bx-right-arrow-alt"></i>Highcharts</a>
                </li>
            </ul>
        </li>
       
       
        <li>
            <a href="" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Support</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>