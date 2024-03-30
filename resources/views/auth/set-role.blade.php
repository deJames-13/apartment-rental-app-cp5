@php
	$role = $role ?? null;
@endphp

<div class="relative min-h-screen max-w-screen overflow-hidden">
	<img src="{{ asset('images/rolebg.webp') }}" alt=""
		class="hidden lg:block -z-1 fixed top-0 object-cover w-[150%] max-h-screen bg-fixed bg-cover">
	<div class=" z-10 min-h-screen  grid lg:grid-cols-3">
		<div class="lg:bg-secondary lg:bg-opacity-60 p-16  col-span-2 animate__animated animate__fadeInLeft">

			<div class="div flex flex-col justify-center items-center">

				<div class="w-full max-w-lg flex flex-col ">
					<div>
						<x-button class="mb-12 bg-transparent bg-slide-r" type="button" @click="step--" spinner="save">
							Go Back
						</x-button>
					</div>

					<div id="count-line" class="my-4 w-1/5 grid grid-cols-3 gap-3">
						<div class="div bg-primary h-1"></div>
						<div class="div bg-base-100 h-1"></div>
					</div>
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

					<x-form wire:submit.prevent='setRole' class='max-w-lg py-6 grid place-items-center lg:place-items-start'
						method='get'>
						@csrf

						<div class="w-full lg:w-2/3 grid grid-cols-2 gap-12" x-data="{ role: '' }">
							<div wire:click="$set('role', 'landlord')" @click="role = 'landlord'"
								:class="{ 'bg-primary text-white bg-opacity-90': role === 'landlord', 'bg-base-100': role !== 'landlord' }"
								class="grid place-items-center rounded border border-primary w-full aspect-square bg-opacity-55 hover:bg-primary hover:bg-opacity-40 transition-all ease-in">
								<img width="100" height="100" src="{{ asset('images/icons8-landlord-100.png') }}" alt="" />
								<strong>
									Landlord
								</strong>
							</div>
							<div wire:click="$set('role', 'tenant')" @click="role = 'tenant'"
								:class="{ 'bg-primary text-white bg-opacity-90': role === 'tenant', 'bg-base-100': role !== 'tenant' }"
								class=" grid place-items-center rounded border border-primary w-full aspect-square bg-opacity-55 hover:bg-primary hover:bg-opacity-40 transition-all ease-in">
								<img width="100" height="100" src="{{ asset('images/icons8-tenant-100.png') }}" alt="" />
								<strong>
									Tenant
								</strong>
							</div>
						</div>


						@if ($role)
							<div class="max-w-lg w-full flex">
								<x-button class="mt-12 bg-transparent bg-slide-l" type="button" @click="step++" spinner="setRole">
									Continue
								</x-button>
							</div>
						@endif
					</x-form>

				</div>
			</div>

		</div>

	</div>
</div>
