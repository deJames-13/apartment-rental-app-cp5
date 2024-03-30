<x-dashboard-layout>
	<x-card>
		<div class="flex flex-col space-y-4">
			<div class="flex items-center justify-between mb-12">
				<div class="flex space-x-2 items-center text-2xl font-semibold text-gray-700">
					<x-icon name="fas.building" />
					<h2 class=" ">Properties</h2>
				</div>

				<div class="flex justify-end">
					<x-button onclick="window.history.back()"
						class="self-end w-24 hover:bg-btn-secondary btn-outline btn-primary bg-button-gradient bg-200% transition-all duration-500 ease-out hover:bg-right hover:text-white">
						Back
					</x-button>
				</div>
			</div>

			{{-- actions --}}
			<div class="grid grid-cols-4 gap-4 ">
				<div></div>
				<div></div>
				<x-button link="{{ route('properties.create') }}"
					class="text-white max-w-xs btn-outline bg-green-400 border-green-400">
					<x-icon name="fas.home" />
					<span>Add Unit</span>
				</x-button>
				<x-button link="{{ route('properties.create') }}"
					class="text-white max-w-xs btn-outline bg-green-400 border-green-400">
					<x-icon name="fas.plus" />
					<span>Add Property</span>
				</x-button>

			</div>


			<div class="w-full overflow-hidden">
				<livewire:property-table />
			</div>

		</div>
	</x-card>
</x-dashboard-layout>
