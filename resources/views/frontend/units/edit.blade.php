<x-dashboard-layout>
	@isset($unit)
		<livewire:unit-form :unit="$unit" />
	@endisset
</x-dashboard-layout>
