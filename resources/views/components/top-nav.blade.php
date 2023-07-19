<div>
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/sales">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/sales/documents">Documents</a>
      </li>
      @if (session()->has('sales_id'))
      <li class="nav-item">
        <a class="nav-link" href="/sales/archives">Documents Archive</a>
      </li>
      <li class="nav-item">
        <a href="/sales/upload" class="nav-link">Request Quote</a>
      </li>
      @endif
    </ul>
</div>
