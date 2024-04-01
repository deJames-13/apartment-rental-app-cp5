@props([
    'sideMenu' => null,
    'minimized' => false,
])

@if ($sideMenu)
	<x-card class="relative z-0 {{ $minimized ? 'border  p-[0!important]' : '' }}">

		<div class="w-full menu">

			@foreach ($sideMenu as $item)
				@if (isset($item['submenu']))
					<x-dropdown
						class="w-full text-gray-600 bg-transparent border-none {{ $minimized ? 'justify-center' : 'justify-end' }} flex-row-reverse"
						label="{{ $minimized ? '' : $item['label'] }}" icon="{{ $item['icon'] }}">
						@foreach ($item['submenu'] as $subItem)
							<x-menu-item link="{{ $subItem['link'] }}" icon="{{ $subItem['icon'] }}"
								label="{{ $minimized ? '' : $subItem['label'] }}" class="justify-start text-gray-600 btn-ghost" />
						@endforeach
					</x-dropdown>
				@else
					{{-- Menu without Submenu --}}
					<x-button link="{{ $item['link'] }}" icon="{{ $item['icon'] }}" label="{{ $minimized ? '' : $item['label'] }}"
						class="text-gray-600 btn-ghost {{ $minimized ? 'justify-center' : 'justify-start' }}" />
				@endif
				<div class="p-0 m-0 divider"></div>
			@endforeach
			{{-- LOGOUT --}}
			<livewire:logout :minimized="$minimized" />
		</div>

	</x-card>

@endif
