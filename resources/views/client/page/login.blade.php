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
                    <div class="inner-box login-inner">
                        <div class="upper-inner">
                            <h3>Log in</h3>
                        </div>
                        <form action="/login" method="post" class="default-form">
                            @csrf
                            <div class="form-group">
                                <label>Email address</label>
                                <input name="email" type="email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="password">
                            </div>
                            <div class="form-group">
                                <a href="/forgotpassword" class="recover-password">Lost your password?</a>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="theme-btn-two">Log In<i class="flaticon-right-1"></i>
                                </button>
                            </div>
                        </form>
                        <div class="lower-inner centred">
                            <span>or</span>
                            <ul class="social-links clearfix">
                                <li><a href="/auth/google"><i class="fab fa-google-plus-g"></i>Google</a></li>
                            </ul>
                            <p>Don't Have an Account? <a href="/register" class="text-danger">Sign up Now</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
