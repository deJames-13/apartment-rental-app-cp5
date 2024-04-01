<?php

namespace App\Livewire;

use Mary\Traits\Toast;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditProfile extends Component
{
  use WithFileUploads;
  use Toast;
  public $user;
  public $image_path;
  public $first_name;
  public $last_name;
  public $email;
  public $occupation;
  public $birthdate;
  public $phone;
  public $age;
  public $address;
  public $city;
  public $region;
  public $country;
  public $postal_code;

  public function mount()
  {
    $this->user = auth()->user();
    $this->image_path = $this->user->image_path ? Storage::url($this->user->image_path) : 'images/author.jpg';

    // Set the user's data
    $this->first_name = $this->user->first_name;
    $this->last_name = $this->user->last_name;
    $this->email = $this->user->email;
    $this->occupation = $this->user->occupation;
    $this->birthdate = $this->user->birthdate;
    $this->phone = $this->user->phone;
    $this->age = $this->user->age;
    $this->address = $this->user->address;
    $this->city = $this->user->city;
    $this->region = $this->user->region;
    $this->country = $this->user->country;
    $this->postal_code = $this->user->postal_code;
  }


  public function setProfile()
  {
    $validatedData = $this->validate([
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'phone' => 'nullable|string|max:255',
      'email' => 'required|email|max:255',
      'address' => 'nullable|string|max:255',
      'city' => 'nullable|string|max:255',
      'region' => 'nullable|string|max:255',
      'country' => 'nullable|string|max:255',
      'postal_code' => 'nullable|string|max:255',
      'birthdate' => 'nullable',
      'age' => 'nullable',
      'occupation' => 'nullable|string|max:255',
      'image_path' => 'nullable',
    ]);

    if (isset($validatedData['birthdate'])) {
      $validatedData['age'] = Carbon::parse($validatedData['birthdate'])->age;
    }
    if (isset($validatedData['image_path']) && is_object($validatedData['image_path'])) {
      $filename = time() . '_' . Str::slug($validatedData['image_path']->getClientOriginalName());
      $validatedData['image_path']->storeAs('public/profile', $filename);
      $validatedData['image_path'] = 'profile/' . $filename;
    }

    $this->user->update($validatedData);

    $this->toast(
      type: 'success',
      title: 'Updated successfully',
      description: null,
      position: 'toast-top toast-end',
      icon: 'o-information-circle',
      css: 'alert-success',
      timeout: 3000,
    );
  }


  public function render()
  {
    return view('profile.edit-profile');
  }
}
