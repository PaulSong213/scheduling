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
                <livewire:home>
            </div>
        </div>
    </div>
@endsection
