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
        $(document).ready(function() {
            $("#addtocard").click(function() {
                console.log("Nó vừa click em đó anh yêu!");
            });
        });
    </script>
@endsection
