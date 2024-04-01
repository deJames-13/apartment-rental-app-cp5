<div id="featured" class="relative z-1 min-h-sceen bg-white">
	<div class="min-h-sceen flex flex-col items-center space-y-6 bg-primary bg-opacity-10 p-6 md:p-12">

		<h3 class="text-center text-lg font-bold uppercase text-primary">Popular</h3>
		<h1 class="text-center text-3xl font-bold md:text-5xl">Popular Properties</h1>
		<p class="w-3/4 text-center font-light text-gray-500">Browse our top-rated properties, ranging from urban apartments to serene countryside retreats. <br> Our curated selection ensures you'll find the perfect home for your lifestyle. <br> Start your search today!
		</p>
		{{-- cards --}}

		<div class="grid w-full gap-6 pb-16 md:grid-cols-2 lg:grid-cols-3">

			<x-rental-card />
			<x-rental-card />
			<x-rental-card />
      <x-rental-card />
			<x-rental-card />
			<x-rental-card />
      <x-rental-card />
			<x-rental-card />
			<x-rental-card />
      <x-rental-card />
			<x-rental-card />
			<x-rental-card />

		</div>

    <x-button
			class="hover:bg-btn-secondary btn-outline btn-primary bg-button-gradient bg-200% transition-all duration-500 ease-out hover:bg-right hover:text-white"
			link="/properties">
			View All Listings
		</x-button>

	</div>

</div>
