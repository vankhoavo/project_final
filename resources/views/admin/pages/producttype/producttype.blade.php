@extends('admin.shares.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product Type Management</h1>
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
                            Add New Product Type
                        </div>
                        <div class="card-body">
                            <form id="form">
                                <div class="form-group">
                                    <label>Product Type Name New</label>
                                    <input id="product_type_name_new" type="text" class="form-control"
                                        placeholder="Enter the new product type name">
                                </div>
                                <div class="form-group">
                                    <label>Slug Product Type New</label>
                                    <input id="slug_product_type_new" type="text" class="form-control"
                                        placeholder="Enter the new product type name slug">
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-right">
                            <button id="add" disabled type="button" class="btn btn-primary">Add New</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            Product Type List
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th class="align-middle text-center">#</th>
                                        <th class="align-middle text-center">Product Type Name</th>
                                        <th class="align-middle text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Delete Product Type --}}
                                    <div class="modal fade" id="deleteModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Product Type</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Do you want to be sure to remove this "<b
                                                        id="product_type_name_delete"></b>" product type?
                                                    <input class="form-control" hidden type="text" id="id_delete">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">To
                                                        Think Again!</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                                                        id="accept_delete">Sure!</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Update Product Type --}}
                                    <div class="modal fade" id="updateModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Product Type
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" class="form-control" hidden id="id_update">
                                                    <div class="form-group">
                                                        <label>Product Type Name Update</label>
                                                        <input id="product_type_name_update" type="text"
                                                            class="form-control"
                                                            placeholder="Enter the name of the product type to update">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Slug Product Type Update</label>
                                                        <input id="slug_product_type_update" type="text"
                                                            class="form-control"
                                                            placeholder="Enter in the slug the name of the product type that needs to be updated">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">To
                                                        Think Again!</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                                                        id="accept_update">Sure!</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
        $(document).ready(function() {
            $("#add").click(function() {
                var product_type_name_new = $("#product_type_name_new").val();
                var slug_product_type_new = $("#slug_product_type_new").val();
                var run = {
                    'product_type_name_new': product_type_name_new,
                    'slug_product_type_new': slug_product_type_new,
                };
                $.ajax({
                    url: '/adminlte/product-type/create',
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: run,
                    success: function(res) {
                        if (res.status) {
                            toastr.success(res.mess);
                            $('#form').trigger("reset");
                            getdata();
                        } else if (res.status == 0) {
                            toastr.error(res.mess);
                        } else if (res.status == 2) {
                            toastr.warning(res.mess);
                        }
                    },
                    error: function(res) {
                        var errors = res.responseJSON.errors;
                        $.each(errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    },
                });
            });

            function toSlug(str) {
                str = str.toLowerCase();
                str = str
                    .normalize('NFD')
                    .replace(/[\u0300-\u036f]/g, '');
                str = str.replace(/[đĐ]/g, 'd');
                str = str.replace(/([^0-9a-z-\s])/g, '');
                str = str.replace(/(\s+)/g, '-');
                str = str.replace(/-+/g, '-');
                str = str.replace(/^-+|-+$/g, '');

                return str;
            }

            $("#product_type_name_new").keyup(function() {
                var content = $("#product_type_name_new").val();
                var slug = toSlug(content);
                $("#slug_product_type_new").val(slug);
            });

            $("#slug_product_type_new").blur(function() {
                var run = {
                    'slug': $("#slug_product_type_new").val(),
                };
                $.ajax({
                    url: '/adminlte/product-type/checkslug',
                    type: 'post',
                    data: run,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        if (res.status) {
                            toastr.success(res.mess);
                            $("#add").removeAttr('disabled');
                        } else if (res.status == 0) {
                            toastr.error(res.mess);
                            $("#add").attr('disabled', 'disabled');
                        } else if (res.status == 2) {
                            toastr.warning(res.mess);
                        }
                    },
                    error: function(res) {
                        var errors = res.responseJSON.errors;
                        $.each(errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    },
                });
            });

            getdata();

            function getdata() {
                $.ajax({
                    url: '/api/adminlte/product-type/data',
                    type: 'get',
                    success: function(res) {
                        var a = res.data;
                        var content_table = '';
                        $.each(a, function(key, value) {
                            content_table += '<tr>';
                            content_table += '<th class="align-middle text-center">' + (key +
                                1) + '</th>';
                            content_table += '<td class="align-middle text-center">' + value
                                .product_type_name +
                                '</td>';
                            content_table += '<td class="text-align text-center">';
                            content_table +=
                                '<button class="btn btn-info mr-1 update" data-id="' +
                                value.id +
                                '" data-toggle="modal" data-target="#updateModal">Update</button>';
                            content_table +=
                                '<button class="btn btn-danger delete" data-id="' + value.id +
                                '" data-product_type_name="' + value
                                .product_type_name +
                                '"data-toggle="modal" data-target="#deleteModal">Remove</button>';
                            content_table += '</td>';
                            content_table += '</tr>';
                        });
                        $("#table tbody").html(content_table);
                    },
                });
            }

            $("body").on("click", ".delete", function() {
                var get_id = $(this).data('id');
                var get_product_type_name = $(this).data('product_type_name');
                $("#product_type_name_delete").text(get_product_type_name);
                $("#id_delete").val(get_id);
            });

            $("#accept_delete").click(function() {
                var id_delete = $("#id_delete").val();
                var run = {
                    'id': id_delete,
                };
                $.ajax({
                    url: '/adminlte/product-type/delete',
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: run,
                    success: function(res) {
                        if (res.status) {
                            toastr.success(res.mess);
                            $('#form').trigger("reset");
                            getdata();
                        } else if (res.status == 0) {
                            toastr.error(res.mess);
                        } else if (res.status == 2) {
                            toastr.warning(res.mess);
                        }
                    },
                    error: function(res) {
                        var errors = res.responseJSON.errors;
                        $.each(errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    },
                });
            });

            $("body").on("click", ".update", function() {
                var id = $(this).data('id');
                var run = {
                    'id': id,
                };
                $.ajax({
                    url: '/adminlte/product-type/getupdate',
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: run,
                    success: function(res) {
                        $("#id_update").val(res.data.id);
                        $("#product_type_name_update").val(res.data.product_type_name);
                        $("#slug_product_type_update").val(res.data
                            .slug_product_type_name);
                    },
                    error: function(res) {
                        var errors = res.responseJSON.errors;
                        $.each(errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    },
                });
            });

            $("#accept_update").click(function() {
                var id_update = $("#id_update").val();
                var product_type_name_update = $("#product_type_name_update").val();
                var slug_product_type_update = $("#slug_product_type_update").val();
                var run = {
                    'id_update': id_update,
                    'product_type_name_update': product_type_name_update,
                    'slug_product_type_update': slug_product_type_update,
                };
                $.ajax({
                    url: '/adminlte/product-type/update',
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: run,
                    success: function(res) {
                        if (res.status) {
                            toastr.success(res.mess);
                            getdata();
                        } else if (res.status == 0) {
                            toastr.error(res.mess);
                        } else if (res.status == 2) {
                            toastr.warning(res.mess);
                        }
                    },
                    error: function(res) {
                        var errors = res.responseJSON.errors;
                        $.each(errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    },
                });
            });

            $("#product_type_name_update").keyup(function() {
                var content = $("#product_type_name_update").val();
                var slug = toSlug(content);
                $("#slug_product_type_update").val(slug);
            });
        });
    </script>
@endsection
