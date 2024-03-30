<x-guest-layout>
	<div x-data="{ step: 2 }" x-on:save-success="step = 1"">
		@switch($active)
			@case('register')
				{{-- Step 1 --}}
				<section id="register-form" :class="{ 'hidden': step !== 0 }">
					<livewire:register />
				</section>

				{{-- Step 2 --}}
				<section id="set-role-form" :class="{ 'hidden': step !== 1 }">
					<livewire:set-role />
				</section>

				{{-- Step 3 --}}
				<section id="set-profile-form" :class="{ 'hidden': step !== 2 }">
					<livewire:set-profile />
				</section>

				{{-- Step 4 --}}
				{{-- <section id="set-address-form" :class="{ 'hidden': step !== 3 }">
					<livewire:set-address />
				</section> --}}
			@break

			@case('login')
				<livewire:login />
			@break

			@default
		@endswitch
	</div>

	<script>
		function calculateAge(birthdate) {
			if (birthdate) {
				const dob = new Date(birthdate);
				const diff_ms = Date.now() - dob.getTime();
				const age_dt = new Date(diff_ms);
				const age = Math.abs(age_dt.getUTCFullYear() - 1970);
				console.log(age);
				document.getElementsByName('age')[0].value = age;



				return age;
			}
			return '';
		}
	</script>
</x-guest-layout>
