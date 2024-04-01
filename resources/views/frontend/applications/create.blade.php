<x-dashboard-layout>

	<div>
		<div id="setting-up-form">
			<livewire:setting-up-form />
		</div>

		<div id="application-form">
			<livewire:application-form />
		</div>
	</div>

	<script>
		// switch page between setting-up-form and application-form
		const settingUpForm = document.getElementById('setting-up-form');
		const applicationForm = document.getElementById('application-form');

		settingUpForm.style.display = 'none';
		applicationForm.style.display = 'block';

		function showSettingUpForm() {
			settingUpForm.style.display = 'block';
			applicationForm.style.display = 'none';
		}

		function showApplicationForm() {
			settingUpForm.style.display = 'none';
			applicationForm.style.display = 'block';
		}
	</script>
</x-dashboard-layout>
