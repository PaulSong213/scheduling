<div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                <h5 class="alert alert-success">{{ session('message') }}</h5>
            @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Barangay Clearance
                        </h4>

                    </div>
                    <div class="card-body">
                        <table class="table table-borded table-striped">
                            <thead>
                                <tr>
                             
                                    <th>Name of Requestor</th>
                                    <th>Requestor's ID</th>
                                    <th>Purpose</th>
                                    <th>Status</th>
                                    <th>Credential Type </th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($credentials as $credential)
                                    <tr>
                                        <td>{{ $credential->first_name . ' ' . $credential->last_name }}</td>
                                        <td><img width="50" src="/storage/{{ $credential->proof_id_filename }}"></td>
                                        <td>{{ $credential->purpose }}</td>
                                        <td>{{ $credential->status }}</td>
                                        <td>{{ $credential->credential_type }}</td>
                                        <td>
                                            <button type="button"
                                                wire:click="editID({{ $credential->id }},{{ $credential->cellphone_number }})"
                                                class="btn btn-primary mt-1 w-50" data-bs-toggle="modal"
                                                data-bs-target="#setIDScheduleModal">Set Schedule</button>
                                            <button type="button"
                                                wire:click="editID({{ $credential->id }},{{ $credential->cellphone_number }})"
                                                class="btn btn-danger mt-1 w-50" data-bs-toggle="modal"
                                                data-bs-target="#declineIDModal">Decline</button>
                                        </td>
                                     
                                        <td>
    
                                            <button type="button" wire:click="view({{$credential->id }})"
                                                class="btn btn-success mt-1 w-70" data-bs-toggle="modal"
                                                data-bs-target="#viewModal">View ID and Proof of Payment</button>
                                        </td>
    

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No Record Found</td>

                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.clearancemodal')

</div>
