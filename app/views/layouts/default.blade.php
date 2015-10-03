<!DOCTYPE html>
<html>
	<head>
	    @include('includes.head')
	</head>

	<body>

		<!-- header / navigation bar -->
		<header>
		    @include('includes.header')
		</header>

		<!-- whole body (content) wrapped by a single div -->
		<main>
		    @yield('content')
		</main>

		<!-- footer -->
		<footer class="page-footer green darken-4">
		    @include('includes.footer')
		</footer>

	</body>

</html>