@extends('client.master')
@section('content')
    <div>
        @include('client.component.topseller')
        @include('client.component.service')
    </div>
@endsection
@section('js')
    <script>
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    </script>
    <script>
        new Vue({
            el: "#app_topseller",
            data: {

            },
            methods: {
                addToCart(id_product) {
                    var run = {
                        'id_product': id_product,
                    };
                    axios
                        .post('/add-to-cart', run)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.mess);
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
            },
        });
    </script>
@endsection
