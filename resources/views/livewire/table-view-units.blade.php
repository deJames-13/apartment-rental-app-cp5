<div>
  @php
  $units = App\Models\Unit::all();

  $headers = [
    ['key' => 'id', 'label' => '#'],
    ['key' => 'unit_code', 'label' => 'Unit Code'],
    ['key' => 'room_number', 'label' => 'Room Number'],
    ['key' => 'floor_number', 'label' => 'Floor Number'],
    ['key' => 'no_of_bedroom', 'label' => 'Bedrooms'],
    ['key' => 'no_of_bathroom', 'label' => 'Bathrooms'],
    ['key' => 'status', 'label' => 'Status'],
];
  @endphp

  {{-- You can use any `$wire.METHOD` on `@row-click` --}}
  <x-table :headers="$headers" :rows="$units" striped @row-click="alert($event.detail.name)" />
</div>
