<div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session() -> has('message'))
                <h5 class="alert alert-success">{{ session('message')}}</h5>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Events
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#eventsModal">
                                Create Event
                            </button>
                        </h4>

                    </div>
                    <div class="card-body">
                        <table class="table table-borded table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Event Name</th>
                                    <th>Date</th>
                                    <th>Purpose</th>
                                    <th>Venue</th>
                                    <th>Photo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($events as $event)
                                <tr>
                                    <td>{{ $event->id}}</td>
                                    <td>{{ $event->event_name}}</td>
                                    <td>{{ $event->date}}</td>
                                    <td>{{ $event->purpose}}</td>
                                    <td>{{ $event->venue}}</td>
                                    <td><img width="40" src="{{ str_replace("public","storage",$event->event_filename) }}"></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">No Record Found</td>

                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.eventsmodal')
</div>