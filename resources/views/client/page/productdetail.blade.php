<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/login" method="post" class="default-form">
                    @csrf
                    <div class="form-group">
                        <label>Email address</label>
                        <input class="form-control" name="email" type="email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" name="password" type="password">
                    </div>
                    <div class="form-group">
                        <a href="/forgotpassword" class="recover-password">Lost your
                            password?</a>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="theme-btn-two">Log In<i class="flaticon-right-1"></i></button>
                    </div>
                </form>
            </div>
            <div class="modal-footer mt-n3">
                <p>Don't Have an Account? <a href="/register" class="text-danger">Sign up
                        Now</a></p>
            </div>
        </div>
    </div>
</div>

@extends('client.master')
@section('content')
    <!-- page-title -->
    <section class="page-title centred">
        <div class="pattern-layer" style="background-image: url(/client/images/background/page-title.jpg);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Product Details</h1>
                <ul class="bread-crumb clearfix">
                    <li><i class="flaticon-home-1"></i><a href="/">Home</a></li>
                    <li>Product Details</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->

    <!-- product-details -->
    <section class="product-details product-details-1" id="productdetail1">
        @foreach ($product as $key => $value)
            <div class="auto-container">
                <div class="product-details-content">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                            <figure class="product-image">
                                <img src="{{ $value->picture }}" alt="">
                                <a href="{{ $value->picture }}" class="lightbox-image"><i class="flaticon-search-2"></i></a>
                            </figure>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div class="product-info">
                                <h3>{{ $value->product_name }}</h3>
                                <div class="price">
                                    <div style="display: flex; justify-content: space-between;">
                                        <span class="item-price">${{ $value->price_discount }}</span>
                                        <span class="item-price"
                                              style="text-decoration: line-through;">${{ $value->price_sell }}</span>
                                    </div>
                                </div>
                                <div class="text">
                                    {{ $value->short_description }}
                                </div>
                                <div class="othre-options clearfix" id="add">
                                    <div class="item-quantity">
                                        <div class="input-group bootstrap-touchspin">
                                            <span class="input-group-addon bootstrap-touchspin-prefix"
                                                  style="display: none;"></span>
                                            <input class="quantity-spinner form-control" type="text" v-model="quantity"
                                                   v-on:change="updateQuantity(0)" style="display: block;">
                                            <span class="input-group-addon bootstrap-touchspin-postfix"
                                                  style="display: none;"></span>
                                            <span class="input-group-btn-vertical">
                                                <button class="btn btn-default bootstrap-touchspin-up" type="button"><i
                                                        v-on:click="updateQuantity(1)"
                                                        class="glyphicon glyphicon-chevron-up"></i></button>
                                                <button class="btn btn-default bootstrap-touchspin-down" type="button"><i
                                                        v-on:click="updateQuantity(-1)"
                                                        class="glyphicon glyphicon-chevron-down"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                    @if (Auth::guard('client')->check())
                                        <div class="btn-box" >
                                            <button v-on:click="addToCartByQuantity({{ $value->id }}, quantity)" type="button"
                                                    class="theme-btn-two">Add to cart</button>
                                        </div>
                                    @else
                                        <div class="btn-box">
                                            <button type="button" class="theme-btn-two" data-toggle="modal"
                                                    data-target="#loginModal">Add to cart</button>
                                        </div>
                                    @endif
                                </div>

                                <div class="other-links">
                                    <ul class="clearfix">
                                        <li>Category: <b>{{ $value->product_type_name }}</b>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="product-discription">
                    <div class="tabs-box">
                        <div class="tab-btn-box">
                            <ul class="tab-btns tab-buttons clearfix">
                                <li class="tab-btn" data-tab="#tab-2">Reviews</li>
                            </ul>
                        </div>
                        <div class="tabs-content">
                            <div class="tab" id="tab-2">
                                <div class="review-box">
                                    <div class="review-inner">
                                        <figure class="image-box"><img src="/client/images/resource/review-1.png" alt="">
                                        </figure>
                                        <div class="inner">
                                            <h6>Eileen Alene <span>- May 1, 2020</span></h6>
                                            <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia
                                                deserunt
                                                mollit anim est laborum. Sed perspiciatis unde omnis natus error sit
                                                voluptatem
                                                accusa dolore mque laudant totam rem aperiam eaque ipsa quae ab illo
                                                inventore
                                                veritatis et quasi arch tecto beatae vitae dicta.</p>
                                        </div>
                                    </div>
                                    <div class="replay-inner">
                                        <form action="contact.html" method="post" class="review-form">
                                            <div class="row clearfix">
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                    <label>Your Review</label>
                                                    <textarea name="message"></textarea>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                    <label>Your Name</label>
                                                    <input type="text" name="name" required="">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                    <label>Your Emai</label>
                                                    <input type="email" name="email" required="">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                                    <button type="submit" class="theme-btn-two">Submit Your Review<i
                                                            class="flaticon-right-1"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="related-product container">
                    <div class="sec-title style-two">
                        <h2>Related Products</h2>
                        <span class="separator" style="background-image: url(/client/images/icons/separator-2.png);"></span>
                    </div>
                    <div class="row clearfix">
                        @foreach ($product as $key => $value)
                            <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                                <div class="shop-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="{{ $value->picture }}" alt="">
                                            <ul class="info-list clearfix">
                                                <li>
                                                    @if (Auth::guard('client')->check())
                                                        <a id="productdetail" title="shoppingcart"
                                                           v-on:click="addToCart({{ $value->id }})"><i
                                                                class="flaticon-shopping-cart-1"></i></a>
                                                        <span>Add to cart</span>
                                                    @else
                                                        <a title="shoppingCart"><i class="flaticon-shopping-cart-1"
                                                                                   data-toggle="modal" data-target="#loginModal"></i></a>
                                                    @endif
                                                </li>
                                            </ul>
                                        </figure>
                                        <div class="lower-content">
                                            <a
                                                href="/product/{{ $value->slug_product }}-post{{ $value->id }}">{{ $value->product_name }}</a>
                                            <span class="price">${{ $value->price_discount }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                                <div class="shop-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="{{ $value->picture }}" alt="">
                                            <ul class="info-list clearfix">
                                                <li>
                                                    @if (Auth::guard('client')->check())
                                                        <a id="productdetail" title="shoppingcart"
                                                           v-on:click="addToCart({{ $value->id }})"><i
                                                                class="flaticon-shopping-cart-1"></i></a>
                                                        <span>Add to cart</span>
                                                    @else
                                                        <a title="shoppingCart"><i class="flaticon-shopping-cart-1"
                                                                                   data-toggle="modal" data-target="#loginModal"></i></a>
                                                    @endif
                                                </li>
                                            </ul>
                                        </figure>
                                        <div class="lower-content">
                                            <a
                                                href="/product/{{ $value->slug_product }}-post{{ $value->id }}">{{ $value->product_name }}</a>
                                            <span class="price">${{ $value->price_discount }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                                <div class="shop-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="{{ $value->picture }}" alt="">
                                            <ul class="info-list clearfix">
                                                <li>
                                                    @if (Auth::guard('client')->check())
                                                        <a id="productdetail" title="shoppingcart"
                                                           v-on:click="addToCart({{ $value->id }})"><i
                                                                class="flaticon-shopping-cart-1"></i></a>
                                                        <span>Add to cart</span>
                                                    @else
                                                        <a title="shoppingCart"><i class="flaticon-shopping-cart-1"
                                                                                   data-toggle="modal" data-target="#loginModal"></i></a>
                                                    @endif
                                                </li>
                                            </ul>
                                        </figure>
                                        <div class="lower-content">
                                            <a
                                                href="/product/{{ $value->slug_product }}-post{{ $value->id }}">{{ $value->product_name }}</a>
                                            <span class="price">${{ $value->price_discount }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                                <div class="shop-block-one">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <img src="{{ $value->picture }}" alt="">
                                            <ul class="info-list clearfix">
                                                <li>
                                                    @if (Auth::guard('client')->check())
                                                        <a id="productdetail" title="shoppingcart"
                                                           v-on:click="addToCart({{ $value->id }})"><i
                                                                class="flaticon-shopping-cart-1"></i></a>
                                                        <span>Add to cart</span>
                                                    @else
                                                        <a title="shoppingCart"><i class="flaticon-shopping-cart-1"
                                                                                   data-toggle="modal" data-target="#loginModal"></i></a>
                                                    @endif
                                                </li>
                                            </ul>
                                        </figure>
                                        <div class="lower-content">
                                            <a
                                                href="/product/{{ $value->slug_product }}-post{{ $value->id }}">{{ $value->product_name }}</a>
                                            <span class="price">${{ $value->price_discount }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </section>
    <!-- product-details end -->
@endsection
@section('js')
    <script>
        new Vue({
            el: "#productdetail1",
            data: {
                quantity : 1,
            },
            methods: {
                addToCart(id_product) {
                    var run = {
                        'id_product': id_product,
                    };
                    axios
                        .post('/add-to-cart', run)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.mess);
                            } else if (res.data.status == 0) {
                                toastr.error(res.data.mess);
                            } else if (res.data.status == 2) {
                                toastr.warning(res.data.mess);
                            }
                        })
                        .catch((res) => {
                            var listError = res.response.data.errors;
                            $.each(listError, function(key, value) {
                                toastr.error(value[0]);
                            });
                        });
                },
                addToCartByQuantity(id_product, quantity) {
                    var run = {
                        'id_product': id_product,
                        'quantity': quantity,
                    };
                    axios
                        .post('/add-to-cart-by-quantity', run)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.mess);
                            } else if (res.data.status == 0) {
                                toastr.error(res.data.mess);
                            } else if (res.data.status == 2) {
                                toastr.warning(res.data.mess);
                            }
                        })
                        .catch((res) => {
                            var listError = res.response.data.errors;
                            $.each(listError, function(key, value) {
                                toastr.error(value[0]);
                            });
                        });
                },
                updateQuantity(t) {
                    if (t == 1 && this.quantity >= 1) {
                        this.quantity++;
                    } else if (t == -1 && this.quantity > 1) {
                        this.quantity--;
                    }
                },

            },
        });
    </script>
@endsection
