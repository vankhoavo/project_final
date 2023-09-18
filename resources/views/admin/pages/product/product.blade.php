@extends('admin.shares.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product Management</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fuild">
            <div class="row">
                <div class="col-md-12">
                    <form id="form">
                        <div class="card">
                            <div class="card-header">
                                Add New Products
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Product Name New</label>
                                            <input id="product_name_new" type="text" class="form-control"
                                                placeholder="Enter the new product name">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Product Type New</label>
                                            <select id="product_type_name_new" class="form-control">
                                                <option hidden>Please select New Product Type</option>
                                                @foreach ($producttype as $key => $value)
                                                    <option value="{{ $value->id }}">{{ $value->product_type_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Brand New</label>
                                            <select id="brand_name_new" class="form-control">
                                                <option hidden>Please choose new Brand</option>
                                                @foreach ($brand as $key => $value)
                                                    <option value="{{ $value->id }}">{{ $value->brand_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Status New</label>
                                            <select id="status_new" class="form-control">
                                                <option hidden>Please select new Status</option>
                                                <option value="1">In Stock</option>
                                                <option value="0">Temporarily Out Of Stock</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Slug Product Name New</label>
                                            <input id="slug_product_name_new" type="text" class="form-control"
                                                placeholder="Enter the new product name slug">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Price Sell New (VND)</label>
                                            <input id="price_sell_new" type="number" min="0" class="form-control"
                                                placeholder="Enter the new selling price">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Price Discount New (VND)</label>
                                            <input id="price_discount_new" type="number" min="0"
                                                class="form-control" placeholder="Enter the new price discount">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Product Images New</label>
                                            <div class="input-group">
                                                <input id="image_new" class="form-control" name="filepath"
                                                    placeholder="Please select a new image">
                                                <span class="input-group-prepend">
                                                    <a id="lfm_new" data-input="image_new" data-preview="holder_new"
                                                        class="btn btn-primary">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                            </div>
                                            <div id="holder_new" style="margin-top:15px;max-height:100px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Short Description New</label>
                                            <textarea class="form-control" id="short_description_new" cols="30" rows="3"
                                                placeholder="Enter a new short description of the product"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Detailed Description New</label>
                                            <textarea class="form-control" id="detailed_description_new" cols="30" rows="7"
                                                placeholder="Enter a new detailed description of the product"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary" type="button" disabled id="add">Add New</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            List Of Products
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle text-nowrap">#</th>
                                        <th class="text-center align-middle text-nowrap">Product Name</th>
                                        <th class="text-center align-middle text-nowrap">Picture</th>
                                        <th class="text-center align-middle text-nowrap">Describe</th>
                                        <th class="text-center align-middle text-nowrap">Price Sell</th>
                                        <th class="text-center align-middle text-nowrap">Price Discount</th>
                                        <th class="text-center align-middle text-nowrap">Status</th>
                                        <th class="text-center align-middle text-nowrap">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Delete Product -->
                                    <div class="modal fade" id="deleteModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Do you want to delete this "<b id="product_name_delete"></b>" product?
                                                    <input type="text" class="form-control" hidden id="id_delete">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">To Think Again!</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                                                        id="accept_delete">Sure!</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Update Product -->
                                    <div class="modal fade" id="updateModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Product Update</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" id="id_update" hidden class="form-control">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Product Name Update</label>
                                                                <input id="product_name_update" type="text"
                                                                    class="form-control"
                                                                    placeholder="Enter the update product name">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Product Type Update</label>
                                                                <select id="product_type_name_update"
                                                                    class="form-control">
                                                                    <option hidden>Please select update Product Type
                                                                    </option>
                                                                    @foreach ($producttype as $key => $value)
                                                                        <option value="{{ $value->id }}">
                                                                            {{ $value->product_type_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Brand Update</label>
                                                                <select id="brand_name_update" class="form-control">
                                                                    <option hidden>Please choose update Brand</option>
                                                                    @foreach ($brand as $key => $value)
                                                                        <option value="{{ $value->id }}">
                                                                            {{ $value->brand_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Status Update</label>
                                                                <select id="status_update" class="form-control">
                                                                    <option hidden>Please select update Status</option>
                                                                    <option value="1">In Stock</option>
                                                                    <option value="0">Temporarily Out Of Stock
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Slug Product Name Update</label>
                                                                <input id="slug_product_name_update" type="text"
                                                                    class="form-control"
                                                                    placeholder="Enter the update product name slug">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Price Sell Update (VND)</label>
                                                                <input id="price_sell_update" type="number"
                                                                    min="0" class="form-control"
                                                                    placeholder="Enter the update selling price">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Price Discount Update (VND)</label>
                                                                <input id="price_discount_update" type="number"
                                                                    min="0" class="form-control"
                                                                    placeholder="Enter the update price discount">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Product Images Update</label>
                                                                <div class="input-group">
                                                                    <input id="image_update" class="form-control"
                                                                        type="text" name="filepath"
                                                                        placeholder="Please select a update image">
                                                                    <span class="input-group-prepend">
                                                                        <a id="lfm_update" data-input="image_update"
                                                                            data-preview="holder_update"
                                                                            class="btn btn-primary">
                                                                            <i class="fa fa-picture-o"></i> Choose
                                                                        </a>
                                                                    </span>
                                                                </div>
                                                                <div id="holder_update"
                                                                    style="margin-top:15px;max-height:100px;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Short Description Update</label>
                                                                <textarea class="form-control" id="short_description_update" cols="30" rows="3"
                                                                    placeholder="Enter a update short description of the product"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Detailed Description Update</label>
                                                                <textarea class="form-control" id="detailed_description_update" cols="30" rows="7"
                                                                    placeholder="Enter a update detailed description of the product"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">To Think Again!</button>
                                                        <button type="button" class="btn btn-primary"
                                                            data-dismiss="modal" id="accept_update">Update!</button>
                                                    </div>
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
        var route_prefix = "/laravel-filemanager";
    </script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $("#lfm_new").filemanager('image', {
            prefix: route_prefix
        });
    </script>
    <script>
        $("#lfm_update").filemanager('image', {
            prefix: route_prefix
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#add").click(function() {
                var run = {
                    'product_name_new': $("#product_name_new").val(),
                    'slug_product_name_new': $("#slug_product_name_new").val(),
                    'image_new': $("#image_new").val(),
                    'short_description_new': $("#short_description_new").val(),
                    'detailed_description_new': $("#detailed_description_new").val(),
                    'status_new': $("#status_new").val(),
                    'price_sell_new': $("#price_sell_new").val(),
                    'price_discount_new': $("#price_discount_new").val(),
                    'product_type_name_new': $("#product_type_name_new").val(),
                    'brand_name_new': $("#brand_name_new").val(),
                };
                axios
                    .post('/adminlte/product/create', run)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.mess);
                            $('#form').trigger("reset");
                            getdata();
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

            $("#product_name_new").keyup(function() {
                var content = $("#product_name_new").val();
                var slug = toSlug(content);
                $("#slug_product_name_new").val(slug);
            });

            $("#product_name_new").blur(function() {
                var run = {
                    'slug': $("#slug_product_name_new").val(),
                };
                axios
                    .post('/adminlte/product/checkslug', run)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.mess);
                            $("#add").removeAttr('disabled');
                        } else if (res.data.status == 0) {
                            toastr.error(res.data.mess);
                            $("#add").attr('disabled', 'disabled');
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
            })

            getdata();

            function getdata() {
                axios
                    .get('/api/adminlte/product/data')
                    .then((res) => {
                        var get = res.data.data;
                        showProduct(get);
                    })
            }

            function showProduct(list) {
                var content_table = '';
                $.each(list, function(key, value) {
                    content_table += '<tr>';
                    content_table += '<th class="text-nowrap align-middle text-center">' + (key + 1) +
                        '</th>';
                    content_table += '<td class="align-middle text-center">' + value.product_name +
                        '</td>';
                    content_table += '<td class="align-middle text-center">'
                    content_table +=
                        '<img src="' + value.picture +
                        '" class="img-thumbnail" style="max-height: 250px">';
                    content_table += '</td>';
                    content_table += '<td class="align-middle text-center">' + value
                        .short_description + '</td>';
                    content_table += '<td class="text-nowrap align-middle text-center">' + formatCurrency(
                            value
                            .price_sell) +
                        '</td>';
                    content_table += '<td class="text-nowrap align-middle text-center">' + formatCurrency(
                            value
                            .price_discount) +
                        '</td>';
                    content_table += '<td class="text-nowrap align-middle text-center">';
                    if (value.status) {
                        content_table +=
                            '<button class="btn btn-success status" data-id="' + value
                            .id + '">In Stock</button>';
                    } else {
                        content_table +=
                            '<button class="btn btn-warning status" data-id="' + value
                            .id + '">Temporarily Out Of Stock</button>';
                    }
                    content_table += '</td>';
                    content_table += '<td class="text-nowrap align-middle text-center">';
                    content_table +=
                        '<button class="btn btn-info mr-1 update" data-id="' + value.id +
                        '" data-toggle="modal" data-target="#updateModal">Update</button>';
                    content_table +=
                        '<button class="btn btn-danger delete" data-id="' + value.id +
                        '" data-product_name="' + value.product_name +
                        '" data-toggle="modal" data-target="#deleteModal">Remove</button>';
                    content_table += '</td>';
                    content_table += '</tr>';
                });

                $("#table tbody").html(content_table);
            }

            function formatCurrency(number) {
                return new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }).format(number);
            }

            $("body").on("click", ".status", function() {
                var id_status = $(this).data('id');
                var run = {
                    'id': id_status,
                };
                axios
                    .post('/adminlte/product/changestatus', run)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.mess);
                            getdata();
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
                var get_id = $(this).data('id')
                var get_product_name = $(this).data('product_name')
                $("#id_delete").val(get_id)
                $("#product_name_delete").text(get_product_name)
            });

            $("#accept_delete").click(function() {
                var id_delete = $("#id_delete").val();
                var run = {
                    'id': id_delete,
                };
                axios
                    .post('/adminlte/product/delete', run)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.mess);
                            getdata();
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

            $("body").on("click", ".update", function() {
                var id_update = $(this).data('id');
                var run = {
                    'id': id_update,
                };
                axios
                    .post('/adminlte/product/getupdate', run)
                    .then((res) => {
                        $("#id_update").val(res.data.data.id);
                        $("#product_name_update").val(res.data.data.product_name);
                        $("#product_type_name_update").val(res.data.data.id_product_type);
                        $("#brand_name_update").val(res.data.data.id_brand);
                        $("#status_update").val(res.data.data.status);
                        $("#slug_product_name_update").val(res.data.data.slug_product);
                        $("#price_sell_update").val(res.data.data.price_sell);
                        $("#price_discount_update").val(res.data.data.price_discount);
                        $("#image_update").val(res.data.data.picture);
                        $("#short_description_update").val(res.data.data.short_description);
                        $("#detailed_description_update").val(res.data.data.detailed_description);
                    })
                    .catch((res) => {
                        var listError = res.response.data.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    });
            });

            $("#accept_update").click(function() {
                var run = {
                    'id_update': $("#id_update").val(),
                    'product_name_update': $("#product_name_update").val(),
                    'product_type_name_update': $("#product_type_name_update").val(),
                    'brand_name_update': $("#brand_name_update").val(),
                    'status_update': $("#status_update").val(),
                    'slug_product_name_update': $("#slug_product_name_update").val(),
                    'price_sell_update': $("#price_sell_update").val(),
                    'price_discount_update': $("#price_discount_update").val(),
                    'image_update': $("#image_update").val(),
                    'short_description_update': $("#short_description_update").val(),
                    'detailed_description_update': $("#detailed_description_update").val(),
                };
                axios
                    .post('/adminlte/product/update', run)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.mess);
                            getdata();
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

            $("#product_name_update").keyup(function() {
                var content = $("#product_name_update").val();
                var slug = toSlug(content);
                $("#slug_product_name_update").val(slug);
            });
        });
    </script>
@endsection
