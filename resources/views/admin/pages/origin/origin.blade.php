@extends('admin.shares.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Quản Lý Xuất Xứ</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fuild" id="app">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            Thêm Xuất Xứ
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tên Xuất Xứ</label>
                                <input v-model="add.ten_xuat_xu" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Slug Xuất Xứ</label>
                                <input v-model="add.slug_ten_xuat_xu" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tên Thương Hiệu</label>
                                <select v-model="add.id_ten_thuong_hieu" class="form-control">
                                    <option hidden>Vui lòng chọn thương hiệu</option>
                                    @foreach ($brand as $key => $value)
                                        <option value="{{ $value->id }}">
                                            {{ $value->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-primary" v-on:click="addxuatxu()">Thêm Mới Xuất
                                Xứ</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            Danh Sách Xuất Xứ
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th class="align-middle text-center">#</th>
                                        <th class="align-middle text-center">Tên Thương Hiệu</th>
                                        <th class="align-middle text-center">Tên Xuất Xứ</th>
                                        <th class="align-middle text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    </table>
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
                add: {},
            },
            created() {
                this.getdata();
            },
            methods: {
                addxuatxu() {
                    $.ajax({
                        url: '/adminlte/xuat-xu/create',
                        data: this.add,
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(res) {
                            if (res.status) { //có thể xoá TRUE
                                toastr.success(res.mess);
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
                }

                getdata() {
                    $.ajax({
                        url: 'api/adminlte/xuat-xu/data',
                        type: 'get',
                        success: function(res) {
                            var a = res.data;
                            var content_table = '';
                            $.each(a, function(key, value) {
                                content_table += '<tr>',
                                    content_table +=
                                    '<th class="align-middle text-center">' + (key + 1) +
                                    '</th>',
                                    content_table +=
                                    '<th class="align-middle text-center">' + value
                                    .ten_xuat_xu + '</th>',
                                    content_table +=
                                    '<th class="align-middle text-center">' + value
                                    .id_ten_thuong_hieu + '</th>',
                                    content_table += '<td class="align-middle text-center">',
                                    content_table +=
                                    '<button type="button" class="btn btn-info mr-1">Cập Nhật</button>',
                                    content_table +=
                                    '<button type="button" class="btn btn-danger">Xoá Bỏ</button>',
                                    content_table += '</td>',
                                    content_table += '</tr>',
                            });

                            $("#table tbody").html(content_table);
                        },
                    });
                }
            }
        });
    </script>
@endsection
