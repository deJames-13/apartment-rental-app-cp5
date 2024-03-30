@php
	$sideMenu = [
	    [
	        'label' => 'Edit Profile',
	        'icon' => 'fas.user',
	        'link' => '/profile/edit',
	    ],
	    [
	        'label' => 'Dashboard',
	        'icon' => 'fas.list-alt',
	        'link' => '/profile/dashboard',
	    ],
	    [
	        'label' => 'Settings',
	        'icon' => 'fas.cog',
	        'link' => '/profile/dashboard',
	    ],
	    [
	        'label' => 'Properties',
	        'icon' => 'fas.home',
	        'link' => '/profile/dashboard',
	        'submenu' => [
	            [
	                'label' => 'View Properties',
	                'icon' => 'fas.eye',
	                'link' => '/profile/properties',
	            ],
	            [
	                'label' => 'Add Property',
	                'icon' => 'fas.plus',
	                'link' => '/profile/properties/add',
	            ],
	            [
	                'label' => 'Search Property',
	                'icon' => 'fas.magnifying-glass',
	                'link' => '/profile/properties/search',
	            ],
	        ],
	    ],
	    [
	        'label' => 'Units',
	        'icon' => 'fas.list-alt',
	        'link' => '/profile/dashboard',
	        'submenu' => [
	            [
	                'label' => 'View Units',
	                'icon' => 'fas.eye',
	                'link' => '/profile/units',
	            ],
	            [
	                'label' => 'Add Units',
	                'icon' => 'fas.plus',
	                'link' => '/profile/units/add',
	            ],
	            [
	                'label' => 'Search Unit',
	                'icon' => 'fas.magnifying-glass',
	                'link' => '/profile/properties/search',
	            ],
	        ],
	    ],
	    [
	        'label' => 'Bookmark',
	        'icon' => 'fas.bookmark',
	        'link' => '/bookmarks',
	    ],
	];
@endphp



{{-- Profile Menu --}}
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
