<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Agents;
use App\Models\Sales;
use Illuminate\Support\Facades\Hash;

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


    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:sales,email',
        'password' => 'required|min:8|confirmed',
    ];

    // domains
    protected $saleDomains = ['jnbank.com','jngroup.com'];
    protected $agentDomains = ['jngijamaica.com'];

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
        $this->validate();

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

        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';

        session()->flash('success', 'Registered successfully please login.');
        return redirect()->to('/');
    }

    public function agentSignup()
    {
        $this->validate();

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

        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';

        session()->flash('success', 'Registered successfully please login.');
        return redirect()->to('/');
    }


    public function render()
    {
        return view('livewire.register');
    }
}
