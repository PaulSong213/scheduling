@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row flex-nowrap h-100">
            @include('layouts.sidebar')
            <div class="col px-4 py-4 ">
                <livewire:officials-show>
            </div>
        </div>
    </div>
    
@endsection

@section('script')

<script>
    window.addEventListener('close-modal', event =>{
       $('#officialsModal').modal('hide');
       $('#updateOfficialsModal').modal('hide');
       $('#deleteOfficialsModal').modal('hide');
    })

</script>
@endsection
