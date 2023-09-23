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
        <div class="auto-container" id="app">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 inner-column">
                    <div class="inner-box signup-inner">
                        <div class="upper-inner">
                            <h3>Create An Account</h3>
                        </div>
                        <form id="form" class="default-form">
                            <div class="form-group">
                                <label>Your name</label>
                                <input v-model="add.first_and_last_name" type="text">
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input v-model="add.email" type="email">
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input v-model="add.phone_number" type="text">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input v-model="add.password" type="password">
                            </div>
                            <div class="form-group">
                                <label>Re - Password</label>
                                <input v-model="add.re_password" type="password">
                            </div>
                            <div class="form-group">
                                <button v-on:click="actionregister()" type="button" class="theme-btn-two">Sign Up<i
                                        class="flaticon-right-1"></i></button>
                            </div>
                        </form>
                        <div class="lower-inner centred">
                            <span>or</span>
                            <p>Already have an account? <a href="/login" class="text-danger">Log In Now</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- myaccount-section end -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            new Vue({
                el: "#app",
                data: {
                    add: {},
                },
                methods: {
                    actionregister() {
                        axios
                            .post('/register', this.add)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.mess)
                                    $("form").trigger("reset");
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
        })
    </script>
@endsection
