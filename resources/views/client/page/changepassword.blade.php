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
    <section class="myaccount-section">
        <div class="auto-container" id="app">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 inner-column">
                    <div class="inner-box login-inner">
                        <div class="upper-inner">
                            <h1>Reset Password</h1>
                        </div>
                        <form class="default-form">
                            <div class="form-group">
                                <label>Password</label>
                                <input v-model="customer.password" type="password">
                            </div>
                            <div class="form-group">
                                <label>Re - Password</label>
                                <input v-model="customer.re_password" type="password">
                            </div>
                            <div class="form-group mt-2">
                                <button v-on:click="resetpassword()" type="button" class="theme-btn-two">Confirm<i
                                        class="flaticon-right-1"></i></button>
                            </div>
                            <div class="lower-inner centred">
                                <span>or</span>
                                <p>Already have an account! <a href="/login" class="text-danger">Log In Now</a></p>
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
                customer: {
                    hash_reset: {!! json_encode($hash_reset) !!},
                },
            },
            methods: {
                resetpassword() {
                    axios
                        .post('/changepassword', this.customer)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.mess);
                                setTimeout(() => {
                                    window.location.href = '/login';
                                }, 1600);
                            } else if (res.data.status == 0) {
                                toastr.error(res.data.mess);
                                $("form").trigger("reset");
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
