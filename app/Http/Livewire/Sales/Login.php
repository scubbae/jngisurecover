<?php

namespace App\Http\Livewire\Sales;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Login extends Component
{
    public $email;
    public $password;
    public $salesLoginCheck;

    protected $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

    public function salesLogin()
    {
        $this->validate();

        $user = DB::table('sales')->where('email', $this->email)->first();

        if ($user && Hash::check($this->password, $user->password) ) {
            session()->put('sales_id', $user->id);
            session()->put('sales', $user->first_name);
            session()->put('login', $user->updated_at);

            if ($this->salesLoginCheck) {
                $rememberToken = Str::random(60);
                DB::table('sales')
                    ->where('id', $user->id)
                    ->update(['remember_token' => $rememberToken]);

                Cookie::queue('remember_token', json_encode(['id' => $user->id, 'token' => $rememberToken]), 43200); // Set the remember me cookie for 30 days
            }

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
