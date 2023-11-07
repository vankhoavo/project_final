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
        <div class="auto-container" id="app">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            List of Invoice
                        </div>
                        <div class="card-body">
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
                                            <button class="btn btn-info" v-on:click="loadDataModal(value.id)" data-toggle="modal"
                                                data-target="#seenModal">See
                                                order details</button>
                                        </td>
                                        <td class="text-center align-middle">
                                            <a class="btn btn-primary" v-if="value.payment == 1">Paid</a>
                                            <button v-on:click="paymentPaypal(value.id, value.total_money)"
                                                class="btn btn-danger" v-else>Unpaid</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="seenModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Invoice Details</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <th class="text-center align-middle">Product Name</th>
                                                <th class="text-center align-middle">Quantity</th>
                                                <th class="text-center align-middle">Unit Price</th>
                                                <th class="text-center align-middle">Into Money</th>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(value, key) in arr">
                                                    <td class="text-center align-middle">@{{ value.product_name }}</td>
                                                    <td class="text-center align-middle">@{{ value.quantity }}</td>
                                                    <td class="text-center align-middle">@{{ format(value.unit_price) }}</td>
                                                    <td class="text-center align-middle">@{{ format(value.into_money) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        new Vue({
            el: "#app",
            data: {
                arrayleft: [],
                arr: [],
                detail: {},
            },
            created() {
                this.loadDataLeft();
                // this.loadDataModal();
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
                    return new Intl.NumberFormat('en-US', {
                        style: 'currency',
                        currency: 'USD'
                    }).format(money)
                },

                loadDataModal(id) {
                    axios
                        .get('/dataright/'+id)
                        .then((res) => {
                            this.arr = res.data.datamodal;
                        })
                },

                paymentPaypal(id, totalmoney) {
                    total = totalmoney;
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
