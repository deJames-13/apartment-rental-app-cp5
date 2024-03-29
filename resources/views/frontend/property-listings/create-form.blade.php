@if (Auth::check())
	@php
		$id = Auth::user()->id;
		$userData = App\Models\User::find($id);

		$tempType = ['Apartment', 'Condominium', 'House', 'Townhouse', 'Commercial', 'Industrial'];
		$status = ['active', 'inactive', 'Under Renovation', 'Sold'];

	@endphp
@endif
<div class="flex flex-col space-y-6 shadow-xl container bg-gray-200 mx-auto p-12 my-12 ">
	<h1 class="font-extrabold uppercase text-3xl">Create Property Listing</h1>

	@if (session('message'))
		<div id="success-alert" class="alert alert-success">
			{{ session('message') }}
		</div>
	@endif

	@if (session('error'))
		<div id="error-alert" class="alert alert-error">
			{{ session('error') }}
		</div>
	@endif

	<x-form wire:submit="save" class="w-full" method="post">
		@csrf
		<div class="grid grid-cols-1 lg:grid-cols-3 gap-3 items-end">
			<div class="lg:col-span-2">
				<x-input wire:model="property_name" label="Property Name" name="property_name" type="text"
					value="{{ old('') }}" />
			</div>

			<select wire:model="ptype_id" name="ptype_id" value="{{ old('ptype_id') }}"
				class="select select-bordered w-full max-w-xs">
				@foreach ($tempType as $key => $value)
					<option value="{{ $key }}">{{ $value }}</option>
				@endforeach
			</select>

			<x-input wire:model="no_of_floors" label="No of Floors" name="no_of_floors" type="number"
				value="{{ old('no_of_floors') }}" class="lg:col-span-1" />
			<x-input wire:model="no_of_units" label="No of Units" name="no_of_units" type="number"
				value="{{ old('no_of_units') }}" class="lg:col-span-1" />
			<x-input wire:model="property_status" label="Property Notes" name="property_status" type="text"
				value="{{ old('property_status') }}" class="lg:col-span-1" />

			<div class="lg:col-span-3">
				<x-input wire:model="address" label="Address" name="address" type="text" value="{{ old('address') }}" />
			</div>
			<x-input wire:model="city" label="City" name="city" type="text" value="{{ old('city') }}"
				class="lg:col-span-1" />
			<x-input wire:model="region" label="Region" name="region" type="text" value="{{ old('region') }}"
				class="lg:col-span-1" />
			<x-input wire:model="country" label="Country" name="country" type="text" value="{{ old('country') }}"
				class="lg:col-span-1" />
			<x-input wire:model="postal_code" label="Postal Code" name="postal_code" type="text"
				value="{{ old('postal_code') }}" class="lg:col-span-1" />


			<div class="lg:col-span-2">
			</div>
			<x-input wire:model="default_price" label="Default Price" name="default_price" type="number"
				value="{{ old('default_price') }}" step="0.01" required class="lg:col-span-1" />
			<x-input wire:model="max_price" label="Max Price" name="max_price" type="number" value="{{ old('max_price') }}"
				step="0.01" />
			<x-input wire:model="lowest_price" label="Lowest Price" name="lowest_price" view="{{ old('lowest_price') }}"
				type="number" step="0.01" />

			<div class="lg:col-span-2">
				<x-input wire:model="heading" label="Heading" name="heading" value="{{ old('heading') }}" type="text" />
			</div>

			<select wire:model="status" value="{{ old('status') }}" name="status"
				class="select select-bordered w-full max-w-xs">
				@foreach ($status as $key => $value)
					<option value="{{ $key }}">{{ $value }}</option>
				@endforeach
			</select>


			<div class="lg:col-span-3 row-span-2">
				<x-textarea wire:model="description" label="Description" name="description" value="{{ old('status') }}"
					type="text" />
			</div>

			<div class="lg:col-span-2">
				<x-input wire:model="property_thumbnail" name="property_thumbnail" value="{{ old('property_thumbnail') }}"
					label="Property Thumbnail" type="file" accept="image/*"
					class="file-input file-input-bordered file-input-primary w-full" />
			</div>
		</div>

		<x-slot:actions>
			<x-button label="Cancel" />
			<x-button label="Submit" class="btn-primary" type="submit" spinner="save" />
		</x-slot:actions>
	</x-form>
</div>
