@php
	$role = $role ?? null;
@endphp

<div class="relative min-h-screen max-w-screen overflow-hidden">
	<img src="{{ asset('images/rolebg.webp') }}" alt=""
		class="hidden lg:block -z-1 fixed top-0 object-cover w-[150%] max-h-screen bg-fixed bg-cover">
	<div class=" z-10 min-h-screen  grid lg:grid-cols-3">
		<div class="lg:bg-secondary lg:bg-opacity-60 p-16 col-span-2 animate__animated animate__fadeInLeft">

			<div class="w-full flex flex-col">
				<h4 class="px-2 font-bold text-xl text-base-content">
					Setting Up
				</h4>
				<h1 class="font-extrabold text-8xl lg:text-white">
					Set Role
				</h1>
				<p class="px-2 max-w-sm mt-4 text-base-content">
					Please choose what your purpose for using this app by selecting a
					<strong>
						role
					</strong>.
				</p>

				<x-form wire:submit.prevent='setRole' class='max-w-lg py-6 grid place-items-center lg:place-items-end'
					method='get'>
					@csrf

					<div class="w-full lg:w-2/3 grid grid-cols-2 gap-12  ">
						<div wire:click="$set('role', 'landlord')"
							class="grid place-items-center rounded border border-primary w-full aspect-square bg-opacity-55 hover:bg-primary hover:bg-opacity-40 transition-all ease-in {{ $role === 'landlord' ? 'bg-primary bg-opacity-9	0' : 'bg-base-100' }}">
							<img width="100" height="100" src="{{ asset('images/icons8-landlord-100.png') }}" alt="" />
							<strong>
								Landlord
							</strong>
						</div>
						<div wire:click="$set('role', 'tenant')"
							class="grid place-items-center rounded border border-primary w-full aspect-square bg-opacity-55 hover:bg-primary hover:bg-opacity-40 transition-all ease-in {{ $role === 'tenant' ? 'bg-primary bg-opacity-9	0' : 'bg-base-100' }}">
							<img width="100" height="100" src="{{ asset('images/icons8-tenant-100.png') }}" alt="" />
							<strong>
								Tenant
							</strong>
						</div>
					</div>


					<div class="max-w-lg w-full flex lg:justify-end">
						<x-button
							class=" mt-12 bg-transparent hover:bg-btn-secondary btn-outline btn-primary bg-button-gradient bg-200% transition-all duration-500 ease-out hover:bg-right hover:text-white"
							type="submit" spinner="setRole">
							Continue
						</x-button>
					</div>
				</x-form>

			</div>

		</div>

	</div>
</div>
