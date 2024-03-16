<div class="container grid max-w-xl p-6 mx-auto prose place-items-center lg:prose-xl">
    <x-form class='w-full py-6' method='post' action='/store'>
        @csrf
        <x-form-input label="Username" type='text' field='username' />
        <x-form-input label="Email" type='email' field='email' />
        <x-form-input label="Password" type='password' field='password' />
        <x-slot:actions>
            <x-button type='submit' class='w-full px-6 btn btn-primary '>LOG IN</x-button>
        </x-slot:actions>
    </x-form>
    <p class="text-xs">Doesn't have an account?
        <x-button link='login' class='link bg-transparent border-none hover:bg-transparent p-1'>
            Register
        </x-button>

    </p>
</div>
