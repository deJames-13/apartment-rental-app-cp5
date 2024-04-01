<x-default-layout>
	<div class="m-10 p-3">


		<div class="grid grid-cols-5 space-x-5">

			{{-- thumbnail --}}
			<div class="col-span-2 p-5 bg-blue-100 rounded-2xl">
				<div class="relative z-10 mx-3 flex items-center">
					<div class="badge bg-green-400 border-none absolute right-5 top-1 mt-2 text-xs font-bold text-white">Unit Type</div>
				</div>

				<img class="rounded-xl"
					src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?q=80&w=1680&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
					alt="thumbnail">

				<div class="border-b pt-3 border-gray-400 w-full"></div>

				{{-- heading --}}
				<div class="pt-2 ml-2">
					<h2 class="text-xl font-bold uppercase">For Rent: Bed Space For Ladies in Katipunan; Condo in Quezon City near
						Ateneo</h2>
				</div>

				{{-- location --}}
				<div class="py-2 ml-2 flex items-center">
					<x-icon class="text-base " name="fas.location-dot" />
					<p class=" font-light text-base pl-3 text-gray-500 uppercase"> ESTEBAN ABADA STREET, KATIPUNAN, QUEZON CITY
						KATIPUNAN, QUEZON CITY</p>
				</div>

				<div class="border-b border-gray-400 w-full"></div>

				<div class="relative z-10 mx-3 flex items-center">
					<div class="badge bg-red-500 border-none absolute right-5 top-1 mt-2 text-xs font-bold text-white">Occupied</div>
				</div>

				{{-- price --}}
				<div class="py-2 ml-2 flex items-center text-blue-700">
					<x-icon name="fas.peso-sign" />
					<h2 class="text-3xl font-semibold ">8,500</h2>
				</div>

				{{-- min --}}
				<div class="flex items-center ml-5">
					<div class="py-2 flex items-center text-gray-600 ">
						<x-icon name="fas.peso-sign" />
						<h2 class="text-md font-semibold ">7,000</h2>
					</div>

					<x-icon class="text-blue-700" name="fas.minus" />

					{{-- max --}}
					<div class="py-2 flex items-center text-gray-600">
						<x-icon name="fas.peso-sign" />
						<h2 class="text-md font-semibold ">10,000</h2>
					</div>
				</div>

				<div class="pt-5 ml-2 pb-5 flex justify-between items-center mx-3">
					<div class="py-1 flex items-center text-gray-600">
						<x-icon name="fas.bath" />
						<h2 class="text-lg px-2 font-semibold ">5</h2>
					</div>
					<div class="py-1 flex items-center text-gray-600">
						<x-icon name="fas.bed" />
						<h2 class="text-lg px-2 font-semibold ">5</h2>
					</div>
					<div class="py-1 flex items-center text-gray-600">
						<x-icon name="fas.cube" />
						<h2 class="text-lg px-2 font-semibold ">2</h2>
					</div>
				</div>

			</div>

			{{-- profile side --}}
			<div class="col-span-3 p-3 bg-blue-100 rounded-2xl">

				{{-- profile pic --}}
				<div class="grid grid-cols-5 pt-3">
					<div
						class="col-span-2 p-3 ml-10 rounded-full overflow-hidden w-48 h-48 bg-gray-200 flex justify-center items-center">
						<img
							src="https://images.unsplash.com/photo-1518020382113-a7e8fc38eac9?q=80&w=1917&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
							alt="Profile Picture" class="w-full h-full object-cover">
					</div>

					{{-- name, email, number --}}
					<div class="col-span-3 p-3 pt-3">
						<div class="items-center pt-10">
							<h1 class="text-2xl pb-2 font-thin ">John Doe</h1>
							<h3 class="text-md pb-2 font-semibold text-blue-700">john@example.com</h3>
							<h3 class="text-md pb-2 font-thin">+63 999 123 4567</h3>
						</div>

					</div>
				</div>

				<div class="pt-5 text-gray-600 ml-2">
					<h2 class="text-md font-semibold ">Description</h2>
				</div>

				<div class="border-b pt-3 border-gray-400 w-full"></div>

				{{-- description --}}
				<div class="ml-2 pt-5">
					<p class="w-3/4 font-light text-gray-500">Browse our top-rated properties, ranging from urban apartments to serene
						countryside retreats. <br> <br> Our curated selection ensures you'll find the perfect home for your lifestyle.
						<br> <br> Start your search today!
					</p>
				</div>

				<div class="border-b pt-3 border-gray-400 w-full"></div>

				<div class="flex items-center pt-10 relative">
					<button class="flex-grow bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-4 mx-2 rounded">
						Apply Rent
					</button>
					<button class="flex-grow bg-green-500 hover:bg-green-700 text-white font-bold py-4 px-4 mx-2 rounded">
						View Units
					</button>
				</div>

			</div>

		</div>

		<div class="mt-5 p-3 bg-blue-100 rounded-2xl">
			<div class="pt-5 text-gray-600 ml-2">
				<h2 class="text-md font-semibold ">Gallery</h2>
			</div>

			<div class="border-b pt-3 border-gray-400 w-full"></div>

			<div class="grid grid-cols-5 mt-5 px-5">
				<div class="bg-blue-500 rounded-tl-2xl rounded-bl-2xl h-64 hover:scale-105 transition"></div>
				<div class="bg-green-500 h-64 hover:scale-105 transition"></div>
				<div class="bg-yellow-500 h-64 hover:scale-105 transition"></div>
				<div class="bg-red-500 h-64 hover:scale-105 transition"></div>
				<div class="bg-purple-500 rounded-tr-2xl rounded-br-2xl h-64 hover:scale-105 transition"></div>
			</div>
		</div>
	</div>
</x-default-layout>
