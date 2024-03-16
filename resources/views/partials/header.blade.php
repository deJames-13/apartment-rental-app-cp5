{{-- TODO: HEADER DESIGN --}}
<x-nav sticky full-width>

    <x-slot:brand>
        {{-- Drawer toggle for "main-drawer" --}}
        <label for="main-drawer" class="lg:hidden mr-3">
            <x-icon name="o-bars-3" class="cursor-pointer" />
        </label>

        {{-- Brand --}}
        <span class='font-extrabold uppercase text-lg'>RENTAPP</span>
    </x-slot:brand>

    {{-- Right side actions --}}
    <x-slot:actions>
        <x-button label="Log In" icon="o-arrow-right-on-rectangle" link="/login" class="btn-ghost btn-sm" responsive />
        <x-button label="Register" link="/register" class="btn-ghost btn-sm" responsive />
    </x-slot:actions>
</x-nav>
