<div>
    <div class="bg-white rounded p-5 border-0 mb-3 d-flex align-items-center">
        <button type="button" onclick="history.back()" class="btn btn-secondary"><i class="bi bi-arrow-left-circle-fill"></i> Back </button>
        <h5 class="ms-3">{{$files->first_name}} Documents</h5>
        <button type="button" class="ms-auto btn btn-primary">Add File</button>
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

                        <a href="{{asset($url)}}" class="p-3 btn btn-outline-secondary position-relative d-block">
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

</div>
