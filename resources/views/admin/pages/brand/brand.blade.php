@extends('admin.shares.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Brand Management</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fuild">
            <div class="row">
                <div class="col-md-5">
                    <form id="form">
                        <div class="card">
                            <div class="card-header">
                                Add New Brands
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Brand Name New</label>
                                    <input id="brand_name_new" type="text" class="form-control"
                                        placeholder="Enter a new brand name">
                                </div>
                                <div class="form-group">
                                    <label>Slug Brand New</label>
                                    <input id="slug_name_new" type="text" class="form-control"
                                        placeholder="Enter a new brand name slug">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button disabled type="button" id="add" class="btn btn-primary">Add New</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            Brand Management List
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th class="align-middle text-center">#</th>
                                        <th class="align-middle text-center">Brand Name</th>
                                        <th class="align-middle text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Delete Brand --}}
                                    <div class="modal fade" id="deleteModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Brand Removal</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Do you want to remove this "<b id="brand_name_delete"></b>"
                                                    brand name?
                                                    <input type="text" hidden id="id_delete" class="form-control">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">To
                                                        Think Again!</button>
                                                    <button id="accept_delete" data-dismiss="modal" type="button"
                                                        class="btn btn-primary">Sure!</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Update Brand --}}
                                    <div class="modal fade" id="updateModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Brand Update</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" class="form-control" hidden id="id_update">
                                                    <div class="form-group">
                                                        <label>Brand Name Update</label>
                                                        <input id="brand_name_update" type="text" class="form-control"
                                                            placeholder="Enter the brand name to update">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Slug Brand Update</label>
                                                        <input id="slug_brand_update" type="text" class="form-control"
                                                            placeholder="Enter the brand name slug to update">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">To
                                                        Think Again!</button>
                                                    <button id="accept_update" data-dismiss="modal" type="button"
                                                        class="btn btn-primary">Update!</button>
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
                var run = {
                    'brand_name_new': $("#brand_name_new").val(),
                    'slug_name_new': $("#slug_name_new").val(),
                };
                $.ajax({
                    url: '/adminlte/brand/create',
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: run,
                    success: function(res) {
                        if (res.status) {
                            toastr.success(res.mess);
                            $("#form").trigger("reset");
                            getdata();
                        } else if (res.status == 0) {
                            toastr.error(res.mess);
                        } else if (res.status == 2) {
                            toastr.warning(res.mess);
                        }
                    },
                    error: function(res) {
                        var listError = res.response.data.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                })
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

            $("#brand_name_new").keyup(function() {
                var content = $("#brand_name_new").val();
                var slug = toSlug(content);
                $("#slug_name_new").val(slug);
            });

            $("#slug_name_new").blur(function() {
                var run = {
                    'slug': $("#slug_name_new").val(),
                };
                $.ajax({
                    url: '/adminlte/brand/checkslug',
                    type: 'post',
                    data: run,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        if (res.status) {
                            toastr.success(res.mess);
                            $("#add").removeAttr("disabled");
                        } else if (res.status == 0) {
                            toastr.error(res.mess);
                            $("#add").attr("disabled", "disabled");
                        } else if (res.status == 2) {
                            toastr.warning(res.mess);
                        }
                    },
                    error: function(res) {
                        var listError = res.response.data.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                });
            });

            getdata();

            function getdata() {
                $.ajax({
                    url: '/api/adminlte/brand/data',
                    type: 'get',
                    success: function(res) {
                        var content_table = '';
                        var a = res.data;
                        $.each(a, function(key, value) {
                            content_table += '<tr>';
                            content_table += '<th class="align-middle text-center">' + (key +
                                1) + '</th>';
                            content_table += '<td class="align-middle text-center">' + value
                                .brand_name +
                                '</td>';
                            content_table += '<td class="align-middle text-center">';
                            content_table +=
                                '<button class="btn btn-info mr-1 update" data-id="' +
                                value.id +
                                '" data-toggle="modal" data-target="#updateModal">Update</button>';
                            content_table +=
                                '<button class="btn btn-danger delete" data-id="' + value
                                .id +
                                '" data-brand_name="' + value.brand_name +
                                '" data-toggle="modal" data-target="#deleteModal">Remove</button>';
                            content_table += '</td>';
                            content_table += '</tr>';
                        });
                        $("#table tbody").html(content_table);
                    },
                });
            }

            $("body").on("click", ".delete", function() {
                var get_id = $(this).data('id');
                var get_brand_name = $(this).data('brand_name');
                $("#brand_name_delete").text(get_brand_name);
                $("#id_delete").val(get_id);
            });

            $("#accept_delete").click(function() {
                var id_delete = $("#id_delete").val();
                var run = {
                    'id': id_delete,
                };
                $.ajax({
                    url: '/adminlte/brand/delete',
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
                        var listError = res.response.data.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                });
            });

            $("body").on("click", ".update", function() {
                var id_update = $(this).data('id');
                var run = {
                    'id': id_update,
                };
                $.ajax({
                    url: '/adminlte/brand/getupdate',
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: run,
                    success: function(res) {
                        $("#id_update").val(res.data.id);
                        $("#brand_name_update").val(res.data.brand_name);
                        $("#slug_brand_update").val(res.data.slug_brand);
                    },
                    error: function(res) {
                        var listError = res.response.data.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                });
            });

            $("#accept_update").click(function() {
                var id_update = $("#id_update").val();
                var brand_name_update = $("#brand_name_update").val();
                var slug_brand_update = $("#slug_brand_update").val();
                var run = {
                    'id_update': id_update,
                    'brand_name_update': brand_name_update,
                    'slug_brand_update': slug_brand_update,
                };
                $.ajax({
                    url: '/adminlte/brand/update',
                    type: 'post',
                    data: run,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
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
                        var listError = res.response.data.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                });
            });

            $("#brand_name_update").keyup(function() {
                var content = $("#brand_name_update").val();
                var slug = toSlug(content);
                $("#slug_brand_update").val(slug);
            });
        });
    </script>
@endsection
