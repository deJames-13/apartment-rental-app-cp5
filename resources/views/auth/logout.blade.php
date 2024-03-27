<div>
	<x-form method='post' wire:submit='save'>
		@csrf
		<x-button class="bg-green-400 text-white" spinner='save' type='submit'>Log out</x-button>
	</x-form>
</div>
