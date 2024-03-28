<?php

namespace App\Http\Requests\PropertyListing;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'ptype_id' => 'sometimes|exists:property_types,id',
            'landlord_id' => 'sometimes|exists:users,id',
            'property_name' => 'sometimes|string|max:255',
            'property_status' => 'sometimes|string|max:255',
            'no_of_floors' => 'sometimes|integer',
            'no_of_units' => 'sometimes|integer',
            'address' => 'sometimes|string|max:255',
            'city' => 'sometimes|string|max:255',
            'region' => 'sometimes|string|max:255',
            'country' => 'sometimes|string|max:255',
            'postal_code' => 'sometimes|string|max:255',
            'default_price' => 'sometimes|numeric',
            'property_thumbnail' => 'nullable|string|max:255',
            'heading' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'lowest_price' => 'nullable|numeric',
            'max_price' => 'nullable|numeric',
            'status' => 'sometimes|in:active,inactive',
        ];
    }
}
