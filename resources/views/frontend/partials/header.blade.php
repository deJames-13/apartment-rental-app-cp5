@php
	$user = auth()->user();
	$user_image = Storage::url($user->image_path) ?? 'images/author.jpg';
	$page = $page ?? 'app';
	$navItems = [
	    ['label' => 'Home', 'link' => '/home'],
	    [
	        'label' => 'Property',
	        'link' => '/properties',
	        'submenu' => [
	            ['label' => 'All Properties', 'link' => '/properties'],
	            ['label' => 'Post Property', 'link' => '/properties/create'],
	            ['label' => 'Categories', 'link' => '/properties/category'],
	            ['label' => 'Popular Properties', 'link' => '/properties/popular'],
	        ],
	    ],
	    [
	        'label' => 'Units',
	        'link' => '/units',
	        'submenu' => [
	            ['label' => 'All Units', 'link' => '/units'],
	            ['label' => 'Post Unit', 'link' => '/units/create'],
	            ['label' => 'Categories', 'link' => '/units/category'],
	            ['label' => 'Popular Units', 'link' => '/units/popular'],
	        ],
	    ],
	    ['label' => 'Contact', 'link' => '/contact'],
	    ['label' => 'About', 'link' => '/about'],
	    [
	        'label' => 'Profile',
	        'link' => '/profile',
	        'submenu' => [
	            ['label' => 'View Profile', 'link' => '/profile'],
	            ['label' => 'Edit Profile', 'link' => '/profile/edit'],
	            ['label' => 'Dashboard', 'link' => '/dashboard'],
	            ['label' => 'Change Email', 'link' => '/change-email'],
	            ['label' => 'Change Password', 'link' => '/change-password'],
	        ],
	    ],
	];

@endphp

<x-nav class="relative z-50 border-b-2 border-secondary" full-width>
	{{-- start --}}
	<x-slot:brand>
		<div class="block lg:hidden">
			@include('frontend.partials.mobile-header')
		</div>

		<x-button class="bg-transparent border-none hover:bg-transparent" link="/">
			<span class="text-lg font-extrabold uppercase">Rent
				App
			</span>
		</x-button>
	</x-slot:brand>

	{{-- end --}}
	<x-slot:actions>
		<div class="items-center hidden space-x-4 lg:flex">
			{{-- Menu and Sub Menus --}}
			@foreach ($navItems as $item)
				@if (isset($item['submenu']))
					<div class="transition duration-200 ease-in-out dropdown-end dropdown-hover dropdown">
						<x-button
							class="flex items-center gap-2 p-0 m-0 font-bold no-underline bg-transparent border-none shadow-none hover:bg-transparent link hover:font-extrabold hover:text-primary"
							link="{{ $item['link'] }}" role="button" tabindex="0">
							<span>
								{{ $item['label'] }}
							</span>
							<x-icon name='fas.angle-down' />
						</x-button>

						<ul
							class="menu dropdown-content z-[1] mt-5 w-52 rounded-box border-t-2 border-primary bg-base-100 p-2 shadow transition duration-300 ease-in-out"
							tabindex="0">
							@foreach ($item['submenu'] as $subItem)
								<li>
									<x-button
										class="font-normal transition-all duration-300 ease-in-out bg-transparent border-none animate__animated animate__fadeIn hover:font-bold hover:text-primary"
										link="{{ $subItem['link'] }}">
										{{ $subItem['label'] }}
									</x-button>
								</li>
							@endforeach
						</ul>
					</div>
				@else
					<x-button
						class="flex items-center p-0 m-0 font-bold no-underline bg-transparent border-none shadow-none link hover:bg-transparent hover:font-extrabold hover:text-primary"
						role="button" tabindex="0" link="{{ $item['link'] }}">
						<span>
							{{ $item['label'] }}

						</span>
					</x-button>
				@endif

				<div class="divider divider-horizontal"></div>
			@endforeach

		</div>

		{{-- User Image --}}
		<x-button link="/profile" class="bg-transparent border-none avatar hover:bg-transparent">
			<div class="rounded w-9 ring ring-primary ring-offset-base-100 ring-offset-2">
				<img src="{{ $user_image }}" />
			</div>
		</x-button>
		{{-- logout button form --}}
		<livewire:logout />

	</x-slot:actions>

</x-nav>
