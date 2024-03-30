<x-app-layout>

	@if (Auth::check())
		@php
			$id = Auth::user()->id;
			$userData = App\Models\User::find($id);
		@endphp
		@include('frontend.partials.header')
	@else
		@include('partials.header')
	@endif


	<div>
		{{ $slot }}
	</div>
</x-app-layout>
