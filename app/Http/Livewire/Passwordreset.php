<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;


class Passwordreset extends Component
{
    public $email;

    protected $rules = [
        'email'=> 'required|email'
    ];

    public function resetPassword()
    {
        $this->validate();

        $userExistsInAgents = DB::table('agents')->where('email', $this->email)->exists();
        $userExistsInSales = DB::table('sales')->where('email', $this->email)->exists();

        if($userExistsInAgents or $userExistsInSales ){
            dd($userExistsInAgents, $userExistsInSales);
        }else{
            session()->flash('error', 'Invalid email!');
            return redirect()->to('/password-reset');
        }
    }

    public function render()
    {
        return view('livewire.passwordreset');
    }
}
