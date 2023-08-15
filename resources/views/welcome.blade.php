@extends('layouts.blank')
@section('title', 'Welcome')

@section('content')

<header class="bg-light pt-5">
    <div class="container">
        <div class="text-center">
            <img class="img-fluid mb-3 me-3" src="https://www.jnbank.com/wp-content/uploads/2021/11/0009_jnbanklogo.png" alt="logo" width="190px">
            <img class="img-fluid mb-3" src="https://www.jngijamaica.com/wp-content/uploads/2019/07/cropped-cropped-JNGI-Logo.png" alt="logo" width="150px">
            <h1>Auto Loan Sure Cover<br>Quote Portal</h1>
            <p>One monthly payment for Auto Loan and Motor Insurance</p>
        </div>
    </div>
</header>

<section class="py-5">

    <div class="container">
        <x-alerts />
        <div class="row">
            <div class="col">
                <livewire:sales.login />
            </div>
            <div class="col border-start">
                <livewire:agents.login>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-5">
        <nav class="nav">
            <a class="nav-link" href="/register">Register</a>
            <a class="nav-link" href="/password-reset">Reset password</a>
        </nav>
    </div>
</section>

@endsection


