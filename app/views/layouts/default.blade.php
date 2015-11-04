<!DOCTYPE html>
<html>
	<head>
	    @include('includes.head')
		@yield('pageTitle')
	</head>

	<body>

		<!-- header / navigation bar -->
		<header class="navbar-fixed">
		    @include('includes.header')
		</header>

		<!-- whole body (content) wrapped by a single div -->
		<main>
		    @yield('content')
		</main>

		<!-- footer -->
		<footer class="page-footer grey darken-4">
		    @include('includes.footer')
		</footer>

	</body>

</html>