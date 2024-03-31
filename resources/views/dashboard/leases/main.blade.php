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
				<x-button link="{{ route('leases.create') }}" class="text-white bg-red-400 ">
					<x-icon name="fas.trash" />
				</x-button>
			</div>

		</div>


		<div class="w-full overflow-hidden">
			<livewire:leases-table />
		</div>

		<div x-data="{ openModal: false, rowId: null }" x-on:delete-lease.window="openModal = true, rowId = $event.detail">
			<!-- Button to open the modal -->
			{{-- <button @click="openModal = true" class="btn btn-primary">Open Modal</button> --}}

			<!-- Modal -->
			<div x-show="openModal" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
				aria-modal="true">
				<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
					<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

					<!-- Modal content -->
					<div
						class="animate__animated animate__bounceInDown delay-100 inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
						<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
							<h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
								Modal Title
							</h3>
							<div class="mt-2">
								<p class="text-sm text-gray-500">
									Your modal content goes here.
								</p>
							</div>
							<p x-text="'Row ID: ' + rowId"></p>
						</div>
						<div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
							<button type="button" class="btn btn-primary" @click="openModal = false">
								Close
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</x-card>
