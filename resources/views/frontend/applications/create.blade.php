<x-dashboard-layout>

	<div x-data="{ step: 0 }">
		{{-- Step 1 --}}
		<section id="setting-up-form" x-show="step === 0">
			<livewire:setting-up-form />
			<button @click="step++">Next</button>
		</section>

		{{-- Step 2 --}}
		<section id="application-form" x-show="step === 1">
			<livewire:application-form />
			<button @click="step--">Previous</button>
		</section>
	</div>

</x-dashboard-layout>
