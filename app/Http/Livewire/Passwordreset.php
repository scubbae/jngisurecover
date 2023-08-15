<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetMail;


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

            $token = sha1(time());

            if(DB::table('password_reset_tokens')->where('email',$this->email )->first()){

                return redirect()->to('/password-reset');
                session()->flash('error','Request was already made!');
                
            }else{
                DB::table('password_reset_tokens')->insert([
                    'email' => $this->email,
                    'token' => $token,
                    'created_at' => now()
                ]);
              
                $form = [
                    'email' => $this->email,
                    'token' => $token,
                ];

                Mail::to($this->email)->send(new PasswordResetMail($form));

                $this->email = ' ';

                session()->flash('success', 'Password reset link has been sent to your email.');
                return redirect()->to('/');
            }
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
