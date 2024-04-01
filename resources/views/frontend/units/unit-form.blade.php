@php
	$id = Auth::user()->id;
	$userData = App\Models\User::find($id);
	$properties = App\Models\PropertyListing::where('landlord_id', $id)->pluck('id', 'property_name')->toArray();
	$types = ['Apartment', 'Condominium', 'House', 'Townhouse', 'Commercial', 'Industrial'];
	$status = ['inactive', 'available', 'unavailable'];

	$isEdit = isset($unit) && $unit->id;
	$form = $isEdit ? 'update' : 'save';
@endphp
<div>
	<x-card class="min-h-screen flex flex-col shadow-xl container mx-auto gap-4 lg:gap-12 p-4 lg:p-12 mb-12 ">

		<div class="flex items-center justify-between mb-12">
			@if ($isEdit)
				<h2 class="text-2xl font-semibold text-gray-700">Edit Unit Info: {{ $unit->id }}</h2>
			@else
				<h2 class="text-2xl font-semibold text-gray-700">Create Unit Listing</h2>
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

			<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 items-start">

				<h1 class="font-bold text-lg uppercase lg:col-span-3">
					Unit Information
				</h1>

				<div x-data="{ property: '{{ $isEdit ? ucfirst($unit->propertyListing->property_name) : 'Select Property' }}' }" class="flex flex-col gap-1 justify-end">
					<label for="property_id" class="text-sm font-bold">Property</label>
					<x-input type="hidden" name="property_id" id="property_id" x-model="property" wire:model="property_id" />
					<div class="dropdown dropdown-bottom dropdown-start">
						<x-button role="button" type="button" icon="o-home"
							class="btn bg-base-100 w-full justify-start items-center flex gap-1">
							<span x-text="property"></span>
						</x-button>
						<ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
							@foreach ($properties as $p => $k)
								<li>
									<button wire:click="$set('property_id', '{{ $k }}')"
										x-on:click="property='{{ ucfirst($p) }}' ;
										document.elementById('property_id').value='{{ $p }}'"
										class="btn btn-xs justify-start btn-ghost font-normal hover:font-bold hover:text-primary" type="button">
										{{ ucfirst($k) }}: {{ ucfirst($p) }}
									</button>
								</li>
							@endforeach
						</ul>
					</div>
				</div>

				<x-input type="text" class="input input-sm lg:input-md" label="Unit Code" name="unit_code" wire:model="unit_code"
					readonly />

				<div></div>


				<div class="flex lg:flex-row flex-col gap-1">
					<x-input type="number" class="max-w-sm input input-sm lg:input-md" label="Room Number" name="room_number"
						wire:model="room_number" />
					<x-input type="number" class="max-w-sm input input-sm lg:input-md" label="Floor Number" name="floor_number"
						wire:model="floor_number" />
				</div>
				<div class="flex lg:flex-row flex-col gap-1">
					<x-input type="number" class="max-w-sm input input-sm lg:input-md" label="# of Bedroom" name="no_of_bedroom"
						wire:model="no_of_bedroom" />
					<x-input type="number" class="max-w-sm input input-sm lg:input-md" label="# of Bathroom" name="no_of_bathroom"
						wire:model="no_of_bathroom" />
				</div>

				<div x-data="{ selectedStatus: '{{ $isEdit ? ucfirst($unit->status) : 'Select Status' }}' }" class="flex flex-col gap-1 justify-end">
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
				<div class="lg:col-span-3 max-w-lg">
					<x-input type="file" accept="image/*" class="file-input file-input-bordered w-full " label="Unit Thumbnail"
						name="unit_thumbnail" wire:model="unit_thumbnail" />

					@if ($unit_thumbnail)
						@if (is_object($unit_thumbnail))
							<img src="{{ $unit_thumbnail->temporaryUrl() }}" class="mt-2">
						@else
							<img src="{{ Storage::url($unit_thumbnail) }}" class="mt-2">
						@endif
					@endif
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
