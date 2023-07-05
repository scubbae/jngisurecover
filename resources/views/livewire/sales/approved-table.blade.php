<div>
    @if($approveds)
    <div class="list-group list-group-flush">
    @foreach($approveds as $approved)
        <a href="/agent/documents/{{$approved->id}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
            @if($approved->status === 'approved')
                <i class="bi bi-file-check text-success"></i>
            @else
                <i class="bi bi-file-earmark-excel text-danger"></i>
            @endif
            <p class="ms-2">{{$approved->filename}}</p>
            <span class="ms-auto">{{$approved->created_at}}</span>
        </a>
    @endforeach
    </div>
    @else
    <p>Nothing approved yet</p>
    @endif
    
</div>
