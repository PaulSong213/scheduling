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
                                    <th>Requestor's ID</th>
                                    <th>Business Name</th>
                                    <th>Business Type</th>
                                    <th>Business Location </th>
                                    <th>Payment Proof</th>
                                    <th>Status</th>
                                    <th colspan="2">Actions</th>


                                </tr>
                            </thead>
                            <tbody>
                                @forelse($permits as $permit)
                                    <tr>
                                        <td>{{ $permit->first_name . ' ' . $permit->last_name }}</td>
                                        <td><img width="50" src="{{ $permit->proof_id_filename }}"></td>
                                        <td>{{ $permit->business_name }}</td>
                                        <td>{{ $permit->business_type }}</td>
                                        <td>{{ $permit->business_location }}</td>
                                        <td><img width="50" src="{{ $permit->payment_proof_filename }}"></td>
                                        <td>{{ $permit->status }}</td>
                                        <td>
                                            <button type="button"
                                                wire:click="editPermit({{ $permit->id }},{{ $permit->cellphone_number }})"
                                                class="btn btn-primary mt-1 w-100" data-bs-toggle="modal"
                                                data-bs-target="#setScheduleModal">Set Schedule</button>
                                            <button type="button"
                                                wire:click="editPermit({{ $permit->id }},{{ $permit->cellphone_number }})"
                                                class="btn btn-danger mt-1 w-100" data-bs-toggle="modal"
                                                data-bs-target="#declineModal">Decline</button>

                                        </td>
                                        <td>

                                            <button type="button" wire:click="view({{$permit->id }})"
                                                class="btn btn-success mt-1 w-100" data-bs-toggle="modal"
                                                data-bs-target="#viewModal">View ID and Proof of Payment</button>
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
