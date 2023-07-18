<div>
    <div class="card p-4 border-0">
        <h4 class="text-center mb-3">JNGI Agents</h4>
        <form wire:submit.prevent="agentsLogin">

            @if ($errors->any())

                @foreach ($errors->all() as $error)
                    <div class="alert alert-warning">{{ $error }}</div>
                @endforeach

            @endif

            <div class="mb-3">
                <input class="form-control" type="email" wire:model="email" placeholder="JNGI Email Address" />
            </div>
            <div class="mb-3">
                <input class="form-control" type="password" wire:model="password" placeholder="Password" />
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" value="" id="agentLoginCheck" wire:model="agentLoginCheck">
              <label class="form-check-label" for="agentLoginCheck">
                Remember me
              </label>
            </div>
            <input class="btn btn-primary w-100" type="submit" value="Login" />
        </form>
    </div>
</div>
