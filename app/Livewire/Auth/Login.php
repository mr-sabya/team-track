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

            if (Auth::user()->is_admin) {
                return $this->redirect(route('home'), navigate: true);
            }

            if (Auth::user()->is_company) {
                return $this->redirect(route('company-dash.home'), navigate: true);
            }

            return $this->redirect(route('employee-dash.home'), navigate: true);
        }

        // Display error on failure
        session()->flash('error', 'Invalid email or password.');
    }

    // super admin login
    public function superAdminLogin()
    {
        $data = [
            'email' => 'sabya.citik@gmail.com',
            'password' => 'sabya12345',
            'is_admin' => 1,
            'is_superadmin' => 1,
        ];

        Auth::attempt($data);
        return $this->redirect(route('home'), navigate: true);
    }

    // admin login
    public function adminLogin()
    {
        $data = [
            'email' => 'arsenio@gmail.com',
            'password' => 'sabya12345',
            'is_admin' => 1,
        ];

        Auth::attempt($data);
        return $this->redirect(route('home'), navigate: true);
    }


    // compaany login
    public function companyLogin()
    {
        $data = [
            'email' => 'rony@gmail.com',
            'password' => 'sabya12345',
            'is_company' => 1,
        ];

        Auth::attempt($data);
        return $this->redirect(route('company-dash.home'), navigate: true);
    }

    // employee login
    public function employeeLogin()
    {
        $data = [
            'email' => 'jane.smith@example.com',
            'password' => 'password456',
            'is_employee' => 1,
        ];

        Auth::attempt($data);
        return $this->redirect(route('employee-dash.home'), navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
