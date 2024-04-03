@php
	$approved = 0;
	$pending = 0;
	$rejected = 0;
	$user = Auth::user();
	if ($user->role === 'landlord') {
	    $approved = $user->leaseApplicationsAsLandlord()->where('status', 'accepted')->count();
	    $pending = $user->leaseApplicationsAsLandlord()->where('status', 'pending')->count();
	    $rejected = $user->leaseApplicationsAsLandlord()->where('status', 'rejected')->count();
	} elseif ($user->role === 'tenant') {
	    $approved = $user->leaseApplicationsAsTenant()->where('status', 'accepted')->count();
	    $pending = $user->leaseApplicationsAsTenant()->where('status', 'pending')->count();
	    $rejected = $user->leaseApplicationsAsTenant()->where('status', 'rejected')->count();
	}
@endphp

<x-card title="Application Status">
	<div class="grid w-full h-full grid-cols-3 gap-4">
		<div class="flex items-center w-full h-full ">
			<div class="w-full p-4 text-white bg-green-400 rounded-none f-hull card">
				<h1 class="text-4xl font-extrabold">
					{{ $approved }}
				</h1>
				<h1 class="text-xl font-medium">
					Approved
				</h1>
			</div>
		</div>
		<div class="flex items-center w-full h-full ">
			<div class="w-full p-4 text-white bg-yellow-400 rounded-none f-hull card">
				<h1 class="text-4xl font-extrabold">
					{{ $pending }}
				</h1>
				<h1 class="text-xl font-medium">
					Pending
				</h1>
			</div>
		</div>
		<div class="flex items-center w-full h-full ">
			<div class="w-full p-4 text-white bg-red-400 rounded-none f-hull card">
				<h1 class="text-4xl font-extrabold">
					{{ $rejected }}
				</h1>
				<h1 class="text-xl font-medium">
					Rejected
				</h1>
			</div>
		</div>
	</div>
</x-card>
