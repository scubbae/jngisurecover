<div>
    <form wire:submit.prevent='resetPassword'>
    @if ($errors->any())

        @foreach ($errors->all() as $error)
           <div class="alert alert-warning">{{ $error }}</div>
        @endforeach

    @endif
        <label for="" class="form-label">Password Reset</label>
        <input wire:model='email' type="email" class="form-control mb-3" placeholder="Enter your email...">
        <input class="btn btn-info btn-block" type="submit" value="Reset Password">
    </form>
</div>
