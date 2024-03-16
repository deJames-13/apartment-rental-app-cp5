<x-guest-layout>
    <div class="container grid max-w-xl p-6 mx-auto prose place-items-center lg:prose-xl">
        <x-form class='w-full py-6' method='post' action='/store'>
            @csrf
            <h1>Register</h1>
            <div class="flex gap-4">
                <x-form-input label="First Name" field='first_name' />
                <x-form-input label="Last Name" field='last_name' />
            </div>
            <x-form-input label="Username" type='text' field='username' />
            <x-form-input label="Email" type='email' field='email' />
            <x-form-input label="Password" type='password' field='password' />
            <x-form-input label="Confirm Password" type='password' field='password_confirmation' />
            <x-slot:actions>
                <x-button type='submit' class='px-6 btn btn-primary '>Register</x-button>
            </x-slot:actions>
        </x-form>
    </div>
</x-guest-layout>
