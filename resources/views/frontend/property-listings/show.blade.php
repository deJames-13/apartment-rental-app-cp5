<x-default-layout>

	@if (isset($property))
		<livewire:property-details :property="$property" />
	@endif
</x-default-layout>
