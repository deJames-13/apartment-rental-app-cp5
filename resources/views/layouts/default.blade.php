<x-app-layout>

	@if (Auth::check())
		@php
			$id = Auth::user()->id;
			$user = auth()->user();
			$user_image = Storage::url($user->image_path) ?? 'images/author.jpg';
		@endphp
		@include('frontend.partials.header')
	@else
		@include('partials.header')
	@endif


	<div>
		{{ $slot }}
	</div>
</x-app-layout>
