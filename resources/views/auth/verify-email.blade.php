@php
	$isVerified = auth()->user()->hasVerifiedEmail();
@endphp

<div class="relative min-h-screen max-w-screen overflow-hidden">
	<img src="{{ asset('images/rolebg.webp') }}" alt=""
		class="hidden lg:block -z-1 fixed top-0 object-cover w-[150%] max-h-screen bg-fixed bg-cover">
	<div class=" z-10 min-h-screen  grid lg:grid-cols-3">
		<div class="lg:bg-secondary lg:bg-opacity-60 p-16  col-span-2 animate__animated animate__fadeInLeft">
			<div class="h-full flex flex-col justify-center items-center">

				<div class="w-full max-w-lg flex flex-col justify-center h-full">


					<div class="{{ $isVerified ? '' : 'hidden' }} ">
						<h4 class="inline-block px-2 font-bold text-base-content bg-green-400 rounded">
							Success
						</h4>
					</div>
					<h1 class="font-extrabold text-4xl lg:text-6xl lg:text-white">
						Verify Email
					</h1>
					<p class="px-2 max-w-sm my-4 text-base-content">
						{{ $isVerified
						    ? 'Email verification successful! You can now continue to set up your profile.'
						    : 'Verify your email. We have sent a verification link to your email address. Please click on the link to complete the verification process.' }}

					</p>

					<div class="flex gap-6">
						<x-button class="mb-12 btn-primary btn-outline bg-slide-r flex gap-2 items-center" type="button"
							wire:click="resendEmail" x-data="{ isDisabled: false, countdown: 60 }" x-bind:disabled="isDisabled"
							x-on:click="isDisabled = true; let countdownInterval = setInterval(() => { if (countdown > 0) countdown--; else { clearInterval(countdownInterval); isDisabled = false; } }, 1000)">
							<span x-show="isDisabled" class="loading loading-spinner"></span>
							<span x-show="isDisabled" x-text="countdown"></span>
							<span>Resend Email</span>
						</x-button>
						<x-button class="{{ $isVerified ? '' : 'hidden' }} mb-12 bg-transparent bg-slide-r" type="button" @click="step++"
							spinner="save">
							Continue
						</x-button>
					</div>

				</div>
			</div>

		</div>

	</div>
</div>
