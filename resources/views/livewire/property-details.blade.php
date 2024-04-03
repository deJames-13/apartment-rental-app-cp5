<div class="p-3 m-10">

	<div class="grid grid-cols-5 space-x-5">

		{{-- thumbnail --}}
		<div class="col-span-2 p-5 bg-blue-100 rounded-2xl">
			<div class="relative z-10 flex items-center mx-3">
				<div class="absolute mt-2 text-xs font-bold text-white bg-green-400 border-none badge right-5 top-1">Unit Type</div>
			</div>

			<img class="rounded-xl"
				src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?q=80&w=1680&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
				alt="thumbnail">

			<div class="w-full pt-3 border-b border-gray-400"></div>

			{{-- heading --}}
			<div class="pt-2 ml-2">
				<h2 class="text-xl font-bold uppercase">
					{{ $property->name }}
				</h2>
			</div>

			{{-- location --}}
			<div class="flex items-center py-2 ml-2">
				<x-icon class="text-base " name="fas.location-dot" />
				<p class="pl-3 text-base font-light text-gray-500 uppercase ">
					{{ $property->location }}
				</p>
			</div>

			<div class="w-full border-b border-gray-400"></div>

			<div class="relative z-10 flex items-center mx-3">
				<div class="absolute mt-2 text-xs font-bold text-white bg-red-500 border-none badge right-5 top-1">Occupied</div>
			</div>

			{{-- price --}}
			<div class="flex items-center py-2 ml-2 text-blue-700">
				<x-icon name="fas.peso-sign" />
				<h2 class="text-3xl font-semibold ">
					{{ $property->default_price }}
				</h2>
			</div>

			{{-- min --}}
			<div class="flex items-center ml-5">
				<div class="flex items-center py-2 text-gray-600 ">
					<x-icon name="fas.peso-sign" />
					<h2 class="font-semibold text-md ">
						{{ $property->lowest_price }}
					</h2>
				</div>

				<x-icon class="text-blue-700" name="fas.minus" />

				{{-- max --}}
				<div class="flex items-center py-2 text-gray-600">
					<x-icon name="fas.peso-sign" />
					<h2 class="font-semibold text-md ">
						{{ $property->max_price }}
					</h2>
				</div>
			</div>

			<div class="flex items-center justify-between pt-5 pb-5 mx-3 ml-2">
				<div class="flex items-center py-1 text-gray-600">
					<x-icon name="fas.bath" />
					<h2 class="px-2 text-lg font-semibold ">
						{{ $totalBaths }}
					</h2>
				</div>
				<div class="flex items-center py-1 text-gray-600">
					<x-icon name="fas.bed" />
					<h2 class="px-2 text-lg font-semibold ">
						{{ $totalBedrooms }}
					</h2>
				</div>
				<div class="flex items-center py-1 text-gray-600">
					<x-icon name="fas.cube" />
					<h2 class="px-2 text-lg font-semibold ">
						{{ $unitCount }}
					</h2>
				</div>
			</div>

		</div>

		{{-- profile side --}}
		<div class="col-span-3 p-3 bg-blue-100 rounded-2xl">

			{{-- profile pic --}}
			<div class="grid grid-cols-5 pt-3">
				<div
					class="flex items-center justify-center w-48 h-48 col-span-2 p-3 ml-10 overflow-hidden bg-gray-200 rounded-full">
					<img
						src="https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9?q=80&w=1917&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
						alt="Profile Picture" class="object-cover w-full h-full">
				</div>

				{{-- name, email, number --}}
				<div class="col-span-3 p-3 pt-3">
					<div class="items-center pt-10">
						<h1 class="pb-2 text-2xl font-thin ">
							{{ $property->landlord->first_name . ' ' . $property->landlord->last_name }}
						</h1>
						<h3 class="pb-2 font-semibold text-blue-700 text-md">
							{{ $property->landlord->email }}
						</h3>
						<h3 class="pb-2 font-thin text-md">
							{{ $property->landlord->phone_number }}
						</h3>
					</div>

				</div>
			</div>

			<div class="pt-5 ml-2 text-gray-600">
				<h2 class="font-semibold text-md ">Description</h2>
			</div>

			<div class="w-full pt-3 border-b border-gray-400"></div>

			{{-- description --}}
			<div class="pt-5 ml-2">
				<p class="w-3/4 font-light text-gray-500">
					{{ $property->description }}
				</p>
			</div>

			<div class="w-full pt-3 border-b border-gray-400"></div>

			<div class="relative flex items-center pt-10">
				<x-button link="{{ route('applications.create.rent', $property->id) }}"
					class="flex-grow px-4 py-4 mx-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
					Apply Rent
				</x-button>
				{{-- <button link="{{ $viewUnits }}"
					class="flex-grow px-4 py-4 mx-2 font-bold text-white bg-green-500 rounded hover:bg-green-700">
					View Units
				</button> --}}
			</div>

		</div>

	</div>

	<div class="p-3 mt-5 bg-blue-100 rounded-2xl">
		<div class="pt-5 ml-2 text-gray-600">
			{{-- <h2 class="font-semibold text-md ">Gallery</h2> --}}
		</div>

		<div class="w-full pt-3 border-b border-gray-400"></div>

		<div class="grid grid-cols-5 px-5 mt-5">
			<div class="h-64 transition bg-blue-500 rounded-tl-2xl rounded-bl-2xl hover:scale-105"></div>
			<div class="h-64 transition bg-green-500 hover:scale-105"></div>
			<div class="h-64 transition bg-yellow-500 hover:scale-105"></div>
			<div class="h-64 transition bg-red-500 hover:scale-105"></div>
			<div class="h-64 transition bg-purple-500 rounded-tr-2xl rounded-br-2xl hover:scale-105"></div>
		</div>
	</div>
</div>
