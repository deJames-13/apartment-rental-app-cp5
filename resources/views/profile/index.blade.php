@if (!Auth::check())
	{{-- route to home --}}
@endif


<x-default-layout>

	<div class="h-[250px] bg-gray-400 ">
		<div class="flex h-full items-center justify-center">
			<h1 class="text-6xl font-extrabold text-white">User Profile</h1>
		</div>
	</div>

	<div class="min-h-screen p-8 flex gap-8  m-0">

		<div class="max-w-sm w-full flex flex-col gap-8">


			@include('profile.profile-card')

			@include('profile.menu')

		</div>

		<div class="w-full flex flex-col gap-8">
			@include('profile.status-card')

			@include('profile.logs-card')
		</div>


	</div>
</x-default-layout>
