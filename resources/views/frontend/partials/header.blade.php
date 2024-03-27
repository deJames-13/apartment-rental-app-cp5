@php
	$page = $page ?? "app";
	$navItems = [
	    ["label" => "Home", "link" => "/"],
	    [
	        "label" => "Property",
	        "link" => "/properties",
	        "submenu" => [
	            ["label" => "All Properties", "link" => "/properties"],
	            ["label" => "Post Property", "link" => "/properties/posts/create"],
	            ["label" => "Property Posts", "link" => "/properties/posts"],
	            ["label" => "Categories", "link" => "/properties/category"],
	            ["label" => "Popular Properties", "link" => "/properties/popular"],
	        ],
	    ],
	    [
	        "label" => "Units",
	        "link" => "/units",
	        "submenu" => [
	            ["label" => "All Units", "link" => "/units"],
	            ["label" => "Post Unit", "link" => "/unit/posts/create"],
	            ["label" => "Unit Posts", "link" => "/units/posts"],
	            ["label" => "Categories", "link" => "/units/category"],
	            ["label" => "Popular Units", "link" => "/units/popular"],
	        ],
	    ],
	    ["label" => "Contact", "link" => "/contact"],
	    ["label" => "About", "link" => "/about"],
	    [
	        "label" => "Profile",
	        "link" => "/profile",
	        "submenu" => [
	            ["label" => "View Profile", "link" => "/profile"],
	            ["label" => "Edit Profile", "link" => "/profile/edit"],
	            ["label" => "Change Email", "link" => "/change-email"],
	            ["label" => "Change Password", "link" => "/change-password"],
	        ],
	    ],
	];

@endphp

<x-nav class="border-b-2 border-secondary" full-width>
	{{-- start --}}
	<x-slot:brand>
		<div class="block lg:hidden">
			@include("frontend.partials.mobile-header")
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
				@if (isset($item["submenu"]))
					<div class="dropdown-end dropdown-hover dropdown transition duration-200 ease-in-out">
						<div class="link flex items-center gap-2 font-bold no-underline hover:font-extrabold hover:text-primary"
							role="button" tabindex="0">
							<span>
								{{ $item["label"] }}

							</span>
							<x-icon name='fas.angle-down' />
						</div>

						<ul
							class="menu dropdown-content z-[1] mt-5 w-52 rounded-box border-t-2 border-primary bg-base-100 p-2 shadow transition duration-300 ease-in-out"
							tabindex="0">
							@foreach ($item["submenu"] as $subItem)
								<li class='transition duration-500 ease-in-out'>
									<a href="{{ $subItem["link"] }}">
										{{ $subItem["label"] }}
									</a>
								</li>
							@endforeach
						</ul>
					</div>
				@else
					<div class="link font-bold no-underline hover:font-extrabold hover:text-primary" role="button" tabindex="0">
						{{ $item["label"] }}
					</div>
				@endif

				<div class="divider divider-horizontal"></div>
			@endforeach

		</div>

		{{-- logout button form --}}
		<livewire:logout />

	</x-slot:actions>

</x-nav>
