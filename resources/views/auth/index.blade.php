<x-app-layout>
    <div>

        <!--Page Title-->
        <section class="w-full flex justify-center py-8 border-b-2">
            <div class='prose'>
                <h1>
                    RENT APP
                </h1>
            </div>
        </section>
        <!--End Page Title-->
        <x-card class="mx-auto my-6 container max-w-xl">
            <div role="tablist" class="tabs tabs-boxed">
                <x-button link='/login' role="tab"
                    class="tab btn-sm {{ $active === 'login' ? 'tab-active' : '' }}">Login</x-button>
                <x-button link='/register'
                    class="tab btn-sm {{ $active === 'register' ? 'tab-active' : '' }}">Register</x-button>
            </div>
            @switch($active)
                @case('register')
                    <livewire:register />
                @break

                @case('login')
                    <livewire:login />
                @break

                @default
            @endswitch



        </x-card>
    </div>
</x-app-layout>
