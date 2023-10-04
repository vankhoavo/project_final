@extends('client.master')
@section('content')
    <section id="app_success">
        <div class="row mt-5"></div>
        <div class="row mt-5 mb-5">
            <div class="col-3"></div>
            <div class="col-6 text-center">
                <img src="https://www.freeiconspng.com/uploads/success-icon-10.png" width="350" alt="Success .ico" />
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
                    toastr.success("Payment success");
                    window.setTimeout(() => {
                        window.location.href = "/myinvoice";
                    }, 2500);

                },
            },
        });
    </script>
@endsection
