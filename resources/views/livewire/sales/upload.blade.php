<div>

    <div class="row">
        <div class="col-12">
            <div class="">
                <h1>Required Documents</h1>
                <div class="d-flex">
                    <div class="pe-1 @if ($motor_form) text-success @else text-dark text-opacity-25 @endif"><i class="bi bi-check-circle-fill"></i></div>
                    <div>Completed Motor Proposal Form (s) for all proposers</div>
                </div>
                <div class="d-flex">
                    <div class="pe-1 @if ($photo_id) text-success @else text-dark text-opacity-25 @endif"><i class="bi bi-check-circle-fill"></i></div>
                    <div>Copy of valid photo ID</div>
                </div>
                <div class="d-flex">
                    <div class="pe-1 @if ($trn) text-success @else text-dark text-opacity-25 @endif"><i class="bi bi-check-circle-fill"></i></div>
                    <div class="pe-1">Copy of TRN</div>
                </div>
                <div class="d-flex">
                    <div class="pe-1 @if ($fitness) text-success @else text-dark text-opacity-25 @endif"><i class="bi bi-check-circle-fill"></i></div>
                    <div>Fitness Certificate (if available at quote stage) <span class="text-danger">**</span></div>
                </div>
                <div class="d-flex">
                    <div class="pe-1 @if ($certificate) text-success @else text-dark text-opacity-25 @endif"><i class="bi bi-check-circle-fill"></i></div>
                    <div>Registration Certificate (if available at quote stage) <span class="text-danger">**</span></div>
                </div>
                <div class="d-flex">
                    <div class="pe-1 @if ($import) text-success @else text-dark text-opacity-25 @endif"><i class="bi bi-check-circle-fill"></i></div>
                    <div>Import Entry (if fitness or registration certificates are not available)</div>
                </div>
                <div class="d-flex">
                    <div class="pe-1 @if ($proforma_invoice) text-success @else text-dark text-opacity-25 @endif"><i class="bi bi-check-circle-fill"></i></div>
                    <div>Pro-forma Invoice (from authorized car dealership such as Toyota Jamaica, ATL, etc)</div>
                </div>
                <div class="d-flex">
                    <div class="pe-1 @if ($valuation_report) text-success @else text-dark text-opacity-25 @endif"><i class="bi bi-check-circle-fill"></i></div>
                    <div>Valuation report or pro-forma invoice from authorized dealership</div>
                </div>
                <div class="d-flex">
                    <div class="pe-1 @if ($claim_discount) text-success @else text-dark text-opacity-25 @endif"><i class="bi bi-check-circle-fill"></i></div>
                    <div>Proof of No Claim Discount or any other discounts being requested</div>
                </div>
                <div class="d-flex">
                    <div class="pe-1 @if ($jnbank_acc_verified) text-success @else text-dark text-opacity-25 @endif"><i class="bi bi-check-circle-fill"></i></div>
                    <div>Proof of JN Bank account</div>
                </div>

                <p><span class="text-danger">**</span> Items with above mark can be submitted after policy is incepted; in order for Insurance Certificate to be issued</p>
            </div>
        </div>
        <div class="col-12">
            <div class="card p-3 border-0">
                <h5>Client Info & Documents</h5>
                <hr>
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

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control form-control-sm" wire:model="first_name">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control form-control-sm" wire:model="last_name">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Branch</label>
                            <input type="text" class="form-control form-control-sm" wire:model="branch">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="motor_form">Motor Proposal Form</label>
                                <input wire:model="motor_form" id="motor_form" class="form-control form-control-sm" type="file" required   accept=".png,.jpg,.jpeg,.pdf">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="photo_id">Valid Photo ID</label>
                                <input wire:model="photo_id" id="photo_id" class="form-control form-control-sm" type="file" required   accept=".png,.jpg,.jpeg,.pdf">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="trn">TRN</label>
                                <input wire:model="trn" id="trn" class="form-control form-control-sm" type="file" required   accept=".png,.jpg,.jpeg,.pdf">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="fitness">Fitness Certificate</label>
                                <input wire:model="fitness" id="fitness" class="form-control form-control-sm" type="file" required   accept=".png,.jpg,.jpeg,.pdf">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="certificate">Registration Certificate</label>
                                <input wire:model="certificate" id="certificate" class="form-control form-control-sm" type="file" required   accept=".png,.jpg,.jpeg,.pdf">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="import">Import Entry (if fitness or registration certificates are not available)</label>
                                <input wire:model="import" id="import" class="form-control form-control-sm" type="file" required   accept=".png,.jpg,.jpeg,.pdf">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="proforma_invoice">Pro-forma Invoice</label>
                                <input wire:model="proforma_invoice" id="proforma_invoice" class="form-control form-control-sm" type="file" required   accept=".png,.jpg,.jpeg,.pdf">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="valuation_report">Valuation report</label>
                                <input wire:model="valuation_report" id="valuation_report" class="form-control form-control-sm" type="file" required   accept=".png,.jpg,.jpeg,.pdf">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="claim_discount">Proof of No Claim</label>
                                <input wire:model="claim_discount" id="claim_discount" class="form-control form-control-sm" type="file" required   accept=".png,.jpg,.jpeg,.pdf">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="jnbank_acc_verified">Proof of JN Bank account</label>
                                <input wire:model="jnbank_acc_verified" id="jnbank_acc_verified" class="form-control form-control-sm" type="file" required   accept=".png,.jpg,.jpeg,.pdf">
                            </div>
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>
