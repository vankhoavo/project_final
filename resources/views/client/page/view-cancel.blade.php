@extends('client.master')
@section('content')
    <section id="app_success">
        <div class="row mt-5"></div>
        <div class="row mt-5 mb-5">
            <div class="col-3"></div>
            <div class="col-6 text-center">
                <img src="https://www.freeiconspng.com/uploads/error-icon-4.png" width="350" alt="Free High quality Error Icon" />
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row mb-5"></div>
        <div class="row mb-5"></div>
    </section>
@endsection
@section('js')
    <script>
        new Vue({
            el: "#app_success",
            data: {

            },
            created() {
                this.redirect();
            },
            methods: {
                redirect() {
                    toastr.error("Payment failed");
                    window.setTimeout(() => {
                        window.location.href = "/myinvoice";
                    }, 2000);

                },
            },
        });
    </script>
@endsection
