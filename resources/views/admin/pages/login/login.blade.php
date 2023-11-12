<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>

<body class="hold-transition login-page">
<div class="login-box" id="app">
    <div class="login-logo">
        <a href=""><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            {{--
            <form action="/adminlte/login" method="post">
                @csrf --}}
            <div class="input-group mb-3">
                <input v-model="login.email" type="email" class="form-control"
                       placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input v-model="login.password" type="password" class="form-control"
                       placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-right">
                    {{-- <button type="submit" class="btn btn-primary btn-block">Sign
                            In</button> --}}
                    <button v-on:click="actionlogin()" type="button" class="btn btn-primary btn-block">Sign
                        In
                    </button>
                </div>
            </div>
            </form>
            <p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="/adminlte/admin/index" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin/dist/js/adminlte.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.0/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function () {
        new Vue({
            el: '#app',
            data: {
                login: {},
            },
            methods: {
                actionlogin() {
                    axios
                        .post('/adminlte/login', this.login)
                        .then((res) => {
                            if (res.data.status == true) {
                                toastr.success(res.data.mess);
                                setTimeout(() => {
                                    window.location.href = '/adminlte/product-type/index';
                                }, 900);
                            } else if (res.data.status == 0) {
                                toastr.error(res.data.mess);
                                setTimeout(() => {
                                    window.location.href = '/adminlte/login';
                                }, 1100);
                            }
                        })
                        .catch((res) => {
                            var listE = res.response.data.errors;
                            $.each(listE, function (k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
            },
        })
    });
</script>
</body>

</html>
