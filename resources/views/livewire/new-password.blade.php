<div>
    <div class="py-5">
        
        <div class="p-3 rounded shadow-sm mx-auto" style="max-width: 450px;">
            <x-alerts />
            <form wire:submit.prevent="resetPassword">
                <input class="form-control mb-3" type="text" wire:model="email" placeholder="Enter your email" readonly>
                <input class="form-control mb-3" type="text" wire:model="token" placeholder="Enter reset token" readonly>
                <input class="form-control mb-3" type="password" wire:model="password" placeholder="Enter new password">
                <input class="form-control mb-3" type="password" wire:model="passwordConfirmation" placeholder="Confirm new password">
                <button class="btn btn-primary w-100" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
