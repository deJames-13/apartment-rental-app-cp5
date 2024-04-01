<x-default-layout>

	<div class="h-[250px] bg-gray-400 ">
		<div class="flex items-center justify-center h-full">
			<h1 class="text-6xl font-extrabold text-white">User Profile</h1>
		</div>
	</div>

	<div class="flex min-h-screen gap-8 p-8 m-0">

		<div class="flex flex-col w-full max-w-sm gap-8">


			@include('profile.profile-card')

			@include('profile.menu')

		</div>

		<livewire:edit-profile />


	</div>
</x-default-layout>
