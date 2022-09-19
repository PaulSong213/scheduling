@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap h-100">
        @include('layouts.sidebar')
        <div class="col py-3">
            Content area...
        </div>
    </div>
</div>
@endsection
