<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class NewPassword extends Component
{
    public $email;
    public $token;
    public $password;
    public $passwordConfirmation;

    public function mount(Request $request)
    {
        $this->email = $request->email;
        $this->token = $request->token;
    }
    public function resetPassword()
    {
        $resetRecord = DB::table('password_reset_tokens')->where('email', $this->email)->where('token', $this->token)->first();

        if ($resetRecord) {
            $user = DB::table('users')->where('email', $this->email)->first();

            if ($user) {
                // Update the user's password
                DB::table('users')->where('email', $this->email)
                    ->update(['password' => Hash::make($this->password)]);

                // Delete the reset record
                DB::table('password_reset_tokens')->where('email', $this->email)->delete();

                session()->flash('success', 'Your password has been reset successfully.');
            } else {
                session()->flash('fail', 'Email not found.');
            }
        } else {
            session()->flash('fail', 'Invalid reset token.');
        }
    }
    public function render()
    {
        return view('livewire.new-password');
    }
}
