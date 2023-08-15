@extends('layouts.blank')
@section('title', 'Password Reset')

@section('content')

<section class="py-5 vh-100 d-flex align-items-center">
  <div class="container col-md-4">
      <x-alerts />
      <livewire:passwordreset />
  </div>
</section>

@endsection