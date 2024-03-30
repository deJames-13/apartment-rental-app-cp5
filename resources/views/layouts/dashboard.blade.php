<x-default-layout>

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
		<div class="min-h-screen p-8 flex gap-8  m-0">

			<div class="max-w-sm w-full flex flex-col gap-8">

				@include('profile.profile-card', ['page' => ucfirst($role)])

				@include('dashboard.menu')

			</div>

			<div class="w-full flex flex-col gap-8">

				{{ $slot }}
			</div>


		</div>
	@endif

</x-default-layout>
