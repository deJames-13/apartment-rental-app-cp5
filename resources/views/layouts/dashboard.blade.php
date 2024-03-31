{{-- if mobile --}}
<x-default-layout>
	{{-- <section class="lg:hidden">
		@include('layouts.mobile-dashboard')

	</section> --}}
	<section class="hidden lg:block">
		@include('layouts.main-dashboard')

	</section>
</x-default-layout>
