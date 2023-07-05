@extends('layouts.sales.app')
@section('title', 'Dashboard')

@section('content')

    <div class="card card-body mb-3 bg-primary text-white">
        <div class="row">
            <div class="col">
                <small>Welcome</small>
                <h3>{{session('agent')}}</h3>
                <small>{{session('login')}}</small>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-end">
                <a href="/agent/upload" class="btn btn-outline-light">Uplaod Document</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card card-body mb-3">
                <h5 class="mb-3">Complete Documents</h5>

            </div>
            <div class="card card-body">
                <h5 class="mb-3">Processing</h5>

            </div>
        </div>
    </div>

@endsection
