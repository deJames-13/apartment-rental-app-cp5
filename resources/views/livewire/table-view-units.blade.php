<div>
  @php
  $users = App\Models\User::with('city')->take(5)->get();

  $headers = [
      ['key' => 'id', 'label' => '#'],
      ['key' => 'name', 'label' => 'Nice Name'],
      ['key' => 'city.name', 'label' => 'City'] # <---- nested attributes
  ];
  @endphp

  {{-- You can use any `$wire.METHOD` on `@row-click` --}}
  <x-table :headers="$headers" :rows="$users" striped @row-click="alert($event.detail.name)" />
</div>
