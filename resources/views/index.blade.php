@if (Auth::check())
	@include("frontend.index")
@else
	<x-guest-layout>
		<div class="bg-image">
			@include("frontend.partials.banner")

			@include("frontend.partials.featured")
		</div>

	</x-guest-layout>
@endif
