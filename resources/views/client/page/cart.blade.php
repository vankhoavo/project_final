@extends('client.master')<!-- page-title -->
@section('content')
    <section class="page-title centred">
        <div class="pattern-layer" style="background-image: url(client/images/background/page-title.jpg);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Cart Page</h1>
                <ul class="bread-crumb clearfix">
                    <li><i class="flaticon-home-1"></i><a href="/">Home</a></li>
                    <li>Cart Page</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->


    <!-- cart section -->
    <section class="cart-section cart-page">
        <div class="auto-container" id="app">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 table-column">
                    <div class="table-outer">
                        <table class="cart-table">
                            <thead class="cart-header">
                                <tr>
                                    <th>&nbsp;</th>
                                    <th class="prod-column">Product Name</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th class="price">Price</th>
                                    <th class="quantity">Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(value, key) in array">
                                    <td colspan="4" class="prod-column">
                                        <div class="column-box">
                                            <div class="remove-btn">
                                                <i class="flaticon-close"></i>
                                            </div>
                                            <div class="prod-thumb">
                                                <a href="#"><img v-bind:src="value.picture" alt=""></a>
                                            </div>
                                            <div class="prod-title">
                                                @{{ value.product_name }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="price">@{{ format(value.unit_price) }}</td>
                                    <td class="qty">
                                        <div class="item-quantity">
                                            <div class="input-group bootstrap-touchspin">
                                                <span class="input-group-addon bootstrap-touchspin-prefix"
                                                    style="display: none;"></span>
                                                <input class="quantity-spinner form-control" type="text"
                                                    style="display: block;" v-model="value.quantity"
                                                    v-on:change="update(value, 0)">
                                                <span class="input-group-addon bootstrap-touchspin-postfix"
                                                    style="display: none;"></span>
                                                <span class="input-group-btn-vertical">
                                                    <button class="btn btn-default bootstrap-touchspin-up"
                                                        v-on:click="update(value,1)" type="button">
                                                        <i class="glyphicon glyphicon-chevron-up"></i>
                                                    </button>
                                                    <button class="btn btn-default bootstrap-touchspin-down"
                                                        v-on:click="update(value,-1)" type="button">
                                                        <i class="glyphicon glyphicon-chevron-down"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="sub-total">@{{ format(value.into_money) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="cart-total mt-3">
                <div class="row">
                    <div class="col-xl-7 col-lg-12 col-md-12 cart-column">
                        <form id="form" class="billing-form mb-n4">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input v-model="bill.recipient_name" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input v-model="bill.receiving_phone_number" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input v-model="bill.receiving_address" type="text" class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-5 col-lg-12 col-md-12 cart-column">
                        <div class="total-cart-box clearfix">
                            <h4>Cart Totals</h4>
                            <ul class="list clearfix">
                                <li>Order Total:<span>@{{ format(totalmoney) }}</span></li>
                            </ul>
                            <a v-on:click="createbill()" class="theme-btn-two">Place Your Order<i
                                    class="flaticon-right-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- cart section end -->
@endsection
@section('js')
    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>
    <script>
        new Vue({
            el: "#app",
            data: {
                array: [],
                totalmoney: 0,
                bill: {},
            },
            created() {
                this.loadData();
            },
            methods: {
                loadData() {
                    axios
                        .get('/cart/data')
                        .then((res) => {
                            this.array = res.data.data;
                            this.totalmoney = res.data.totaldetailmoney;
                        });
                },

                format(money) {
                    return new Intl.NumberFormat('en-US', {
                        style: 'currency',
                        currency: 'USD'
                    }).format(money)
                },

                update(v, t) {
                    if (t == 1) {
                        v.quantity++;
                    } else if (t == -1) {
                        v.quantity--;
                    }
                    axios
                        .post('/cart/update', v)
                        .then((res) => {
                            if (res.data.status) {
                                this.loadData();
                            } else if (res.data.status == 0) {
                                toastr.error(res.data.mess);
                            } else if (res.data.status == 2) {
                                toastr.warning(res.data.mess);
                            }
                        })
                        .catch((res) => {
                            var listE = res.response.data.errors;
                            $.each(listE, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },

                createbill() {
                    axios
                        .post('/create-bill', this.bill)
                        .then((res) => {
                            if (res.data.status) {
                                $("#form").trigger('reset');
                                this.paymentPaypal(res.data.id);
                                toastr.success(res.data.mess);
                            } else if (res.data.status == 0) {
                                toastr.error(res.data.mess);
                            } else if (res.data.status == 2) {
                                toastr.warning(res.data.mess);
                            }
                        })
                        .catch((res) => {
                            var listE = res.response.data.errors;
                            $.each(listE, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },

                paymentPaypal(id) {
                    total = this.totalmoney;
                    axios
                        .get('/process-transaction', {
                            params: {
                                price: total.toFixed(2),
                                id_invoice: id,
                            }
                        })
                        .then((res) => {
                            if (res.data.status) {
                                window.location = res.data.link
                            }
                        });
                }
            },
        });
    </script>
@endsection
