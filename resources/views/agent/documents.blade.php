@extends('layouts.agent.app')
@section('title', 'Dashboard')

@section('content')

     <div class="container-fluid">
        <livewire:agents.document-table />
    </div>
    
@endsection