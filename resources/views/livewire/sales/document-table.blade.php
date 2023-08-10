<div>
    <div class="row">
        <div class="col">
            <div class="card border-0 p-3">
            <h5 class="mb-3">Documents</h5>
            <div class="row">
                <div class="col">
                    <div class="input-group mb-5">
                        <input type="text" class="form-control" placeholder="Search files here..." wire:model="searchInput" />
                        <button class="btn btn-info" wire:click="search">GO</button>
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
                        <div class="col-md-2" style="min-width:200px;">
                            <a href="/sales/documents/{{$file->id}}" class="p-3 btn btn-outline-secondary position-relative d-block">
                                <label>
                                    <input type="checkbox" class="position-absolute" style="top:10px;left: 20px;" wire:model="select_id" value="{{$file->id}}"  />
                                </label>
                                <i class="bi bi-person-vcard" style="font-size:5rem;"></i>
                                <div class="text-truncate">{{$file->first_name}} {{$file->last_name}}</div>
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
                              <th scope="col"><input type="checkbox" wire:click="all_checkbox_ids"></th>
                              <th scope="col">Name</th>
                              <th scope="col">Date</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>

                            @foreach($files as $file)
                            <tr>
                              <th scope="row"><input type="checkbox" wire:model="select_id" value="{{$file->id}}"  /></th>
                              <td>{{$file->first_name}} {{$file->last_name}}</td>
                              <td>{{ \Carbon\Carbon::parse($file->updated_at)->format('F d, Y') }}</td>
                              <td><button type="button" class="btn btn-link">View</button></td>
                            </tr>
                            @endforeach

                          </tbody>
                        </table>
                    </div>
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
        <div class="col-md-3">
            <livewire:sales.recent-archive />
        </div>
    </div>
</div>
