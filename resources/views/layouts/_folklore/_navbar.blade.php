<nav id="site-navigation" class="navigation navbar navbar-default">
    <div class="container-full">
        <div class="navbar-header">
            <button type="button" id="hamburger-menu" class="open-nav-btn open-btn" aria-label="open navigation"
                aria-controls="link-list" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('folklore.home') }}">
                <img src="{{ asset('vendor/my-folklore/images/logo.jpg') }}">
            </a>
        </div>
        <div id="slide-nav" class="navbar-collapse collapse navigation-holder slide-content">
            <button type="button" id="close" class="close-btn close-navbar" aria-label="close navigation"><i
                    class="ti-close"></i></button>
            <ul id="link-list" class="nav navbar-nav menu nav-menu">
                <li class="current-menu-item"><a href="{{ route('folklore.home') }}">Inicio</a></li>
                <li
                    class="menu-item-has-children menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-14">
                    <a href="{{ route('folklore.artistas') }}">Artistas</a>
                    <ul class="sub-menu">
                        @forelse ($artistas as $artista)
                            <li><a href="#">{{ $artista->title }}</a></li>
                        @empty
                        @endforelse
                    </ul>
                </li>
                <li
                    class="menu-item-has-children menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-14">
                    <a href="#">Noticias</a>
                    <ul class="sub-menu">
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="blog-left-side.html">Blog Left Sidebar</a></li>
                        <li><a href="blog-s2.html">Blog Style 2</a></li>
                        <li><a href="blog-s2-left-sidebar.html">Blog Style 2 Left Sidebar</a></li>
                        <li><a href="blog-masonry.html">Blog Masonry</a></li>
                        <li class="menu-item-has-children">
                            <a href="#Level3">Blog Single</a>
                            <ul class="sub-menu">
                                <li><a href="blog-single.html">Blog Single</a></li>
                                <li><a href="blog-single-left-sidebar.html">Blog Single Left Sidebar</a></li>
                                <li><a href="blog-single-fullwidth.html">Blog Single Full Width</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li
                    class="menu-item-has-children menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-14">
                    <a href="#">Videos</a>
                    <ul class="sub-menu">
                        <li><a href="shop.html">Shop</a></li>
                        <li><a href="shop-single.html">Shop single</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">Contacto</a></li>
            </ul>
        </div><!-- end of nav-collapse -->

        <div class="header-right">
            <div class="header-search-form-wrapper">
                <div class="search-area">
                    <form>
                        <div>
                            <input type="text" class="form-control" placeholder="Search">
                            <button type="submit"><i class="ti ti-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mini-cart">
                <button class="cart-toggle-btn"> cart <span class="cart-count">3</span></button>
                <div class="mini-cart-content">
                    <div class="mini-cart-items">
                        <div class="mini-cart-item clearfix">
                            <div class="mini-cart-item-image">
                                <a href="shop-single.html"><img src="assets/images/shop/mini-cart/img-1.jpg" alt></a>
                            </div>
                            <div class="mini-cart-item-des">
                                <a href="shop-single.html">Gray hoodi</a>
                                <span class="mini-cart-item-quantity">Qty: 1</span>
                                <span class="mini-cart-item-price">$10.15</span>
                            </div>
                        </div>
                        <div class="mini-cart-item clearfix">
                            <div class="mini-cart-item-image">
                                <a href="shop-single.html"><img src="assets/images/shop/mini-cart/img-2.jpg" alt></a>
                            </div>
                            <div class="mini-cart-item-des">
                                <a href="shop-single.html">Black hoodi</a>
                                <span class="mini-cart-item-quantity">Qty: 1</span>
                                <span class="mini-cart-item-price">$11.25</span>
                            </div>
                        </div>
                    </div>
                    <div class="mini-cart-action clearfix">
                        <span class="mini-checkout-price">Subtotal: $21.14</span>
                        <a href="cart.html" class="view-cart-btn">View Cart</a>
                        <a href="checkout.html" class="checkout-btn">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of container -->
</nav>
