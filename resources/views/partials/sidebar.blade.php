{{-- TODO: SIDEBAR DESIGN --}}
{{-- SIDEBAR --}}
<x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">

    {{-- BRAND --}}
    <div class="pt-5 ml-5">RenTangina</div>

    {{-- MENU --}}
    <x-menu activate-by-route>

        {{-- User --}}
        @if ($user = auth()->user())
            <x-menu-separator />

            <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover
                class="-mx-2 !-my-2 rounded">
                <x-slot:actions>
                    <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" no-wire-navigate
                        link="/logout" />
                </x-slot:actions>
            </x-list-item>

            <x-menu-separator />
        @endif

        <x-menu-item title="Hello" icon="o-sparkles" link="/" />
        <x-menu-sub title="Settings" icon="o-cog-6-tooth">
            <x-menu-item title="Wifi" icon="o-wifi" link="####" />
            <x-menu-item title="Archives" icon="o-archive-box" link="####" />
        </x-menu-sub>
    </x-menu>
</x-slot:sidebar>
