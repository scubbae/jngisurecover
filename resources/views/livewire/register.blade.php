<div>
   <div class="card p-3 border-0 shadow" style="overflow:hidden;">
        <div class="text-center">
            <h2>Sign up</h2>
            <p>{{ $subheading }}</p>
        </div>
        <ul class="nav nav-tabs">
            <li class="nav-item"><a href="#" class="nav-link @if($this->salesLoginForm) active @endif" wire:click="salesLoginForm">Sales</a></li>
            <li class="nav-item"><a href="#" class="nav-link @if($this->agentLoginForm) active @endif" wire:click="agentLoginForm">Agents</a></li>
        </ul>
        @if($this->salesLoginForm)
        <div class="p-3">
            <form wire:submit.prevent="salesSignup" autocomplete="on">
            @if ($errors->any())

                @foreach ($errors->all() as $error)
                   <div class="alert alert-warning">{{ $error }}</div>
                @endforeach

            @endif
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" wire:model="first_name" class="form-control" placeholder="First name">
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" wire:model="last_name" class="form-control" placeholder="Last name">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" wire:model="email" class="form-control" placeholder="Valid JN Bank Email Address" autocomplete="off">
            </div>
            {{-- <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" wire:model="password" class="form-control" placeholder="Strong password encorage" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" wire:model="password_confirmation" class="form-control" placeholder="Retype password">
            </div> --}}
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
        </div>
        @endif

        @if($this->agentLoginForm)
        <div class="p-3">
            <form wire:submit.prevent="agentSignup" autocomplete="on">
                    @if ($errors->any())

                        @foreach ($errors->all() as $error)
                           <div class="alert alert-warning">{{ $error }}</div>
                        @endforeach

                    @endif
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" wire:model="first_name" class="form-control" placeholder="First name">
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" wire:model="last_name" class="form-control" placeholder="Last name">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" wire:model="email" class="form-control" placeholder="Valid JNGI Email Address" autocomplete="off">
            </div>
            {{-- <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" wire:model="password" class="form-control" placeholder="Strong password encorage" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" wire:model="password_confirmation" class="form-control" placeholder="Retype password">
            </div> --}}
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
        </div>
        @endif
   </div>
</div>
