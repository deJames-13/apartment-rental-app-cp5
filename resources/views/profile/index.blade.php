@if (!Auth::check())
	{{-- route to home --}}
@endif

@php
	$user = auth()->user();
	$user_image = Storage::url($user->image_path) ?? 'images/author.jpg';
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

<x-default-layout>

	<div class="h-[250px] bg-gray-400 ">
		<div class="flex h-full items-center justify-center">
			<h1 class="text-6xl font-extrabold text-white">User Profile</h1>
		</div>
	</div>

	<div class="min-h-screen p-8 flex gap-8  m-0">

		<div class="max-w-sm w-full flex flex-col gap-8">
			<x-card :title="'User Profile'">
				<div class="flex space-x-4 pb-2 items-center">
					{{-- User Image --}}
					<div class="avatar">
						<div class="w-20 rounded ring ring-primary ring-offset-base-100 ring-offset-2">
							<img src="{{ $user_image }}" />
						</div>
					</div>
					<div class="flex flex-col">
						<h2 class="font-bold text-lg">
							{{ $user->first_name . ' ' . $user->last_name }}
						</h2>
						<p class="font-medium text-gray-400">
							{{ $user->email }}
						</p>
					</div>
				</div>

			</x-card>

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
		</div>

		<div class="w-full flex flex-col gap-8">
			<x-card title="Application Status">
				<div class="grid grid-cols-3 h-full gap-4">
					<div class="flex gap-4 items-center h-full">
						<div class="card rounded-none bg-green-400 p-4 text-white">
							<h1 class="font-extrabold text-4xl">
								0
							</h1>
							<h1 class="font-medium text-xl">
								Approved applications
							</h1>
						</div>
					</div>
					<div class="flex gap-4 items-center h-full">
						<div class="card rounded-none bg-yellow-400 p-4 text-white">
							<h1 class="font-extrabold text-4xl">
								0
							</h1>
							<h1 class="font-medium text-xl">
								Pending approved applications
							</h1>
						</div>
					</div>
					<div class="flex gap-4 items-center h-full">
						<div class="card rounded-none bg-red-400 p-4 text-white">
							<h1 class="font-extrabold text-4xl">
								0
							</h1>
							<h1 class="font-medium text-xl">
								Rejected applications
							</h1>
						</div>
					</div>
				</div>
			</x-card>

			<x-card title="Activity Logs">
				<div class="divider m-0 p-0"></div>

			</x-card>
		</div>


	</div>
</x-default-layout>
