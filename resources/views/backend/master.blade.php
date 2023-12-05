<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SIRTA</title>

	<!-- Site favicon -->
	@include('backend.partial.link')
</head>
<body>
	{{-- Loading --}}
    @include('backend.partial.loading')

	{{-- Header --}}
    @include('backend.partial.header')

	@include('backend.partial.sidebar')

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				
				@yield('header')
				
				{{-- Content --}}
				@yield('content')

			</div>
			{{-- Footer --}}
            @include('backend.partial.footer')
		</div>
	</div>
	<!-- js -->
	@include('backend.partial.js')
</body>
</html>