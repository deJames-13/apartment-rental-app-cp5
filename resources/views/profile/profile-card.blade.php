@props(['page' => 'User Profile'])
@php
	$id = Auth::user()->id;
	$user = auth()->user();
	$user_image = Storage::url($user->image_path) ?? 'images/author.jpg';
@endphp

<x-card :title="$page">
	<div class="flex items-center pb-2 space-x-4">
		{{-- User Image --}}
		<div class="avatar">
			<div class="w-20 rounded ring ring-primary ring-offset-base-100 ring-offset-2">
				<img src="{{ $user_image }}" />
			</div>
		</div>
		<div class="flex flex-col">
			<h2 class="text-lg font-bold">
				{{ $user->first_name . ' ' . $user->last_name }}
			</h2>
			<p class="font-medium text-gray-400">
				{{ $user->email }}
			</p>
			<x-button link="/profile/view"
				class="justify-start h-6 p-0 m-0 text-gray-500 bg-transparent border-none shadow-none btn-ghost min-h-3 hover:text-primary hover:bg-transparent">
				View Profile
			</x-button>

		</div>
	</div>
</x-card>
