<x-dashboard-layout>

	@isset($application)
		<livewire:setting-up-form :application="$application" />
	@endisset
</x-dashboard-layout>
