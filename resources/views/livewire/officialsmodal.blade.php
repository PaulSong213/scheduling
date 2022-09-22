<div wire:ignore.self class="modal fade" id="officialsModal" tabindex="-1" aria-labelledby="officialsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="officialsModalLabel">Add Official</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="saveOfficials">
                <div class="modal-body">

                    <div class="modal-body">

                        <div class="mb-3">
                            <label>First Name
                            </label>
                            <input type="text" wire:model="first_name" class="form-control">
                            @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Last Name
                            </label>
                            <input type="text" wire:model="last_name" class="form-control">
                            @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Position
                            </label>
                            <input type="text" wire:model="position" class="form-control">
                            @error('position') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Position Level
                            </label>
                            <select name="position_level" id="position_level" wire:model="position_level">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                            @error('position_level') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Department
                            </label>
                            <input type="text" wire:model="department" class="form-control">
                            @error('department') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Civil Status
                            </label>
                            <input type="text" wire:model="civilStatus" class="form-control">
                            @error('civilStatus') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Birthdate
                            </label>
                            <input type="date" wire:model="birthdate" class="form-control">
                            @error('birthdate') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Cellphone Number
                            </label>
                            <input type="text" wire:model="cellphone_number" class="form-control">
                            @error('cellphone_number') <span class="text-danger">{{ $message }}}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Email
                            </label>
                            <input type="text" wire:model="email" class="form-control">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Address
                            </label>
                            <input type="text" wire:model="address" class="form-control">
                            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>{{ __('ID Image') }}</label>

                            <div class="md-8">
                                <input id="proof_id_filename" type="file" onchange="document.getElementById('proof_id_filename_preview').src = window.URL.createObjectURL(this.files[0])" class="form-control @error('proof_id_filename_title') is-invalid @enderror" name="proof_id_filename" value="{{ old('proof_id_filename') }}" required autocomplete="proof_id_filename_title">
                                <small>Image of your ID that contains the Address of Barangay Manuyo</small>

                                @error('proof_id_filename')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label >{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label>{{ __('Confirm Password') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" wire:model="userType" class="form-control">
                            @error('userType') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Official</button>
                </div>
            </form>
        </div>
    </div>
</div>