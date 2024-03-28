<div class="container grid max-w-xl p-6 mx-auto prose place-items-center lg:prose-xl">
	<x-form wire:submit='save' class='w-full py-6' method='post' action='/store'>
		@csrf

		<div class="flex gap-4">
			<x-input label="First Name" wire:model='first_name' value="{{ old('first_name') }}" debounce='300ms' />
			<x-input label="Last Name" wire:model='last_name' value="{{ old('last_name') }}" debounce='300ms' />
		</div>
		<x-input label="Username" type='text' wire:model='username' value="{{ old('username') }}" debounce='300ms' />
		<x-input label="Email" type='email' wire:model='email' value="{{ old('email') }}" debounce='300ms' />
		<x-input label="Password" wire:model="password" icon="o-key" type="password" />
		<x-input label="Confirm Password" type='password' icon="o-key" wire:model='password_confirmation' />
		<x-slot:actions>
			<x-button class='w-full px-6 btn btn-primary' type="submit" spinner="save">Submit</x-button>
		</x-slot:actions>
	</x-form>
	<p class="text-xs">Already have an account?
		<x-button link='login' class='link bg-transparent border-none hover:bg-transparent p-1'>
			Login
		</x-button>

	</p>
</div>
