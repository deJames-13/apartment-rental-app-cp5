{{-- TODO: HEADER DESIGN --}}

<div class="w-full navbar bg-base-100">
    <div class="navbar-start">
        <x-dropdown class="">
            <x-slot:trigger>
                <x-button icon="jam.menu" class="rounded btn btn-ghost lg:hidden" />
            </x-slot:trigger>

            <x-menu-item title="Home" />
            <x-menu-item title="About Us" />
        </x-dropdown>
        <a class="text-xl btn btn-ghost">rent</a>
    </div>
    <div class="hidden navbar-center lg:flex">
    </div>
    <div class="navbar-end">
        {{-- if guest --}}
        <a href="{{ route('login') }}" class="btn btn-ghost">Login</a>
        <a href="{{ route('register') }}" class="btn btn-ghost">Register</a>
        {{-- if auth --}}
        <x-dropdown class="hidden lg:flex">
            <x-slot:trigger>
                <x-button icon="jam.user" class="rounded btn btn-ghost" />
            </x-slot:trigger>

            <x-menu-item title="Profile" />
            <x-menu-item title="Settings" />
            <x-menu-item title="Logout" />
        </x-dropdown>
    </div>
</div>
