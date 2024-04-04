@php
	if (Auth::check()) {
	    $id = Auth::user()->id;
	    $userData = App\Models\User::find($id);
	    $properties = App\Models\PropertyListing::pluck('id', 'property_name')->toArray();
	    $types = [
	        'Fixed-Term Lease',
	        'Month-to-Month Lease',
	        'Sublease',
	        'Commercial Lease',
	        'Ground Lease',
	        'Net Lease',
	        'Graduated Lease',
	        'Percentage Lease',
	        'Lease with Option to Purchase',
	    ];
	}
@endphp


@php
	$isEdit = $application->exists ?? false;
	$form = $isEdit ? 'update' : 'save';
@endphp
<div>
	<x-card class="container flex flex-col min-h-screen gap-4 p-4 mx-auto mb-12 shadow-xl lg:gap-12 lg:p-12 ">

		@switch($status)
			@case('accepted')
				<div class="bg-green-400 badge badge-md">
					{{ $status }}
				</div>
			@break

			@case('rejected')
				<div class="bg-red-400 badge badge-md">
					{{ $status }}
				</div>
			@break

			@case('pending')
				<div class="bg-yellow-400 badge badge-md">
					{{ $status }}
				</div>
			@break

			@default
		@endswitch
		<div class="flex items-center justify-between mb-12">
			@if ($isEdit)
				<h2 class="text-2xl font-semibold text-gray-700">Edit Form: {{ $application->id }}</h2>
			@else
				<h2 class="text-2xl font-semibold text-gray-700">Create Form</h2>
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


		<x-form wire:submit="{{ $form }}" method="post">
			@csrf

			<div class="grid items-start gap-4 lg:grid-cols-3">

				<div class="lg:col-span-3">
					<h1 class="text-lg font-bold uppercase">
						Setting Up Application Form
					</h1>
					<p class="text-xs italic text-gray-400">
						These are pre-requisite information needed to setup the application form.
					</p>
				</div>


				<div x-data="{ property: '{{ $isEdit ? ucfirst($property_name) : ($property ? $property_name : 'Select Property') }}' }" class="flex flex-col justify-end gap-1">
					<label for="property_id" class="text-sm font-bold">Property</label>
					<x-input :disabled="$status !== 'pending'" type="hidden" name="property_id" id="property_id" wire:model.defer='property_id' />
					<div class="dropdown dropdown-bottom dropdown-start">
						<x-button :disabled="($status !== 'pending')" role="button" type="button" icon="o-home"
							class="flex items-center justify-start w-full gap-1 btn bg-base-100">
							<span x-text="property">
							</span>
						</x-button>
						<ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
							@foreach ($properties as $p => $k)
								<li>
									<button wire:click="setProperty('{{ $k }}')" x-on:click="property='{{ ucfirst($p) }}'"
										class="justify-start font-normal btn btn-xs btn-ghost hover:font-bold hover:text-primary" type="button">
										{{ ucfirst($k) }}: {{ ucfirst($p) }}
									</button>
								</li>
							@endforeach
						</ul>
					</div>
				</div>


				<div x-data="{ unit_code: '{{ $isEdit ? ucfirst($unit_code) : ($unit_code ? $unit_code : 'Select Unit') }}' }" class="flex flex-col justify-end gap-1">
					<label for="unit_code" class="text-sm font-bold">Unit Code</label>
					<x-input :disabled="$status !== 'pending'" type="hidden" name="unit_code" id="unit_code" x-model="unit_code"
						wire:model.defer="unit_code" />
					<div class="dropdown dropdown-bottom dropdown-start">
						<x-button :disabled="$status !== 'pending'" role="button" type="button" icon="o-home"
							class="flex items-center justify-start w-full gap-1 btn bg-base-100">
							<span x-text="unit_code"></span>
						</x-button>
						<ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
							@foreach ($units as $u => $k)
								<li>
									<button wire:click.defer="setUnit('{{ $u }}')" x-on:click="unit_code='{{ ucfirst($k) }}';"
										class="justify-start font-normal btn btn-xs btn-ghost hover:font-bold hover:text-primary" type="button">
										{{ ucfirst($u) }}: {{ ucfirst($k) }}
									</button>
								</li>
							@endforeach
						</ul>
					</div>
				</div>



				@if ($property && $property->id)
					<div class="lg:col-span-3">
						<x-range :disabled="$status !== 'pending'" wire:model.debounce="rent_amount"
							min="{{ $property->lowest_price ?? $property->default_price }}"
							max="{{ $property->max_price ?? $property->default_price + 10000 }}" step="1000" label="Select a level"
							class="range-accent" />
						{{-- value of $rent_amount --}}
						<label for="rent_amount">
							Rent Amount: {{ $rent_amount }}
						</label>
					</div>
				@endif

				<div></div>


				<div class="lg:col-span-3">
					<x-input :disabled="$status !== 'pending'" type="text" class="input input-sm lg:input-md" label="Application Title"
						name="title" wire:model="title" />
				</div>

				<div class="lg:col-span-3">
					<x-textarea :disabled="$status !== 'pending'" label="Application Note" wire:model="notes" placeholder="add description ..."
						hint="Max 1000 chars" rows="5" inline class="resize-none" />
				</div>



				@if ($status !== 'pending')
					<div class="lg:col-span-3">
						<label for="comment" class="my-2 text-sm font-bold">
							Add Comment
						</label>
						<x-textarea label="Add Comment" wire:model="comment" placeholder="add comment ..." hint="Max 1000 chars"
							rows="5" inline class="resize-none" />
					</div>
					<div class="flex justify-end w-full lg:col-span-3">
						<x-button
							class="hover:bg-btn-secondary btn-outline btn-primary bg-button-gradient bg-200% transition-all duration-500 ease-out hover:bg-right hover:text-white"
							type="button" wire.click="saveComment" spinner>
							Send Comment
						</x-button>
					</div>
				@endif

				<div class="max-w-lg lg:col-span-3">
					<x-input :disabled="$status !== 'pending'" type="file" accept="image/*" class="w-full file-input file-input-bordered "
						label="Applicant Signature" name="tenant_signature" wire:model="tenant_signature" />

					@if ($tenant_signature)
						@if (is_object($tenant_signature))
							<img src="{{ $tenant_signature->temporaryUrl() }}" class="mt-2">
						@else
							<img src="{{ Storage::url($tenant_signature) }}" class="mt-2">
						@endif
					@endif
				</div>

				<div class="max-w-lg lg:col-span-3">
					<x-input :disabled="$status !== 'pending'" type="file" accept="image/*" class="w-full file-input file-input-bordered "
						label="Identification Card" name="tenant_id_card" wire:model="tenant_id_card" />

					@if ($tenant_id_card)
						@if (is_object($tenant_id_card))
							<img src="{{ $tenant_id_card->temporaryUrl() }}" class="mt-2">
						@else
							<img src="{{ Storage::url($tenant_id_card) }}" class="mt-2">
						@endif
					@endif
				</div>


			</div>





</div>



<x-slot:actions>
	<x-button link="/">Cancel</x-button>

	<x-button
		class="hover:bg-btn-secondary btn-outline btn-primary bg-button-gradient bg-200% transition-all duration-500 ease-out hover:bg-right hApplicover:text-white"
		type="submit" :disabled="$status !== 'pending'" spinner="{{ $form }}">
		Save
	</x-button>
	{{-- <x-button
		class="hover:bg-btn-secondary btn-outline btn-primary bg-button-gradient bg-200% transition-all duration-500 ease-out hover:bg-right hover:text-white"
		type="button" onclick="showApplicationForm()">
		Fill Up a Form Now
	</x-button> --}}

</x-slot:actions>
</x-form>


</x-card>

</div>
