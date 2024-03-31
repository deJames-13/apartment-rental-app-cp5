@props([
    'minimized' => false,
])

<div>
	<x-form method='post' wire:submit='delete'>
		@csrf
		<input type="hidden" x-bind:value="detail" wire:model.defer="detail">
		<x-button spinner
			@click="openModal = false; $wire.set('detail', detail);window.dispatchEvent(new CustomEvent('pg:eventRefresh-default'));"
			class="btn-outline btn-error" icon='fas.trash' spinner='delete' type='submit'>
			@if (!$minimized)
				<span class="hidden lg:block">Delete</span>
			@endif
		</x-button>
	</x-form>
</div>
