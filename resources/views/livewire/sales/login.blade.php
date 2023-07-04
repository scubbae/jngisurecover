<div>
    <div class="card p-4">
        <h4 class="text-center mb-3">SalesForce Login</h4>
        <form wire:submit.prevent="salesLogin">
            
            @if ($errors->any())
            
                @foreach ($errors->all() as $error)
                    <div class="alert alert-warning">{{ $error }}</div>
                @endforeach
            
            @endif
            
            <div class="mb-3">
                <input class="form-control" type="email" wire:model="email" placeholder="Email Address" />
            </div>
            <div class="mb-3">
                <input class="form-control" type="password" wire:model="password" placeholder="Password" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" value="" id="salesLoginCheck">
              <label class="form-check-label" for="salesLoginCheck">
                Remember me
              </label>
            </div>
            <input class="btn btn-primary w-100" type="submit" value="Login" />
        </form>
    </div>
</div>
