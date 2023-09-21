        <!-- shop-style-three -->
        <section class="shop-style-three">
            <div class="large-container">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 shop-column">
                        <div class="shop-inner">
                            <div class="tabs-box">
                                <div class="tab-btn-box clearfix">
                                    <h3 class="mb-2">Product Type Saller</h3>
                                    <ul class="tab-btns tab-buttons pull-right clearfix">
                                        @foreach ($producttype as $key => $value)
                                            <li class="nav-item">
                                                <a class="tab-btn active-btn {{ $key == 0 ? 'active' : '' }}"
                                                    id="home-tab" data-toggle="tab" href="#home_{{ $key }}"
                                                    data-tab="#tab-1" aria-controls="home" aria-selected="true"
                                                    role="tab"
                                                    style="font-family: 'Inter', sans-serif; color:#222222">{{ $value->product_type_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="tabs-content">
                                    <div class="tab active-tab" id="tab-1">
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                                <div class="shop-block-three">
                                                    <div class="inner-box">
                                                        <figure class="image-box">
                                                            <img src="/client/images/resource/shop/shop-18.jpg"
                                                                alt="">
                                                            <ul class="info-list clearfix">
                                                                <li>
                                                                    <a href="product-details.html"><i
                                                                            class="flaticon-shopping-cart-1"></i></a>
                                                                    <span>Add to cart</span>
                                                                </li>
                                                                <li>
                                                                    <a href="/client/images/resource/shop/shop-18.jpg"
                                                                        class="lightbox-image"
                                                                        data-fancybox="gallery"><i
                                                                            class="flaticon-search"></i></a>
                                                                    <span>View all</span>
                                                                </li>
                                                            </ul>
                                                        </figure>
                                                        <div class="lower-content">
                                                            <a href="product-details.html">Cold Crewneck Sweater</a>
                                                            <span class="price">$70.30</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                                <div class="shop-block-three">
                                                    <div class="inner-box">
                                                        <figure class="image-box">
                                                            <img src="/client/images/resource/shop/shop-19.jpg"
                                                                alt="">
                                                            <ul class="info-list clearfix">
                                                                <li>
                                                                    <a href="product-details.html"><i
                                                                            class="flaticon-shopping-cart-1"></i></a>
                                                                    <span>Add to cart</span>
                                                                </li>
                                                                <li>
                                                                    <a href="/client/images/resource/shop/shop-19.jpg"
                                                                        class="lightbox-image"
                                                                        data-fancybox="gallery"><i
                                                                            class="flaticon-search"></i></a>
                                                                    <span>View all</span>
                                                                </li>
                                                            </ul>
                                                        </figure>
                                                        <div class="lower-content">
                                                            <a href="product-details.html">Multi-Way Ultra Crop Top</a>
                                                            <span class="price">$50.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                                <div class="shop-block-three">
                                                    <div class="inner-box">
                                                        <figure class="image-box">
                                                            <img src="/client/images/resource/shop/shop-20.jpg"
                                                                alt="">
                                                            <ul class="info-list clearfix">
                                                                <li>
                                                                    <a href="product-details.html"><i
                                                                            class="flaticon-shopping-cart-1"></i></a>
                                                                    <span>Add to cart</span>
                                                                </li>
                                                                <li>
                                                                    <a href="/client/images/resource/shop/shop-20.jpg"
                                                                        class="lightbox-image"
                                                                        data-fancybox="gallery"><i
                                                                            class="flaticon-search"></i></a>
                                                                    <span>View all</span>
                                                                </li>
                                                            </ul>
                                                        </figure>
                                                        <div class="lower-content">
                                                            <a href="product-details.html">Side-Tie Tank</a>
                                                            <span class="price">$40.00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix mt-3">
                                            <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                                <div class="shop-block-three">
                                                    <div class="inner-box">
                                                        <figure class="image-box">
                                                            <img src="/client/images/resource/shop/shop-18.jpg"
                                                                alt="">
                                                            <ul class="info-list clearfix">
                                                                <li>
                                                                    <a href="product-details.html"><i
                                                                            class="flaticon-shopping-cart-1"></i></a>
                                                                    <span>Add to cart</span>
                                                                </li>
                                                                <li>
                                                                    <a href="/client/images/resource/shop/shop-18.jpg"
                                                                        class="lightbox-image"
                                                                        data-fancybox="gallery"><i
                                                                            class="flaticon-search"></i></a>
                                                                    <span>View all</span>
                                                                </li>
                                                            </ul>
                                                        </figure>
                                                        <div class="lower-content">
                                                            <a href="product-details.html">Cold Crewneck
                                                                Sweater</a>
                                                            <span class="price">$70.30</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                                <div class="shop-block-three">
                                                    <div class="inner-box">
                                                        <figure class="image-box">
                                                            <img src="/client/images/resource/shop/shop-18.jpg"
                                                                alt="">
                                                            <ul class="info-list clearfix">
                                                                <li>
                                                                    <a href="product-details.html"><i
                                                                            class="flaticon-shopping-cart-1"></i></a>
                                                                    <span>Add to cart</span>
                                                                </li>
                                                                <li>
                                                                    <a href="/client/images/resource/shop/shop-18.jpg"
                                                                        class="lightbox-image"
                                                                        data-fancybox="gallery"><i
                                                                            class="flaticon-search"></i></a>
                                                                    <span>View all</span>
                                                                </li>
                                                            </ul>
                                                        </figure>
                                                        <div class="lower-content">
                                                            <a href="product-details.html">Cold Crewneck
                                                                Sweater</a>
                                                            <span class="price">$70.30</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                                <div class="shop-block-three">
                                                    <div class="inner-box">
                                                        <figure class="image-box">
                                                            <img src="/client/images/resource/shop/shop-18.jpg"
                                                                alt="">
                                                            <ul class="info-list clearfix">
                                                                <li>
                                                                    <a href="product-details.html"><i
                                                                            class="flaticon-shopping-cart-1"></i></a>
                                                                    <span>Add to cart</span>
                                                                </li>
                                                                <li>
                                                                    <a href="/client/images/resource/shop/shop-18.jpg"
                                                                        class="lightbox-image"
                                                                        data-fancybox="gallery"><i
                                                                            class="flaticon-search"></i></a>
                                                                    <span>View all</span>
                                                                </li>
                                                            </ul>
                                                        </figure>
                                                        <div class="lower-content">
                                                            <a href="product-details.html">Cold Crewneck
                                                                Sweater</a>
                                                            <span class="price">$70.30</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab" id="tab-2">
                                    <div class="row clearfix">
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-three">
                                                <div class="inner-box">
                                                    <figure class="image-box">
                                                        <img src="/client/images/resource/shop/shop-18.jpg"
                                                            alt="">
                                                        <ul class="info-list clearfix">
                                                            <li>
                                                                <a href="index.html"><i
                                                                        class="flaticon-heart"></i></a>
                                                                <span>Like us</span>
                                                            </li>
                                                            <li>
                                                                <a href="product-details.html"><i
                                                                        class="flaticon-shopping-cart-1"></i></a>
                                                                <span>Add to cart</span>
                                                            </li>
                                                            <li>
                                                                <a href="/client/images/resource/shop/shop-18.jpg"
                                                                    class="lightbox-image" data-fancybox="gallery"><i
                                                                        class="flaticon-search"></i></a>
                                                                <span>View all</span>
                                                            </li>
                                                        </ul>
                                                    </figure>
                                                    <div class="lower-content">
                                                        <a href="product-details.html">Cold Crewneck Sweater</a>
                                                        <span class="price">$70.30</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-three">
                                                <div class="inner-box">
                                                    <figure class="image-box">
                                                        <img src="/client/images/resource/shop/shop-19.jpg"
                                                            alt="">
                                                        <span class="category">New</span>
                                                        <ul class="info-list clearfix">
                                                            <li>
                                                                <a href="index.html"><i
                                                                        class="flaticon-heart"></i></a>
                                                                <span>Like us</span>
                                                            </li>
                                                            <li>
                                                                <a href="product-details.html"><i
                                                                        class="flaticon-shopping-cart-1"></i></a>
                                                                <span>Add to cart</span>
                                                            </li>
                                                            <li>
                                                                <a href="/client/images/resource/shop/shop-19.jpg"
                                                                    class="lightbox-image" data-fancybox="gallery"><i
                                                                        class="flaticon-search"></i></a>
                                                                <span>View all</span>
                                                            </li>
                                                        </ul>
                                                    </figure>
                                                    <div class="lower-content">
                                                        <a href="product-details.html">Multi-Way Ultra Crop Top</a>
                                                        <span class="price">$50.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-three">
                                                <div class="inner-box">
                                                    <figure class="image-box">
                                                        <img src="/client/images/resource/shop/shop-20.jpg"
                                                            alt="">
                                                        <ul class="info-list clearfix">
                                                            <li>
                                                                <a href="index.html"><i
                                                                        class="flaticon-heart"></i></a>
                                                                <span>Like us</span>
                                                            </li>
                                                            <li>
                                                                <a href="product-details.html"><i
                                                                        class="flaticon-shopping-cart-1"></i></a>
                                                                <span>Add to cart</span>
                                                            </li>
                                                            <li>
                                                                <a href="/client/images/resource/shop/shop-20.jpg"
                                                                    class="lightbox-image" data-fancybox="gallery"><i
                                                                        class="flaticon-search"></i></a>
                                                                <span>View all</span>
                                                            </li>
                                                        </ul>
                                                    </figure>
                                                    <div class="lower-content">
                                                        <a href="product-details.html">Side-Tie Tank</a>
                                                        <span class="price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab" id="tab-3">
                                    <div class="row clearfix">
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-three">
                                                <div class="inner-box">
                                                    <figure class="image-box">
                                                        <img src="/client/images/resource/shop/shop-18.jpg"
                                                            alt="">
                                                        <ul class="info-list clearfix">
                                                            <li>
                                                                <a href="index.html"><i
                                                                        class="flaticon-heart"></i></a>
                                                                <span>Like us</span>
                                                            </li>
                                                            <li>
                                                                <a href="product-details.html"><i
                                                                        class="flaticon-shopping-cart-1"></i></a>
                                                                <span>Add to cart</span>
                                                            </li>
                                                            <li>
                                                                <a href="/client/images/resource/shop/shop-18.jpg"
                                                                    class="lightbox-image" data-fancybox="gallery"><i
                                                                        class="flaticon-search"></i></a>
                                                                <span>View all</span>
                                                            </li>
                                                        </ul>
                                                    </figure>
                                                    <div class="lower-content">
                                                        <a href="product-details.html">Cold Crewneck Sweater</a>
                                                        <span class="price">$70.30</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-three">
                                                <div class="inner-box">
                                                    <figure class="image-box">
                                                        <img src="/client/images/resource/shop/shop-19.jpg"
                                                            alt="">
                                                        <span class="category">New</span>
                                                        <ul class="info-list clearfix">
                                                            <li>
                                                                <a href="index.html"><i
                                                                        class="flaticon-heart"></i></a>
                                                                <span>Like us</span>
                                                            </li>
                                                            <li>
                                                                <a href="product-details.html"><i
                                                                        class="flaticon-shopping-cart-1"></i></a>
                                                                <span>Add to cart</span>
                                                            </li>
                                                            <li>
                                                                <a href="/client/images/resource/shop/shop-19.jpg"
                                                                    class="lightbox-image" data-fancybox="gallery"><i
                                                                        class="flaticon-search"></i></a>
                                                                <span>View all</span>
                                                            </li>
                                                        </ul>
                                                    </figure>
                                                    <div class="lower-content">
                                                        <a href="product-details.html">Multi-Way Ultra Crop Top</a>
                                                        <span class="price">$50.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-three">
                                                <div class="inner-box">
                                                    <figure class="image-box">
                                                        <img src="/client/images/resource/shop/shop-20.jpg"
                                                            alt="">
                                                        <ul class="info-list clearfix">
                                                            <li>
                                                                <a href="index.html"><i
                                                                        class="flaticon-heart"></i></a>
                                                                <span>Like us</span>
                                                            </li>
                                                            <li>
                                                                <a href="product-details.html"><i
                                                                        class="flaticon-shopping-cart-1"></i></a>
                                                                <span>Add to cart</span>
                                                            </li>
                                                            <li>
                                                                <a href="/client/images/resource/shop/shop-20.jpg"
                                                                    class="lightbox-image" data-fancybox="gallery"><i
                                                                        class="flaticon-search"></i></a>
                                                                <span>View all</span>
                                                            </li>
                                                        </ul>
                                                    </figure>
                                                    <div class="lower-content">
                                                        <a href="product-details.html">Side-Tie Tank</a>
                                                        <span class="price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab" id="tab-4">
                                    <div class="row clearfix">
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-three">
                                                <div class="inner-box">
                                                    <figure class="image-box">
                                                        <img src="/client/images/resource/shop/shop-18.jpg"
                                                            alt="">
                                                        <ul class="info-list clearfix">
                                                            <li>
                                                                <a href="index.html"><i
                                                                        class="flaticon-heart"></i></a>
                                                                <span>Like us</span>
                                                            </li>
                                                            <li>
                                                                <a href="product-details.html"><i
                                                                        class="flaticon-shopping-cart-1"></i></a>
                                                                <span>Add to cart</span>
                                                            </li>
                                                            <li>
                                                                <a href="/client/images/resource/shop/shop-18.jpg"
                                                                    class="lightbox-image" data-fancybox="gallery"><i
                                                                        class="flaticon-search"></i></a>
                                                                <span>View all</span>
                                                            </li>
                                                        </ul>
                                                    </figure>
                                                    <div class="lower-content">
                                                        <a href="product-details.html">Cold Crewneck Sweater</a>
                                                        <span class="price">$70.30</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-three">
                                                <div class="inner-box">
                                                    <figure class="image-box">
                                                        <img src="/client/images/resource/shop/shop-19.jpg"
                                                            alt="">
                                                        <span class="category">New</span>
                                                        <ul class="info-list clearfix">
                                                            <li>
                                                                <a href="index.html"><i
                                                                        class="flaticon-heart"></i></a>
                                                                <span>Like us</span>
                                                            </li>
                                                            <li>
                                                                <a href="product-details.html"><i
                                                                        class="flaticon-shopping-cart-1"></i></a>
                                                                <span>Add to cart</span>
                                                            </li>
                                                            <li>
                                                                <a href="/client/images/resource/shop/shop-19.jpg"
                                                                    class="lightbox-image" data-fancybox="gallery"><i
                                                                        class="flaticon-search"></i></a>
                                                                <span>View all</span>
                                                            </li>
                                                        </ul>
                                                    </figure>
                                                    <div class="lower-content">
                                                        <a href="product-details.html">Multi-Way Ultra Crop Top</a>
                                                        <span class="price">$50.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-three">
                                                <div class="inner-box">
                                                    <figure class="image-box">
                                                        <img src="/client/images/resource/shop/shop-20.jpg"
                                                            alt="">
                                                        <ul class="info-list clearfix">
                                                            <li>
                                                                <a href="index.html"><i
                                                                        class="flaticon-heart"></i></a>
                                                                <span>Like us</span>
                                                            </li>
                                                            <li>
                                                                <a href="product-details.html"><i
                                                                        class="flaticon-shopping-cart-1"></i></a>
                                                                <span>Add to cart</span>
                                                            </li>
                                                            <li>
                                                                <a href="/client/images/resource/shop/shop-20.jpg"
                                                                    class="lightbox-image" data-fancybox="gallery"><i
                                                                        class="flaticon-search"></i></a>
                                                                <span>View all</span>
                                                            </li>
                                                        </ul>
                                                    </figure>
                                                    <div class="lower-content">
                                                        <a href="product-details.html">Side-Tie Tank</a>
                                                        <span class="price">$40.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-style-three -->
