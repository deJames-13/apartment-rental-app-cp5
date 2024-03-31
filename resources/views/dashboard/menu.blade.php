@props(['minimized' => false])
@php
	$sideMenu = [
	    [
	        'label' => 'Main',
	        'icon' => 'fas.list-alt',
	        'link' => '/dashboard',
	    ],
	    [
	        'label' => 'Properties',
	        'icon' => 'fas.building',
	        'link' => '/dashboard/properties',
	        'submenu' => [
	            [
	                'label' => 'View Properties',
	                'icon' => 'fas.eye',
	                'link' => '/dashboard/properties',
	            ],
	            [
	                'label' => 'Add Property',
	                'icon' => 'fas.plus',
	                'link' => '/properties/create',
	            ],
	            [
	                'label' => 'Search Property',
	                'icon' => 'fas.magnifying-glass',
	                'link' => '/dashboard/properties/search',
	            ],
	        ],
	    ],
	    [
	        'label' => 'Units',
	        'icon' => 'fas.house',
	        'link' => '/dashboard/units',
	        'submenu' => [
	            [
	                'label' => 'View Units',
	                'icon' => 'fas.eye',
	                'link' => '/dashboard/units',
	            ],
	            [
	                'label' => 'Add Units',
	                'icon' => 'fas.plus',
	                'link' => '/units/create',
	            ],
	            [
	                'label' => 'Search Unit',
	                'icon' => 'fas.magnifying-glass',
	                'link' => '/dashboard/units/search',
	            ],
	        ],
	    ],
	    [
	        'label' => 'Transactions',
	        'icon' => 'fas.file-pen',
	        'link' => '/dashboard',
	        'submenu' => [
	            [
	                'label' => 'View Transactions',
	                'icon' => 'fas.eye',
	                'link' => '/transactions',
	            ],
	            [
	                'label' => 'Add Transaction',
	                'icon' => 'fas.plus',
	                'link' => '/transactions/create',
	            ],
	            [
	                'label' => 'Search Transaction',
	                'icon' => 'fas.magnifying-glass',
	                'link' => '/dashboard/transactions/search',
	            ],
	        ],
	    ],
	    [
	        'label' => 'Application',
	        'icon' => 'fas.file-lines',
	        'link' => '/dashboard',
	        'submenu' => [
	            [
	                'label' => 'View Applications',
	                'icon' => 'fas.eye',
	                'link' => '/applications',
	            ],
	            [
	                'label' => 'Add Application',
	                'icon' => 'fas.plus',
	                'link' => '/applications/create',
	            ],
	            [
	                'label' => 'Search Application',
	                'icon' => 'fas.magnifying-glass',
	                'link' => '/dashboard/applications/search',
	            ],
	        ],
	    ],
	    [
	        'label' => 'Reports',
	        'icon' => 'fas.print',
	        'link' => '/dashboard',
	        'submenu' => [
	            [
	                'label' => 'View Application',
	                'icon' => 'fas.eye',
	                'link' => '/reports',
	            ],
	            [
	                'label' => 'Add Application',
	                'icon' => 'fas.plus',
	                'link' => '/reports/create',
	            ],
	            [
	                'label' => 'Search Application',
	                'icon' => 'fas.magnifying-glass',
	                'link' => '/dashboard/application/search',
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

<x-side-menu :sideMenu="$sideMenu" :minimized="$minimized" />
