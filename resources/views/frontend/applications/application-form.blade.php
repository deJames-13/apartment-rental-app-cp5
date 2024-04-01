@php
	if (Auth::check()) {
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
	}
@endphp


@php
	$isEdit = false;
	$form = $isEdit ? 'update' : 'save';
@endphp
<div>
	<x-card class="container flex flex-col min-h-screen gap-4 p-4 mx-auto mb-12 shadow-xl lg:gap-12 lg:p-12 ">

		<div class="flex items-center justify-between mb-12">
			@if ($isEdit)
				<h2 class="text-2xl font-semibold text-gray-700">Edit Form: {{ $property->id }}</h2>
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


		<x-form wire:submit.prevent="{{ $form }}" method="post">

			<div class="grid items-start gap-4 lg:grid-cols-3">

				<div class="lg:col-span-3">
					<h1 class="text-lg font-bold uppercase">
						Setting Up Application Form
					</h1>
					<p class="text-xs italic text-gray-400">
						Fill up the following form to create a new application for renting.
					</p>
				</div>



			</div>





</div>
`

<x-slot:actions>
	<x-button
		class="hover:bg-btn-secondary btn-outline btn-primary bg-button-gradient bg-200% transition-all duration-500 ease-out hover:bg-right hover:text-white"
		type="button" @click="step--" spinner="{{ $form }}">
		Go Back
	</x-button>
	<x-button
		class="hover:bg-btn-secondary btn-outline btn-primary bg-button-gradient bg-200% transition-all duration-500 ease-out hover:bg-right hover:text-white"
		type="submit" spinner="{{ $form }}">
		{{ $isEdit ? 'Update' : 'Save' }}
	</x-button>

</x-slot:actions>
</x-form>


</x-card>

</div>
