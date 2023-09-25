@extends('client.master')
@section('content')
    <!-- checkout-section -->
    <section class="checkout-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 left-column">
                    <div class="inner-box">
                        <div class="billing-info">
                            <h4 class="sub-title">Billing Details</h4>
                            <form action="#" method="post" class="billing-form mb-n4">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-12 form-group">
                                        <label>Full Name</label>
                                        <div class="field-input">
                                            <input type="text" name="first_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label>Phone Number</label>
                                        <div class="field-input">
                                            <input type="email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label>Address</label>
                                        <div class="field-input">
                                            <input type="text" name="address" class="address">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="additional-info">
                            <div class="note-book">
                                <label>Order Notes</label>
                                <textarea name="note_box" placeholder="Notes about your order, e.g. special notes for your delivery"></textarea>
                            </div>
                        </div>
                        <div class="payment-info mt-4">
                            <h4 class="sub-title">Payment Proccess</h4>
                            <div class="payment-inner">
                                <p class="mb-2" style="text-align:justify">Note: If the system successfully notifies you
                                    about your order, payment
                                    through Paypal will be switched over automatically. Please check the email you used to
                                    log in to make purchases and view transfer details in the event that you do not have
                                    Paypal.</p>
                                <div class="btn-box">
                                    <a href="https://www.paypal.com/vn/webapps/mpp/home?locale.x=vi_VN"
                                        class="theme-btn-two">Place Your Order<i class="flaticon-right-1"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 right-column" id="app">
                    <div class="inner-box">
                        <div class="order-info mb-n1">
                            <h4 class="sub-title">Your Order</h4>
                            <div class="order-product">
                                <ul class="order-list clearfix">
                                    <li class="title clearfix">
                                        <p>Product</p>
                                        <span>Total</span>
                                    </li>
                                    <li>
                                        <div class="single-box clearfix" v-for="(value, key) in array">
                                            <img v-bind:src="value.picture" alt="">
                                            <h6>@{{ value.product_name }}</h6>
                                            <span>@{{ format(value.into_money) }}</span>
                                        </div>
                                    </li>
                                    <li class="order-total clearfix">
                                        <h6>Order Total</h6>
                                        <span>@{{ format(totalmoney) }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- checkout-section end -->
@endsection
@section('js')
    <script>
        new Vue({
            el: "#app",
            data: {
                array: [],
                totalmoney: 0,
            },
            created() {
                this.loadData();
            },
            methods: {
                loadData() {
                    axios
                        .get('/data')
                        .then((res) => {
                            this.array = res.data.data;
                            this.totalmoney = res.data.totaldetailmoney;
                        });
                },

                format(money) {
                    return new Intl.NumberFormat('vi-VI', {
                        style: 'currency',
                        currency: 'VND'
                    }).format(money)
                },
            },
        });
    </script>
@endsection
