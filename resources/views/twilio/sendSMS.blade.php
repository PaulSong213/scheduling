{{-- This page is only a template for blank page --}}

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap h-100">
        @include('layouts.sidebar')
        <div class="col py-3">
            <div class="row px-3 py-1">
                <div class="col-8 bg-white p-2 shadow-sm rounded">
                    {{ $message_id }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

