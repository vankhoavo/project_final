<!-- Login Modal -->
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
                        <a href="/forgotpassword" class="recover-password">Lost your password?</a>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="theme-btn-two">Log In<i class="flaticon-right-1"></i></button>
                    </div>
                </form>
            </div>
            <div class="modal-footer mt-n3">
                <p>Don't Have an Account? <a href="/register" class="text-danger">Sign up Now</a></p>
            </div>
        </div>
    </div>
</div>

<!-- shop-style-three -->
<section class="shop-style-three" id="app_topseller">
    <div class="large-container">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 shop-column">
                <div class="shop-inner">
                    <div class="tabs-box">
                        <div class="tab-btn-box clearfix">
                            <h2>Top Product</h2>
                            <ul class="tab-btns tab-buttons pull-right clearfix">

                            </ul>
                        </div>
                        <div class="tabs-content">
                            <div class="tab active-tab" id="tab-1">
                                <div class="row clearfix">
                                    <template v-for="(value, key) in listProduct">
                                        <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-three">
                                                <div class="inner-box">
                                                    <figure class="image-box">
                                                        <a v-bind:href="'/product/' + value.slug_product + '-post' + value.id">
                                                            <img href="/product-detail-1.html"
                                                                 v-bind:src="value.picture" alt="">
                                                        </a>
                                                        <ul class="info-list clearfix">
                                                            <li>
                                                                @if (Auth::guard('client')->check())
                                                                    <a title="shoppingcart"
                                                                       v-on:click="addToCart(value.id)"><i
                                                                            class="flaticon-shopping-cart-1"></i></a>
                                                                    <span>Add to cart</span>
                                                                @else
                                                                    <a title="shoppingCart"><i
                                                                            class="flaticon-shopping-cart-1"
                                                                            data-toggle="modal"
                                                                            data-target="#loginModal"></i></a>
                                                                    <span>Add to cart</span>
                                                                @endif
                                                            </li>
                                                        </ul>
                                                    </figure>
                                                    <div class="lower-content">
                                                        <a v-bind:href="'/product/' + value.slug_product + '-post' + value.id">@{{
                                                            value.product_name }}</a>
                                                        <div class="price">
                                                            <span
                                                                class="price_discount">@{{ value.price_discount }} $</span>
                                                            <span style="float: right;text-decoration: line-through;"
                                                                  class="price_sell">@{{ value.price_sell }} $</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
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
