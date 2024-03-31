@props([
    'minimized' => false,
])

<div>
	<x-form method='post' wire:submit='save'>
		@csrf
		<x-button
			class="hover:bg-btn-secondary btn-outline btn-primary bg-button-gradient bg-200% transition-all duration-500 ease-out hover:bg-right hover:text-white"
			icon='fas.sign-out-alt' spinner='save' type='submit'>
			@if (!$minimized)
				<span class="hidden lg:block">Log out</span>
			@endif
		</x-button>
	</x-form>
</div>
