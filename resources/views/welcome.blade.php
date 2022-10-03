{{-- This page is only a template for blank page --}}

@extends('layouts.app')

@section('content')
    <style>
        .official-container .break-line {
            width: 100%;
            height: 15px;
        }
    </style>
    <link href="/css/welcome-style.css" rel="stylesheet" />
    <div class="container-fluid">
        <div class="row flex-nowrap h-100">
            <div class="col py-3">
                <div class="row px-3 py-1">
                    <!-- Masthead-->
                    <header class="masthead">
                        <div class="container position-relative">
                            <div class="row justify-content-center">
                                <div class="col-xl-8">
                                    <div class="text-center text-white">
                                        <!-- Page heading-->
                                        <h1 class="mb-5">Barangay Manuyo Dos <br /> Online Public Files Requesting System
                                        </h1>
                                        <!-- Signup form-->
                                        <!-- * * * * * * * * * * * * * * *-->
                                        <!-- * * SB Forms Contact Form * *-->
                                        <!-- * * * * * * * * * * * * * * *-->
                                        <!-- This form is pre-integrated with SB Forms.-->
                                        <!-- To make this form functional, sign up at-->
                                        <!-- https://startbootstrap.com/solution/contact-forms-->
                                        <!-- to get an API token!-->
                                        <a href="#services" class="btn btn-primary fs-6 px-5 fw-bold">View Our Services</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>

                    <!-- Services Grid-->
                    @php
                        $services = [
                            'clearance' => [
                                'title' => 'Barangay Clearance',
                                'path' => '/request/credential/Clearance',
                                'icon' => 'bi bi-file-earmark-break-fill',
                            ],
                            'id' => [
                                'title' => 'Barangay ID Card',
                                'path' => '/request/credential/ID',
                                'icon' => 'bi bi-person-square',
                            ],
                            'certificate' => [
                                'title' => 'Barangay Certificate',
                                'path' => '/request/credential/Certificate',
                                'icon' => 'bi bi-blockquote-right',
                            ],
                            'permits' => [
                                'title' => 'Permits',
                                'path' => '/request/permit',
                                'icon' => 'bi bi-building',
                            ],
                        ];
                    @endphp
                    <section id="services" class="features-icons bg-light text-center">
                        <div class="container">
                            <div class="row">
                                <h1 class="mb-5">Public Services</h1>
                                @foreach ($services as $service)
                                    <div class="p-3 col-lg-4 ">
                                        <a href="{{ $service['path'] }}"
                                            class="text-black d-block service-card bg-white shadow-sm py-5 text-decoration-none"
                                            style="border-radius: 10px">
                                            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                                                <div class="features-icons-icon d-flex"><i
                                                        class=" {{ $service['icon'] }} m-auto text-primary"></i></div>
                                                <h3 class="text-decoration-none"> {{ $service['title'] }} </h3>
                                                <button class="btn btn-secondary py-1 mt-3">Request</button>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </section>

                    {{-- Events --}}
                    <section class="features-icons bg-light text-center pt-1">
                        <div class="container">
                            <div class="row">
                                <h1 class="mb-5">Barangay Events</h1>
                                @foreach ($events as $event)
                                    <div class="p-3 col-lg-6 " data-bs-toggle="modal"
                                        data-bs-target="#event{{ $event->id }}">
                                        <div role="button"
                                            class="text-black d-block service-card bg-white shadow-sm py-5 text-decoration-none cursor-pointer"
                                            style="border-radius: 10px">
                                            <div class="px-4 mx-auto mb-5 mb-lg-0 mb-lg-3">
                                                <div class="event-image-container ">
                                                    
                                                    <img class="event-image"
                                                        src="{{ $event->event_filename }}">
                                                </div>
                                                <h3 class="text-decoration-none"> {{ $event->event_name }} </h3>
                                                <div>
                                                    <span class="badge text-bg-success">Venue: {{ $event->venue }} </span>
                                                    <span class="badge text-bg-success">Date:
                                                        {{ date('M d, Y - D', strtotime($event->date)) }} </span>
                                                </div>
                                                <button class="btn btn-secondary py-1 mt-3 px-5">More Details</button>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Modal --}}
                                    <div class="modal fade" id="event{{ $event->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"> {{ $event->event_name }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img style="width: 100%"
                                                    src="{{ $event->event_filename }}">
                                                    <div>
                                                        <span class="badge text-bg-success my-3">Venue: {{ $event->venue }}
                                                        </span>
                                                        <span class="badge text-bg-success">Date:
                                                            {{ date('M d, Y - D', strtotime($event->date)) }} </span>
                                                    </div>
                                                    <p class="text-start fs-6">
                                                        {{ $event->purpose }}
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-dismiss="modal">Okay</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </section>

                    <!-- Barangay Officials -->
                    @php
                        $prev_official_level = 1;
                    @endphp
                    <section class="testimonials text-center bg-light pt-0">
                        <div class="container">
                            <h1 class="mb-5">Barangay Officials</h1>
                            <div class="d-flex justify-content-center official-container" style="flex-flow: wrap;">

                                @foreach ($officials as $official)
                                    @if ($official->position_level > $prev_official_level)
                                        <div class="break-line"></div>
                                    @endif
                                    <div class="w-max p-3 d-block">
                                        <div class="testimonial-item mb-5 mb-lg-0">
                                            <div class="official-img-container mb-3">
                                                <img class="official-img"
                                                src="{{ str_replace("public","storage",$official->profile_filename) }}" />
                                            </div>
                                            <h3 class="mb-0"> {{ $official->first_name . ' ' . $official->last_name }} </h3>
                                            <h4 class="fw-normal mb-0"> {{ $official->position }} </h4>
                                            <h5 class="fw-normal mb-0"> {{ $official->department }} </h5>
                                        </div>
                                    </div>
                                    @php
                                        $prev_official_level = $official->position_level;
                                    @endphp
                                @endforeach
                            </div>
                        </div>
                    </section>
                    <!-- Call to Action-->
                    <section class="call-to-action text-white text-center" id="signup">
                        <div class="container position-relative">
                            <div class="row justify-content-center">
                                <div class="col-xl-6">
                                    <h2 class="mb-4">Ready to Avail Our Public Services? Sign Up Now!</h2>
                                    <a href="/residentRegister" class="btn btn-primary fs-6 px-5 fw-bold">Sign Up</a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
