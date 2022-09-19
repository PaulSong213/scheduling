<div wire:ignore.self class="modal fade" id="permitsModal" tabindex="-1" aria-labelledby="permitsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="permitsModalLabel">Create Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="savePermits">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Event Name
                            </label>
                            <input type="text" wire:mode="permitType" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Date
                            </label>
                            <input type="text" wire:mode="nameOfResident" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Venue
                            </label>
                            <input type="text" wire:mode="processingFee" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Purpose
                            </label>
                            <input type="text" wire:mode="date" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send Request</button>
            </div>
        </div>
    </div>
