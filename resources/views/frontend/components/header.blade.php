<header id="header" class="header header-fullwidth header-transparent-bg">
    <div class="container">
        <div class="header-desk header-desk_type_1">
            <div class="logo">
                <a href="{{ route('home.index') }}">
                    <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="Uomo" class="logo__image d-block" />
                </a>
            </div>

            <nav class="navigation">
                <ul class="navigation__list list-unstyled d-flex">
                    <li class="navigation__item">
                        <a href="{{ route('home.index') }}" class="navigation__link">Home</a>
                    </li>
                    <li class="navigation__item">
                        <a href="{{ route('shop.page') }}" class="navigation__link">Shop</a>
                    </li>
                    <li class="navigation__item">
                        <a href="cart.html" class="navigation__link">Cart</a>
                    </li>
                    <li class="dropdown ">
                        <a class="dropdown-toggle nav-link " href="#" data-bs-toggle="dropdown">Products</a>
                        <div class="dropdown-menu" id="categoryListDrop">

                        </div>
                    </li>
                    <li class="navigation__item">
                        <a href="about.html" class="navigation__link">About</a>
                    </li>
                    <li class="navigation__item">
                        <a href="contact.html" class="navigation__link">Contact</a>
                    </li>

                </ul>
            </nav>

            <div class="header-tools d-flex align-items-center">
                <div class="header-tools__item hover-container">
                    <div class="js-hover__open position-relative">
                        <a class="js-search-popup search-field__actor" href="#">
                            <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_search" />
                            </svg>
                            <i class="btn-icon btn-close-lg"></i>
                        </a>
                    </div>

                    <div class="search-popup js-hidden-content">
                        <form action="#" method="GET" class="search-field container">
                            <p class="text-uppercase text-secondary fw-medium mb-4">What are you looking for?</p>
                            <div class="position-relative">
                                <input class="search-field__input search-popup__input w-100 fw-medium" type="text"
                                       name="search-keyword" placeholder="Search products" />
                                <button class="btn-icon search-popup__submit" type="submit">
                                    <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <use href="#icon_search" />
                                    </svg>
                                </button>
                                <button class="btn-icon btn-close-lg search-popup__reset" type="reset"></button>
                            </div>

                            <div class="search-popup__results">
                                <div class="sub-menu search-suggestion">
                                    <h6 class="sub-menu__title fs-base">Quicklinks</h6>
                                    <ul class="sub-menu__list list-unstyled" >
                                        <li class="sub-menu__item"><a href="shop2.html" class="menu-link menu-link_us-s">New Arrivals</a>
                                        </li>
                                        <li class="sub-menu__item"><a href="#" class="menu-link menu-link_us-s">Dresses</a></li>
                                        <li class="sub-menu__item"><a href="shop3.html" class="menu-link menu-link_us-s">Accessories</a>
                                        </li>
                                        <li class="sub-menu__item"><a href="#" class="menu-link menu-link_us-s">Footwear</a></li>
                                        <li class="sub-menu__item"><a href="#" class="menu-link menu-link_us-s">Sweatshirt</a></li>
                                    </ul>
                                </div>

                                <div class="search-result row row-cols-5"></div>
                            </div>
                        </form>
                    </div>
                </div>

                @guest
                    <div class="header-tools__item hover-container">
                        <a href="{{ route('login') }}" class="header-tools__item">
                            <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_user" />
                            </svg>
                        </a>
                    </div>
                @else
                    <div class="header-tools__item hover-container">
                        <a href="{{ Auth::user()->usertype === 'admin' ? route('admin.index'): route('user.dashboard') }}" class="header-tools__item">
                            <span style="padding-right: 5px" class="pr-6px">{{ Auth::user()->name }}</span>
                            <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <use href="#icon_user" />
                            </svg>
                        </a>
                    </div>
                @endguest

                <a href="wishlist.html" class="header-tools__item">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_heart" />
                    </svg>
                </a>

                <a href="cart.html" class="header-tools__item header-tools__cart">
                    <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_cart" />
                    </svg>
                    <span class="cart-amount d-block position-absolute js-cart-items-count">3</span>
                </a>
            </div>
        </div>
    </div>
</header>
<ul id="productDropDown" class="dropdown-menu"></ul>

<script>
    Category();

    async function Category() {
            let res = await axios.get("/category-list-in-menu");
            $("#categoryListDrop").empty();

            res.data.forEach(function (item,i) {
                let row = `
                    <ul>
                        <li><a class="dropdown-item nav-link nav_item" href="#">${ item['categoryName'] }</a></li>
                    </ul>
                `;
                $("#categoryListDrop").append(row);
            });
    }
</script>
<style>
    ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    a.dropdown-toggle.nav-link {
        margin: 0 auto;
        padding: 0;
        line-height: inherit;
    }

    .dropdown-toggle.nav-link:hover .dropdown-toggle.nav-link:focus {
        color: #1f1f1f;
        background-color: #f8f9fa;
    }
</style>
