<div class="relative min-h-screen max-w-screen overflow-hidden">
	<img src="{{ asset('images/rolebg.webp') }}" alt=""
		class="hidden lg:block -z-1 fixed top-0 object-cover w-[150%] max-h-screen bg-fixed bg-cover">
	<div class=" z-10 min-h-screen  grid lg:grid-cols-3">

		<div class="lg:bg-secondary lg:bg-opacity-60 p-16 col-span-2 animate__animated animate__fadeInLeft">

			<div class="w-full flex flex-col items-center">
				<h4 class="font-bold text-xl text-base-content">
					Welcome to RentApp
				</h4>
				<h1 class="font-extrabold text-8xl lg:text-white">
					Log In
				</h1>
				<p class=" max-w-sm mt-4 text-base-content">
					Please enter your credentials to continue.
				</p>
				<p class="text-xs">Doesn't have an account?
					<x-button class='link border-none bg-transparent p-0 m-0 hover:bg-transparent' link='register'>
						Register
					</x-button>
				</p>


				<x-form class='max-w-lg w-full py-6' method='post' wire:submit.prevent='save'>
					@csrf
					@if (session('error'))
						<div class="max-w-lg text-red-600 text-sm font-bold">
							{{ session('error') }}
						</div>
					@endif
					<x-input label="Username" type='text' wire:model='username' />
					<x-input label="Email" type='email' wire:model='email' />
					<x-input icon="o-key" label="Password" type="password" wire:model="password" />
					<div class="divider"></div>
					<x-button
						class="bg-base-100 hover:bg-btn-secondary btn-outline btn-primary bg-button-gradient bg-200% transition-all duration-500 ease-out hover:bg-right hover:text-white"
						type="submit" spinner="save">
						Log In
					</x-button>
				</x-form>
			</div>

		</div>

	</div>
</div>
