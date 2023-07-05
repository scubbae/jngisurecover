@extends('layouts.sales.app')
@section('title', 'Document')

@section('content')

     <div class="container-fluid">
        <livewire:sales.document :file_id="$id"/>
    </div>

@endsection
