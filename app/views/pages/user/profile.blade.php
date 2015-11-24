@extends('layouts.default')

@section('pageTitle')
	<title>{{ $user->username }}</title>

@stop

@section('content')

	<?php
		function myProfile ($username){
			if(Session::has('isLogged'))
				if(!Session::has('isAdmin') || $username == Session::get('username'))
					return true;
			return false;
		}
	?>
    <div class="container">	
		<div class="row">
			<div class="col l6 m12 s12">
				<div class="card">
					<div class="card-content">
						<h5>
							<i class="material-icons size3">perm_identity</i> Information</h5>
						<p>
							<span style="font-weight:bold">
								Username: </span>
							{{ $user->username }}
						</p>
						<p>
							<span style="font-weight:bold">
								Name: </span>
							{{ $user->first_name . " " . $user->last_name }}
						</p>
						<p>
							<span style="font-weight:bold">
								Birthday: </span>
							{{ $profile->birthday }}
						</p>
						<p>
							<span style="font-weight:bold">
								Age: </span>
							{{ $profile->age }}
						</p>
						<p>
							<span style="font-weight:bold">
								Interests: </span>
							<ol>
							@foreach($interests as $interest)
								<li>
									{{ $interest->interest }}
								</li>
							@endforeach
							</ol>
						</p>
						@if(Session::has('isAdmin'))
						<p>
							<span style="font-weight:bold">
								Approved by: </span>
							{{ $user->approved_by }}
						</p>
						<p>
							<span style="font-weight:bold">
								Approval date: </span>
							{{ $user->approval_date }}
						</p>
						@endif
					</div>
				</div>
				
				@if(myProfile($user->username) || Session::has('isAdmin'))
				<div class="card">
					<div class="card-content center">
						<h5>Try one of these</h5>
						<div class="divider"></div>
						<div class="row">
							@if(!Session::has('isAdmin'))
							<div class="col s4">
								<a class="green-text waves-effect waves-light" 
								   href="/item/create">
									<h2 style="margin:1">
											<i class="material-icons">add</i>
									</h2>
									<h6 style="margin:0">Add new item</h6>
								</a>
							</div>
							<div class="col s4">
								<a class="blue-text waves-effect waves-light" 
								   href="/item">
									<h2 style="margin:1">
										<i class="material-icons">shopping_cart</i>
									</h2>
									<h6 style="margin:0">Buy from others</h6>
								</a>
							</div>
							<div class="col s4">
							@elseif(Session::has('isAdmin') && $user->username == Session::get('username'))
							<div class="col s4">
								<a class="green-text waves-effect waves-light" 
								   href="/item/create">
									<h2 style="margin:1">
											<i class="material-icons">add</i>
									</h2>
									<h6 style="margin:0">Add new item</h6>
								</a>
							</div>
							<div class="col s4">
								<form>
									<button formmethod="post" style="border:0px;background-color:transparent" class="red-text waves-effect waves-light" 
									   formaction="/user/destroy/{{ $user->username }}">
										<h2 style="margin:1">
											<i class="material-icons">delete</i>
										</h2>
										<h6 style="margin:0">Delete user</h6>
									</button>
								</form>
							</div>
							<div class="col s4">
							@else
							<span>As an administrator, you can edit this user's profile.</span>
							<div class="col s6">
								<form>
									<button formmethod="post" style="border:0px;background-color:transparent" class="red-text waves-effect waves-light" 
									   formaction="/user/destroy/{{ $user->username }}">
										<h2 style="margin:1">
											<i class="material-icons">delete</i>
										</h2>
										<h6 style="margin:0">Delete user</h6>
									</button>
								</form>
							</div>
							<div class="col s6">
							@endif
								<a class="orange-text waves-effect waves-light" 
								   href="/user/edit/{{ $user->username }}">
									<h2 style="margin:1">
										<i class="material-icons">settings</i>
									</h2>
									<h6 style="margin:0">Edit profile</h6>
								</a>
							</div>
							
						</div>
					</div>
				</div>
				@endif
			
			</div>
			
			<div class="col l6 m12 s12">
			@if(sizeof($items) == 0)
				<div class="card">
					<div class="card-content">
						<h5>
							<i class="material-icons size3">
								shopping_cart</i> 
							Items Posted</h5>
					</div>
				</div>
				<div class="card">
					<div class="card-content">
						<span class="black-text card-title">No posted items yet!</span>
						<p>Unfortunately, we can't help you with what you need right now.</p>
					</div>
				</div>
			@else
				<div class="card">
					<div class="card-content">
						<h5>
							<i class="material-icons size3">
								shopping_cart</i> 
							Items Posted</h5>
					</div>
				</div>
				@include('pages.user.userItems')
			@endif
			</div>
		</div>
	</div>
@stop