@if (Auth::check())
    @include('frontend.index');
@else
    <x-guest-layout>
        <div class="prose container mx-auto flex items-center justify-center h-screen">
            <h1>Guests</h1>
        </div>
    </x-guest-layout>
@endif
