<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\PropertyListingController;
use App\Http\Requests\PropertyListing\StoreRequest;

class PropertyCreate extends Component
{
    public $landlord_id;
    public $property_name;
    public $ptype_id;
    public $no_of_floors;
    public $no_of_units;
    public $property_status;
    public $address;
    public $city;
    public $region;
    public $country;
    public $postal_code;
    public $default_price = 0;
    public $max_price = 0;
    public $lowest_price = 0;
    public $heading;
    public $status;
    public $description;
    public $property_thumbnail;
    protected $rules = [
        'ptype_id' => 'nullable|exists:property_types,id',
        'property_name' => 'required|string|max:255',
        'property_status' => 'required|string|max:255',
        'no_of_floors' => 'required|integer',
        'no_of_units' => 'required|integer',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'region' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'postal_code' => 'required|string|max:255',
        'default_price' => 'required|numeric',
        'property_thumbnail' => 'nullable|string|max:255',
        'heading' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:255',
        'lowest_price' => 'nullable|numeric',
        'max_price' => 'nullable|numeric',
        'status' => 'sometimes',
    ];

    public function save()
    {

        $this->validate($this->rules);
        $landlord_id = Auth::id();
        $data = request()->all()['components'][0]['updates'];
        $data['landlord_id'] = $landlord_id;
        $storeRequest = new StoreRequest();
        $storeRequest->merge($data);
        app('session')->start();
        $response = app(PropertyListingController::class)->store($storeRequest);
        app('session')->save();
    }


    public function render()
    {
        return view('frontend.property-listings.create-form');
    }
}
