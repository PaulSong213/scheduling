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
            @include('layouts.sidebar')
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
                                                    <th>Requestor</th>
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
                                                                <span>{{ $credential->purpose }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="text-capitalize  ">
                                                            <div>
                                                                <span
                                                                    class="fw-bold">{{ $credential->first_name . ' ' . $credential->last_name }}</span>
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

                                                            {{ $credential->status == 'scheduled'
                                                                ? $credential->first_name .
                                                                    ' ' .
                                                                    $credential->last_name .
                                                                    ' should be in the barangay office on ' .
                                                                    $credential->scheduled_date .
                                                                    ' for the requested credential.'
                                                                : $credential->decline_reason }}
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
                                                                <span> {{ $permit->business_name }} </span>
                                                            </div>
                                                            <div>
                                                                <span>Business Type: </span>
                                                                <span> {{ $permit->business_type }} </span>
                                                            </div>
                                                            <div>
                                                                <span>Business Location: </span>
                                                                <span> {{ $permit->business_location }} </span>
                                                            </div>

                                                        </td>
                                                        <td class="text-capitalize  ">
                                                            <div>
                                                                <span
                                                                    class="fw-bold">{{ $permit->first_name . ' ' . $permit->last_name }}</span>
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
                                                            {{ $permit->status == 'scheduled' ? $permit->first_name . ' ' . $permit->last_name . ' should be in the barangay office on ' . $permit->scheduled_date . ' for the permit.' : $permit->decline_reason }}
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
