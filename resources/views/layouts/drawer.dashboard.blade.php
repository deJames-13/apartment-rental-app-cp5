<x-default-layout>

	@if (Auth::check())
		@php
			$id = Auth::user()->id;
			$user = auth()->user();
			$role = $user->role;
			$user_image = Storage::url($user->image_path) ?? 'images/author.jpg';
		@endphp

		<div x-data="{ drawerOpen: true }" class="min-h-screen flex">
			<div x-show="drawerOpen" @click="drawerOpen = false" class="fixed inset-0 bg-black bg-opacity-50 z-50">
			</div>

			<div x-show="drawerOpen"
				class="hide-scroll animate__animated animate__fadeInLeft fixed inset-y-0 left-0 bg-white z-50 shadow-md overflow-y-auto">
				@include('profile.profile-card', ['page' => ucfirst($role)])
				@include('dashboard.menu')
			</div>

			<!-- Main Content -->
			<div class="flex flex-col flex-1 overflow-hidden">
				<div class="h-[250px] bg-gray-400 ">
					<div class="flex h-full items-center justify-center">
						<h1 class="text-6xl font-extrabold text-white">Dashboard</h1>
					</div>
				</div>
				<div class="min-h-screen p-8 flex gap-8 m-0">
					<div class="w-full flex flex-col gap-8 overflow-hidden">
						<div class="max-w-sm w-full flex flex-col gap-8">
							<button @click="drawerOpen = !drawerOpen" class="btn btn-outline bg-slide-r">
								<x-icon name="fas.bars" />
								Menu
							</button>
						</div>
						{{ $slot }}
					</div>
				</div>
			</div>
		</div>
	@endif

</x-default-layout>
