@php
	if (Auth::check()) {
	    $id = Auth::user()->id;
	    $userData = App\Models\User::find($id);

	    $types = ['Apartment', 'Condominium', 'House', 'Townhouse', 'Commercial', 'Industrial'];
	    $status = ['active', 'inactive', 'available', 'unavailable', 'sold', 'renovating'];
	}
@endphp

@php
	$isEdit = isset($property) && $property->id;
	$form = $isEdit ? 'update' : 'save';
@endphp
<div>
	<x-card class="container flex flex-col min-h-screen gap-4 p-4 mx-auto mb-12 shadow-xl lg:gap-12 lg:p-12 ">

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
				class="relative px-4 py-3 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
				<strong class="font-bold">Success!</strong>
				<span class="block sm:inline">{{ session('message') }}</span>
				<span class="absolute top-0 bottom-0 right-0 px-4 py-3">
					<svg @click="show = false" class="w-6 h-6 text-green-500 fill-current" role="button"
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
				class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
				<strong class="font-bold">Error!</strong>
				<ul>
					@foreach ($errors->all() as $error)
						<li>
							<span class="block sm:inline">{{ $error }}</span>
						</li>
					@endforeach
				</ul>
				<span class="absolute top-0 bottom-0 right-0 px-4 py-3">
					<svg @click="show = false" class="w-6 h-6 text-red-500 fill-current" role="button"
						xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
						<title>Close</title>
						<path
							d="M14.348 5.652a.5.5 0 0 1 .708.708L10.707 10l4.349 4.348a.5.5 0 0 1-.708.708L10 10.707l-4.348 4.349a.5.5 0 0 1-.708-.708L9.293 10 5.652 5.652a.5.5 0 0 1 .708-.708L10 9.293l4.348-4.349z" />
					</svg>
				</span>
			</div>
		@endif


		<x-form wire:submit.prevent="{{ $form }}" method="post">

			<div class="grid items-start gap-4 lg:grid-cols-3">

				<h1 class="text-lg font-bold uppercase lg:col-span-3">
					Property Information
				</h1>

				<div class="lg:col-span-2">
					<x-input type="text" class="input input-sm lg:input-md" label="Property Name" name="property_name"
						wire:model="property_name" />
				</div>

				<div></div>
				<div class="flex flex-col gap-1 lg:flex-row">
					<x-input type="number" class="max-w-sm input input-sm lg:input-md" label="# of Floors" name="no_of_floors"
						wire:model="no_of_floors" />
					<x-input type="number" class="max-w-sm input input-sm lg:input-md" label="# of Units" name="no_of_units"
						wire:model="no_of_units" />
				</div>

				<div x-data="{ selectedStatus: '{{ $isEdit ? ucfirst($property->status) : 'Select Status' }}' }" class="flex flex-col justify-end gap-1">
					<label for="status" class="text-sm font-bold">Status</label>
					<x-input type="hidden" name="status" id="status" x-model="selectedStatus" />
					<div class="dropdown dropdown-bottom dropdown-start">
						<x-button role="button" type="button" icon="o-home" class="flex justify-start w-full gap-1 btn bg-base-100">
							<span x-text="selectedStatus"></span>
						</x-button>
						<ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
							@foreach ($status as $s)
								<li>
									<button wire:click="$set('status', '{{ $s }}')"
										x-on:click="selectedStatus='{{ ucfirst($s) }}' ;
										document.elementById('status').value='{{ $s }}'"
										class="justify-start font-normal btn btn-xs btn-ghost hover:font-bold hover:text-primary" type="button">
										{{ ucfirst($s) }}
									</button>
								</li>
							@endforeach
						</ul>
					</div>
				</div>

				<div x-data="{ selectedType: '{{ $isEdit ? ucfirst($property->type) : 'Select Type' }}' }" class="flex flex-col justify-end gap-1">
					<label for="status" class="text-sm font-bold">Property Type</label>
					<x-input type="hidden" name="type" id="type" x-model="selectedType" />
					<div class="dropdown dropdown-bottom dropdown-start">
						<x-button role="button" type="button" icon="o-home" class="flex justify-start w-full gap-1 btn bg-base-100">
							<span x-text="selectedType"></span>
						</x-button>
						<ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
							@foreach ($types as $type)
								<li>
									<button wire:click="$set('type', '{{ $type }}')"
										x-on:click="selectedType='{{ $type }}' ;
										document.getElementById('type').value='{{ $type }}'"
										class="justify-start font-normal btn btn-xs btn-ghost hover:font-bold hover:text-primary" type="button">
										{{ $type }}
									</button>
								</li>
							@endforeach
						</ul>
					</div>
				</div>

				<div class="divider lg:col-span-3"></div>


				{{-- ADDRESS --}}
				<h1 class="text-lg font-bold uppercase lg:col-span-3">
					Pricing
				</h1>
				<x-input type="number" class="input input-sm lg:input-md" label="Default Price" name="default_price"
					wire:model="default_price" />
				<x-input type="number" class="input input-sm lg:input-md" label="Max Price" name="max_price"
					wire:model="max_price" />
				<x-input type="number" class="input input-sm lg:input-md" label="Lowest Price" name="lowest_price"
					wire:model="lowest_price" />

				<div class="divider lg:col-span-3"></div>

				{{-- ADDRESS --}}
				<h1 class="text-lg font-bold uppercase lg:col-span-3">
					Property Address
				</h1>
				<div class="lg:col-span-3">
					<x-input type="text" class="input input-sm lg:input-md" label="Address" name="address"
						wire:model="address" />
				</div>
				<x-input type="text" class="input input-sm lg:input-md" label="City" name="city" wire:model="city" />

				<div class="flex flex-col gap-1 lg:flex-row">
					<x-input type="text" class="input input-sm lg:input-md" label="Region" name="region"
						wire:model="region" />
					<x-input type="text" class="input input-sm lg:input-md" label="Country" name="country"
						wire:model="country" />
				</div>
				<x-input type="text" class="input input-sm lg:input-md" label="Postal Code" name="postal_code"
					wire:model="postal_code" />

				<div class="divider lg:col-span-3"></div>

				{{-- OTHER INFO --}}
				<div class="lg:col-span-3">
					<x-input type="text" class="input input-sm lg:input-md" label="Heading" name="heading"
						wire:model="heading" />
				</div>
				<div class="lg:col-span-3">
					<x-textarea label="Description" wire:model="description" placeholder="add description ..."
						hint="Max 1000 chars" rows="5" inline class="resize-none" />
				</div>

				{{-- Imgaes --}}
				<div class="lg:col-span-3 lg:lg:col-span-1">
					<x-input type="file" accept="image/*" class="w-full file-input file-input-bordered "
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
					<div class="my-5 lg:max-w-sm">
						@if ($property_thumbnail)
							<input type="file" accept="image/*" class="hidden w-full file-input file-input-bordered" id="imageUpload"
								name="added_images[]" wire:model="added_images" multiple />
							<div class="flex flex-col gap-2">
								<label for="added_images[]"
									class="flex gap-4 font-bold transition-all ease-in-out btn btn-outline bg-slide-l hover:scale-105 active:scale-90"
									onclick="window.document.getElementById('imageUpload').click()">
									<x-icon name="fas.images" />
									Add Images
								</label>
							</div>
							@if ($added_images)
								<div class="grid grid-cols-2 gap-2">
									@foreach ($added_images as $image)
										@if (is_object($image))
											<img src="{{ $image->temporaryUrl() }}" class="mt-2">
										@else
											<img src="{{ Storage::url($image) }}" class="mt-2">
										@endif
									@endforeach
								</div>
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
