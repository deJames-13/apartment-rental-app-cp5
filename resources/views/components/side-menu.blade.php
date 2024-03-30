@props([
    'sideMenu' => null,
])

@if ($sideMenu)
	<x-card>
		<div class="menu w-full">
			@foreach ($sideMenu as $item)
				@if (isset($item['submenu']))
					<x-dropdown class="w-full text-gray-600 bg-transparent border-none justify-end flex-row-reverse"
						label="{{ $item['label'] }}" icon="{{ $item['icon'] }}">
						@foreach ($item['submenu'] as $subItem)
							<x-menu-item link="{{ $subItem['link'] }}" icon="{{ $subItem['icon'] }}" label="{{ $subItem['label'] }}"
								class="text-gray-600 btn-ghost justify-start" />
						@endforeach
					</x-dropdown>
				@else
					{{-- Menu without Submenu --}}
					<x-button link="{{ $item['link'] }}" icon="{{ $item['icon'] }}" label="{{ $item['label'] }}"
						class="text-gray-600 btn-ghost justify-start" />
				@endif
				<div class="divider m-0 p-0"></div>
			@endforeach
			{{-- LOGOUT --}}
			<livewire:logout />
		</div>

	</x-card>

@endif
