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

		<div class="row">
			<div class="col l6 m6 s12">
				<div class="card">
					<div class="card-content">
						<h4>Create user </h4>
						<p>Click me</p>
					</div>
					<div class="card-action">
						<a class="btn waves-effect white-text waves-light green" href="/user/signup">Sign Up</a>
					</div>
				</div>
			</div>

			<div class="col l6 m6 s12">
				<div class="card">
					<div class="card-content">
						<h4>Post item</h4>
						<p>Click me</p>
					</div>
					<div class="card-action">
						<a class="btn waves-effect white-text waves-light green" href="/item/create">Post</a>
					</div>
				</div>
			</div>
			
			<div class="col l6 m6 s12">
				<div class="card">
					<div class="card-content">
						<h4>View all users</h4>
						<p>Click me</p>
					</div>
					<div class="card-action">
						<a class="btn waves-effect white-text waves-light green" href="/user">View</a>
					</div>
				</div>
			</div>
			
			<div class="col l6 m6 s12">
				<div class="card">
					<div class="card-content">
						<h4>View all items </h4>
						<p>Click me</p>
					</div>
					<div class="card-action">
						<a class="btn waves-effect white-text waves-light green" href="/item">View</a>
					</div>
				</div>
			</div>
		</div>
		
	<script>
		$(document).ready(function(){
		  $('.parallax').parallax();
		});
	</script>
@stop