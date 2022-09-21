<div wire:ignore.self class="modal fade" id="permitsModal" tabindex="-1" aria-labelledby="permitsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="permitsModalLabel">Permit Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="savePermits">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Type of Permit
                            </label>
                            <input type="text" wire:model="permitType" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Name of resident
                            </label>
                            <input type="text" wire:model="nameOfResident" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Processing Fee
                            </label>
                            <input type="text" wire:model="processingFee" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Date of Request
                            </label>
                            <input type="text" wire:model="date" class="form-control">
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
