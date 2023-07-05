<div>
    <div class="row">
        @if($fileData)
        <div class="col-md-3">
            <div class="card border-0 d-flex flex-column align-items-center h-100 p-3" style="min-height:800px;">
                <i class="bi bi-file-earmark-text-fill" style="font-size:10rem;"></i>
                <h5 class="mb-5">{{$fileData->filename}}</h5>
                <a href="{{Storage::url($fileData->file)}}" class="btn btn-outline-primary mb-3 w-100" download>Download</a>
                <button type="button" class="btn btn-danger mb-3 w-100" wire:click="delete({{$fileData->id}})">Delete</button>
            </div>
        </div>
        @endif
        <div class="col">
            <div class="card border-0 p-3">
            <h5 class="mb-3">Archived Documents</h5>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-5">
                        <input type="text" class="form-control" placeholder="Search files here..." />
                        <button class="btn btn-primary">GO</button>
                    </div>
                </div> 
                <div class="col">
                    <div class="dropdown">
                      <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Filter By
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Approved</a></li>
                        <li><a class="dropdown-item" href="#">Unapproved</a></li>
                      </ul>
                    </div>
                </div>
                <div class="col text-end">
                    <button class="btn btn-outline-secondary"><i class="bi bi-grid-3x2-gap"></i></button>
                    <button class="btn btn-outline-secondary"><i class="bi bi-list-task"></i></button>
    
                </div>
            </div>
            
                <div class="row">
                    
                    @if($files)
                        @foreach($files as $file)
                        <div class="col-md-2">
                            <a href="#" wire:click="detail({{$file->id}})" class="p-3 btn btn-outline-secondary position-relative d-block">
                                <label>
                                    <input type="checkbox" class="position-absolute" style="top:10px;left: 20px;" wire:model="select_id" value="{{$file->id}}"  />
                                    <i class="bi bi-file-earmark-text" style="font-size:5rem;"></i>
                                </label>
                                <div class="text-truncate">{{$file->filename}}</div>
                            </a>
                        </div>
                        @endforeach
                    @else
                        <p>Your file directory is empty! <a href="/agent/upload">Add files</a></p>
                    @endif
                    
                </div>

            @if($select_id)
                <div class="fixed-bottom py-3 text-center">
                    <button type="button" class="btn btn-danger">Delete Selected ({{count($select_id)}})</button>
                </div>
            @endif
            
            <div class="py-3">{{$files->links()}}</div>
            </div>
        </div>
    </div>
</div>
