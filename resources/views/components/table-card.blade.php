@props([
    'title' => 'Table',
    'data' => null,
    'columns' => null, // specify the columns you want to display here
])
<x-card :title="$title">
	@if ($data && $columns)
		<div class="overflow-x-auto">
			<table class="table w-full table-xs table-hover">
				<thead>
					<tr>
						@foreach ($columns as $column)
							<th>{{ $column }}</th>
						@endforeach
					</tr>
				</thead>
				<tbody>
					@foreach ($data as $item)
						<tr>
							@foreach ($columns as $column)
								<td>{{ $item->$column }}</td>
							@endforeach
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	@else
		<p>No data available</p>
	@endif
</x-card>
