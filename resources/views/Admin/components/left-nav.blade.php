<div class="section-menu-left">
    <div class="box-logo">
        <a href="{{ route('admin.index') }}" id="site-logo-inner">
            <img class="" id="logo_header" alt="" src="{{ asset('/admin/images/logo/logo.png') }}"
                 data-light="images/logo/logo.png" data-dark="images/logo/logo.png">
        </a>
        <div class="button-show-hide">
            <i class="icon-menu-left"></i>
        </div>
    </div>
    <div class="center">
        <div class="center-item">
            <div class="center-heading">Main Home</div>
            <ul class="menu-list">
                <li class="menu-item">
                    <a href="{{ route('home.index') }}" class="" target="_blank">
                        <div class="icon"><i class="icon-shopping-bag"></i></div>
                        <div class="text">View Shop</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-list">
                <li class="menu-item">
                    <a href="{{ route('admin.index') }}" class="">
                        <div class="icon"><i class="icon-grid"></i></div>
                        <div class="text">Dashboard</div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="center-item">
            <ul class="menu-list">


                <li class="menu-item has-children">
                    <a href="javascript:void(0);" class="menu-item-button">
                        <div class="icon"><i class="icon-shopping-cart"></i></div>
                        <div class="text">Products</div>
                    </a>
                    <ul class="sub-menu">
                        <li class="sub-menu-item">
                            <a href="{{ route('product.page') }}" class="menu-item-button">
                                <div class="icon"><i class="icon-shopping-cart"></i></div>
                                <div class="text">Products</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-item">
                    <a href="{{ route('brand.index') }}" class="menu-item-button">
                        <div class="icon"><i class="icon-layers"></i></div>
                        <div class="text">Brand</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('category.index') }}" class="menu-item-button">
                        <div class="icon"><i class="icon-layers"></i></div>
                        <div class="text">Category</div>
                    </a>

                </li>

                <li class="menu-item has-children">
                    <a href="javascript:void(0);" class="menu-item-button">
                        <div class="icon"><i class="icon-file-plus"></i></div>
                        <div class="text">Order</div>
                    </a>
                    <ul class="sub-menu">
                        <li class="sub-menu-item">
                            <a href="orders.html" class="">
                                <div class="text">Orders</div>
                            </a>
                        </li>
                        <li class="sub-menu-item">
                            <a href="order-tracking.html" class="">
                                <div class="text">Order tracking</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="slider.html" class="">
                        <div class="icon"><i class="icon-image"></i></div>
                        <div class="text">Slider</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="coupons.html" class="">
                        <div class="icon"><i class="icon-grid"></i></div>
                        <div class="text">Coupns</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="users.html" class="">
                        <div class="icon"><i class="icon-user"></i></div>
                        <div class="text">User</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="settings.html" class="">
                        <div class="icon"><i class="icon-settings"></i></div>
                        <div class="text">Settings</div>
                    </a>
                </li>
                <li class="menu-item">
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <a href="{{ route('logout') }}" class="" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <div class="icon"><i class="icon-settings"></i></div>
                            <div class="text">logout</div>
                        </a>
                    </form>
                </li>

            </ul>
        </div>
    </div>
</div>

