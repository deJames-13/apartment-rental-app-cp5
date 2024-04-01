@if (!Auth::check())
	{{-- route to home --}}
@endif


<x-default-layout>

	<div class="h-[250px] bg-gray-400 ">
		<div class="flex items-center justify-center h-full">
			<h1 class="text-6xl font-extrabold text-white">User Profile</h1>
		</div>
	</div>

	<div class="flex min-h-screen gap-8 p-8 m-0">

      <div class="flex flex-col w-full max-w-sm gap-8">


        @include('profile.profile-card')

        @include('profile.menu')

      </div>

		<div class="flex flex-col w-full gap-4 px-10 py-5 border-blue-500 border-xl">

      <x-input label="Username" placeholder="New Username"/>

      <div class="grid grid-cols-2 gap-4">
        <div class="">
          <x-input label="First Name" placeholder="First Name"/>
        </div>
        <div class="">
          <x-input label="Last Name" placeholder="Last Name"/>
        </div>
      </div>

      <x-input label="Email" placeholder="New Email"/>

      <x-input label="Password" placeholder="New Password" icon="o-eye"/>

      <x-input label="Confirm Password" placeholder="Confirm New Password" icon="o-eye"/>

      <x-input label="Occupation" placeholder="New Occupation"/>

      <x-input label="Phone Number" placeholder="New Phone Number"/>

      <div class="grid grid-cols-3 gap-4">
        <div class="col-span-2">
          <x-datepicker label="Date" wire:model="myDate1" icon="o-calendar"/>
        </div>
        <div class="col-span-1">
          <x-input label="Age" placeholder="Age"/>
        </div>
      </div>

      <x-input label="New Address" placeholder="New Address"/>

      <div class="grid grid-cols-3 gap-4">
        <div class="col-span-1">
          <x-input label="City" placeholder="City"/>
        </div>
        <div class="col-span-1">
          <x-input label="Region" placeholder="Region"/>
        </div>
        <div class="col-span-1">
          <x-input label="Country" placeholder="Country"/>
        </div>
      </div>

      <x-input label="New Postal Code" placeholder="New Postal Code"/>

    </div>


	</div>
</x-default-layout>
