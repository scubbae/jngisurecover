@extends('layouts.sales.app')
@section('title', 'Dashboard')

@section('content')

    <div class="card card-body mb-3 bg-info text-white">
        <div class="row">
            <div class="col">
                <small>Welcome</small>
                <h3>{{session('sales')}}</h3>
                <small>{{session('login')}}</small>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-end">
                <a href="/sales/upload" class="btn btn-outline-light">Request Quote</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card card-body mb-3">
                <h5 class="mb-3">Complete Documents</h5>
                @livewire('sales.complete')
            </div>
        </div>
        <div class="col">
            <div class="card card-body mb-3">
                <h5 class="mb-3">Processing</h5>
                @livewire('sales.processing')
            </div>
        </div>
    </div>

@endsection
