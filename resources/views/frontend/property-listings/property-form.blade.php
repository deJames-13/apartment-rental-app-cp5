@if (Auth::check())
	@php
		$id = Auth::user()->id;
		$userData = App\Models\User::find($id);

		$types = ['Apartment', 'Condominium', 'House', 'Townhouse', 'Commercial', 'Industrial'];
		$status = ['active', 'inactive', 'available', 'unavailable', 'sold', 'renovating'];

	@endphp
@endif

@php
	$isEdit = isset($property) && $property->id;
	$form = $isEdit ? 'update' : 'save';
@endphp
<div>
	<x-card class="min-h-screen flex flex-col space-y-12 shadow-xl container mx-auto p-12 mb-12 ">

		<div class="flex items-center justify-between mb-12">
			@if ($isEdit)
				<h2 class="text-2xl font-semibold text-gray-700">Edit Property Listing: {{ $property->id }}</h2>
			@else
				<h2 class="text-2xl font-semibold text-gray-700">Create Property Listing</h2>
			@endif
			<div class="flex justify-end">
				<x-button onclick="window.history.back()"
					class="self-end w-24 hover:bg-btn-secondary btn-outline btn-primary bg-button-gradient bg-200% transition-all duration-500 ease-out hover:bg-right hover:text-white">
					Back
				</x-button>
			</div>
		</div>

		{{-- session success --}}
		@if (session()->has('message'))
			<div x-data="{ show: true }" x-show="show"
				class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
				<strong class="font-bold">Success!</strong>
				<span class="block sm:inline">{{ session('message') }}</span>
				<span class="absolute top-0 bottom-0 right-0 px-4 py-3">
					<svg @click="show = false" class="fill-current h-6 w-6 text-green-500" role="button"
						xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
						<title>Close</title>
						<path
							d="M14.348 5.652a.5.5 0 0 1 .708.708L10.707 10l4.349 4.348a.5.5 0 0 1-.708.708L10 10.707l-4.348 4.349a.5.5 0 0 1-.708-.708L9.293 10 5.652 5.652a.5.5 0 0 1 .708-.708L10 9.293l4.348-4.349z" />
					</svg>
				</span>
			</div>
		@endif

		{{-- session errors --}}
		@if ($errors->any())
			<div x-data="{ show: true }" x-show="show"
				class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
				<strong class="font-bold">Error!</strong>
				<ul>
					@foreach ($errors->all() as $error)
						<li>
							<span class="block sm:inline">{{ $error }}</span>
						</li>
					@endforeach
				</ul>
				<span class="absolute top-0 bottom-0 right-0 px-4 py-3">
					<svg @click="show = false" class="fill-current h-6 w-6 text-red-500" role="button"
						xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
						<title>Close</title>
						<path
							d="M14.348 5.652a.5.5 0 0 1 .708.708L10.707 10l4.349 4.348a.5.5 0 0 1-.708.708L10 10.707l-4.348 4.349a.5.5 0 0 1-.708-.708L9.293 10 5.652 5.652a.5.5 0 0 1 .708-.708L10 9.293l4.348-4.349z" />
					</svg>
				</span>
			</div>
		@endif


		<x-form wire:submit.prevent="{{ $form }}" method="post">

			<div class="grid lg:grid-cols-3 gap-4 items-start">

				<h1 class="font-bold text-lg uppercase col-span-3">
					Property Information
				</h1>

				<div class="col-span-2">
					<x-input type="text" class="input input-sm lg:input-md" label="Property Name" name="property_name"
						wire:model="property_name" />
				</div>

				<div x-data="{ selectedType: '{{ $isEdit ? ucfirst($property->type) : 'Select Type' }}' }" class="flex flex-col gap-1 justify-end">
					<label for="status" class="text-sm font-bold">Property Type</label>
					<x-input type="hidden" name="type" id="type" x-model="selectedType" />
					<div class="dropdown dropdown-bottom dropdown-start">
						<x-button role="button" type="button" icon="o-home" class="btn bg-base-100 w-full justify-start flex gap-1">
							<span x-text="selectedType"></span>
						</x-button>
						<ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
							@foreach ($types as $type)
								<li>
									<button wire:click="$set('type', '{{ $type }}')"
										x-on:click="selectedType='{{ $type }}' ;
										document.getElementById('type').value='{{ $type }}'"
										class="btn btn-xs justify-start btn-ghost font-normal hover:font-bold hover:text-primary" type="button">
										{{ $type }}
									</button>
								</li>
							@endforeach
						</ul>
					</div>
				</div>

				<div class="flex gap-1">
					<x-input type="number" class="max-w-sm input input-sm lg:input-md" label="# of Floors" name="no_of_floors"
						wire:model="no_of_floors" />
					<x-input type="number" class="max-w-sm input input-sm lg:input-md" label="# of Units" name="no_of_units"
						wire:model="no_of_units" />
				</div>

				<div x-data="{ selectedStatus: '{{ $isEdit ? ucfirst($property->status) : 'Select Status' }}' }" class="flex flex-col gap-1 justify-end">
					<label for="status" class="text-sm font-bold">Status</label>
					<x-input type="hidden" name="status" id="status" x-model="selectedStatus" />
					<div class="dropdown dropdown-bottom dropdown-start">
						<x-button role="button" type="button" icon="o-home" class="btn bg-base-100 w-full justify-start flex gap-1">
							<span x-text="selectedStatus"></span>
						</x-button>
						<ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
							@foreach ($status as $s)
								<li>
									<button wire:click="$set('status', '{{ $s }}')"
										x-on:click="selectedStatus='{{ ucfirst($s) }}' ;
										document.elementById('status').value='{{ $s }}'"
										class="btn btn-xs justify-start btn-ghost font-normal hover:font-bold hover:text-primary" type="button">
										{{ ucfirst($s) }}
									</button>
								</li>
							@endforeach
						</ul>
					</div>
				</div>



				<div class="divider col-span-3"></div>


				{{-- ADDRESS --}}
				<h1 class="font-bold text-lg uppercase col-span-3">
					Pricing
				</h1>
				<x-input type="number" class="input input-sm lg:input-md" label="Default Price" name="default_price"
					wire:model="default_price" />
				<x-input type="number" class="input input-sm lg:input-md" label="Max Price" name="max_price"
					wire:model="max_price" />
				<x-input type="number" class="input input-sm lg:input-md" label="Lowest Price" name="lowest_price"
					wire:model="lowest_price" />

				<div class="divider col-span-3"></div>

				{{-- ADDRESS --}}
				<h1 class="font-bold text-lg uppercase col-span-3">
					Property Address
				</h1>
				<div class="col-span-2">
					<x-input type="text" class="input input-sm lg:input-md" label="Address" name="address"
						wire:model="address" />
				</div>
				<x-input type="text" class="input input-sm lg:input-md" label="City" name="city" wire:model="city" />
				<x-input type="text" class="input input-sm lg:input-md" label="Region" name="region" wire:model="region" />
				<x-input type="text" class="input input-sm lg:input-md" label="Country" name="country"
					wire:model="country" />
				<x-input type="number" class="input input-sm lg:input-md" label="Postal Code" name="postal_code"
					wire:model="postal_code" />

				<div class="divider col-span-3"></div>

				{{-- OTHER INFO --}}
				<div class="col-span-3">
					<x-input type="text" class="input input-sm lg:input-md" label="Heading" name="heading"
						wire:model="heading" />
				</div>
				<div class="col-span-3">
					<x-textarea label="Description" wire:model="description" placeholder="add description ..."
						hint="Max 1000 chars" rows="5" inline class="resize-none" />
				</div>
				<div class="col-span-3 lg:col-span-1">
					<x-input type="file" accept="image/*" class="file-input file-input-bordered w-full "
						label="Property Thumbnail" name="property_thumbnail" wire:model="property_thumbnail" />

					<div class="lg:max-w-sm">
						@if ($property_thumbnail)
							@if (is_object($property_thumbnail))
								<img src="{{ $property_thumbnail->temporaryUrl() }}" class="mt-2">
							@else
								<img src="{{ Storage::url($property_thumbnail) }}" class="mt-2">
							@endif
						@endif
					</div>
				</div>


			</div>



			<x-slot:actions>
				<x-button link="/">Cancel</x-button>
				<x-button
					class="hover:bg-btn-secondary btn-outline btn-primary bg-button-gradient bg-200% transition-all duration-500 ease-out hover:bg-right hover:text-white"
					type="submit" spinner="{{ $form }}">
					{{ $isEdit ? 'Update' : 'Save' }}
				</x-button>
			</x-slot:actions>
		</x-form>


	</x-card>

</div>
