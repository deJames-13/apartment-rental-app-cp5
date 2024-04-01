@php
	$role = $role ?? null;
@endphp

<div class="relative min-h-screen max-w-screen overflow-hidden">
	<img src="{{ asset('images/rolebg.webp') }}" alt=""
		class="hidden lg:block -z-1 fixed top-0 object-cover w-[150%] max-h-screen bg-fixed bg-cover">
	<div class=" z-10 min-h-screen  grid lg:grid-cols-3">
		<div class="lg:bg-secondary lg:bg-opacity-60 p-16  col-span-2 animate__animated animate__fadeInLeft">

			<div class="flex flex-col">

				<div class="w-full flex flex-col ">
					<div>
						<x-button class="mb-12 bg-transparent bg-slide-r" type="button" @click="step--" spinner="save">
							Go Back
						</x-button>
					</div>

					<h4 class="font-bold text-xl text-base-content">
						Setting Up
					</h4>
					<div id="count-line" class="my-4 w-1/5 grid grid-cols-3 gap-3">
						<div class="div bg-base-200 h-1"></div>
						<div class="div bg-primary h-1"></div>
					</div>
					<h1 class="font-extrabold text-3xl lg:text-7xl lg:text-white tracking-wide">
						Set Profile Information
					</h1>
					<p class="max-w-sm text-base-content">
						Tell us more about yourself. Please fill in the form to set your profile information.
					</p>

					<x-form wire:submit.prevent='setProfile' class='w-full py-6 grid place-items-center lg:place-items-start'
						method='post'>
						@csrf

						<div class="flex flex-col gap-4 w-full justify-center lg:justify-start">
							<div class="max-w-lg grid place-items-center gap-2">
								<div class="avatar">
									<div class="w-48 rounded ring ring-primary ring-offset-base-100 ring-offset-2">

										@if ($image_path)
											@if (is_object($image_path))
												<img id="profile_image" src="{{ $image_path->temporaryUrl() }}">
											@else
												<img src="{{ Storage::url($profile_image) }}">
											@endif
										@else
											<img id="profile_image" src="{{ asset('images/author.jpg') }}" />>
										@endif
									</div>
								</div>
								<div>
									<x-input hidden type="file" accept="image/*"
										class="text-white file-input file-input-bordered w-full max-w-1/4" name="image_path"
										wire:model="image_path" />
									{{-- label for image --}}
									<x-button class="bg-transparent border-primary bg-slide-l" type="button"
										onclick="document.querySelector('.file-input').click()">
										Upload Image
									</x-button>

								</div>
							</div>
							<div class="flex gap-4 max-w-lg">
								<x-input label="First Name" wire:model='first_name' value="{{ old('first_name') }}" debounce='300ms' />
								<x-input label="Last Name" wire:model='last_name' value="{{ old('last_name') }}" debounce='300ms' />
							</div>
							<x-input class="max-w-lg" label="Occupation" type='text' wire:model='occupation'
								value="{{ old('occupation') }}" debounce='300ms' />
							<x-input class="max-w-lg" label="Phone Number" type='text' wire:model='phone_number'
								value="{{ old('phone_number') }}" debounce='300ms' />

							<div class="max-w-lg flex gap-4" x-data="{ birthdate: '', age: '' }" x-init="$watch('birthdate', value => calculateAge(value))">
								<div class="w-full">
									<x-datetime class="" label="Birthdate" x-model="birthdate" wire:model="birthdate" icon="o-calendar" />
								</div>
								<x-input class="w-1/5" label="Age" name="age" readonly type='text' wire:model="age" x-text="age" />
							</div>


							<x-input class="max-w-lg" label="Address" type='text' wire:model='address' value="{{ old('address') }}"
								debounce='300ms' />
							<div class="grid grid-cols-3 gap-3 max-w-lg">
								<x-input class="max-w-1/4" label="City" type='text' wire:model='city' value="{{ old('city') }}"
									debounce='300ms' />
								<x-input class="max-w-1/4" label="Region" type='text' wire:model='region' value="{{ old('region') }}"
									debounce='300ms' />
								<x-input class="max-w-1/4" label="Country" type='text' wire:model='country' value="{{ old('country') }}"
									debounce='300ms' />
								<x-input class="max-w-1/4" label="Postal Code" type='text' wire:model='postal_code'
									value="{{ old('postal_code') }}" debounce='300ms' />
							</div>


						</div>

						<div class="max-w-lg w-full flex justify-between">

							<x-button class="mt-12 bg-transparent bg-slide-l" wire:click="skip" spinner="skip">
								Skip for now
							</x-button>
							<x-button class="mt-12 bg-transparent bg-slide-l" type="submit" spinner="setProfile">
								Finish Up
							</x-button>
						</div>
					</x-form>

				</div>
			</div>

		</div>

	</div>
	<script>
		function calculateAge(birthdate) {
			if (birthdate) {
				const dob = new Date(birthdate);
				const diff_ms = Date.now() - dob.getTime();
				const age_dt = new Date(diff_ms);

				return Math.abs(age_dt.getUTCFullYear() - 1970);
			}
			return '';
		}
	</script>
</div>
