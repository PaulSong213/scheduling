<div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                <h5 class="alert alert-success">{{session('message')}}</h5>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Officials
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#officialsModal">
                            Add Official
                        </button>
                        </h4>
                       
                    </div>
                    <div class="card-body">
                        table data
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.officialsModal')
</div>