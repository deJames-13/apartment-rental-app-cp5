@php
@endphp
<x-card title="Main Page">
	<div class="p-0 m-0 divider"></div>
	<div class="min-h-screen">
		@include('profile.status-card')

		<div class="flex gap-4">

			<livewire:my-chart title="Properties" :data="$propertyListingData" />
			<livewire:my-chart title="Units" :data="$unitsData" />
			<livewire:my-chart title="Transactions" :data="$transactionsData" />
		</div>


	</div>
</x-card>
