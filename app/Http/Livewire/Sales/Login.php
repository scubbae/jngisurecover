<?php

namespace App\Http\Livewire\Sales;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    
    protected $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
    
    public function salesLogin()
    {
        $this->validate();
        
        $user = DB::table('sales')->where('email', $this->email)->first();
        
        if ($user && Hash::check($this->password, $user->password)) {
            session()->put('sales_id', $user->id);
            session()->put('agent', $user->name);
            session()->put('login', $user->updated_at);
            return redirect('/sales');
        } else {
            $this->addError('email', 'Invalid email or password.');
        }
    } 
        
    public function render()
    {
        return view('livewire.sales.login');
    }
}
