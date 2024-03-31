<x-modal wire:model="{{ $id }}" persistent class="backdrop-blur">
	<div>
		{{ $body }}
	</div>
	<x-slot:actions>
		{{ $actions ?? '' }}
	</x-slot:actions>
</x-modal>
