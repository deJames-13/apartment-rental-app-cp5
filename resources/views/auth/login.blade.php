<div class="container grid max-w-xl p-6 mx-auto prose place-items-center lg:prose-xl">
    <x-form class='w-full py-6' method='post' action='/store'>
        @csrf
        <x-input label="Username" type='text' field='username' />
        <x-input label="Email" type='email' field='email' />
        <x-input label="Password" wire:model="password" icon="o-key" type="password" />
        <x-slot:actions>
            <x-button type="submit" spinner="save" class='w-full px-6 btn btn-primary '>LOG IN</x-button>
        </x-slot:actions>
    </x-form>
    <p class="text-xs">Doesn't have an account?
        <x-button link='login' class='link bg-transparent border-none hover:bg-transparent p-1'>
            Register
        </x-button>

    </p>
</div>
