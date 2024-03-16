@if (Auth::check())
	@include("frontend.index")
@else
	<x-guest-layout>
		<div class="container prose mx-auto flex h-screen items-center justify-center">
			<h1>Guests</h1>
		</div>
	</x-guest-layout>
@endif
