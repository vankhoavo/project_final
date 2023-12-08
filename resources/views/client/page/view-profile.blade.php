@extends('client.master')
@section('content')
    <!-- page-title -->
    <section class="page-title centred">
        <div class="pattern-layer" style="background-image: url(client/images/background/page-title.jpg);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>My Account</h1>
                <ul class="bread-crumb clearfix">
                    <li><i class="flaticon-home-1"></i><a href="/">Home</a></li>
                    <li>My Account</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->

    <!-- myaccount-section -->
    <section class="myaccount-section">
        <div class="auto-container" id="app_profile">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 inner-column">
                    <div class="inner-box login-inner">
                        <form class="default-form">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input v-model="user.first_and_last_name" type="text">
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input v-model="user.email" type="email">
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input v-model="user.phone_number" type="text">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input v-model="user.address" type="text">
                            </div>
                            <div class="form-group row mt-3">
                                <div class="col-8"></div>
                                <div class="col-4">
                                    <button type="button" v-on:click="updateProfile()" class="theme-btn-two">Update
                                        Profile
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        new Vue({
            el: '#app_profile',
            data: {
                user: {},
            },
            created() {
                this.getUser();
            },
            methods: {
                getUser() {
                    axios
                        .get('/get-user')
                        .then((res) => {
                            this.user = res.data.data;
                        })
                },
                updateProfile() {
                    axios
                        .post('/updateviewprofile', this.user)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success("Successfully updated");
                            } else {
                                toastr.error("User does not exist");
                            }
                        })
                        .catch((res) => {
                            var listError = res.response.data.errors;
                            $.each(listError, function (key, value) {
                                toastr.error(value[0]);
                            });
                        });
                }
            },
        });
    </script>
@endsection
