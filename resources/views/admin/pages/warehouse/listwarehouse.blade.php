@extends('admin.shares.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Inventory List</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fuild">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Inventory History List
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">#</th>
                                        <th class="text-center align-middle">Date Added</th>
                                        <th class="text-center align-middle">Enter Times</th>
                                        <th class="text-center align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($times as $key => $value)
                                        <tr>
                                            <td class="text-center align-middle">{{ $key + 1 }}</td>
                                            <td class="text-center align-middle">{{ $value->date }}</td>
                                            <td class="text-center align-middle">{{ $value->entry_warehouse }}</td>
                                            <td class="text-center align-middle">
                                                <button data-id="{{ $value->entry_warehouse }}"
                                                    class="detail btn btn-primary">Detail</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Show Warehoused Details
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="detail">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">#</th>
                                        <th class="text-center align-middle">Product Name/th>
                                        <th class="text-center align-middle">Unit Price</th>
                                        <th class="text-center align-middle">Quantity</th>
                                        <th class="text-center align-middle">Into Money</th>
                                    </tr>
                                </thead>
                                <tbody>

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
            $("body").on("click", ".detail", function() {
                var run = {
                    'entrywarehouserequest': $(this).data('id'),
                };
                axios
                    .post('/adminlte/warehouse/detailwarehouse', run)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success(res.data.mess);
                            var content_table = '';
                            $.each(res.data.list, function(key, value) {
                                content_table += '<tr class="text-center align-middle">';
                                content_table += '<td class="text-center align-middle">' + (
                                    key + 1) + '</td>';
                                content_table +=
                                    '<td class="text-center align-middle">' + value
                                    .product_name + '</td>';
                                content_table +=
                                    '<td class="text-center align-middle">' + formatCurrency(
                                        value
                                        .input_unit_price) + '</td>';
                                content_table += '<td class="text-center align-middle">' + value
                                    .input_quantity + '</td>';
                                content_table +=
                                    '<td class="text-center align-middle">' + formatCurrency(
                                        value
                                        .input_quantity * value.input_unit_price) + '</td>';
                                content_table += '</tr>';
                            });
                            $("#detail tbody").html(content_table);
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

            function formatCurrency(number) {
                return new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }).format(number);
            }
        });
    </script>
@endsection
