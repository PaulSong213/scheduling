{{-- This page is only a template for blank page --}}

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
            @include('layouts.sidebar')
            <div class="col py-3">
                @if($error_message != null )
                    {{ $error_message }}
                @else
                <div class="row px-3 py-1">
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

                                                <p
                                                    class="mb-0 mt-2 font-italic text-center fs-4 text-center text-success fw-bold">
                                                    SMS Successfully Sent to {{ $number }} with a message of "{{ $sms }}" </p>
                                                <footer class="pt-4 mt-4 border-top d-flex flex-column ">
                                                    <img class="mx-auto" width="60%" src="/images/mobile_success.svg" />
                                                    <a href="{{ $redirectRoute  }}" class="btn btn-success mt-4 fs-5 mx-auto"> Continue
                                                    </a>
                                                </footer>
                                            </blockquote><!-- END -->
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
