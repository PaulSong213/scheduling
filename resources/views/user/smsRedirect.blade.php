@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row flex-nowrap h-100">
            @include('layouts.sidebar')
            <div class="col py-3">

                    <h2 class="text-success fs-5 m-4">
                        Proccessing, Please Wait.Reload the Page if you have not been redirected after 30 seconds...
                    </h2>
            </div>
        </div>
    </div>
    <script src="/js/sms.js"></script>
    <script>
        registerGlobelabRedirect();
        function registerGlobelabRedirect() {
            //redirect the user to the globelab registration link
            window.location.href = registrationLink;
        }
    </script>
@endsection
