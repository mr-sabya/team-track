<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false; // Add this for the Remember Me checkbox

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            // Redirect on successful login

            if(Auth::user()->is_admin){
                return $this->redirect(route('home'), navigate: true);
            }
            
            if(Auth::user()->is_company){
                return $this->redirect(route('company-dash.home'), navigate: true);
            }
            
            return $this->redirect(route('employee-dash.home'), navigate: true);
        }

        // Display error on failure
        session()->flash('error', 'Invalid email or password.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
