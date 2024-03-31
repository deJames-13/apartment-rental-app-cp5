<x-modal id="{{ $id }}" title="{{ $title }}">
	<div>
		{{ $slot }}
	</div>

	<x-slot:actions>
		{{ $actions ?? '' }}
	</x-slot:actions>
</x-modal>
