<div class="row px-3 py-1">
    <div class="col-12 bg-white p-4 shadow-sm rounded text-center mb-3">
        <section id="services" class="features-icons">
            <div class="container">
                <div class="row">
                    <h3 class="mb-4 fw-bold text-start">Requests
                        <input type="search" wire:model="search" class="form-control float-end mx-2"
                        style="width:230px" placeholder="Search by first name or last name or request type">
                    </h3>
                    <div class="text-start">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Information</th>
                                    <th>Requestor</th>
                                    <th>Status</th>
                                    <th>Schedule Date</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            @php
                                $status_color = [
                                    'pending' => 'badge text-bg-secondary',
                                    'scheduled' => 'badge text-bg-success',
                                    'declined' => 'badge text-bg-danger',
                                ];
                            @endphp
                            <tbody>
                                @forelse ($credentials as $credential)
                                @if($credential->status != 'pending')
                                    <tr>
                                        <td style="max-width: 150px; background-color: rgb(242, 247, 244)">
                                            <div>
                                                <span>Type: </span>
                                                <span
                                                    class="fw-bold">{{ $credential->credential_type }}</span>
                                            </div>
                                            <div>
                                                <span>Purpose: </span>
                                                <span>{{ $credential->purpose }}</span>
                                            </div>
                                        </td>
                                        <td class="text-capitalize  ">
                                            <div>
                                                <span
                                                    class="fw-bold">{{ $credential->first_name . ' ' . $credential->last_name }}</span>
                                            </div>

                                        </td>
                                        <td class="text-capitalize  ">
                                            <span style="width: 100px"
                                                class="{{ $status_color[$credential->status] }} fw-bold">
                                                {{ $credential->status }}
                                            </span>
                                        </td>
                                        <td> {{ isset($credential->scheduled_date) ? date('M d, Y - D', strtotime($credential->scheduled_date)) : '' }}
                                        </td>
                                        <td style="max-width: 200px">

                                            {{ $credential->status == 'scheduled'
                                                ? $credential->first_name .
                                                    ' ' .
                                                    $credential->last_name .
                                                    ' should be in the barangay office on ' .
                                                    $credential->scheduled_date .
                                                    ' for the requested credential.'
                                                : $credential->decline_reason }}
                                        </td>
                                    </tr>
                                
                                @endif
                                    @empty
                                    <tr>
                                        <td colspan="6">No Record Found</td>

                                    </tr>
                                    @endforelse
                                @forelse($permits as $permit)
                                @if ($permit->status != 'pending')
                                    
                                    <tr>
                                        <td style="max-width: 150px; background-color: rgb(242, 247, 244)">
                                            <div>
                                                <span>Type: </span>
                                                <span class="fw-bold">Permit</span>
                                            </div>
                                            <div>
                                                <span>Business Name: </span>
                                                <span> {{ $permit->business_name }} </span>
                                            </div>
                                            <div>
                                                <span>Business Type: </span>
                                                <span> {{ $permit->business_type }} </span>
                                            </div>
                                            <div>
                                                <span>Business Location: </span>
                                                <span> {{ $permit->business_location }} </span>
                                            </div>

                                        </td>
                                        <td class="text-capitalize  ">
                                            <div>
                                                <span
                                                    class="fw-bold">{{ $permit->first_name . ' ' . $permit->last_name }}</span>
                                            </div>
                                            
                                        </td>
                                        <td class="text-capitalize  ">
                                            <span style="width: 100px"
                                                class="{{ $status_color[$permit->status] }} fw-bold">
                                                {{ $permit->status }}
                                            </span>
                                        </td>
                                        <td> {{ isset($permit->scheduled_date) ? date('M d, Y - D', strtotime($permit->scheduled_date)) : '' }}
                                        </td>
                                        <td style="max-width: 200px">
                                            {{ $permit->status == 'scheduled' ? $permit->first_name . ' ' . $permit->last_name . ' should be in the barangay office on ' . $permit->scheduled_date . ' for the permit.' : $permit->decline_reason }}
                                        </td>
                                    </tr>
                                    @endif
                                    @empty
                                    <tr>
                                    

                                    </tr>
                                    @endforelse
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>