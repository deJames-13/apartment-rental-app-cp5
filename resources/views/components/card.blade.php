<div {{ $attributes->merge(['class' => 'w-full card shadow-xl p-8 ']) }}>
	<div class="card-body">
		<flex class="justify-between">
			<h2 class="card-title">{{ $title }}</h2>
			{{ $topbutton ?? '' }}
		</flex>
		{{ $slot }}
	</div>
</div>
