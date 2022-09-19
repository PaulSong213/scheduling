@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row flex-nowrap h-100">
            @include('layouts.sidebar')
            <div class="col px-4 py-4 ">
                <livewire:events>
            </div>
        </div>
    </div>
    
@endsection