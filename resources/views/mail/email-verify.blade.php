<x-app-layout>
	<div class="relative min-h-screen max-w-screen overflow-auto text-wrap">
		<img src="{{ asset('images/rolebg.webp') }}" alt=""
			class="hidden lg:block -z-1 fixed top-0 object-cover w-[150%] max-h-screen bg-fixed bg-cover">
		<div class="container z-10 min-h-screen  grid lg:grid-cols-3">
			<div class="container lg:bg-secondary lg:bg-opacity-60 p-8 md:p-16  col-span-2 animate__animated animate__fadeInLeft">
				<div class="container h-full flex flex-col justify-center items-center">

					<div class="container max-w-lg flex flex-col justify-center h-full">


						<div>
							<h4 class="inline-block px-2 my-4 font-bold text-base-content bg-green-400 rounded">
								Verify Email
							</h4>
						</div>

						<h1 class="font-extrabold text-4xl lg:text-6xl lg:text-white">
							Hello! {{ $user->username }}
						</h1>
						<p class="px-2 max-w-sm my-4 text-base-content">
							This is an email verification from our server. Click the button below to verify your email.
						</p>

						<div class="flex gap-6">
							<a href="{{ $verificationUrl }}" class="btn btn-outline mb-12 bg-transparent bg-slide-r">
								Verify Now
							</a>
						</div>

						<div class="divider"></div>

						<div class="max-w-screen w-1/2  text-wrap">

							<p class="max-w-sm text-base-content">
								If there is an error, you can copy the link below and paste it in your browser!
							</p>
							<a href="{{ $verificationUrl }}" class="max-w-sm link link-hover link-primary">
								{{ $verificationUrl }}
							</a>

						</div>


					</div>
				</div>

			</div>

		</div>
	</div>
</x-app-layout>
