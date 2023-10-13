@extends('admin.shares.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin Management</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fuild" id="app">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add a new Admin account
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Full Name New</label>
                                <input v-model="add.first_and_last_name" type="text"
                                    placeholder="Enter a new first and last name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email New</label>
                                <input v-model="add.email" type="email" placeholder="Enter new email"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone Number New</label>
                                <input v-model="add.phone_number" type="number" placeholder="Enter the new phone number"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password New</label>
                                <input v-model="add.password" type="password" placeholder="Enter a new password"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password New Again</label>
                                <input v-model="add.re_password" type="password" placeholder="Re-enter new password again"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Date Of Birth New</label>
                                <input v-model="add.date_of_birth" type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Account Type New</label>
                                <select v-model="add.rule_id" class="form-control"
                                    placeholder="Please select registration option">
                                    <option value="1">Admin Master</option>
                                    <option value="2">Staff</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button v-on:click="create()" class="btn btn-primary">Add New</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            List Of Admin Accounts
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="align-middle text-nowrap text-center">#</th>
                                        <th class="align-middle text-nowrap text-center">Full Name</th>
                                        <th class="align-middle text-nowrap text-center">Phone Number</th>
                                        <th class="align-middle text-nowrap text-center">Email</th>
                                        <th class="align-middle text-nowrap text-center">Date of Birth</th>
                                        @if (Auth::guard('admin')->user()->rude_id == 1)
                                            <th class="align-middle text-nowrap text-center">Status</th>
                                        @endif
                                        <th class="align-middle text-nowrap text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(value, key) in list">
                                        <th class="text-center text-nowrap align-middle">@{{ key + 1 }}</th>
                                        <td class="text-center text-nowrap align-middle">@{{ value.first_and_last_name }}</td>
                                        <td class="text-center text-nowrap align-middle">@{{ value.phone_number }}</td>
                                        <td class="text-center text-nowrap align-middle">@{{ value.email }}</td>
                                        <td class="text-center text-nowrap align-middle">@{{ value.date_of_birth }}</td>
                                        @if (Auth::guard('admin')->user()->rude_id == 1)
                                            <td class="text-center text-nowrap align-middle">
                                                <button v-on:click="changestatus(value)" v-if="value.is_block == 0"
                                                    class="btn btn-success">Active</button>
                                                <button v-on:click="changestatus(value)" v-else class="btn btn-info">Stop
                                                    Active</button>
                                            </td>
                                        @endif
                                        <td class="text-center text-nowrap align-middle">
                                            @if (Auth::guard('admin')->user()->rude_id == 1)
                                                <button class="btn btn-danger">Remove</button>
                                            @endif
                                            <button v-on:click="callmodal(value)" data-toggle="modal"
                                                data-target="#updateModal" class="btn btn-primary">Update</button>
                                        </td>
                                    </tr>
                                </tbody>
                                {{-- Update Admin Account --}}
                                <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Admin Account</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="text" hidden v-model="update.id" class="form-control">
                                                <div class="form-group">
                                                    <label>Full Name Update</label>
                                                    <input v-model="update.first_and_last_name" type="text"
                                                        placeholder="Enter a update first and last name"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone Number Update</label>
                                                    <input v-model="update.phone_number" type="number"
                                                        placeholder="Enter the update phone number" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Date Of Birth Update</label>
                                                    <input v-model="update.date_of_birth" type="date"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>Account Type Update</label>
                                                    <select v-model="update.rule_id" class="form-control"
                                                        placeholder="Please select registration option">
                                                        <option value="1">Admin Master</option>
                                                        <option value="2">Staff</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button v-on:click="accept_update()" type="button"
                                                    class="btn btn-primary" data-dismiss="modal">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                add: {
                    rule_id: 2,
                },
                list: [],
                update: {
                    rule_id: 2,
                },
            },
            created() {
                this.getdata();
            },
            methods: {
                create() {
                    axios
                        .post('/adminlte/admin/create', this.add)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.mess);
                                this.getdata();
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
                },

                getdata() {
                    axios
                        .get('/adminlte/admin/data')
                        .then((res) => {
                            this.list = res.data.data;
                        });
                },

                changestatus(value) {
                    axios
                        .post('/adminlte/admin/changestatus', value)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.mess);
                                this.getdata();
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
                },

                callmodal(value) {
                    this.update = value;
                },

                accept_update() {
                    axios
                        .post('/adminlte/admin/update', this.update)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.mess);
                                this.getdata();
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
                }
            },
        });
    </script>
@endsection
