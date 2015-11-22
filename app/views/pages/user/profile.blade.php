@extends('layouts.default')

@section('pageTitle')
	<title>{{ $user->username }}</title>

@stop

@section('content')
    <div class="container">	
		<div class="row">
			<div class="col l6 m12 s12">
				<div class="card">
					<div class="card-content">
						<h3>
							<i class="material-icons size3">perm_identity</i> Information</h3>
						<p>
							<span style="font-weight:bold">
								Name: </span>
							{{ $user->first_name . " " . $user->last_name }}
						</p>
						<p>
							<span style="font-weight:bold">
								Username: </span>
							{{ $user->username }}
						</p>
						<p>
							<span style="font-weight:bold">
								Address: </span>
							{{ $user->address }}
						</p>
					</div>
				</div>
			</div>
			
			<div class="col l6 m12 s12">
			@if(sizeof($items) == 0)
				<div class="card">
					<div class="card-content">
						<h3>
							<i class="material-icons size3">shopping_cart</i> Items Posted</h3>
						<span class="black-text card-title">No posted items yet!</span>
						<p>Unfortunately, we can't help you with what you need right now.</p>
					</div>
					<div class="card-action">
						<form method="post" action="#">
							<button formmethod="get" 
									formaction="/" 
									class="btn waves-effect waves-light green" type="submit">
								Home
							</button>
							<button formmethod="get" 
									formaction="/item/" 
									class="btn waves-effect waves-light blue" type="submit">
								View items
							</button>
						</form>
					</div>
				</div>
			@else
				<div class="card">
					<div class="card-content">
						<h3>
							<i class="material-icons size3">shopping_cart</i> Items Posted</h3>
					</div>
				</div>
				@include('pages.user.userItems')
			@endif
			</div>
		</div>
	</div>
@stop