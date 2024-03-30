<div class="relative min-h-screen max-w-screen overflow-hidden">
	<img src="{{ asset('images/rolebg.webp') }}" alt=""
		class="hidden lg:block -z-1 fixed top-0 object-cover w-[150%] max-h-screen bg-fixed bg-cover">
	<div class=" z-10 min-h-screen  grid lg:grid-cols-3">
		<div></div>
		<div class="lg:bg-secondary lg:bg-opacity-60 p-16 col-span-2 animate__animated animate__fadeInRight">

			<div class="w-full flex flex-col items-center">
				<h4 class="font-bold text-xl text-base-content">
					Welcome to RentApp
				</h4>
				<h1 class="font-extrabold text-8xl lg:text-white">
					Register
				</h1>
				<p class=" max-w-sm mt-4 text-base-content">
					Please fill in the form to continue.
				</p>
				<p class="text-xs">Already have an account?
					<x-button class='link border-none bg-transparent p-1 hover:bg-transparent' link='login'>
						Login
					</x-button>
				</p>
				<x-form wire:submit='save' class='max-w-lg py-6' method='post' action='/store'>
					@csrf

					<div class="flex gap-4">
						<x-input label="First Name" wire:model='first_name' value="{{ old('first_name') }}" debounce='300ms' />
						<x-input label="Last Name" wire:model='last_name' value="{{ old('last_name') }}" debounce='300ms' />
					</div>
					<x-input label="Username" type='text' wire:model='username' value="{{ old('username') }}" debounce='300ms' />
					<x-input label="Email" type='email' wire:model='email' value="{{ old('email') }}" debounce='300ms' />
					<x-input label="Password" wire:model="password" icon="o-key" type="password" />
					<x-input label="Confirm Password" type='password' icon="o-key" wire:model='password_confirmation' />
					<div class="divider"></div>


					<x-button
						class="bg-base-100 hover:bg-btn-secondary btn-outline btn-primary bg-button-gradient bg-200% transition-all duration-500 ease-out hover:bg-right hover:text-white"
						type="submit" spinner="save">
						Continue
					</x-button>
					{{-- <x-button
						class="bg-base-100 hover:bg-btn-secondary btn-outline btn-primary bg-button-gradient bg-200% transition-all duration-500 ease-out hover:bg-right hover:text-white"
						type="submit" spinner="save">
						Submit
					</x-button> --}}
				</x-form>
			</div>

		</div>

	</div>
</div>
