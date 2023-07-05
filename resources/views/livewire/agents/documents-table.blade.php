<div>
    <div class="row">
        @if($fileData)
        <div class="col-md-3">
            <div class="card border-0 d-flex flex-column h-100 p-3" style="min-height:800px;">
                <x-alerts />
                <div class="text-center">
                    <p>Publish on {{ \Carbon\Carbon::parse($fileData->updated_at)->format('F d, Y') }}</p>
                    <i class="bi bi-file-earmark-text-fill" style="font-size:5rem;"></i>
                    <h5 class="mb-5">{{$fileData->filename}}</h5>
                </div>
                
                 @if($fileData->status == 'Approved')
                <a href="{{Storage::url($fileData->quote)}}" class="btn btn-outline-info mb-5">
                    <i class="bi bi-check2-circle"></i>
                    <p>Quote approval</p>
                </a>
                @else
                    <p>Status: Awaiting</p>
                @endif
                
                <div class="mb-5">
                    <p>Client: {{$fileData->client_name}}</p>
                    <p>Branch: {{$fileData->branch}}</p>
                    <p>Comment:</p>
                    <p>{{$fileData->comment}}</p>
                </div>

                <a href="{{Storage::url($fileData->file)}}" class="btn btn-outline-primary mb-3 w-100">Download</a>
                <button type="button" class="btn btn-success mb-3 w-100" data-bs-toggle="modal" data-bs-target="#quoteleModal">Add Quote</button>
            </div>
        </div>
        
        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="quoteleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header border-0">
                <p class="modal-title">Attaching Quote</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form wire:submit.prevent="uploadQuote({{$fileData->id}})"  enctype="multipart/form-data">
                    <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_jkdsmf9r.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
                    <div id="quoteFile" class="mb-3">
                      <label for="file">Drag & Drap or choose a file to upload</label>
                      <input type="file" id="file" class="form-control" wire:model="file" accept=".png,.jpg,.jpeg,.pdf">
                    </div>
                    <textarea class="form-control mb-3" wire:model="comment" row="4" placeholder="Comment/remarks"></textarea>
                    
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Save File</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        
        @endif
        <div class="col">
            <div class="card border-0 p-3">
            <h5 class="mb-3">Documents</h5>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-5">
                        <input type="text" class="form-control" placeholder="Search files here..." wire:model="searchInput" />
                        <button class="btn btn-primary" wire:click="search">GO</button>
                    </div>
                </div> 
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">Filter By</span>
                        <input class="form-control" type="date">
                    </div>
                </div>
                <div class="col text-end">
                    <button type="button" wire:click="grid_layout" class="btn btn-outline-secondary"><i class="bi bi-grid-3x2-gap"></i></button>
                    <button type="button" wire:click="list_layout" class="btn btn-outline-secondary"><i class="bi bi-list-task"></i></button>
    
                </div>
            </div>
            
                <div class="row">
                @if($layout === 'grid')
                    @if($files)
                        @foreach($files as $file)
                        <div class="col-md-2">
                            <a href="#" wire:click="detail({{$file->id}})" class="p-3 btn btn-outline-secondary position-relative d-block">
                                <i class="bi bi-file-earmark-text" style="font-size:5rem;"></i>
                                <div class="text-truncate">{{$file->filename}}</div>
                            </a>
                        </div>
                        @endforeach
                    @else
                        <p>Your file directory is empty! <a href="/agent/upload">Add files</a></p>
                    @endif
                @endif
                
                 @if($layout === 'list')
                    <div class="col">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Client</th>
                              <th scope="col">File</th>
                              <th scope="col">Date</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                              
                            @foreach($files as $file)
                            <tr>
                              <th scope="row">{{$file->id}}</th>
                              <td></td>
                              <td>{{$file->filename}}</td>
                              <td>{{ \Carbon\Carbon::parse($file->updated_at)->format('F d, Y') }}</td>
                              <td><button type="button" class="btn btn-primary" wire:click="detail({{$file->id}})">View</button></td>
                            </tr>
                            @endforeach

                          </tbody>
                        </table>
                    </div>
                @endif
                    
                </div>
                
                 <div class="py-3">{{$files->links()}}</div>
            
            </div>
        </div>
    </div>
</div>
