@if (Auth::check())
	@php
		$id = Auth::user()->id;
		$userData = App\Models\User::find($id);
		$properties = App\Models\PropertyListing::pluck('id', 'property_name')->toArray();
		$property_name = $property ? $property->property_name : false;

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
		$status = ['inactive', 'active'];

	@endphp
@endif

@php
	$isEdit = false;
	$form = $isEdit ? 'update' : 'save';
@endphp

<div>
	<x-card class="min-h-screen flex flex-col shadow-xl container mx-auto gap-4 lg:gap-12 p-4 lg:p-12 mb-12 ">

		<div class="flex items-center justify-between mb-12">
			@if ($isEdit)
				<h2 class="text-2xl font-semibold text-gray-700">Edit Form: {{ $property->id }}</h2>
			@else
				<h2 class="text-2xl font-semibold text-gray-700">Create</h2>
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

				<h1 class="font-bold text-lg uppercase lg:col-span-3">
					Lease Information
				</h1>


				<div x-data="{ property: '{{ $isEdit ? ucfirst($property_name) : ($property_name ? $property_name : 'Select Property') }}' }" class="flex flex-col gap-1 justify-end">
					<label for="property_id" class="text-sm font-bold">Property</label>
					<x-input type="hidden" name="property_id" id="property_id" x-model="property" wire:model.defer="property_id" />
					<div class="dropdown dropdown-bottom dropdown-start">
						<x-button role="button" type="button" icon="o-home"
							class="btn bg-base-100 w-full justify-start items-center flex gap-1">
							<span x-text="property">
							</span>
						</x-button>
						<ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
							@foreach ($properties as $p => $k)
								<li>
									<button wire:click="setProperty('{{ $k }}')"
										x-on:click="property='{{ ucfirst($p) }}' ; document.elementById('property_id').value='{{ $p }}';"
										class="btn btn-xs justify-start btn-ghost font-normal hover:font-bold hover:text-primary" type="button">
										{{ ucfirst($k) }}: {{ ucfirst($p) }}
									</button>
								</li>
							@endforeach
						</ul>
					</div>
				</div>

				<div x-data="{ unit_code: '{{ $isEdit ? ucfirst($unit_code) : 'Select Unit' }}' }" class="flex flex-col gap-1 justify-end">
					<label for="unit_code" class="text-sm font-bold">Unit Code</label>
					<x-input type="hidden" name="unit_code" id="unit_code" x-model="unit_code" wire:model.defer="unit_code" />
					<div class="dropdown dropdown-bottom dropdown-start">
						<x-button role="button" type="button" icon="o-home"
							class="btn bg-base-100 w-full justify-start items-center flex gap-1">
							<span x-text="unit_code"></span>
						</x-button>
						<ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
							@foreach ($units as $u => $k)
								<li>
									<button wire:click="setUnit('{{ $u }}')"
										x-on:click="unit_code='{{ ucfirst($k) }}' ; document.elementById('unit_id').value='{{ $u }}';"
										class="btn btn-xs justify-start btn-ghost font-normal hover:font-bold hover:text-primary" type="button">
										{{ ucfirst($u) }}: {{ ucfirst($k) }}
									</button>
								</li>
							@endforeach
						</ul>
					</div>
				</div>


				<div x-data="{ type: '{{ $isEdit ? ucfirst($lease_type) : 'Select Type' }}' }" class="flex flex-col gap-1 justify-end">
					<label for="lease_type" class="text-sm font-bold">Lease Type</label>
					<x-input type="hidden" name="lease_type" id="lease_type" x-model="lease_type" wire:model.defer="lease_type" />
					<div class="dropdown dropdown-bottom dropdown-start">
						<x-button role="button" type="button" icon="o-home"
							class="btn bg-base-100 w-full justify-start items-center flex gap-1">
							<span x-text="type"></span>
						</x-button>
						<ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
							@foreach ($types as $u)
								<li>
									<button wire:click="$set('lease_type', '{{ $u }}')"
										x-on:click="type='{{ ucfirst($u) }}' ; document.elementById('lease_type').value='{{ $u }}';"
										class="btn btn-xs justify-start btn-ghost font-normal hover:font-bold hover:text-primary" type="button">
										{{ ucfirst($u) }}
									</button>
								</li>
							@endforeach
						</ul>
					</div>
				</div>

				<div class="divider lg:col-span-3"></div>

				<x-input type="number" class="input input-sm lg:input-md" label="Lease Application Fee"
					name="lease_application_fee" wire:model="lease_application_fee" />

				<x-input type="number" class="input input-sm lg:input-md" label="Lease Fee" name="lease_fee"
					wire:model="lease_fee" />

				<x-input type="number" class="input input-sm lg:input-md" label="Security Deposit" name="security_deposit"
					wire:model="security_deposit" />

				<div class="divider lg:col-span-3"></div>

				<x-input type="number" class="input input-sm lg:input-md" label="Short Term Rent" name="short_term_rent"
					wire:model="short_term_rent" />

				<x-input type="number" class="input input-sm lg:input-md" label="Long Term Rent" name="long_term_rent"
					wire:model="long_term_rent" />

				<div></div>
				<div class="flex items-center space-x-2">
					<input type="checkbox" wire:model="is_sub_leasing_allowed">
					<label for="is_sub_leasing_allowed" class="text-sm font-bold">Is Sub Leasing Allowed</label>
				</div>

				<div x-data="{ terminationAllowed: false }" class="flex-col">
					<div class="flex items-center space-x-2 mb-4">
						<input type="checkbox" x-model="terminationAllowed" wire:model.defer="is_termination_allowed"
							id="is_termination_allowed">
						<label for="is_termination_allowed" class="text-sm font-bold">Is Termination Allowed</label>
					</div>
					<div x-show="terminationAllowed">
						<x-input type="number" class="input input-sm lg:input-md" label="Termination Amount"
							name="termination_amount" wire:model="termination_amount" />
					</div>
				</div>

				<div></div>
				<div x-data="{ selectedStatus: 'Select Status' }" class="flex flex-col gap-1 justify-end">
					<label for="status" class="text-sm font-bold">Status</label>
					<x-input type="hidden" name="status" id="status" x-model="selectedStatus" />
					<div class="dropdown dropdown-bottom dropdown-start">
						<x-button role="button" type="button" icon="o-home"
							class="btn bg-base-100 w-full justify-start flex gap-1">
							<span x-text="selectedStatus"></span>
						</x-button>
						<ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
							<li>
								<button wire:click="$set('status', 'active')"
									x-on:click="selectedStatus='Active'; document.elementById('status').value='active'"
									class="btn btn-xs justify-start btn-ghost font-normal hover:font-bold hover:text-primary" type="button">
									Active
								</button>
							</li>
							<li>
								<button wire:click="$set('status', 'inactive')"
									x-on:click="selectedStatus='Inactive'; document.elementById('status').value='inactive'"
									class="btn btn-xs justify-start btn-ghost font-normal hover:font-bold hover:text-primary" type="button">
									Inactive
								</button>
							</li>
						</ul>
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
