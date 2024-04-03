`<x-app-layout>
	<div class="relative min-h-screen overflow-auto max-w-screen text-wrap">
		<img
			src="{{ asset('https://images.unsplash.com/photo-1560518883-ce09059eeffa?q=80&w=1673&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') }}"
			alt="" class="hidden lg:block -z-1 fixed top-0 object-cover w-[150%] max-h-screen bg-fixed bg-cover">
		<div class="container z-10 grid min-h-screen lg:grid-cols-3">
			<div class="container col-span-2 p-8 lg:bg-secondary lg:bg-opacity-60 md:p-16 animate__animated animate__fadeInLeft">
				<div class="container flex flex-col items-center justify-center h-full">

					<div class="container flex flex-col justify-center h-full max-w-lg">


						<div>
							<h4 class="inline-block px-2 my-4 font-bold text-white bg-green-400 rounded-md">
								Application Success
							</h4>
						</div>

						<h1 class="text-2xl font-extrabold lg:text-3xl lg:text-white">
							Good day,
						</h1>

						{{-- here is the "Guest" or yung Username --}}
						<h1 class="mb-5 text-4xl font-extrabold lg:text-8xl lg:text-blue-700 ">
							{{ $user->username }}
						</h1>

						<p class="max-w-md px-2 my-4 text-xl font-bold text-white">
							Your application has been rejected. For further reason please contact the landlord.
							You can also resubmit an application.
						</p>

						{{-- href="{{ $verificationUrl }}" --}}

						<p class="max-w-xl text-xs text-gray-800">
							If you have any questions, please contact us at
							<a href="mailto:rentalapp.mail@gmail.com" class="link link-hover link-primary">
								RentalApp
							</a>

						</p>

						<div class="divider"></div>

						<div class="w-1/2 max-w-screen text-wrap">

							<p class="max-w-xl text-xs text-gray-800">
								If you encounter any issues, you can copy the link below and paste it into your browser:
							</p>

							{{-- href="{{ $verificationUrl }}" --}}
							<a class="max-w-sm link link-hover link-primary">
								{{-- {{ $verificationUrl }} --}}
							</a>

						</div>


					</div>
				</div>

			</div>

		</div>
	</div>
</x-app-layout>
