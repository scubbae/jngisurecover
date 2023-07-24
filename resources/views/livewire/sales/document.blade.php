<div>
    <div class="bg-white rounded p-5 border-0 mb-3 d-flex align-items-center">
        <button type="button" onclick="history.back()" class="btn btn-secondary"><i class="bi bi-arrow-left-circle-fill"></i> Back </button>
        <h5 class="ms-3">{{$files->first_name}} Documents</h5>
        <button type="button" data-bs-target="#addFile" data-bs-toggle="modal" class="ms-auto btn btn-primary">Add File</button>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="bg-white p-5 border-0 mb-5 h-100 d-flex flex-column align-items-center">
                <i class="bi bi-person-circle text-secondary" style="font-size:10rem;"></i>
                <h2>{{$files->first_name}} {{$files->last_name}}</h2>
                <p>Publish on {{ \Carbon\Carbon::parse($files->updated_at)->format('F d, Y') }}</p>

                <div class="border bg-warning p-3 rounded">
                    <i class="bi bi-hourglass-split"></i>
                    Proccessing
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card p-5 border-0 mb-5">
                <div class="row">
                    @foreach (json_decode($files->file) as $key => $url )
                    <div class="col-md-2 mb-3">

                        <a href="{{asset($url)}}" class="p-3 btn btn-outline-secondary position-relative d-block" target="_blank">
                            <label>
                                <input type="checkbox" class="position-absolute p" style="top:10px;left:20px;padding:30px;" wire:model="select_id" value="{{$key}}"  />
                            </label>
                            <i class="bi bi-file-earmark-richtext" style="font-size:5rem;"></i>
                            <div>{{$key}}</div>
                        </a>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @if($select_id)
    <div class="fixed-bottom py-3 text-center">
        <button type="button" wire:click="delete" class="btn btn-danger">Delete Selected ({{count($select_id)}})</button>
    </div>
    @endif


<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addFile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add File</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form wire:submit.prevent="addFile">
                <label class="form-label">Document Type</label>
                <select class="form-select mb-3" wire:model="doctype">
                    <option>-- Select Type ---</option>
                    <option value="motor_form">Completed Motor Proposal Form (s) for all proposers</option>
                    <option value="photo_id">Valid Photo ID</option>
                    <option value="trn">TRN</option>
                    <option value="fitness">Fitness Certificate</option>
                    <option value="certificate">Registration Certificate</option>
                    <option value="import">Import Entry</option>
                    <option value="proforma_invoice">Pro-forma Invoice</option>
                    <option value="valuation_report">Valuation report or pro-forma invoice from authorized dealership</option>
                    <option value="claim_discount">Proof of No Claim Discount or any other discounts being requested</option>
                    <option value="jnbank_acc_verified">Proof of JN Bank account</option>
              </select>

              <div class="mb-3">
                <label for="fileupload" class="form-label">File upload</label>
                <input type="file" wire:model="file" id="fileupload"  class="form-control" accept=".pdf,.jpeg,.jpg,.png">
              </div>

              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save File</button>

            </form>
        </div>
      </div>
    </div>

</div>
