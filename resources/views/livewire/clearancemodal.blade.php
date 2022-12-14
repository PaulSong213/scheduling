
{{-- Set Schedule Modal --}}
<div wire:ignore.self class="modal fade" id="setClearanceScheduleModal" tabindex="-1" aria-labelledby="setClearanceScheduleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="setClearanceScheduleModalLabel">Clearance Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="scheduleClearance">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Date of Release
                            </label>
                            <input type="date" wire:model="newScheduledDate" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>SMS Message to the Requestor
                            </label>
                            <input type="text" wire:model="message" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="hidden" wire:model="newStatus" class="form-control" value="scheduled">
                        </div>
                    </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Approve</button>
            </div>
        </form>
        </div>
    </div>
</div>
{{-- Decline Modal --}}
<div wire:ignore.self class="modal fade" id="declineClearanceModal" tabindex="-1" aria-labelledby="declineClearanceModalLabel"
    aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="declineClearanceModalLabel">Decline Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="declineClearance">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Decline Reason
                            </label>
                            <input type="text" wire:model="message" class="form-control">
                            
                        </div>
                        <div class="mb-3">
                            <input type="hidden" wire:model="status" class="form-control" value="declined">
                        </div>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send Decline reason</button>
            </div>
        </form>

        </div>
    </div>
</div>
{{-- View Modal --}}
<div wire:ignore.self class="modal fade" id="viewModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="declineModalLabel"
    aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="declineModalLabel">Check the ID</h5>
                <button type="button" class="btn-close" wire:click="resetModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
                @if ($viewID)
                    <div class="modal-body">
                        <div class="mb-3 mt-1">
                            <label>ID
                            </label>
                            <img class="w-100 mt-1" src="{{ $viewID[0]->proof_id_filename}}">
                        </div>
                    </div>
            </div>
            @endif

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="resetModal" data-bs-dismiss="modal">Close</button>

            </div>
            </form>

        </div>
    </div>
</div>