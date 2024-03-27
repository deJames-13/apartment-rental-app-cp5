<div>
	<x-form method='post' wire:submit='save'>
		@csrf
		<x-button class="btn-secondary text-white" spinner='save' type='submit'>Log out</x-button>
	</x-form>
</div>
