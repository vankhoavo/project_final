@extends('admin.shares.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Origin Management</h1>
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
                            Add New Origin
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Origin Name New</label>
                                <input v-model="add.origin_name" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Slug Origin New</label>
                                <input v-model="add.slug_origin" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Brand Name New</label>
                                <select v-model="add.id_brand_name"  class="form-control">
                                    <option hidden>Please choose new brand</option>
                                    @foreach ($brand as $key => $value)
                                        <option value="{{ $value->id }}">
                                            {{ $value->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-primary" v-on:click="addorigin()">Add New</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            List Of Origins
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th class="align-middle text-center">#</th>
                                        <th class="align-middle text-center">Brand Name</th>
                                        <th class="align-middle text-center">Origin Name</th>
                                        <th class="align-middle text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(value, key) in array">
                                        <th class="align-middle text-center">@{{ key + 1 }}</th>
                                        <th class="align-middle text-center">@{{ value.id_brand_name }}</th>
                                        <th class="align-middle text-center">@{{ value.origin_name }}</th>
                                        <td class="align-middle text-center">
                                            <button type="button" class="btn btn-info mr-1">Cập Nhật</button>
                                            <button type="button" class="btn btn-danger">Xoá Bỏ</button>
                                        </td>
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
        new Vue({
            el: "#app",
            data: {
                add: {},
                array: [],
            },
            created() {
                this.getdata();
            },
            methods: {
                addorigin() {
                    $.ajax({
                        url: '/adminlte/origin/create',
                        data: this.add,
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(res) {
                            if (res.status) {
                                toastr.success(res.mess);
                                this.getdata();
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
                },

                getdata() {
                    axios
                        .get('/adminlte/origin/data')
                        .then((res) => {
                            this.array = res.data.data;
                        })
                },
            }
        });
    </script>
@endsection
