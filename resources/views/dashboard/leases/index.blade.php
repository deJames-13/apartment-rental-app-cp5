@php
	$controller = \App\Http\Controllers\LeaseController::class;
@endphp

<x-dashboard-layout>

	<x-card>
		<div class="flex flex-col space-y-4">
			<div class="flex items-center justify-between mb-12">
				<div class="flex space-x-2 items-center text-2xl font-semibold text-gray-700">
					<x-icon name="fas.building" />
					<h2 class=" ">Leases</h2>
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

				<x-button link="{{ route('leases.create') }}" class="text-white max-w-xs btn-outline bg-green-400 border-green-400">
					<x-icon name="fas.file-lines" />
					<span>Add Lease</span>
				</x-button>
				<div>
					<x-button link="{{ route('dashboard.leases') . '?page=trashed' }}" class="text-white bg-red-400 ">
						<x-icon name="fas.trash" />
					</x-button>
				</div>

			</div>


			<div class="w-full overflow-hidden">
				<livewire:leases-table />
			</div>

			<x-my-modal :title="'Confirm Delete'" :listen="'delete-lease'" :clickAway="true">

				<p class="font-bold text-lg">Lease ID: <span x-text="detail"></span></p>
				<p>Are you sure you want to delete this lease?</p>
				<x-slot:actions>
					<div class="flex gap-4 items-center justify-end">
						<button type="button" class="btn btn-primary" @click="openModal = false">
							Close
						</button>

						<livewire:delete-button :controller="$controller" :redirect="'/dashboard/leases'">
					</div>
				</x-slot:actions>
			</x-my-modal>

		</div>
	</x-card>

</x-dashboard-layout>
