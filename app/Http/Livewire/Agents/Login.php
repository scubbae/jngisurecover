<?php

namespace App\Http\Livewire\Agents;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $remember;

    protected $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

    public function agentsLogin()
    {
        $this->validate();

        $user = DB::table('agents')->where('email', $this->email)->first();

        if ($user && Hash::check($this->password, $user->password)) {
            session()->put('agents_id', $user->id);
            session()->put('agent', $user->name);
            session()->put('login', $user->updated_at);

            if ($this->remember) {
                $rememberToken = Str::random(60);
                DB::table('sales')
                    ->where('id', $user->id)
                    ->update(['remember_token' => $rememberToken]);

                Cookie::queue('remember_token', json_encode(['id' => $user->id, 'token' => $rememberToken]), 43200); // Set the remember me cookie for 30 days
            }

            return redirect('/agents');
        } else {
            $this->addError('email', 'Invalid email or password.');
        }
    }

    public function render()
    {
        return view('livewire.agents.login');
    }
}
