<x-dashboard-layout>
	<x-card>
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

		<x-table-card :title="''" :data="$properties" :columns="$columns">

		</x-table-card>
	</x-card>
</x-dashboard-layout>
