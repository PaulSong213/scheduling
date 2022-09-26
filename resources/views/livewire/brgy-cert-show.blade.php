<div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Barangay Certificates
                        </h4>

                    </div>
                    <div class="card-body">
                        <table class="table table-borded table-striped">
                            <thead>
                                <tr>
                                    <th>Name of Requestor</th>
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
                                        <td>{{ $credential->purpose }}</td>
                                        <td>{{ $credential->status }}</td>
                                        <td>{{ $credential->credential_type }}</td>
                                        <td>
                                            <button type="button"
                                                wire:click="editBrgyCert({{ $credential->id }},{{ $credential->cellphone_number }})"
                                                class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#setCertScheduleModal">Set Schedule</button>
                                            <button type="button"
                                                wire:click="editBrgyCert({{ $credential->id }},{{ $credential->cellphone_number }})"
                                                class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#declineCertModal">Decline</button>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11">No Record Found</td>

                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.brgycertModal')

</div>
