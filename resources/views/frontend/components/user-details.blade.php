<div class="col-lg-3">
    <ul class="account-nav">
        <li><a href="{{ route('user.dashboard') }}" class="menu-link menu-link_us-s">Dashboard</a></li>
        <li><a href="account-orders.html" class="menu-link menu-link_us-s">Orders</a></li>
        <li><a href="{{ route('user.profile') }}" class="menu-link menu-link_us-s">Addresses</a></li>
        <li><a href="{{ route('user.account.details') }}" class="menu-link menu-link_us-s">Account Details</a></li>
        <li><a href="account-wishlist.html" class="menu-link menu-link_us-s">Wishlist</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                @csrf
                <a href="{{ route('logout') }}" class="menu-link menu-link_us-s" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <div class="icon"><i class="icon-settings"></i></div>
                    <div class="text">logout</div>
                </a>
            </form>
        </li>
    </ul>
</div>
