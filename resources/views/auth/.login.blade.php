<div class="container prose mx-auto grid max-w-xl place-items-center p-6 lg:prose-xl">

	@if (session('error'))
		<div class="alert alert-error text-sm font-bold">
			{{ session('error') }}
		</div>
	@endif

	<x-form class='w-full py-6' method='post' wire:submit.prevent='save'>
		@csrf
		<x-input label="Username" type='text' wire:model='username' />
		<x-input label="Email" type='email' wire:model='email' />
		<x-input icon="o-key" label="Password" type="password" wire:model="password" />
		<div class="divider"></div>
		<x-button
			class="hover:bg-btn-secondary btn-outline btn-primary bg-button-gradient bg-200% transition-all duration-500 ease-out hover:bg-right hover:text-white"
			type="submit" spinner="save">
			Log In
		</x-button>
	</x-form>
	<p class="text-xs">Doesn't have an account?
		<x-button class='link border-none bg-transparent p-1 hover:bg-transparent' link='register'>
			Register
		</x-button>
	</p>
</div>
