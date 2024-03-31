<x-default-layout>
	@isset($units)
		<div class="container grid grid-cols-1 gap-6 px-6 py-12 mx-auto md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
			@foreach ($units as $u)
				<x-unit-card :unit="$u" />
			@endforeach
		</div>
	@endisset
</x-default-layout>
