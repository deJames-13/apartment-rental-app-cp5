<div {{ $attributes->merge(['class' => 'card shadow-xl p-8']) }}>
	<div class="card-body">
		<h2 class="card-title">{{ $title }}</h2>
		{{ $slot }}
	</div>
</div>
