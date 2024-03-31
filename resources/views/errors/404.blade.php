<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Not Found') }}
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
		<div class="flex flex-col gap-4">
			<div class="text-2xl font-extrabold uppercase text-center">
				404
				<br>
				Not Found
			</div>
			<div class="mt-4 text-gray-500">
				The page you are looking for does not exist.
			</div>
			<x-button
				class="hover:bg-btn-secondary btn-outline btn-primary bg-button-gradient bg-200% transition-all duration-500 ease-out hover:bg-right hover:text-white"
				link="/">
				Go Back to HomePage
			</x-button>
		</div>
	</div>
</x-app-layout>
