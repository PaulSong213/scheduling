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
                                    <th>ID</th>
                                    <th>Business Name</th>
                                    <th>Business Type</th>
                                    <th>Business Location </th>
                                    <th>Payment Proof</th>
                                    <th>Status</th>
                                   

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($permits as $permit)
                                <tr>
                                    <td>{{ $permit->first_name." ".$permit->last_name}}</td>
                                    <td>{{ $permit->business_name}}</td>
                                    <td>{{ $permit->business_type}}</td>
                                    <td>{{ $permit->business_location}}</td>
                                    <td><img width="40" src="/storage/{{$permit->payment_proof_filename}}"></td>
                                    <td>{{ $permit->status}}</td>
                                  

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
  
</div>
