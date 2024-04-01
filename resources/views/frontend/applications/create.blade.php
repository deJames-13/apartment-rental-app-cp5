@php
	$step = 0;
@endphp
<x-dashboard-layout>

	<div :class="{ 'hidden': step !== }">
		{{-- Step 1 --}}
		<div x-show="step === 0">
			<livewire:setting-up-form />
		</div>

		{{-- Step 2 --}}
		<div :class="{ 'hidden': step !== }">
			<livewire:application-form />
		</div>
	</div>
</x-dashboard-layout>
