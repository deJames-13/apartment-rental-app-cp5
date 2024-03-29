<x-modal id="modal17" title="Are you sure?">
	<div>Click "cancel" or press ESC to exit.</div>

	<x-slot:actions>
		{{-- Notice `onclick` is HTML --}}
		<x-button label="Cancel" onclick="modal17.close()" />
		<x-button label="Confirm" class="btn-primary" />
	</x-slot:actions>
</x-modal>
