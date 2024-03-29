<x-default-layout>
	@isset($property)
		<livewire:property-form :property="$property" />
	@endisset
</x-default-layout>
