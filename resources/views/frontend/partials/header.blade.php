@php
	$page = $page ?? 'app';
	$navItems = [
	    ['label' => 'Home', 'link' => '/home'],
	    [
	        'label' => 'Property',
	        'link' => '/properties',
	        'submenu' => [
	            ['label' => 'All Properties', 'link' => '/properties'],
	            ['label' => 'Post Property', 'link' => '/properties/posts/create'],
	            ['label' => 'Property Posts', 'link' => '/properties/posts'],
	            ['label' => 'Categories', 'link' => '/properties/category'],
	            ['label' => 'Popular Properties', 'link' => '/properties/popular'],
	        ],
	    ],
	    [
	        'label' => 'Units',
	        'link' => '/units',
	        'submenu' => [
	            ['label' => 'All Units', 'link' => '/units'],
	            ['label' => 'Post Unit', 'link' => '/unit/posts/create'],
	            ['label' => 'Unit Posts', 'link' => '/units/posts'],
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
	            ['label' => 'Change Email', 'link' => '/change-email'],
	            ['label' => 'Change Password', 'link' => '/change-password'],
	        ],
	    ],
	];

@endphp

<x-nav class="border-b-2 border-secondary relative z-50" full-width>
	{{-- start --}}
	<x-slot:brand>
		<div class="block lg:hidden">
			@include('frontend.partials.mobile-header')
		</div>

		<x-button class="border-none bg-transparent hover:bg-transparent" link="/">
			<span class="text-lg font-extrabold uppercase">Rent
				App
			</span>
		</x-button>
	</x-slot:brand>

	{{-- end --}}
	<x-slot:actions>
		<div class="hidden items-center space-x-4 lg:flex">
			{{-- Menu and Sub Menus --}}
			@foreach ($navItems as $item)
				@if (isset($item['submenu']))
					<div class="dropdown-end dropdown-hover dropdown transition duration-200 ease-in-out">
						<x-button
							class="bg-transparent border-none m-0 p-0 shadow-none hover:bg-transparent link flex items-center gap-2 font-bold no-underline hover:font-extrabold hover:text-primary"
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
										class="animate__animated animate__fadeIn transition-all duration-300 ease-in-out hover:font-bold hover:text-primary font-normal bg-transparent border-none"
										link="{{ $subItem['link'] }}">
										{{ $subItem['label'] }}
									</x-button>
								</li>
							@endforeach
						</ul>
					</div>
				@else
					<x-button
						class="link flex items-center m-0 p-0 shadow-none font-bold no-underline hover:bg-transparent hover:font-extrabold hover:text-primary  bg-transparent border-none"
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
		<x-button link="/profile" class="avatar bg-transparent border-none hover:bg-transparent">
			<div class="w-9 rounded ring ring-primary ring-offset-base-100 ring-offset-2">
				<img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
			</div>
		</x-button>
		{{-- logout button form --}}
		<livewire:logout />

	</x-slot:actions>

</x-nav>
