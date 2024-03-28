{{-- Mobile Menu Dropdown --}}
<button class="btn btn-circle btn-ghost" data-dropdown-placement="right-start" data-dropdown-toggle="multi-dropdown"
	id="multiLevelDropdownButton" role="button" tabindex="0">
	<svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
		<path d="M4 6h16M4 12h16M4 18h7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
	</svg>
</button>
<div class="menu menu-sm z-[1] mt-3 hidden w-52 rounded-box bg-base-100 p-2 shadow" id="multi-dropdown" tabindex="0">
	<ul aria-labelledby="multiLevelDropdownButton" class="py-2 text-sm text-gray-700 dark:text-gray-200">
		@foreach ($navItems as $index => $item)
			@if (isset($item["submenu"]))
				<li>
					<button
						class="flex w-full items-center justify-between px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
						data-dropdown-placement="right-start" data-dropdown-toggle="doubleDropdown{{ $index }}"
						id="doubleDropdownButton{{ $index }}" type="button">{{ $item["label"] }}<svg aria-hidden="true"
							class="ms-3 h-2.5 w-2.5 rtl:rotate-180" fill="none" viewBox="0 0 6 10" xmlns="http://www.w3.org/2000/svg">
							<path d="m1 9 4-4-4-4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" />
						</svg>
					</button>
					<div class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700"
						id="doubleDropdown{{ $index }}">
						<ul aria-labelledby="doubleDropdownButton{{ $index }}"
							class="py-2 text-sm text-gray-700 dark:text-gray-200">
							@foreach ($item["submenu"] as $subIndex => $subItem)
								<li id="submenuItem{{ $index }}_{{ $subIndex }}"><a
										class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
										href="{{ $subItem["link"] }}">{{ $subItem["label"] }}</a></li>
							@endforeach
						</ul>
					</div>
				</li>
			@else
				<li id="singleItem{{ $index }}"><a href="{{ $item["link"] }}">{{ $item["label"] }}</a></li>
			@endif
		@endforeach
	</ul>
</div>
