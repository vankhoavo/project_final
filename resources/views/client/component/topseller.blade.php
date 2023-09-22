<!-- shop-style-three -->
<section class="shop-style-three">
    <div class="large-container">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 shop-column">
                <div class="shop-inner">
                    <div class="tabs-box">
                        <div class="tab-btn-box clearfix">
                            <h2>Top Saller</h2>
                            <ul class="tab-btns tab-buttons pull-right clearfix">
                                @foreach ($productype as $key => $value)
                                    <li class="tab-btn active-btn" data-tab="#tab-1">{{ $value->product_type_name }}</li>
                                @endforeach
                                {{-- <li class="tab-btn" data-tab="#tab-2">New Arraivals</li>
                                <li class="tab-btn" data-tab="#tab-3">Top Rate</li>
                                <li class="tab-btn" data-tab="#tab-4">Special Offer</li>
                                <li class="tab-btn" data-tab="#tab-5">Special Offer</li>
                                <li class="tab-btn" data-tab="#tab-6">Special Offer</li>
                                <li class="tab-btn" data-tab="#tab-7">Special Offer</li>
                                <li class="tab-btn" data-tab="#tab-8">Special Offer</li> --}}
                            </ul>
                        </div>
                        <div class="tabs-content">
                            <div class="tab active-tab" id="tab-1">
                                <div class="row clearfix">
                                    @foreach ($product as $key => $value)
                                        <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-three">
                                                <div class="inner-box">
                                                    <figure class="image-box">
                                                        <a
                                                            href="/product/{{ $value->slug_product }}-post{{ $value->id }}">
                                                            <img href="/product-detail-1.html"
                                                                src="{{ $value->picture }}" alt="">
                                                        </a>
                                                        <ul class="info-list clearfix">
                                                            <li>
                                                                <a href="product-details.html"><i
                                                                        class="flaticon-shopping-cart-1"></i></a>
                                                                <span>Add to cart</span>
                                                            </li>
                                                        </ul>
                                                    </figure>
                                                    <div class="lower-content">
                                                        <a href="/product-detail-1.html">{{ $value->product_name }}</a>
                                                        <div class="price">
                                                            <span
                                                                class="price_discount">{{ number_format($value->price_discount, 0, ',', '.') }}
                                                                VND</span>
                                                            <span style="float: right;text-decoration: line-through;"
                                                                class="price_sell">{{ number_format($value->price_sell, 0, ',', '.') }}
                                                                VND</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="tab" id="tab-2">
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                        <div class="shop-block-three">
                                            <div class="inner-box">
                                                <figure class="image-box">
                                                    <img src="/client/images/resource/shop/shop-18.jpg" alt="">
                                                    <ul class="info-list clearfix">
                                                        <li>
                                                            <a href="index.html"><i class="flaticon-heart"></i></a>
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
                                                    <img src="/client/images/resource/shop/shop-19.jpg" alt="">
                                                    <span class="category">New</span>
                                                    <ul class="info-list clearfix">
                                                        <li>
                                                            <a href="index.html"><i class="flaticon-heart"></i></a>
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
                                                    <img src="/client/images/resource/shop/shop-20.jpg" alt="">
                                                    <ul class="info-list clearfix">
                                                        <li>
                                                            <a href="index.html"><i class="flaticon-heart"></i></a>
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
                                                    <img src="/client/images/resource/shop/shop-18.jpg" alt="">
                                                    <ul class="info-list clearfix">
                                                        <li>
                                                            <a href="index.html"><i class="flaticon-heart"></i></a>
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
                                                            <a href="index.html"><i class="flaticon-heart"></i></a>
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
                                                            <a href="index.html"><i class="flaticon-heart"></i></a>
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
                                                            <a href="index.html"><i class="flaticon-heart"></i></a>
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
                                                            <a href="index.html"><i class="flaticon-heart"></i></a>
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
                                                            <a href="index.html"><i class="flaticon-heart"></i></a>
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
                            <div class="tab" id="tab-5">
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                        <div class="shop-block-three">
                                            <div class="inner-box">
                                                <figure class="image-box">
                                                    <img src="/client/images/resource/shop/shop-18.jpg"
                                                        alt="">
                                                    <ul class="info-list clearfix">
                                                        <li>
                                                            <a href="index.html"><i class="flaticon-heart"></i></a>
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
                                                            <a href="index.html"><i class="flaticon-heart"></i></a>
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
                                                            <a href="index.html"><i class="flaticon-heart"></i></a>
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
                            <div class="tab" id="tab-6">
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                        <div class="shop-block-three">
                                            <div class="inner-box">
                                                <figure class="image-box">
                                                    <img src="/client/images/resource/shop/shop-18.jpg"
                                                        alt="">
                                                    <ul class="info-list clearfix">
                                                        <li>
                                                            <a href="index.html"><i class="flaticon-heart"></i></a>
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
                                                            <a href="index.html"><i class="flaticon-heart"></i></a>
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
                                                            <a href="index.html"><i class="flaticon-heart"></i></a>
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
                            <div class="tab" id="tab-7">
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                        <div class="shop-block-three">
                                            <div class="inner-box">
                                                <figure class="image-box">
                                                    <img src="/client/images/resource/shop/shop-18.jpg"
                                                        alt="">
                                                    <ul class="info-list clearfix">
                                                        <li>
                                                            <a href="index.html"><i class="flaticon-heart"></i></a>
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
                                                            <a href="index.html"><i class="flaticon-heart"></i></a>
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
                                                            <a href="index.html"><i class="flaticon-heart"></i></a>
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
                            <div class="tab" id="tab-8">
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                        <div class="shop-block-three">
                                            <div class="inner-box">
                                                <figure class="image-box">
                                                    <img src="/client/images/resource/shop/shop-18.jpg"
                                                        alt="">
                                                    <ul class="info-list clearfix">
                                                        <li>
                                                            <a href="index.html"><i class="flaticon-heart"></i></a>
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
                                                            <a href="index.html"><i class="flaticon-heart"></i></a>
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
                                                            <a href="index.html"><i class="flaticon-heart"></i></a>
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
    </div>
</section>
<!-- shop-style-three -->
