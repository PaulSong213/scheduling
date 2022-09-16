@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row flex-nowrap h-100">
            @include('layouts.sidebar')
            <div class="col py-3">
                <h2 class="text-success fs-5 m-4">
                    Reload the Page if you have not been redirected after 30 seconds...
                </h2>
            </div>
        </div>
    </div>
    @php
        $code = $_GET["code"];
    @endphp
    <script src="/js/sms.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var code = "{!! $code !!}";
        // Construct our POST url.
        const globe_labs_url =
            `https://developer.globelabs.com.ph/oauth/access_token?app_id=${appId}&app_secret=${appSercet}&code=${code}`;
        const text = "https://randomuser.me/api/";

        getPhoneAccessToken();

        function getPhoneAccessToken() {
            axios.get("https://schedulingbackend.herokuapp.com/?code=" + code)
                .then((response) => {
                    const access_token = response.data.accessToken;
                    const subscriber_number = response.data.subscriberNumber;
                    // Store this to the database!
                    console.log(access_token, subscriber_number);
                    location.href = `/globelabSuccess/${access_token}/${subscriber_number}`;
                })
                .catch((err) => {
                    // If there was an error, we should log it.
                    console.log(err);
                })
        };
    </script>
@endsection
