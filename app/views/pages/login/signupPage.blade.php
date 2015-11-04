@extends('layouts.default')

@section('pageTitle')
	<title>Sign up</title>

@stop

@section('content')
    <div class="container">
		
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
@stop