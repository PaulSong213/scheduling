<div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Permits
                        </h4>

                    </div>
                    <div class="card-body">
                        <table class="table table-borded table-striped">
                            <thead>
                                <tr>
                                    <th>Requestor's Name</th>
                                    <th>Business Name</th>
                                    <th>Business Type</th>
                                    <th>Business Location </th>
                                    <th>Payment Proof</th>
                                    <th>Status</th>
                                    <th>Actions</th>


                                </tr>
                            </thead>
                            <tbody>
                                @forelse($permits as $permit)
                                    <tr>
                                        <td>{{ $permit->first_name . ' ' . $permit->last_name }}</td>
                                        <td>{{ $permit->business_name }}</td>
                                        <td>{{ $permit->business_type }}</td>
                                        <td>{{ $permit->business_location }}</td>
                                        <td><img width="40" src="/storage/{{ $permit->payment_proof_filename }}"></td>
                                        <td>{{ $permit->status }}</td>
                                        <td>
                                            <button type="button" wire:click="editPermit({{ $permit->id }},{{ $permit->cellphone_number }})"
                                                class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#setScheduleModal">Set Schedule</button>
                                            <button type="button" wire:click="editPermit({{ $permit->id }},{{ $permit->cellphone_number }})"
                                                class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#declineModal">Decline</button>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Record Found</td>

                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.permitsmodal')

</div>
