@section("head")
	<!-- Google Fonts -->
	<link
		href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet">

	<!-- Stylesheets -->
	<link href="{{ asset("frontend/assets/css/font-awesome-all.css") }}" rel="stylesheet">
	<link href="{{ asset("frontend/assets/css/flaticon.css") }}" rel="stylesheet">
	<link href="{{ asset("frontend/assets/css/owl.css") }}" rel="stylesheet">
	<link href="{{ asset("frontend/assets/css/bootstrap.css") }}" rel="stylesheet">
	<link href="{{ asset("frontend/assets/css/jquery.fancybox.min.css") }}" rel="stylesheet">
	<link href="{{ asset("frontend/assets/css/animate.css") }}" rel="stylesheet">
	<link href="{{ asset("frontend/assets/css/jquery-ui.css") }}" rel="stylesheet">
	<link href="{{ asset("frontend/assets/css/nice-select.css") }}" rel="stylesheet">
	<link href="{{ asset("frontend/assets/css/color/theme-color.css") }}" id="jssDefault" rel="stylesheet">
	<link href="{{ asset("frontend/assets/css/switcher-style.css") }}" rel="stylesheet">
	<link href="{{ asset("frontend/assets/css/style.css") }}" rel="stylesheet">
	<link href="{{ asset("frontend/assets/css/responsive.css") }}" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" type="text/css">
@endsection

<x-app-layout>
	@php
		$id = Auth::user()->id;
		$userData = App\Models\User::find($id);
	@endphp

	@include("frontend.partials.header")
	<div>
		{{ $slot }}
	</div>
</x-app-layout>
