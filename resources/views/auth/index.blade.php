<x-guest-layout>
	</section>
	@switch($active)
		@case('register')
			<livewire:register />
		@break

		@case('login')
			<livewire:login />
		@break

		@case('set-role')
			<livewire:set-role />
		@break

		@default
	@endswitch
</x-guest-layout>
