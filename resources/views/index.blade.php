@if (Auth::check())
	@include('frontend.index')
@else
	<x-guest-layout>
		<div class="bg-image">
			@include('frontend.partials.banner')

			{{-- FEATURED --}}
			@include('frontend.partials.featured')

			{{-- CATEGORIES --}}
			@include('frontend.partials.categories')

		</div>

	</x-guest-layout>
@endif
