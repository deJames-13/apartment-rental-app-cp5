<x-app-layout>
	@include("frontend.partials.header")
	<div>
		{{ $slot }}
	</div>
</x-app-layout>
