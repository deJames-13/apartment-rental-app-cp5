<?php

namespace App\Http\Requests\PropertyListing;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ptype_id' => 'required|exists:property_types,id',
            'landlord_id' => 'required|exists:users,id',
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
            'status' => 'required|in:active,inactive',
        ];
    }
}
