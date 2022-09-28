@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap h-100">
        @include('layouts.sidebar')
        <div class="col px-4 py-4 ">
            <livewire:i-d>
        </div>
    </div>
</div>

@endsection
@section('script')

<script>
    window.addEventListener('close-modal', event =>{
     
       $('#setIDScheduleModal').modal('hide');
       $('#declineIDModal').modal('hide');
    })

</script>
@endsection