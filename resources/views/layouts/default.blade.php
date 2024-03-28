<x-app-layout>

	@if (Auth::check())
		@php
			$id = Auth::user()->id;
			$userData = App\Models\User::find($id);
		@endphp
	@endif

	@include("frontend.partials.header")
	<div>
		{{ $slot }}
	</div>
</x-app-layout>
