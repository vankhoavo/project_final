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
                                            <input class="quantity-spinner" type="text" v-model="value.quantity"
                                                v-on:change="update(v)">
                                        </div>
                                    </td>
                                    <td class="sub-total">@{{ format(value.into_money) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="cart-total mt-2">
                <div class="row">
                    <div class="col-xl-5 col-lg-12 col-md-12 offset-xl-7 cart-column">
                        <div class="total-cart-box clearfix">
                            <h4>Cart Totals</h4>
                            <ul class="list clearfix">
                                <li>Order Total:<span>@{{ format(totalmoney) }}</span></li>
                            </ul>
                            <a href="/checkout" class="theme-btn-two">Proceed to Checkout<i
                                    class="flaticon-right-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cart section end -->
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
                        .get('/cart/data')
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

                update(value) {
                    axios
                        .post('/cart/update', value)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.mess)
                                this.loadData();
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
            },
        }),
    </script>
@endsection
