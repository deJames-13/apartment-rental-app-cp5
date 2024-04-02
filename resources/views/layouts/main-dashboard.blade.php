@if (Auth::check())
	@php
		$id = Auth::user()->id;
		$user = auth()->user();
		$role = $user->role;
		$user_image = Storage::url($user->image_path) ?? 'images/author.jpg';
	@endphp
	<div class="h-[250px] bg-gray-400 ">
		<div class="flex items-center justify-center h-full">
			<h1 class="text-6xl font-extrabold text-white">Dashboard</h1>
		</div>
	</div>
	<div class="flex min-h-screen p-3 m-0 lg:p-8 lg:gap-8">
		{{-- side bar --}}
		<div x-data="{ minimized: true /**window.innerWidth <= 1024*/ }" :class="{ 'w-24': minimized, 'max-w-xs w-full': !minimized }"
			class="flex flex-col gap-8 transition-all ease-in">
			<div x-show="!minimized">
				@include('profile.profile-card', ['page' => ucfirst($role)])
			</div>
			<div id="dash-menu" :class="{ 'lg:w-24': minimized }">
				<div class="fixed z-[100!important] bottom-2 left-2">
					<div class="inline-block p-2 z-100">
						<div x-show="minimized">
							<x-button class="relative justify-start z-100 bg-slide-r btn-primary btn-outline" icon="fas.angle-right"
								x-on:click="minimized = !minimized" />
						</div>
						<div x-show="!minimized">
							<x-button class="relative justify-start z-100 bg-slide-r btn-primary btn-outline" icon="fas.angle-left"
								x-on:click="minimized = !minimized" />
						</div>
					</div>
				</div>

				<div x-show="minimized" class="z-0 hidden w-0 animate__animated animate__fadeIn lg:block lg:w-24">
					@include('dashboard.menu', ['minimized' => true])
				</div>
				<div x-show="!minimized" class="animate__animated animate__fadeIn lg:z-0">
					@include('dashboard.menu', ['minimized' => false])
				</div>
			</div>
		</div>
		{{-- main page --}}
		<div class="flex flex-col w-full gap-8 overflow-hidden">
			{{ $slot }}

		</div>


	</div>
@endif
