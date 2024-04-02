@if (Auth::check())
	@php
		$id = Auth::user()->id;
		$user = auth()->user();
		$role = $user->role;
		$user_image = Storage::url($user->image_path) ?? 'images/author.jpg';
	@endphp
	<div class="h-[250px] bg-gray-400 ">
		<div class="flex h-full items-center justify-center">
			<h1 class="text-6xl font-extrabold text-white">Dashboard</h1>
		</div>
	</div>
	<div class="min-h-screen lg:p-8 flex p-3 lg:gap-8  m-0">
		{{-- side bar --}}
		<div x-data="{ minimized: window.innerWidth <= 1024 }" :class="{ 'w-24': minimized, 'max-w-xs w-full': !minimized }"
			class="transition-all ease-in flex flex-col gap-8">
			<div x-show="!minimized">
				@include('profile.profile-card', ['page' => ucfirst($role)])
			</div>
			<div id="dash-menu" :class="{ 'lg:w-24': minimized }">
				<div class="fixed z-[100!important] bottom-2 left-2">
					<div class="inline-block z-100 p-2">
						<div x-show="minimized">
							<x-button class="relative z-100 bg-slide-r btn-primary btn-outline justify-start" icon="fas.angle-right"
								x-on:click="minimized = !minimized" />
						</div>
						<div x-show="!minimized">
							<x-button class="relative z-100 bg-slide-r btn-primary btn-outline justify-start" icon="fas.angle-left"
								x-on:click="minimized = !minimized" />
						</div>
					</div>
				</div>

				<div x-show="minimized" class="animate__animated animate__fadeIn hidden w-0 lg:block lg:w-24 z-0">
					@include('dashboard.menu', ['minimized' => true])
				</div>
				<div x-show="!minimized" class="animate__animated animate__fadeIn  lg:z-0">
					@include('dashboard.menu', ['minimized' => false])
				</div>
			</div>
		</div>
		{{-- main page --}}
		<div class="w-full flex flex-col gap-8 overflow-hidden">
			{{ $slot }}

		</div>


	</div>
@endif
