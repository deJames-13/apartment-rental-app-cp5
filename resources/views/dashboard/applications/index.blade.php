@php
	$controller = \App\Http\Controllers\LeaseController::class;
@endphp

<x-dashboard-layout>

	<x-card>
		<div class="flex flex-col space-y-4">
			<div class="flex items-center justify-between mb-12">
				<div class="flex items-center space-x-2 text-2xl font-semibold text-gray-700">
					<x-icon name="fas.building" />
					<h2 class="">Applications</h2>
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

				<x-button link="{{ route('applications.new') }}"
					class="max-w-xs text-white bg-green-400 border-green-400 btn-outline">
					<x-icon name="fas.file-pen" />
					<span>New Application</span>
				</x-button>
				<div>
					<x-button link="{{ route('dashboard.applications') }}" class="text-white bg-red-400 ">
						<x-icon name="fas.trash" />
						Archived
					</x-button>
				</div>

			</div>


			<div class="w-full overflow-hidden">
				<livewire:application-table />
			</div>

			<x-my-modal :title="'Confirm Delete'" :listen="'delete-lease'" :clickAway="true">

				<p class="text-lg font-bold">Applicition ID: <span x-text="detail"></span></p>
				<p>Are you sure you want to delete this application?</p>
				<span class="text-xs italic underline ">
					You can restore it later.

				</span>
				<x-slot:actions>
					<div class="flex items-center justify-end gap-4">
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
