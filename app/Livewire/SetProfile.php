<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
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
  public $city;
  public $region;
  public $country;
  public $postal_code;


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
    $validatedData = $this->validate([
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'phone_number' => 'nullable|string|max:255',
      'address' => 'nullable|string|max:255',
      'city' => 'nullable|string|max:255',
      'region' => 'nullable|string|max:255',
      'country' => 'nullable|string|max:255',
      'postal_code' => 'nullable|string|max:255',
      'birthdate' => 'nullable',
      'age' => 'nullable',
      'occupation' => 'nullable|string|max:255',
      'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if (isset($validatedData['birthdate'])) {
      $validatedData['age'] = Carbon::parse($validatedData['birthdate'])->age;
    }
    if (isset($validatedData['image_path']) && is_object($validatedData['image_path'])) {
      $filename = time() . '_' . Str::slug($validatedData['image_path']->getClientOriginalName());
      $validatedData['image_path']->storeAs('public/profile', $filename);
      $validatedData['image_path'] = 'profile/' . $filename;
    }

    session()->put('user_data', array_merge(session('user_data'), $validatedData));

    $request = new \Illuminate\Http\Request();
    $request->merge(session('user_data'));
    app(\App\Http\Controllers\AuthController::class)->store($request);
    return redirect()->to('/');
  }


  public function skip()
  {
    $request = new \Illuminate\Http\Request();
    $request->merge(session('user_data'));
    app(\App\Http\Controllers\AuthController::class)->store($request);
    return redirect()->to('/');
  }


  public function render()
  {
    return view('auth.set-profile');
  }
}
