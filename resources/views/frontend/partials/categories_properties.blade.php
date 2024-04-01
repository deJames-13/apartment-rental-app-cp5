@php
	$categories = [
	    [
	        'label' => 'Residential',
	        'icon_link' => '',
	        '#' => '7',
	    ],
	    [
	        'label' => 'Commercial',
	        'icon_link' => '',
	        '#' => '13',
	    ],
	    [
	        'label' => 'Apartment',
	        'icon_link' => '',
	        '#' => '69',
	    ],
	    [
	        'label' => 'Industrial',
	        'icon_link' => '',
	        '#' => '42',
	    ],
	    [
	        'label' => 'Condominium',
	        'icon_link' => '',
	        '#' => '0',
	    ],
	];
@endphp

<div class="relative z-2 h-1/2 min-h-sceen bg-white ">
	<div class="h-1/2 min-h-sceen flex flex-col items-center space-y-6 bg-primary bg-opacity-10 p-3 md:pt-12">

		<h3 class="text-center text-lg font-bold uppercase text-primary"></h3>
		<h1 class="text-center text-3xl font-bold md:text-5xl">Categories</h1>

		{{-- cards --}}
		<div class="w-full grid grid-cols-5 gap-6 p-12 ">
			@foreach ($categories as $c)

      <div class="hover:shadow-2xl hover:scale-105 transition">
        <x-card class="w-full h-full aspect-square shadow-md bg-slide grid place-items-center">
					<img src="https://img.icons8.com/windows/100/neighbour.png" alt="neighbour"
						class="w-full max-w-[100px] aspect-square object-center" />
					<h2 class="text-center text-lg font-bold transition-all delay-300 ease-in">
						{{ $c['label'] }}
					</h2>
				</x-card>
      </div>

			@endforeach
		</div>


	</div>
</div>
