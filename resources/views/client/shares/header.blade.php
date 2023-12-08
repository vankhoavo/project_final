<header class="main-header style-four" id="app_header">
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
                                <li><a href="/">Home</a></li>
                                <li><a href="/blog">Blog</a>
                                </li>
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <ul class="menu-right-content clearfix">
                    @if (Auth::guard('client')->check())
                        <li class="shop-cart">
                            <a href="/cart"><i class="flaticon-shopping-cart-1"></i><span>@{{total}}</span></a>
                        </li>
                        <li class="shop-cart">
                            <a href="/viewprofile"><i class="fa-solid fa-user"></i></a>
                        </li>
                        <li class="shop-cart">
                            <a href="/myinvoice"> <i class="fa-solid fa-receipt"></i></a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</header>

