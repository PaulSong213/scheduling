@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row flex-nowrap h-100">
            @include('layouts.sidebar')
            <div class="col px-4 py-4 ">
                <livewire:permits-show>
            </div>
        </div>
    </div>
    
@endsection
@section('script')

<script>
    window.addEventListener('close-modal', event =>{
       $('#permitsModal').modal('hide');
       $('#setScheduleModal').modal('hide');
       $('#declineModal').modal('hide');
    })

</script>
@endsection