<!DOCTYPE html>
<html>
	<head>
	    @include('includes.head')
		@yield('pageTitle')
	</head>

	<body>

		

		<!-- whole body (content) wrapped by a single div -->
		<main>
		    @yield('content')
		</main>

		
	</body>

</html>