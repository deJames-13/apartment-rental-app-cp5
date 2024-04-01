<div class="z-1 container relative my-8" x-data="{ activeTab: 'Tab 2' }">
	<div class="tabs-md tabs w-1/5 gap-1 text-center md:tabs-lg lg:mx-auto" role="tablist">
		<a :class="{ 'tab-active bg-secondary text-white transition-all duration-300 ease-in-out ': activeTab !== 'Tab 1' }"
			@click="activeTab = 'Tab 1'" class="tab rounded-t-lg bg-base-100 font-bold transition-all ease-in hover:bg-primary"
			role="tab" wire:click='setToProperties'>
			Properties
		</a>
		<a :class="{ 'tab-active bg-secondary text-white transition-all duration-300 ease-in-out ': activeTab !== 'Tab 2' }"
			@click="activeTab = 'Tab 2'" class="tab rounded-t-lg bg-base-100 font-bold transition-all ease-in hover:bg-primary"
			role="tab" wire:click='setToUnit'>
			Units
		</a>
	</div>

	<div class="flex w-full flex-col justify-between rounded-b-lg rounded-r-lg bg-base-100 lg:flex-row lg:rounded-lg">

		{{-- PROPERTY --}}
		<div class="animate__animated animate__zoomIn container p-8" x-show="activeTab === 'Tab 1'">
			<div class="grid w-full grid-cols-1 items-end gap-3 lg:grid-cols-3 lg:gap-6">

				<x-input icon="o-magnifying-glass" label="Search Property" placeholder="Search by property name" />
				<x-input icon="o-magnifying-glass" label="Search Location" placeholder="Search by location" />

				<div class="flex flex-col space-y-2 text-sm font-bold">
					<label for="property_type">{{ $selected_ptype }}</label>
					<input type="hidden" id="property_type">
					<x-dropdown class="btn-outline btn-primary w-full justify-start font-normal text-black" label="ALL TYPE">
						@foreach ($property_types as $type)
							<x-menu-item class="w-full" title="{{ $type }}" />
						@endforeach
					</x-dropdown>
				</div>
			</div>
		</div>

		{{-- units --}}
		<div class="animate__animated animate__zoomIn container w-full p-8" x-show="activeTab === 'Tab 2'">
			<div class="grid w-full grid-cols-1 items-end gap-3 lg:grid-cols-3 lg:gap-6">

				<x-input icon="o-magnifying-glass" wire:model='' label="Search Unit" placeholder="Search by unit name" />
				<x-input icon="o-magnifying-glass" wire:model='' label="Search Location" placeholder="Search by location" />


				<div class="flex flex-col space-y-2 text-sm font-bold">
					<label for="">{{ $selected_ptype }}</label>
					<x-dropdown class="btn-outline btn-primary w-full justify-start font-normal text-black" label="ALL TYPE">
						@foreach ($unit_types as $type)
							<x-menu-item class="w-full" title="{{ $type }}" />
						@endforeach
					</x-dropdown>
				</div>
			</div>
		</div>
		<div wire:click="search"
			class="hover:bg-btn-secondary btn-outline flex items-center justify-center space-x-2 rounded-b-lg bg-secondary bg-button-gradient bg-200% p-4 px-8 font-bold text-black transition-all duration-500 ease-in-out hover:bg-right hover:text-white lg:rounded-l-none lg:rounded-r-lg">
			<x-heroicon-o-magnifying-glass class="h-6 w-6" />
			<span class="">Search</span>
		</div>
	</div>
</div>
