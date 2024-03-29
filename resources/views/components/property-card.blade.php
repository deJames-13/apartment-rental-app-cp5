@php

	if (isset($property)) {
	    $landlord = $property->landlord;
	    $landlord_name = $landlord->first_name . ' ' . $landlord->last_name;
	    $image = $property->property_thumbnail ? Storage::url($property->property_thumbnail) : 'images/property.jpg';
	    $property['location'] = implode(
	        ', ',
	        array_filter([
	            $property->address,
	            $property->city,
	            $property->region,
	            $property->country,
	            $property->postal_code,
	        ]),
	    );
	    $property['type'] = $property->propertyType ? $property->propertyType->name : 'N/A';
	} else {
	    $property = (object) [
	        'status' => 'For Rent',
	        'default_price' => '$40,000.00',
	        'property_name' => 'Mi Casa',
	        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, natus quam?',
	        'location' => 'Location',
	        'type' => 'Type',
	    ];
	    $landlord_name = 'John Doe';
	    $image = 'images/property.jpg';
	}
@endphp

<div class="h-full container relative overflow-hidden rounded-xl bg-transparent shadow-xl">
	<div class="relative">
		<div class="relative z-10 mx-3 flex items-center">
			{{-- <x-icon class="absolute -top-1 left-0 h-12" name="ri.bookmark-fill" /> --}}
			{{-- <x-icon class="absolute left-4 top-2 h-4 text-primary" name="s-star" /> --}}
			<div class="badge bg-green-400 border-none absolute right-0 top-1 mt-2 text-xs font-bold text-white">
				{{ $property->status }}
			</div>
		</div>
		<div class="min-h-1/2 absolute left-0 top-0 z-0 h-[250px] w-full min-w-[370px] bg-gray-400">
			<img alt="" class="h-full w-full object-cover" src="{{ $image }}">
		</div>
	</div>
	<div class="h-full flex flex-col justify-between space-y-3 p-6 pt-[260px]">

		<div class="flex items-center justify-between space-x-2">
			<div>
				<img alt="" class="h-8 w-8 rounded-full" src="{{ asset('images/author.jpg') }}">
				<span class="text-sm font-bold">
					{{ $landlord_name }}
				</span>
			</div>
			<x-button class="btn-sm rounded bg-primary transition-all ease-in active:scale-95">Apply Rent</x-button>
		</div>

		<h1 class="text-xl font-bold">
			{{ $property->property_name }}
		</h1>

		<div class="flex items-center justify-between space-x-2">
			<div class="flex flex-col">
				<h3 class="text-sm font-bold uppercase text-gray-400">Start From</h3>
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
		<x-button
			class="hover:bg-btn-secondary btn-outline btn-primary bg-button-gradient bg-200% transition-all duration-500 ease-out hover:bg-right hover:text-white">
			See Details
		</x-button>
	</div>
</div>
