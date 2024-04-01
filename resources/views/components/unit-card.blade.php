@props(['unit' => null])
@php

	if (isset($unit)) {
	    $property = $unit->propertyListing;
	    $landlord = $property->landlord;
	    $landlord_name = $landlord->first_name . ' ' . $landlord->last_name;
	    $user_image = $landlord->image_path ? Storage::url($landlord->image_path) : 'images/author.jpg';
	    $image = $unit->unit_thumbnail ? Storage::url($unit->unit_thumbnail) : 'images/property.jpg';
	    $unit['location'] = implode(
	        ', ',
	        array_filter([
	            $property->address,
	            $property->city,
	            $property->region,
	            $property->country,
	            $property->postal_code,
	        ]),
	    );
	    $unit['type'] = $property->type;
	} else {
	    $unit = (object) [
	        'status' => 'For Rent',
	        'default_price' => '$40,000.00',
	        'property_name' => 'Mi Casa',
	        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, natus quam?',
	        'location' => 'Location',
	        'type' => 'Type',
	    ];
	    $user_image = 'images/author.jpg';
	    $landlord_name = 'John Doe';
	    $image = 'images/property.jpg';
	}
@endphp

<div class="h-full container relative overflow-hidden bg-transparent flex flex-col justify-between shadow-xl rounded-xl">
	<div class="relative items-center">
		<div class="relative z-10 flex items-center mx-3">
			{{-- <x-icon class="absolute z-[100] -top-1 left-0 h-12" name="ri.bookmark-fill" /> --}}
			{{-- <x-icon class="absolute z-[100] left-4 top-2 h-4 text-primary" name="s-star" /> --}}
			<div class="absolute right-0 mt-2 text-xs font-bold text-white bg-green-400 border-none badge top-1">
				{{ $property->status }}
			</div>
		</div>
		<img alt="" class="z-0 object-cover object-center" src="{{ $image }}">
	</div>
	<div class="h-full flex flex-col gap-2 p-6">

		<div class="flex items-end justify-between gap-2 py-2">
			<div class="flex items-center gap-2">
				<div link="/profile" class="avatar">
					<div class="w-6 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
						<img src="{{ $user_image }}" />
					</div>
				</div>
				<span class="text-xs font-bold">
					{{ $landlord_name }}
				</span>
			</div>
			<x-button class="text-white transition-all ease-in rounded btn-sm bg-primary active:scale-95">Apply Rent</x-button>
		</div>


		<h1 class="text-xl font-bold">
			{{ $property->property_name }}
		</h1>

		<span class="text-xs font-bold text-gray-500">
			Unit: {{ $unit->unit_code }}
		</span>
		<div class="flex items-center justify-between space-x-2">
			<div class="flex flex-col">
				<h3 class="text-sm font-bold text-gray-400 uppercase">Start From</h3>
				<h3 class="text-xl font-bold text-green-500">
					{{ $property->default_price }}
				</h3>
			</div>
			<div class="flex space-x-2">
				{{-- TODO: TODO LIKE  --}}
				<x-icon class="h-6 text-primary hover:text-green-400" name="ri.heart-3-fill" />
				{{-- TODO: VIEW DETAILS --}}
				<x-icon class="h-6 text-primary hover:text-green-400" name="ri.eye-fill" />
			</div>
		</div>

		<h4 class="text-sm font-bold text-gray-500">
			{{ $property->heading }}
		</h4>
		<p class="text-sm text-gray-500">
			{{ $property->description }}
		</p>
		<div class="flex items-center justify-between">
			<div class="flex items-center space-x-2">
				<x-icon class="h-4 text-primary" name="ri.map-pin-line" />
				<span class="text-xs text-gray-500">
					{{ $property->location }}
				</span>
			</div>
			<div class="flex items-center space-x-2">
				<x-icon class="h-4 text-primary" name="ri.home-2-line" />
				<span class="text-sm text-gray-500">
					{{ $property->type }}
				</span>
			</div>
		</div>
	</div>

	<x-button
		class="hover:bg-btn-secondary rounded-b-xl btn-outline btn-primary bg-button-gradient bg-200% transition-all duration-500 ease-out hover:bg-right hover:text-white">
		See Details
	</x-button>
</div>
