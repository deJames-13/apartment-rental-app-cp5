@php
	$userRole = auth()->user()->role; // Get the current user's role
$sideMenu = [
    [
        'label' => 'Edit Profile',
        'icon' => 'fas.user',
        'link' => '/profile/edit',
        'roles' => ['admin', 'landlord', 'tenant'],
    ],
    [
        'label' => 'Dashboard',
        'icon' => 'fas.list-alt',
        'link' => '/dashboard',
        'roles' => ['admin', 'landlord', 'tenant'],
    ],
    // [
    //     'label' => 'Settings',
    //     'icon' => 'fas.cog',
    //     'link' => '/dashboard',
    //     'roles' => ['admin', 'landlord', 'tenant'],
    // ],
    [
        'label' => 'Properties',
        'icon' => 'fas.home',
        'link' => '/dashboard',
        'roles' => ['admin', 'landlord'],
        'submenu' => [
            [
                'label' => 'View Properties',
                'icon' => 'fas.eye',
                'link' => '/profile/properties',
            ],
            [
                'label' => 'Add Property',
                'icon' => 'fas.plus',
                'link' => '/properties/create',
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
        'roles' => ['admin', 'landlord'],
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

$sideMenu = array_filter($sideMenu, function ($menuItem) use ($userRole) {
    return isset($menuItem['roles']) && in_array($userRole, $menuItem['roles']);
	});
@endphp

<x-side-menu :sideMenu="$sideMenu" />
