<div>
	<div class="grid gap-5">
		<x-button label="Randomize" wire:click="randomize" class="btn-primary" spinner />
		<x-button label="Switch" wire:click="switch" spinner />
	</div>

	<x-chart wire:model="myChart" />
</div>
