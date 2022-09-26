<div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Officials
                            <input type="search" wire:model="search" class="form-control float-end mx-2"
                                style="width:230px" placeholder="Search Official Here...">
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                wire:click="resetInput" data-bs-target="#officialsModal">
                                Add Official
                            </button>
                        </h4>

                    </div>
                    <div class="card-body">
                        <table class="table table-borded table-striped">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>last Name</th>
                                    <th>Position </th>
                                    <th>Position Level</th>
                                    <th>Department</th>
                                    <th>Civil Status</th>
                                    <th>Birthdate</th>
                                    <th>Contact Number</th>
                                    <th>Email</th>
                                    <th>Picture</th>
                                    <th>Address</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($officials as $official)
                                    <tr>
                                        <td>{{ $official->first_name }}</td>
                                        <td>{{ $official->last_name }}</td>
                                        <td>{{ $official->position }}</td>
                                        <td>{{ $official->position_level }}</td>
                                        <td>{{ $official->department }}</td>
                                        <td>{{ $official->civilStatus }}</td>
                                        <td>{{ $official->birthdate }}</td>
                                        <td>{{ $official->cellphone_number }}</td>
                                        <td>{{ $official->email }}</td>
                                        <td><img width="40"
                                                src="{{ str_replace('public', 'storage', $official->profile_filename) }}">
                                        </td>
                                        <td>{{ $official->address }}</td>
                                        <td>
                                            <button type="button" wire:click="editOfficial({{ $official->id }})"
                                                class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#updateOfficialsModal">Edit</button>
                                            <button type="button" wire:click="deleteOfficial({{ $official->id }})"
                                                class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteOfficialsModal">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11">No Record Found</td>

                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>{{ $officials->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.officialsModal')
</div>
