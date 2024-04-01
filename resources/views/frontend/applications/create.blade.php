<x-dashboard-layout>

	<div>
		<div id="setting-up-form">
			@if (isset($property))
				<livewire:setting-up-form :property="$property" />
			@else
				<livewire:setting-up-form />
			@endif

		</div>

		{{-- <div id="application-form">
			<livewire:application-form />
		</div> --}}
	</div>

	<script>
		// switch page between setting-up-form and application-form
		// const settingUpForm = document.getElementById('setting-up-form');
		// const applicationForm = document.getElementById('application-form');

		// settingUpForm.style.display = 'block';
		// applicationForm.style.display = 'none';

		// function showSettingUpForm() {
		// 	settingUpForm.style.display = 'block';
		// 	applicationForm.style.display = 'none';
		// }

		// function showApplicationForm() {
		// 	settingUpForm.style.display = 'none';
		// 	applicationForm.style.display = 'block';
		// }
	</script>
</x-dashboard-layout>
