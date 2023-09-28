@extends('client.master')
@section('content')
    <!-- page-title -->
    <section class="page-title centred">
        <div class="pattern-layer" style="background-image: url(client/images/background/page-title.jpg);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>My Invoices</h1>
                <ul class="bread-crumb clearfix">
                    <li><i class="flaticon-home-1"></i><a href="/">Home</a></li>
                    <li>My Invoices</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->

    <section class="myaccount-section">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            List of Invoice
                        </div>
                        <div class="card-body" id="app">
                            <table class="table table-bordered">
                                <thead>
                                    <th class="align-middle text-center">#</th>
                                    <th class="align-middle text-center">Invoice Code</th>
                                    <th class="align-middle text-center">Total Money</th>
                                    <th class="align-middle text-center">Invoice Detail</th>
                                    <th class="align-middle text-center">Status Payment</th>
                                </thead>
                                <tbody>
                                    <tr v-for="(value,key) in arrayleft">
                                        <th class="text-center align-middle">@{{ key + 1 }}</th>
                                        <td class="text-center align-middle">@{{ value.invoice_code }}</td>
                                        <td class="text-center align-middle">@{{ format(value.total_money) }}</td>
                                        <td class="text-center align-middle">
                                            <button class="btn btn-info">See order details</button>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button class="btn btn-primary" v-if="value.payment == 1">Paid</button>
                                            <a href="https://www.paypal.com/vn/business?locale.x=vi_VN"
                                                class="btn btn-danger" v-else>Unpaid</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Invoice Details
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th class="align-middle text-center">#</th>
                                    <th class="align-middle text-center">Invoice Code</th>
                                    <th class="align-middle text-center">Email</th>
                                    <th class="align-middle text-center">Status Payment</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="text-center align-middle">1</th>
                                        <th class="text-center align-middle">CASTRO12313213</th>
                                        <th class="text-center align-middle">voankhoa2001@hotmail.com</th>
                                        <th class="text-center align-middle">See</th>
                                        <th class="text-center align-middle">
                                            <button class="btn btn-primary">Paid</button>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        new Vue({
            el: "#app",
            data: {
                arrayleft: [],
            },
            created() {
                this.loadDataLeft();
            },
            methods: {
                loadDataLeft() {
                    axios
                        .get('/dataleft')
                        .then((res) => {
                            this.arrayleft = res.data.dataleft;
                        })
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
