{{-- TODO: HEADER DESIGN --}}
@php
    $page = $page ?? 'app';
    $navItems = [
        ['label' => 'Home', 'link' => '/'],
        ['label' => 'About', 'link' => '/about'],
        ['label' => 'Contact', 'link' => '/contact'],
        ['label' => 'Services', 'link' => '/services'],
    ];
@endphp

<x-nav full-width>
    {{-- start --}}
    <x-slot:brand>
        <x-button link="/" class="border-none hover:bg-transparent bg-transparent "><span
                class="font-extrabold uppercase text-lg">Rent
                App</span></x-button>
    </x-slot:brand>



    {{-- end --}}
    <x-slot:actions>
        <div class="flex items-center space-x-4">
            @switch($page)
                @case('login')
                    <x-button link="/register" class="btn btn-secondary">Register</x-button>
                @break

                @case('register')
                    <x-button link="/login" class="btn btn-primary">Login</x-button>
                @break

                @default
                    <x-button link="/register" class="btn btn-secondary">Join Now</x-button>
                @break
            @endswitch
        </div>
    </x-slot:actions>


</x-nav>
