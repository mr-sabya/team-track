<?php

namespace App\Livewire\Component\Profile;

use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    public $first_name, $last_name, $email, $password, $country_id, $date_of_birth, $gender, $phone, $address, $image;
    public $new_image;

    public function mount()
    {
        $user = Auth::user();
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->country_id = $user->country_id;
        $this->date_of_birth = $user->date_of_birth;
        $this->gender = $user->gender;
        $this->phone = $user->phone;
        $this->address = $user->address;
        $this->image = $user->image;
    }

    public function updateProfile()
    {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::id())],
            'country_id' => 'required|exists:countries,id',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:1,2,3',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'new_image' => 'nullable|image|max:2048', // Max 2MB
        ]);

        $user = User::findOrFail(Auth::user()->id);

        if ($this->new_image) {
            $imagePath = $this->new_image->store('profile-images', 'public');
            $user->image = $imagePath;
        }

        $user->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'country_id' => $this->country_id,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'phone' => $this->phone,
            'address' => $this->address,
        ]);

        $this->dispatch('alert', ['type' => 'success',  'message' => 'Profile has been updated successfully!']);
    }

    public function render()
    {
        return view('livewire.component.profile.index', [
            'countries' => Country::all(),
        ]);
    }

}
