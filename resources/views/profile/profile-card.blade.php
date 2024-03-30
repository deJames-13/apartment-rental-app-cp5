<x-card :title="'User Profile'">
	<div class="flex space-x-4 pb-2 items-center">
		{{-- User Image --}}
		<div class="avatar">
			<div class="w-20 rounded ring ring-primary ring-offset-base-100 ring-offset-2">
				<img src="{{ $user_image }}" />
			</div>
		</div>
		<div class="flex flex-col">
			<h2 class="font-bold text-lg">
				{{ $user->first_name . ' ' . $user->last_name }}
			</h2>
			<p class="font-medium text-gray-400">
				{{ $user->email }}
			</p>
			<x-button link="/profile/view"
				class="text-gray-500 justify-start btn-ghost h-6 min-h-3 p-0 m-0 bg-transparent hover:text-primary hover:bg-transparent border-none shadow-none">
				View Profile
			</x-button>

		</div>
	</div>
</x-card>
