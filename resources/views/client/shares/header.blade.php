<header class="main-header style-four">
    <div class="header-top">
        <div class="large-container">
            <div class="top-inner clearfix">
                <div class="top-right pull-right">
                    <div class="icon">
                        <div class="top-left pull-left">
                            <ul class="social-links clearfix">
                                @if (Auth::guard('client')->check())
                                    You are logged in with email:
                                    <strong>{{ Auth::guard('client')->user()->email }}</strong>
                                    <li><a href="/logout"><i class="fa-solid fa-right-from-bracket"></i></a></li>
                                @else
                                    <li><a href="/login"><i class="flaticon-user"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-upper">
        <div class="large-container">
            <div class="upper-inner">
                <figure class="logo-box"><a href="/"><img src="/client/images/logo.png" alt=""></a>
                </figure>
                <div class="menu-area">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="current"><a href="/">Home</a></li>
                                <li class="dropdown"><a href="index.html">Shop</a>
                                    <div class="megamenu">
                                        <div class="row clearfix">
                                            <div class="col-lg-12 column">
                                                <ul>
                                                    <li>
                                                        <h4>Castro Shop Page</h4>
                                                    </li>
                                                    <li><a href="shop-8.html">Shop Page 08</a></li>
                                                    @if (Auth::guard('client')->check())
                                                        <li><a href="/cart">Cart Page</a></li>
                                                    @endif
                                                    <li><a href="/login">My Account</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown"><a href="index.html">Blog</a>
                                    <ul>
                                        <li><a href="blog-1.html">Blog 01</a></li>
                                        <li><a href="blog-2.html">Blog 02</a></li>
                                        <li><a href="blog-3.html">Blog 03</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <ul class="menu-right-content clearfix">
                    @if (Auth::guard('client')->check())
                        <li class="shop-cart">
                            <a href="/cart"><i class="flaticon-shopping-cart-1"></i><span>3</span></a>
                        </li>
                        <li class="shop-cart">
                            <a href="/myinvoice"> <i class="fa-solid fa-receipt"></i></a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="header-lower">
        <div class="large-container">
            <div class="outer-box">
                <div class="category-box">
                    <p>All Categories</p>
                </div>
                <div class="search-info pull-right">
                    <form action="index-5.html" method="post" class="search-form">
                        <div class="form-group">
                            <input type="search" name="search-field" placeholder="Search Product..." required="">
                            <button type="submit"><i class="flaticon-search"></i><span>Search</span></button>
                        </div>
                    </form>
                    <div class="select-box">
                        <select class="wide">
                            <option data-display="All Categories">All Categories</option>
                            <option value="1">Bags & Shoes</option>
                            <option value="2">Man Fashion</option>
                            <option value="4">Kids Clothing</option>
                            <option value="5">Toys & Kids</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
