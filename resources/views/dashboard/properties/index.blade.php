@php
	$controller = \App\Http\Controllers\PropertyListingController::class;
@endphp
<x-dashboard-layout>
	<x-card>
		<div class="flex flex-col space-y-4">
			<div class="flex items-center justify-between mb-12">
				<div class="flex items-center space-x-2 text-2xl font-semibold text-gray-700">
					<x-icon name="fas.building" />
					<h2 class="">Properties</h2>
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
				{{-- <x-button link="{{ route('dashboard.properties') }}" class="max-w-xs btn-primary btn-outline bg-slide-l">
					<x-icon name="fas.images" />
					<span>Gallery</span>
				</x-button> --}}
				<x-button link="{{ route('units.create') }}" class="max-w-xs text-white bg-green-400 border-green-400 btn-outline">
					<x-icon name="fas.home" />
					<span>Add Unit</span>
				</x-button>
				<x-button link="{{ route('properties.create') }}"
					class="max-w-xs text-white bg-green-400 border-green-400 btn-outline">
					<x-icon name="fas.plus" />
					<span>Add Property</span>
				</x-button>
				<div>
					<x-button link="{{ route('dashboard.properties') . '?page=trashed' }}" class="text-white bg-red-400 ">
						<x-icon name="fas.trash" />
					</x-button>
				</div>

			</div>


			<div class="w-full overflow-hidden">
				<livewire:property-table />
			</div>
			<x-my-modal :title="'Confirm Delete'" :listen="'delete-property'" :clickAway="true">

				<p class="text-lg font-bold">Property ID: <span x-text="detail"></span></p>
				<p>Are you sure you want to delete this property?</p>
				<x-slot:actions>
					<div class="flex items-center justify-end gap-4">
						<button type="button" class="btn btn-primary" @click="openModal = false">
							Close
						</button>

						<livewire:delete-button :controller="$controller" :redirect="'/dashboard/properties'">
					</div>
				</x-slot:actions>
			</x-my-modal>

		</div>
	</x-card>
</x-dashboard-layout>
