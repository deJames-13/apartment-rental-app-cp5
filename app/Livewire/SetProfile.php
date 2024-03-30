<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class SetProfile extends Component
{
    use WithFileUploads;
    public $image_path;
    public $first_name;
    public $last_name;
    public $occupation;
    public $birthdate;
    public $phone_number;
    public $age;
    public $address;


    public function mount()
    {
        $this->image_path = '';
        if (isset(session('user_data')['first_name'])) {
            $this->first_name = session('user_data')['first_name'];
            $this->last_name = session('user_data')['last_name'];
        }
    }
    public function updatedBirthdate()
    {
        $this->age = Carbon::parse($this->birthdate)->age;
    }
    public function setProfile()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'occupation' => 'sometimes',
            'birthdate' => 'sometimes',
            'phone_number' => 'sometimes',
            'age' => 'sometimes',
            'address' => 'sometimes',
            'image_path' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // if theres birthdate calculate age
        if ($this->birthdate) {
            $this->age = Carbon::parse($this->birthdate)->age;
        }

        // if theres image upload
        if ($this->image_path) {
            // $this->image_path = $this->image_path->store('profile', 'public');
        }

        session()->put('user_data', array_merge(session('user_data'), [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'occupation' => $this->occupation,
            'birthdate' => $this->birthdate,
            'phone_number' => $this->phone_number,
            'age' => $this->age,
            'address' => $this->address,
            'image_path' => $this->image_path,
        ]));





        dd(session('user_data'));
    }
    public function render()
    {
        return view('auth.set-profile');
    }
}
