<div wire:ignore.self class="modal fade" id="eventsModal" tabindex="-1" aria-labelledby="eventsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventsModalLabel">Create Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="saveEvents" enctype="multipart/form-data">

                <div class="modal-body">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Event Name
                            </label>
                            <input type="text" name="event_name" required wire:model="event_name" class="form-control">
                            @error('event_name') <span class="text-danger">{{ $message }}</span> @enderror

                        </div>
                        <div class="mb-3">
                            <label>Date
                            </label>
                            <input type="date" name="date" wire:model="date" required class="form-control">
                            @error('date') <span class="text-danger">{{ $message }}</span> @enderror

                        </div>
                        <div class="mb-3">
                            <label>Venue
                            </label>
                            <input type="text" name="venue" wire:model="venue" required class="form-control">
                            @error('venue') <span class="text-danger">{{ $message }}</span> @enderror

                        </div>
                        <div class="mb-3">
                            <label>Purpose
                            </label>
                            <input type="text" name="purpose" wire:model="purpose" required class="form-control">
                            @error('purpose') <span class="text-danger">{{ $message }}</span> @enderror

                        </div>
                        <div class="mb-3">
                            <label>{{ __('Event Image') }}</label>

                            <div class="md-8">
                                <input id="event_filename" type="file" wire:model="event_filename" onchange="document.getElementById('event_filename_preview').src = window.URL.createObjectURL(this.files[0])" class="form-control @error('event_filename_title') is-invalid @enderror" name="event_filename" value="{{ old('event_filename') }}" required autocomplete="event_filename_title">
                                <small>Image of your ID that contains the Address of Barangay Manuyo</small>

                                @error('event_filename')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Event</button>
                </div>
            </form>
        </div>
    </div>
</div>