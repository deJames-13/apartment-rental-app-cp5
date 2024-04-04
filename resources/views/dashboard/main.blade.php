@php
@endphp
<x-card title="Main Page">
	<div class="p-0 m-0 divider"></div>
	<div class="min-h-screen">
		@include('profile.status-card')

		@if (auth()->user()->role == 'landlord')
			<div class="flex flex-col items-center justify-center w-full gap-6">
				<div class="w-full max-w-lg">

					<livewire:my-chart title="Properties" :data="$propertyListingData" />
				</div>
				<div class="w-full max-w-lg">

					<livewire:my-chart title="Units" :data="$unitsData" />
				</div>
				<div class="w-full max-w-lg">
					<livewire:my-chart title="Transactions" :data="$transactionsData" :charts="['chart', 'bar']" />
				</div>
			</div>
		@endif

	</div>
</x-card>
