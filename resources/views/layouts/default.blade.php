<x-app-layout>
	@php
		$id = Auth::user()->id;
		$userData = App\Models\User::find($id);
	@endphp

	@include("frontend.partials.header")
	<div>
		{{ $slot }}
	</div>
</x-app-layout>
