@extends('admin.shares.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Warehouse Management</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fuild">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            Select Warehouse Products
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input id="search" type="text" class="form-control"
                                    placeholder="Enter the product name">
                            </div>
                            <table class="table table-bordered" id="left_table">
                                <thead>
                                    <th class="text-center align-middle">#</th>
                                    <th class="text-center align-middle">Product Name</th>
                                    <th class="text-center align-middle">Action</th>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            List Of Imported Products
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="right_table">
                                <thead>
                                    <tr>
                                        <th class="text-center text-nowrap align-middle">#</th>
                                        <th class="text-center text-nowrap align-middle">Product Name</th>
                                        <th class="text-center text-nowrap align-middle">Quantity</th>
                                        <th class="text-center text-nowrap align-middle">Unit Price</th>
                                        <th class="text-center text-nowrap align-middle">Into Money</th>
                                        <th class="text-center text-nowrap align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer text-right">
                            <button id="enterwarehouse" class="btn btn-primary">Enter Warehouse</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            getleft();

            function getleft() {
                axios
                    .get('/adminlte/product/get')
                    .then((res) => {
                        lefttable(res.data.data);
                    })
            }

            function lefttable(listleft) {
                var content_table = '';
                $.each(listleft, function(key, value) {
                    content_table += '<tr>';
                    content_table += '<th class="text-center align-middle">' + (key + 1) + '</th>';
                    content_table += '<td class="align-middle text-center">' + value
                        .product_name + '</td>';
                    content_table += '<td class="align-middle text-center">';
                    content_table += '<button class="add btn btn-primary" data-id="' + value.id +
                        '">Add</button>';
                    content_table += '</td>';
                    content_table += '</tr>';
                });

                $("#left_table tbody").html(content_table);
            }

            $("#search").keyup(function() {
                var run = {
                    'product_name': $(this).val(),
                };
                axios
                    .post('/adminlte/warehouse/search', run)
                    .then((res) => {
                        lefttable(res.data.findname)
                    })
                    .catch((res) => {
                        var listError = res.response.data.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    });
            });

            $("body").on("click", ".add", function() {
                var run = {
                    'id': $(this).data('id'),
                };
                axios
                    .post('/adminlte/warehouse/create', run)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.mess);
                            getright();
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
            });

            getright();

            function getright() {
                axios
                    .get('/adminlte/warehouse/data')
                    .then((res) => {
                        righttable(res.data.list);
                    })
            }

            function righttable(listright) {
                var content_table = '';
                $.each(listright, function(key, value) {
                    content_table += '<tr>';
                    content_table += '<th class="text-center align-middle">' + (key + 1) + '</th>';
                    content_table += '<td class="text-center align-middle">' + value.product_name + '</td>';
                    content_table += '<td class="align-middle">';
                    content_table += '<input type="number" data-id_quantity="' + value.id +
                        '" class="quantity form-control" value="' + value.input_quantity + '">';
                    content_table += '</td>';
                    content_table += '<td class="align-middle">';
                    content_table += '<input type="number" data-id_unitprice="' + value.id +
                        '" class="price form-control" value="' + value.input_unit_price + '">';
                    content_table += '</td>';
                    content_table += '<td class="text-center align-middle">' + formatCurrency(value
                            .input_quantity *
                            value
                            .input_unit_price) +
                        '</td>';
                    content_table += '<td class="text-center align-middle">';
                    content_table += '<button class="delete btn btn-danger" data-id="' + value.id +
                        '">Remove</button>';
                    content_table += '</td>';
                    content_table += '</tr>';
                })

                $("#right_table tbody").html(content_table);
            }

            $("body").on("change", ".quantity", function() {
                var run = {
                    'input_quantity': $(this).val(),
                    'id': $(this).data('id_quantity'),
                };
                axios
                    .post('/adminlte/warehouse/update', run)
                    .then((res) => {
                        if (res.data) {
                            getright();
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
            });

            $("body").on("change", ".price", function() {
                var run = {
                    'input_unit_price': $(this).val(),
                    'id': $(this).data('id_unitprice'),
                };
                axios
                    .post('/adminlte/warehouse/update', run)
                    .then((res) => {
                        if (res.data) {
                            getright();
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
            });

            $("body").on("click", ".delete", function() {
                var run = {
                    'id': $(this).data('id'),
                };
                axios
                    .post('/adminlte/warehouse/delete', run)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.mess);
                            getright();
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
            });

            $("#enterwarehouse").click(function() {
                axios
                    .get('/adminlte/warehouse/create')
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.mess);
                            getright();
                        } else if (res.data.status == 0) {
                            toastr.error(res.data.mess);
                        } else if (res.data.status == 2) {
                            toastr.warning(res.data.mess);
                        }
                    })
            });

            function formatCurrency(number) {
                return new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }).format(number);
            }
        });
    </script>
@endsection
