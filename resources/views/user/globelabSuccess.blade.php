@extends('layouts.app')

@section('content')
    <style>
        .blockquote-custom {
            position: relative;
            font-size: 1.1rem;
        }

        .blockquote-custom-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%)
        }
    </style>
    <div class="container-fluid">
        <div class="row flex-nowrap h-100">
            <section class="py-5">
                <div class="container">
                    <div class="row py-4">
                        <div class="col-lg-6 mx-auto">
                            <!-- CUSTOM BLOCKQUOTE -->
                            <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                                <div class="blockquote-custom-icon bg-success shadow-sm"><i
                                        class="bi bi-check2-all text-white fs-1"></i>
                                </div>

                                <p class="mb-0 mt-2 font-italic text-center fs-3 text-center text-success fw-bold">Phone
                                    Number Verified!</p>
                                <footer class="pt-4 mt-4 border-top d-flex flex-column ">
                                    <img class="mx-auto" width="60%" src="/images/mobile_success.svg" />
                                    <a href="/home" class="btn btn-success mt-4 fs-5 mx-auto"> Continue </a>
                                </footer>

                            </blockquote><!-- END -->

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="/js/sms.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        sendWelcomeMessage();

        function sendWelcomeMessage() {
            var message = "Welcome to Manuyo Dos Public Requesting System. You can now request on " + window.location.origin;
            var subscriber_number = "{!! $subscriber_number !!}";;
            var access_token = "{!! $access_token !!}";;
            var senderAddress = shortCodeLast4Digit;
            let sendLink = "https://schedulingbackend.herokuapp.com/send-message?accessToken=" + access_token +
                "&subscriberNumber=" + subscriber_number + "&message=" + message;
            axios.post(
                    sendLink,
                    null, {
                        "Access-Control-Allow-Origin": "*"
                    })
                .then((response) => {
                    // Store this to the database!
                    console.log(response);
                })
                .catch((err) => {
                    // If there was an error, we should log it.
                    console.log(err);
                })
        };
    </script>
@endsection
