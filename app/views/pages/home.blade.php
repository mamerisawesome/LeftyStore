@extends('layouts.default')

@section('pageTitle')
	<title>Online Sari Sari</title>

@stop

@section('content')

	<div class="parallax-container">
		<div class="parallax"><img src="res/laptop.jpg"></div>
	</div>

	
	<div class="container">
		<h2>An Online Store To Serve Everyone</h2>

		<div class="row">
			<div class="col s3">
				<h5>Reasons why use our online store</h5>
			</div>

			<div class="col s9">
				<ul class="collapsible" data-collapsible="accordion">
					<li>
						<div class="collapsible-header">Reliable</div>
						<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
					</li>
					<li>
						<div class="collapsible-header">Secure</div>
						<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
					</li>
					<li>
						<div class="collapsible-header">Convenient</div>
						<div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
					</li>
				</ul>
			</div>
		</div>
	</div>
		@if(!Session::has('username'))
		<div class="row">
<!--			@if(count($errors)>0)-->
<!--			<div class='card-panel hoverable tooltipped' data-position="bottom" data-delay="50" data-tooltip="Username and Password does not match.">-->
<!--			@else-->
			<div class="col s6">
				<div style="height:230px;" class='card-panel hoverable'>
<!--			@endif-->
					<form class="center" method="get" action="/user/signup">
						<h4>Create a new account to start</h4>
						<button class="btn waves-effect waves-light" type="submit" name="action">
							Sign up
						</button>
					</form>
				</div>
			</div>
			<div class="col s6">
				<div style="height:230px;" class='card-panel hoverable'>
					{{ Form::open(['route'=>'login']) }}
						<div class="container">
							<div class="input-field">
							{{ Form::text('username',null,['placeholder'=>'Username','class'=>'validate'])}}
							<label for="uname">Username/Email</label>
							</div>
							<div class="input-field">
							{{ Form::text('pasword',null,['placeholder'=>'Password','class'=>'validate'])}}
							<label for="pword">Password</label>
							</div>
							<button class="btn waves-effect waves-light" type="submit" name="action">Submit
								<i class="material-icons">send</i>
							</button>
						</div>

					{{ Form::close()}}
				</div>
			</div>

		</div>
		@endif
	<script>
		$(document).ready(function(){
		  $('.parallax').parallax();
		});
	</script>
@stop