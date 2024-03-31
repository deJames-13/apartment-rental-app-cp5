<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Unauthorized') }}
		</h2>
	</x-slot>
	<!--Page Title-->
	<section class="w-full flex justify-center py-8 border-b-2">
		<div class='prose'>
			<x-button link="/" class="font-extra-bold text-3xl btn-ghost bg-none border-none">
				RENT APP
			</x-button>
		</div>
	</section>
	<!--End Page Title-->
	<div class="py-12 w-screen h-screen grid place-items-center">
		<div class="flex flex-col gap-4 items-center">
			<div class="text-2xl font-extrabold uppercase text-center">
				419
				<br>
				Page Expired
			</div>
			<div class="mt-4 text-gray-500">
				<p>
					The page you are trying to access has already expired.
					<br>
					If you think this is an error, please contact the
					<developer class=""></developer>
				</p>
			</div>
			<div>
				<x-button
					class="hover:bg-btn-secondary btn-outline btn-primary bg-button-gradient bg-200% transition-all duration-500 ease-out hover:bg-right hover:text-white"
					link="/">
					Go Back to HomePage
				</x-button>
			</div>
		</div>
	</div>

</x-app-layout>
