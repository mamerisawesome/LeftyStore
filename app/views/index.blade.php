@extends('layouts.personalLanding')

@section('pageTitle')
	<title>List of users</title>

@stop

@section('content')
	<div class="slider fullscreen" style="height:100%;overflow-y:visible">
		<ul class="slides">
			<li>
				<img src="/res/laptop.jpg"> <!-- random image -->
				<div class="caption right-align grey-text text-lighten-4">
					<h3>Online Sari-Sari Store</h3>
					<h5 class="grey-text text-lighten-4">All your "Sari Sari" needs</h5>
					<div class="card" >
						<div class="container left-align black-text">
							<h1>Create a new account</h1>

							<form method="post" action="/signup">
							<div class="input-field">
								<input type="text" name="first_name" id="first_name">
								<label for="first_name">First Name</label>
							</div>

							<div class="input-field">
								<input type="text" name="middle_name" id="middle_name">
								<label for="middle_name">Middle Name</label>
							</div>

							<div class="input-field">
								<input type="text" name="last_name" id="last_name">
								<label for="last_name">Last Name</label>
							</div>

							<div class="input-field">
								<input type="text" name="bank_acct_no" id="bank_acct_no">
								<label for="bank_acct_no">Bank Account No</label>
							</div>

							<div class="input-field">
								<input type="text" name="username" id="username">
								<label for="username">Username</label>
							</div>

							<div class="input-field">
								<input type="password" name="password" id="password">
								<label for="password">Password</label>
							</div>

							<div class="input-field">
								<input type="password" name="retype_password" id="retype_password">
								<label for="retype_password">Retype Password</label>
							</div>

							<div class="input-field">
								<input type="text" name="address" id="address">
								<label for="address">Address</label>
							</div>

							<button type="submit" class="btn waves-effect waves-light green">Submit</button>
						</form>
						</div>
					</div>
					<div class="card">
						<h3><a class="black-text" href="/landing">Go to home</a></h3>
					</div>
				</div>
			</li>
		</ul>
	</div>

	<script>
		$(document).ready(function(){
			$('.slider').slider({full_width: true});
		});
	</script>
@stop