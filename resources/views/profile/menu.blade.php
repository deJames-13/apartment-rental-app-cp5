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
	        'link' => '/dashboard',
	    ],
	    [
	        'label' => 'Settings',
	        'icon' => 'fas.cog',
	        'link' => '/dashboard',
	    ],
	    [
	        'label' => 'Properties',
	        'icon' => 'fas.home',
	        'link' => '/dashboard',
	        'submenu' => [
	            [
	                'label' => 'View Properties',
	                'icon' => 'fas.eye',
	                'link' => '/profile/properties',
	            ],
	            [
	                'label' => 'Add Property',
	                'icon' => 'fas.plus',
	                'link' => '/properties/posts/create',
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
	                'link' => '/units/create',
	            ],
	            [
	                'label' => 'Search Unit',
	                'icon' => 'fas.magnifying-glass',
	                'link' => '/profile/units/search',
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

<x-side-menu :sideMenu="$sideMenu" />
