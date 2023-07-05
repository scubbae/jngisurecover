<div>
<div class="card card-body border-0">
<h5 class="mb-3">Archive</h5>
<div class="list-group list-group-flush">
    @foreach($archive as $item)
        <li class="list-group-item"><i class="bi bi-file-earmark-text-fill"></i> {{$item->filename}}</li>
    @endforeach
</div>
<div class="mt-3">
    <a class="btn btn-outline-primary" href="/sales/archives">View All</a>
</div>
</div>
</div>
