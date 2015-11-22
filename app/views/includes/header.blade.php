<nav class="green darken-4">
	<div class="nav-wrapper container">
		<a href="/" class="brand-logo">Online Sari Sari Store</a>
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<li class="">
				<div class="input-field align-right">
				<form method="post" action="/item/search">
				<input style="margin-bottom:0" type="search" name="itemSearch" id="itemSearch">
				<label for="search"><i class="material-icons">search</i></label>
				<i class="material-icons">close</i>
				</form>
				</div>
			</li>
			@include('includes.links')
		</ul>
		<ul id="slide-out" class="side-nav">
			@include('includes.links')
		</ul>
		<a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
	</div>
</nav>

<script>
	$('.button-collapse')
		.sideNav({
			menuWidth: 300, // Default is 240
			edge: 'left', // Choose the horizontal origin
			closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
		}
	);
</script>