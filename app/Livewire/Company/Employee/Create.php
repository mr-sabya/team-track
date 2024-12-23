<?php

namespace App\Livewire\Company\Employee;

use App\Models\Company;
use App\Models\DrivingLicense;
use App\Models\EmiratesInfo;
use App\Models\InsuranceInfo;
use App\Models\Passport;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Visa;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $address = '';
    public $date_of_birth = '';
    public $is_superadmin = false;
    public $password = '';
    public $confirm_password = '';
    public $company;


    protected $rules = [
        'company_id' => 'required',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'address' => 'required|string|max:255',
        'date_of_birth' => 'required',
        'password' => 'required|min:6|same:confirm_password',
    ];

    public function mount($companyId)
    {
        $this->company = Company::find($companyId);
    }

    public function submit()
    {
        $this->validate();
        // dd($this->company_id);
        try {
            $user = User::create([
                'company_id' => $this->company->id,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'address' => $this->address,
                'date_of_birth' => $this->date_of_birth,
                'is_employee' => 1,
                'password' => Hash::make($this->password),
            ]);

            // visa
            $visa = new Visa();
            $visa->user_id = $user->id;
            $visa->save();

            // passport
            $passport = new Passport();
            $passport->user_id = $user->id;
            $passport->save();


            // vehicle
            $vehicle = new Vehicle();
            $vehicle->user_id = $user->id;
            $vehicle->save();

            // driving_license
            $driving_license = new DrivingLicense();
            $driving_license->user_id = $user->id;
            $driving_license->save();

            // emirates_info
            $emirates_info = new EmiratesInfo();
            $emirates_info->user_id = $user->id;
            $emirates_info->save();

            // insurance_info
            $insurance_info = new InsuranceInfo();
            $insurance_info->user_id = $user->id;
            $insurance_info->save();



            $this->dispatch('alert', ['type' => 'success',  'message' => 'Employee has been created successfully!']);

            return $this->redirect(route('company-dash.employee.index'), navigate: true);
        } catch (\Exception $e) {
            $this->dispatch('alert', ['type' => 'error',  'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    
    public function render()
    {
        return view('livewire.company.employee.create');
    }
}
