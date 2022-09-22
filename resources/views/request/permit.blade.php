{{-- This page is only a template for blank page --}}

@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="/css/request-style.css">
    <div class="container-fluid">
        <div class="row flex-nowrap h-100 ">
            @include('layouts.sidebarResident')
            <div class="col py-3">
                <div class="row py-1" style="padding-left: 30px">
                    @if ($errors->any())
                        <div class="message message-error">
                            {{ implode('', $errors->all(':message')) }}
                        </div>
                    @endif
                    @if (isset($errorInfo))
                        <div class="message message-error">
                            {{ $errorInfo }}
                        </div>
                    @endif
                    <div class="col-12 bg-white p-4 shadow-sm rounded row">
                        <h3 class="fw-bold">Request a Business Permit</h3>
                        <form role="form" class="col-6 my-3" action="{{ route('addPermit') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="business_name" class="form-label">Business Name</label>
                                <input type="text" name="business_name" required class="form-control" id="business_name">
                            </div>

                            <div class="mb-3">
                                <label for="business_type" class="form-label">Business Type</label>
                                <input type="text" name="business_type" required class="form-control" id="business_type">
                                <small> Examples: Sari-sari Store, Hardware Store, Barber Shop, etc. </small>
                            </div>

                            <div class="mb-3">
                                <label for="business_location" class="form-label">Business Location</label>
                                <input type="text" name="business_location" required class="form-control" id="business_location">
                                <small> Address of your business </small>
                            </div>

                            <div class="row my-4">
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <div class="rounded overflow-hidden shadow-sm border bg-danger"
                                            style="width:max-content">
                                            <img id="proof_payment_filename_preview" width="150px"
                                                src="/images/gcash-preview.jpg" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="proof_payment_filename"
                                        class="col-md-12 col-form-label">{{ __('Proof of Payment Screenshot (GCash)') }}
                                        <span class="text-primary fw-bold">Send your  ₱200 payment to GCash # 0987654321 Eduardo R.
                                            Timbungco </span>
                                    </label>

                                    <div class="col-md-12">
                                        <input id="payment_proof_filename" type="file"
                                            onchange="document.getElementById('proof_payment_filename_preview').src = window.URL.createObjectURL(this.files[0])"
                                            class="form-control @error('payment_proof_filename') is-invalid @enderror"
                                            name="payment_proof_filename" value="{{ old('payment_proof_filename') }}"
                                            required autocomplete="payment_proof_filename">

                                        @error('payment_proof_filename')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <section class="mb-4 personal-information-container">
                                <h5 class="fw-bold text-success">Personal Information</h5>
                                <div class="my-2 fs-6">
                                    <label>Full Name: </label>
                                    <span
                                        class="fw-bold">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</span>
                                </div>
                                <div class="my-2 fs-6">
                                    <label>Address: </label>
                                    <span class="fw-bold">{{ Auth::user()->address }}</span>
                                </div>
                            </section>
                            <button type="submit" class="btn btn-primary px-4 fs-5">Submit Request</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
