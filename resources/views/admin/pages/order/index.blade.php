@extends('admin.shares.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Invoice Management</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fuild" id="app_invoice">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            List Of Invoice
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="align-middle text-nowrap text-center">#</th>
                                    <th class="align-middle text-nowrap text-center">Invoice Code</th>
                                    <th class="align-middle text-nowrap text-center">Full Name</th>
                                    <th class="align-middle text-nowrap text-center">Phone Number</th>
                                    <th class="align-middle text-nowrap text-center">Address</th>
                                    <th class="align-middle text-nowrap text-center">Total Money</th>
                                    <th class="align-middle text-nowrap text-center">Status Order</th>
                                    <th class="align-middle text-nowrap text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(value, key) in list">
                                    <th class="text-center text-nowrap align-middle">@{{ key + 1 }}</th>
                                    <td class="text-center text-nowrap align-middle">@{{ value.invoice_code }}</td>
                                    <td class="text-center text-nowrap align-middle">@{{ value.recipient_name }}</td>
                                    <td class="text-center text-nowrap align-middle">@{{ value.receiving_phone_number
                                        }}
                                    </td>
                                    <td class="text-center text-nowrap align-middle">@{{ value.receiving_address }}</td>
                                    <td class="text-center text-nowrap align-middle">@{{ format(value.total_money) }}
                                    </td>
                                    <td class="text-center text-nowrap align-middle">
                                        <button class="btn btn-primary" v-if="value.payment == 1">Paid</button>
                                        <button class="btn btn-danger" v-else>Unpaid</button>
                                    </td>
                                    <td class="text-center text-nowrap align-middle">
                                        <button class="btn btn-info" v-on:click="loadDataModal(value.id)"
                                                data-toggle="modal" data-target="#seenModal">
                                            Order Details
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="modal fade" id="seenModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Invoice Details</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
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
                                                <td class="text-center align-middle">@{{ element.product_name }}</td>
                                                <td class="text-center align-middle">@{{ element.quantity }}</td>
                                                <td class="text-center align-middle">@{{ format(element.unit_price) }}
                                                </td>
                                                <td class="text-center align-middle">@{{ format(element.into_money) }}
                                                </td>
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
        </div>
    </section>
@endsection
@section('js')
    <script>
        new Vue({
            el: "#app_invoice",
            data: {
                list: [],
                element: {},
            },
            created() {
                this.getdata();
            },
            methods: {
                getdata() {
                    axios
                        .get('/adminlte/invoice/data')
                        .then((res) => {
                            this.list = res.data.data;
                        });
                },
                loadDataModal(id) {
                    axios
                        .get('/adminlte/invoice/get-invoice-detail/' + id)
                        .then((res) => {
                            this.element = res.data.data;
                        })
                },
                format(money) {
                    return new Intl.NumberFormat('en-US', {
                        style: 'currency',
                        currency: 'USD'
                    }).format(money)
                },
            },
        });
    </script>
@endsection
