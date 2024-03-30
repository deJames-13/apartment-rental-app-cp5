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
	                'link' => '/properties/posts/create',
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
	                'link' => '/units/posts/create',
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
	        'icon' => 'fas.folder',
	        'link' => '/dashboard',
	        'submenu' => [
	            [
	                'label' => 'View Transactions',
	                'icon' => 'fas.eye',
	                'link' => '/dashboard/transactions',
	            ],
	            [
	                'label' => 'Add Transaction',
	                'icon' => 'fas.plus',
	                'link' => '/dashboard/transaction/add',
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
	        'icon' => 'fas.file-pen',
	        'link' => '/dashboard',
	        'submenu' => [
	            [
	                'label' => 'View Applications',
	                'icon' => 'fas.eye',
	                'link' => '/dashboard/applications',
	            ],
	            [
	                'label' => 'Add Application',
	                'icon' => 'fas.plus',
	                'link' => '/dashboard/applications/add',
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
	                'label' => 'View Units',
	                'icon' => 'fas.eye',
	                'link' => '/dashboard/application',
	            ],
	            [
	                'label' => 'Add Application',
	                'icon' => 'fas.plus',
	                'link' => '/dashboard/application/add',
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

<x-side-menu :sideMenu="$sideMenu" />
