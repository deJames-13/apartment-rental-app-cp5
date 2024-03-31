<x-dashboard-layout>
	@isset($lease)
		<livewire:lease-form :lease="$lease" />
	@endisset
</x-dashboard-layout>
