<?php

namespace App\Http\Livewire\Agents;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Login extends Component
{
    public $email;
    public $password;
    
    protected $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
    public function agentLogin()
    {
        $this->validate();

        $user = DB::table('agents')->where('email', $this->email)->first();
    
        if ($user && Hash::check($this->password, $user->password) ) {
            session()->put('agent_id', $user->id);
            session()->put('agent', $user->name);
            session()->put('login', $user->updated_at);
            return redirect('/agent');
        } else {
            $this->addError('email', 'Invalid email or password.');
        }
    }
    public function render()
    {
        return view('livewire.agents.login');
    }
}
