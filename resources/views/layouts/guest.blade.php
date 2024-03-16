<x-app-layout>
    @include('partials.header')
    <div>
        {{ $slot }}
    </div>
</x-app-layout>
