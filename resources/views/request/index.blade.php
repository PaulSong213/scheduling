{{-- This page is only a template for blank page --}}
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
@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row flex-nowrap h-100">
            @include('layouts.sidebarResident')
            <div class="col py-3">
                <div class="row px-3 py-1">
                    <div class="col-12 bg-white p-4 shadow-sm rounded text-center mb-3">
                        <section id="services" class="features-icons">
                            <div class="container">
                                <div class="row">
                                    <h3 class="mb-4 fw-bold text-start">Request Status</h3>
                                    <div class="text-start">
                                        <table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Information</th>
                                                    <th>Status</th>
                                                    <th>Schedule Date</th>
                                                    <th>Remarks</th>
                                                </tr>
                                            </thead>
                                            @php
                                                $status_color = [
                                                    'pending' => 'badge text-bg-secondary',
                                                    'scheduled' => 'badge text-bg-success',
                                                    'declined' => 'badge text-bg-danger',
                                                ];
                                            @endphp
                                            <tbody>
                                                @foreach ($credentials as $credential)
                                                    <tr>
                                                        <td style="max-width: 150px; background-color: rgb(242, 247, 244)">
                                                            <div>
                                                                <span>Type: </span>
                                                                <span
                                                                    class="fw-bold">{{ $credential->credential_type }}</span>
                                                            </div>
                                                            <div>
                                                                <span>Purpose: </span>
                                                                <span
                                                                   >{{ $credential->purpose }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="text-capitalize  ">
                                                            <span style="width: 100px"
                                                                class="{{ $status_color[$credential->status] }} fw-bold">
                                                                {{ $credential->status }}
                                                            </span>
                                                        </td>
                                                        <td> {{ isset($credential->scheduled_date) ? date('M d, Y - D', strtotime($credential->scheduled_date)) : '' }}
                                                        </td>
                                                        <td style="max-width: 200px">
                                                            {{ $credential->status == 'scheduled' ? 'You can get your requested document on assigned scheduled date at Barangay Hall of Manuyo Dos' : $credential->decline_reason }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @foreach ($permits as $permit)
                                                    <tr>
                                                        <td style="max-width: 150px; background-color: rgb(242, 247, 244)">
                                                            <div>
                                                                <span>Type: </span>
                                                                <span class="fw-bold">Permit</span>
                                                            </div>
                                                            <div>
                                                                <span>Business Name: </span>
                                                                <span > {{ $permit->business_name }} </span>
                                                            </div> 
                                                            <div>
                                                                <span>Business Type: </span>
                                                                <span > {{ $permit->business_type }} </span>
                                                            </div> 
                                                            <div>
                                                                <span>Business Location: </span>
                                                                <span> {{ $permit->business_location }} </span>
                                                            </div> 
                                                            
                                                        </td>
                                                        <td class="text-capitalize  ">
                                                            <span style="width: 100px"
                                                                class="{{ $status_color[$permit->status] }} fw-bold">
                                                                {{ $permit->status }}
                                                            </span>
                                                        </td>
                                                        <td> {{ isset($permit->scheduled_date) ? date('M d, Y - D', strtotime($permit->scheduled_date)) : '' }}
                                                        </td>
                                                        <td style="max-width: 200px">
                                                            {{ $permit->status == 'scheduled' ? 'You can get your requested document on assigned scheduled date at Barangay Hall of Manuyo Dos' : $permit->decline_reason }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            <tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-12 bg-white p-4 shadow-sm rounded text-center">
                        <section id="services" class="features-icons">
                            <div class="container">
                                <div class="row">
                                    <h3 class="mb-4 fw-bold text-start">Public Services</h3>
                                    @foreach ($services as $service)
                                        <div class="col-lg-3 ">
                                            <a href="{{ $service['path'] }}"
                                                class="text-black d-block service-card bg-white shadow-sm py-1 text-decoration-none border"
                                                style="border-radius: 10px">
                                                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                                                    <div class="features-icons-icon d-flex mb-3"><i
                                                            class=" {{ $service['icon'] }} m-auto text-primary fs-1"></i>
                                                    </div>
                                                    <h4 class="text-decoration-none"> {{ $service['title'] }} </h4>
                                                    <button class="btn btn-secondary py-1 mt-3">Request</button>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
