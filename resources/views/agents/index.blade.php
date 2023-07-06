@extends('layouts.agents.app')
@section('title', 'Dashboard')

@section('content')

    <div class="card card-body mb-3 bg-primary text-white">
        <div class="row">
            <div class="col">
                <small>Welcome</small>
                <h3>{{session('agent')}}</h3>
                <small>{{session('login')}}</small>
            </div>
        </div>
    </div>

   <livewire:agents.documents-table />

@endsection
