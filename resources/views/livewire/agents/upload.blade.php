<div class="col-md-6 mx-auto">
    <p>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        <i class="bi bi-list-task"></i> Requred Documents
     </button>
    </p>
    <div class="collapse" id="collapseExample">
    <ul>
        <li > Fully completed Motor Proposal Form</li>
        <li > Valid photo ID</li>
        <li > Valid driver’s license for authorized driver</li>
        <li > TRN</li>
        <li > Registration Certificate(can be submitted at a later date</li>
        <li > Fitness Certificate</li>
        <li > Valuation report or pro-forma invoice from authorized dealership</li>
        <li > Claims Experience letter or No Claim Discount Letter ( can be submitted at a later date if client wishes to have discount applied)</li>
        <li > Proof of JN Bank account for discount to be applied ( can be submitted at a later date for discount to be applied)</li>
    </ul>
    </div>
    <form wire:submit.prevent="save" enctype="multipart/form-data">
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <div class="alert alert-warning">{{ $error }}</div>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="mb-3">
            <label class="form-label">Client Name</label>
            <input type="text" class="form-control @error('name') border-danger @enderror" wire:model="client_name">
        </div>
        <div class="mb-3">
            <label class="form-label">Branch</label>
            <input type="text" class="form-control @error('branch') border-danger @enderror" wire:model="branch">
        </div>
        @foreach ($inputGroups as $index => $inputGroup)
        <div class="input-group mb-3">
            <input wire:model="uploadedFiles.{{ $index }}" class="form-control form-control-lg" type="file" required   accept=".png,.jpg,.jpeg,.pdf">
            <button wire:click="removeInputGroup({{ $index }})" type="button" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
        </div>
        @endforeach

        <button wire:click="addInputGroup" type="button" class="btn btn-secondary"><i class="bi bi-plus"></i> Upload File</button>
        @if($inputGroups)
            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                @if($this->spinner)
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                @endif
                Save
            </button>
        @endif
    </form>
</div>
