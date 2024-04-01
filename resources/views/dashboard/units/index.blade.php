@php
	$controller = \App\Http\Controllers\UnitController::class;
@endphp

<x-dashboard-layout>
	<x-card>
		<div class="flex flex-col space-y-4">
			<div class="flex items-center justify-between mb-12">
				<div class="flex space-x-2 items-center text-2xl font-semibold text-gray-700">
					<x-icon name="fas.building" />
					<h2 class=" ">Units</h2>
				</div>

				<div class="flex justify-end">
					<x-button onclick="window.history.back()"
						class="self-end w-24 hover:bg-btn-secondary btn-outline btn-primary bg-button-gradient bg-200% transition-all duration-500 ease-out hover:bg-right hover:text-white">
						Back
					</x-button>
				</div>
			</div>

			{{-- actions --}}
			<div class="flex justify-end gap-4 ">
				<x-button link="{{ route('dashboard.properties') }}"
					class="hover:text-[white!important] btn-primary max-w-xs btn-outline bg-slide-l">
					<x-icon name="fas.images" />
					<span>Gallery</span>
				</x-button>
				<x-button link="{{ route('dashboard.leases') }}"
					class="hover:text-[white!important] btn-primary max-w-xs btn-outline bg-slide-l">
					<x-icon name="fas.folder" />
					<span>Leases</span>
				</x-button>
				<x-button link="{{ route('leases.create') }}" class="text-white max-w-xs btn-outline bg-green-400 border-green-400">
					<x-icon name="fas.file-lines" />
					<span>Add Lease</span>
				</x-button>
				<x-button link="{{ route('units.create') }}" class="text-white max-w-xs btn-outline bg-green-400 border-green-400">
					<x-icon name="fas.plus" />
					<span>Add Unit</span>
				</x-button>
				<div>
					<x-button link="{{ route('units.create') }}" class="text-white bg-red-400 ">
						<x-icon name="fas.trash" />
					</x-button>
				</div>

			</div>


			<div class="w-full overflow-hidden">
				<livewire:unit-table />
			</div>
			<x-my-modal :title="'Confirm Delete'" :listen="'delete-unit'" :clickAway="true">

				<p class="font-bold text-lg">Unit ID: <span x-text="detail"></span></p>
				<p>Are you sure you want to delete this unit?</p>
				<x-slot:actions>
					<div class="flex gap-4 items-center justify-end">
						<button type="button" class="btn btn-primary" @click="openModal = false">
							Close
						</button>

						<livewire:delete-button :controller="$controller" :redirect="'/dashboard/units'">
					</div>
				</x-slot:actions>
			</x-my-modal>
		</div>
	</x-card>
</x-dashboard-layout>
