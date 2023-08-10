<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Agents;
use App\Models\Sales;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\validateEmail;

class Register extends Component
{
    public $email;
    public $first_name;
    public $last_name;
    public $password;
    public $password_confirmation;

    public $salesLoginForm = true;
    public $agentLoginForm = false;
    public $subheading = "Sign up using your JN Group or Bank email address";


    // domains
    protected $saleDomains = ['jnbank.com','jngroup.com'];
    protected $agentDomains = ['jngijamaica.com','jngroup.com'];

    function generatePassword() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+';
        $password = '';

        for ($i = 0; $i < 8; $i++) {
            $randomIndex = mt_rand(0, strlen($characters) - 1);
            $password .= $characters[$randomIndex];
        }

        return $password;
    }

    public function agentLoginForm()
    {
        $this->subheading = "Sign up using your JNGI email address";
        $this->salesLoginForm = false;
        $this->agentLoginForm = true;

        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';

    }
    public function salesLoginForm()
    {
        $this->subheading = "Sign up using your Bank email address";
        $this->salesLoginForm = true;
        $this->agentLoginForm = false;

        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function salesSignup()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:sales,email',
            // 'password' => 'required|min:8|confirmed',
        ]);

        $this->password = $this->generatePassword();


        // check if email domain valid
        $emailDomain = explode('@', $this->email)[1];

        if(!in_array($emailDomain, $this->saleDomains)){
            $this->addError('email', 'Invalid email domain.');
            return;
        }


        // save user to database
        $new_user = new Sales;
        $new_user->first_name = $this->first_name;
        $new_user->last_name = $this->last_name;
        $new_user->email = $this->email;
        $new_user->password = Hash::make($this->password);
        $new_user->save();

        $form = [
            'name' => $this->first_name,
            'email' => $this->email,
            'password' => $this->password,
        ];

        Mail::to($new_user->email)->send( new validateEmail($form));

        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';

        session()->flash('success', 'Registered successfully please check your email.');
        return redirect()->to('/register');
    }

    public function agentSignup()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:agents,email',
            // 'password' => 'required|min:8|confirmed',
        ]);

        $this->password = $this->generatePassword();

        // check if email domain valid
        $emailDomain = explode('@', $this->email)[1];

        if(!in_array($emailDomain, $this->agentDomains)){
            $this->addError('email', 'Invalid email domain.');
            return;
        }


        // save user to database
        $new_user = new Agents;
        $new_user->first_name = $this->first_name;
        $new_user->last_name = $this->last_name;
        $new_user->email = $this->email;
        $new_user->password = Hash::make($this->password);
        $new_user->save();

        $form = [
            'name' => $this->first_name,
            'email' => $this->email,
            'password' => $this->password,
        ];

        Mail::to($this->email)->send(new validateEmail($form));

        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';

        session()->flash('success', 'Registered successfully please check your email.');
        return redirect()->to('/');
    }


    public function render()
    {
        return view('livewire.register');
    }
}
