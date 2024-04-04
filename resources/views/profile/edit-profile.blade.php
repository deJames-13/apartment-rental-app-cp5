<x-form wire:submit.prevent='setProfile' method="post"
	class="flex flex-col w-full gap-4 px-10 py-5 border-blue-500 border-xl">

	@csrf

	<div class="grid w-48 rounded place-items-center ring ring-primary ring-offset-base-100 ring-offset-2 aspect-square">

		@if (isset($image_path))
			@if (is_object($image_path))
				<img id="profile_image" src="{{ $image_path->temporaryUrl() }}">
			@else
				<img src="{{ asset($image_path) }}">
			@endif
		@else
			<img id="profile_image" src="{{ asset('images/author.jpg') }}" />>
		@endif
	</div>

	<div>
		<x-input hidden type="file" accept="image/*" class="w-full text-white file-input file-input-bordered max-w-1/4"
			name="image_path" wire:model="image_path" />
		{{-- label for image --}}
		<x-button class="bg-transparent border-primary bg-slide-l" type="button"
			onclick="document.querySelector('.file-input').click()">
			Upload Image
		</x-button>
	</div>

	<div class="flex max-w-lg gap-4">
		<x-input label="First Name" wire:model='first_name' value="{{ old('first_name') }}" debounce='300ms' />
		<x-input label="Last Name" wire:model='last_name' value="{{ old('last_name') }}" debounce='300ms' />
	</div>
	<x-input class="max-w-lg" label="Email" type='text' wire:model='email' value="{{ old('email') }}"
		debounce='300ms' />
	<x-input class="max-w-lg" label="Occupation" type='text' wire:model='occupation' value="{{ old('occupation') }}"
		debounce='300ms' />
	<x-input class="max-w-lg" label="Phone Number" type='text' wire:model='phone' value="{{ old('phone') }}"
		debounce='300ms' />

	<div class="flex max-w-lg gap-4" x-data="{ birthdate: '', age: '' }" x-init="$watch('birthdate', value => calculateAge(value))">
		<div class="w-full">
			<x-datetime class="" label="Birthdate" x-model="birthdate" wire:model="birthdate" icon="o-calendar" />
		</div>
		<x-input class="w-1/5" label="Age" name="age" readonly type='text' wire:model="age" x-text="age" />
	</div>


	<x-input class="max-w-lg" label="Address" type='text' wire:model='address' value="{{ old('address') }}"
		debounce='300ms' />
	<div class="grid max-w-lg grid-cols-3 gap-3">
		<x-input class="max-w-1/4" label="City" type='text' wire:model='city' value="{{ old('city') }}"
			debounce='300ms' />
		<x-input class="max-w-1/4" label="Region" type='text' wire:model='region' value="{{ old('region') }}"
			debounce='300ms' />
		<x-input class="max-w-1/4" label="Country" type='text' wire:model='country' value="{{ old('country') }}"
			debounce='300ms' />
		<x-input class="max-w-1/4" label="Postal Code" type='text' wire:model='postal_code'
			value="{{ old('postal_code') }}" debounce='300ms' />


	</div>
	<div class="flex items-end justify-between w-full max-w-lg">


		<div>
			<x-delete-button label="Deactivate Account" />

		</div>


		<x-button class="mt-12 bg-transparent bg-slide-l btn-outline btn-primary" type="submit" spinner="setProfile">
			Update
		</x-button>
	</div>


</x-form>
