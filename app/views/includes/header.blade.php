<nav class="green darken-4">
	<div class="nav-wrapper container">
		<a href="/" class="brand-logo">Online Sari Sari Store</a>
		@if(Session::has('isLogged'))
		<ul id="dropdown" class="dropdown-content">
			@include('includes.links')
		</ul>
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<li class="">
					<form method="post" action="/search" style="margin-bottom:0;padding-bottom:0">
						<div class="input-field align-right">
							<input style="margin-bottom:0;padding-bottom:0"
								   type="search"
								   name="itemSearch"
								   id="itemSearch">
							<label for="search"><i class="material-icons">search</i></label>
							<i class="material-icons">close</i>
						</div>
					</form>
			</li>
			<li>
				<a class="dropdown-button" href="#!" data-activates="dropdown">
					Menu
					<i class="material-icons right">arrow_drop_down</i>
				</a>
			</li>
		</ul>
		@else
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			@include('includes.links')
		</ul>
		@endif
		<ul id="slide-out" class="side-nav">
			@include('includes.links')
		</ul>
		<a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
	</div>
</nav>

<script>
	$('#itemSearch').on('mouseenter',function(){
//		Materialize.toast('Got hovered!', 3000);
		
	});

	$(".dropdown-button").dropdown();
	$('.button-collapse')
		.sideNav({
			menuWidth: 300, // Default is 240
			edge: 'left', // Choose the horizontal origin
			closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
		}
	);
</script>