@if (Auth::check())
	@php
		$id = Auth::user()->id;
		$userData = App\Models\User::find($id);

		$tempType = ['Apartment', 'Condominium', 'House', 'Townhouse', 'Commercial', 'Industrial'];
		$status = ['active', 'inactive', 'Under Renovation', 'Sold'];

	@endphp
@endif
<div class="shadow-xl container bg-gray-200 mx-auto p-12 my-12 ">
	<h1 class="font-extrabold uppercase text-3xl">Create Property Listing</h1>

	<x-form wire:submit.prevent="save" class="w-full" method="post">
		@csrf
		<div class="grid lg:grid-cols-3 gap-3 items-end">
			<div class="col-span-2">
				<x-input wire:model="property_name" label="Property Name" name="property_name" type="text" {{-- required --}} />
			</div>

			<select wire:model="ptype_id" {{-- required --}} class="select select-bordered w-full max-w-xs">
				@foreach ($tempType as $key => $value)
					<option value="{{ $key }}">{{ $value }}</option>
				@endforeach
			</select>

			<x-input wire:model="no_of_floors" label="No of Floors" name="no_of_floors" type="number" {{-- required --}}
				class="col-span-1" />
			<x-input wire:model="no_of_units" label="No of Units" name="no_of_units" type="number" {{-- required --}}
				class="col-span-1" />
			<x-input wire:model="property_status" label="Property Notes" name="property_status" type="text"
				{{-- required --}} class="col-span-1" />

			<div class="col-span-3">
				<x-input wire:model="address" label="Address" name="address" type="text" {{-- required --}} />
			</div>
			<x-input wire:model="city" label="City" name="city" type="text" {{-- required --}} class="col-span-1" />
			<x-input wire:model="region" label="Region" name="region" type="text" {{-- required --}} class="col-span-1" />
			<x-input wire:model="country" label="Country" name="country" type="text" {{-- required --}}
				class="col-span-1" />
			<x-input wire:model="postal_code" label="Postal Code" name="postal_code" type="text" {{-- required --}}
				class="col-span-1" />


			<div class="col-span-2">
			</div>
			<x-input wire:model="default_price" label="Default Price" name="default_price" type="number" step="0.01" required
				class="col-span-1" />
			<x-input wire:model="max_price" label="Max Price" name="max_price" type="number" step="0.01" />
			<x-input wire:model="lowest_price" label="Lowest Price" name="lowest_price" type="number" step="0.01" />

			<div class="col-span-2">
				<x-input wire:model="heading" label="Heading" name="heading" type="text" />
			</div>

			<select wire:model="status" {{-- required --}} class="select select-bordered w-full max-w-xs">
				@foreach ($status as $key => $value)
					<option value="{{ $key }}">{{ $value }}</option>
				@endforeach
			</select>


			<div class="col-span-3 row-span-2">
				<x-textarea wire:model="description" label="Description" name="description" type="text" />
			</div>

			<div class="col-span-2">
				<x-input wire:model="property_thumbnail" label="Property Thumbnail" type="file"
					class="file-input file-input-bordered file-input-primary w-full" />
			</div>
		</div>

		<x-slot:actions>
			<x-button label="Cancel" />
			<x-button label="Submit" class="btn-primary" type="submit" />
		</x-slot:actions>
	</x-form>
</div>
