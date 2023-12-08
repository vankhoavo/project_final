@extends('admin.shares.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Management</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fuild" id="app_user">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            List Of User Accounts
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="align-middle text-nowrap text-center">#</th>
                                    <th class="align-middle text-nowrap text-center">Full Name</th>
                                    <th class="align-middle text-nowrap text-center">Phone Number</th>
                                    <th class="align-middle text-nowrap text-center">Email</th>
                                    <th class="align-middle text-nowrap text-center">Address</th>
                                    <th class="align-middle text-nowrap text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(value, key) in list">
                                    <th class="text-center text-nowrap align-middle">@{{ key + 1 }}</th>
                                    <td class="text-center text-nowrap align-middle">@{{ value.first_and_last_name }}</td>
                                    <td class="text-center text-nowrap align-middle">@{{ value.phone_number }}</td>
                                    <td class="text-center text-nowrap align-middle">@{{ value.email }}</td>
                                    <td class="text-center text-nowrap align-middle">@{{ value.address }}</td>
                                    <td class="text-center text-nowrap align-middle">
                                        <button type="button" class="btn btn-danger" v-on:click="remove(value.id)">Remove</button>
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
            el: "#app_user",
            data: {
                list: [],

            },
            created() {
                this.getdata();
            },
            methods: {
                getdata() {
                    axios
                        .get('/adminlte/user/data')
                        .then((res) => {
                            this.list = res.data.data;
                        });
                },
                remove(id) {
                    axios
                        .get('/adminlte/user/destroy/'+ id)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success("Delete user successfull");
                                this.getdata();
                            } else {
                                toastr.error("Delete user fail");
                            }
                        });
                },

            },
        });
    </script>
@endsection
