<x-dashboard-layout>
	@isset($property)
		<livewire:property-form :property="$property" />
	@endisset
</x-dashboard-layout>
