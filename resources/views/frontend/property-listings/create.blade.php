@if (Auth::check())
	@php
		$id = Auth::user()->id;
		$userData = App\Models\User::find($id);

		$tempType = ['Apartment', 'Condominium', 'House', 'Townhouse', 'Commercial', 'Industrial'];
		$status = ['Available', 'Not Available', 'Under Renovation', 'Sold'];

	@endphp
@endif
<x-default-layout>
	<div class="shadow-xl container bg-gray-200 mx-auto p-12 my-12 ">
		<h1 class="font-extrabold uppercase text-3xl">Create Property Listing</h1>

		<x-form wire:submit="save" class="w-full" method="post">
			@csrf
			<x-input name="landlord_id" type="number" {{-- required --}} hidden value="{{ $id }}" />
			<div class="grid lg:grid-cols-3 gap-3 items-end">
				<div class="col-span-2">
					<x-input label="Property Name" name="property_name" type="text" {{-- required --}} />
				</div>

				<select {{-- required --}} class="select select-bordered w-full max-w-xs">
					@foreach ($tempType as $key => $value)
						<option value="{{ $key }}">{{ $value }}</option>
					@endforeach
				</select>

				<x-input label="No of Floors" name="no_of_floors" type="number" {{-- required --}} class="col-span-1" />
				<x-input label="No of Units" name="no_of_units" type="number" {{-- required --}} class="col-span-1" />
				<x-input label="Property Notes" name="property_status" type="text" {{-- required --}} class="col-span-1" />

				<div class="col-span-3">
					<x-input label="Address" name="address" type="text" {{-- required --}} />
				</div>
				<x-input label="City" name="city" type="text" {{-- required --}} class="col-span-1" />
				<x-input label="Region" name="region" type="text" {{-- required --}} class="col-span-1" />
				<x-input label="Country" name="country" type="text" {{-- required --}} class="col-span-1" />
				<x-input label="Postal Code" name="postal_code" type="text" {{-- required --}} class="col-span-1" />
				<div class="col-span-2"></div>

				<x-input prefix="PHP" money wire:model="default_amount" label="Default Price" name="default_price" type="number"
					step="0.01" {{-- required --}} class="col-span-1" />
				<x-input prefix="PHP" money wire:model="max_amount" label="Max Price" name="max_price" type="number"
					step="0.01" />
				<x-input prefix="PHP" money wire:model="lowest_amount" label="Lowest Price" name="lowest_price" type="number"
					step="0.01" />


				<div class="col-span-2">
					<x-input label="Heading" name="heading" type="text" />
				</div>

				<select {{-- required --}} class="select select-bordered w-full max-w-xs">
					@foreach ($status as $key => $value)
						<option value="{{ $key }}">{{ $value }}</option>
					@endforeach
				</select>

				<div class="col-span-3 row-span-2">
					<x-textarea label="Description" name="description" type="text" />
				</div>

				<div class="col-span-2">
					<x-input label="Property Thumbnail" type="file"
						class="file-input file-input-bordered file-input-primary w-full" />
				</div>
			</div>


			<x-slot:actions>
				<x-button label="Cancel" />
				<x-button label="Submit" class="btn-primary" type="submit" />
			</x-slot:actions>
		</x-form>

	</div>

</x-default-layout>
