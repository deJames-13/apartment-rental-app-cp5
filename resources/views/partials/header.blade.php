{{-- TODO: HEADER DESIGN --}}
@php
	$page = $page ?? "app";
	$navItems = [
	    ["label" => "Home", "link" => "/"],
	    ["label" => "About", "link" => "/about"],
	    ["label" => "Contact", "link" => "/contact"],
	    ["label" => "Services", "link" => "/services"],
	];
@endphp

<x-nav full-width>
	{{-- start --}}
	<x-slot:brand>
		<x-button class="border-none bg-transparent hover:bg-transparent" link="/"><span
				class="text-lg font-extrabold uppercase">Rent
				App</span></x-button>
	</x-slot:brand>

	{{-- end --}}
	<x-slot:actions>
		<div class="flex items-center space-x-4">
			@switch($page)
				@case("login")
					<x-button class="btn btn-secondary" link="/register">Register</x-button>
				@break

				@case("register")
					<x-button class="btn btn-primary" link="/login">Login</x-button>
				@break

				@default
					<x-button class="btn btn-secondary" link="/register">Join Now</x-button>
				@break
			@endswitch
		</div>
	</x-slot:actions>

</x-nav>
