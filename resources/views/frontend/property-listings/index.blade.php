<x-default-layout>
	@isset($propertyListings)
		<div class="container grid grid-cols-1 gap-6 px-6 py-12 mx-auto md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
			@foreach ($propertyListings as $property)
				<x-property-card :property="$property" />
			@endforeach
		</div>
		<div class="flex justify-center mt-6 mb-12">
			{{ $propertyListings->links() }}
		</div>
	@endisset
</x-default-layout>
