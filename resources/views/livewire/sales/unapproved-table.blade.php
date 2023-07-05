<div>
    <div>
    @if($approveds)
    <div class="list-group list-group-flush">
    @foreach($approveds as $approved)
         @if($approved->status === 'unlisted')
        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
            <i class="bi bi-file-text"></i>
            <p class="ms-2">{{$approved->filename}}</p>
            <span class="ms-auto">{{$approved->created_at}}</span>
        </a>
        @endif
    @endforeach
    </div>
    @else
    <p>Nothing approved yet</p>
    @endif
</div>

</div>
