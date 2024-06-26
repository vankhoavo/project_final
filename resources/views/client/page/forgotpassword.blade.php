@extends('client.master')
@section('content')
    <!-- page-title -->
    <section class="page-title centred">
        <div class="pattern-layer" style="background-image: url(client/images/background/page-title.jpg);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>My Account</h1>
                <ul class="bread-crumb clearfix">
                    <li><i class="flaticon-home-1"></i><a href="index.html">Home</a></li>
                    <li>My Account</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->

    <!-- myaccount-section -->
    <section class="myaccount-section" id="app">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 inner-column">
                    <div class="inner-box login-inner">
                        <h1 class="upper-inner">Reset password</h1>
                        <form class="default-form" id="form">
                            <div class="form-group">
                                <label>Email address</label>
                                <input v-model="customer.email" type="email">
                            </div>
                            <div class="form-group mt-2">
                                <button v-on:click="resetpassword()" type="button" class="theme-btn-two">Submit<i
                                        class="flaticon-right-1"></i></button>
                            </div>
                            <div class="lower-inner centred">
                                <span>or</span>
                                <p>Already have an account! <a href="/login" class="text-danger">Log In Now</a></p>
                                <p>Don't Have an Account? <a href="/register" class="text-danger">Register Now</a></p>
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
            el: "#app",
            data: {
                customer: {},
            },
            methods: {
                resetpassword() {
                    axios
                        .post('/forgotpassword', this.customer)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.mess);
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
        })
    </script>
@endsection
